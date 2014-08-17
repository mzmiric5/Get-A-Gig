<?php
//I know it's awfully commented, need to provide more commenting, for now works !
class PostsController extends AppController
{
	// a post has many comments associated with it
	//returns an associative array 
	function getPostsForProfile($profileId)
	{
		$posts = $this->Post->find('all', array('conditions' => array('Post.to_id' => $profileId),
			                                     'limit' => 5,
		                                         'order' => array('Post.date' => 'DESC'),
		                                         'callbacks' => true));
		for ($i = 0; $i < count($posts) ; $i++)
		{
			// for the post 
			// Get the type
			$from_type = $posts[$i]['Post']['from_type'];
			$from_id = $posts[$i]['Post']['from_id'];
			// given on the poster's type
			if($from_type == 'artist')
				$modelType = 'Artist';
			else
				$modelType = 'Venue';

			$this->loadModel($modelType);
			// find the from info 
			$data = $this->$modelType->find('first', 
				                             array('conditions' => array($modelType.'.user_id' => $from_id),
			                                       'fields' => array($modelType.'.profile_picture', $modelType.'.name')));	                                         
			$posts[$i]['Post']['from_name'] = $data[$modelType]['name'];
			$posts[$i]['Post']['from_picture'] = $data[$modelType]['profile_picture'];

			//scan through all the comments
			for($j = 0; $j < count($posts[$i]['Comment']); $j++)
			{
				// get the author id
				$author_id = $posts[$i]['Comment'][$j]['author_id'];
				// get the author details
				$this->loadModel('User');
				$user_data = $this->User->findByuser_id($author_id);
				$author_type = $user_data['User']['account_type'] == 'artist' ? "Artist" : "Venue";
				// get author name and picture
				// AUTHOR_NAME
				$posts[$i]['Comment'][$j]['author_name'] = $user_data[$author_type]['name'];
				// AUTHOR_PICTURE
				$posts[$i]['Comment'][$j]['author_picture'] = $user_data[$author_type]['profile_picture'];
				// AUTHOR TYPE (for redirect to profile link)
				$posts[$i]['Comment'][$j]['author_type'] = $author_type;
			}// comments
		}
		// return the whole data for posts including comments
		return $posts;
	}

	// gets a text and a to_id and creates a new post to the wall 
	// the to_id is actually the profile id that you press the button from
	function make($to_id)
	{		
		#actually only the text from the post
		if(isset($this->request->data['postText']))
		{
			$postData = $this->request->data;
			# search for the User we are posting to
			$this->loadModel('User');
			$toDetails = $this->User->findByuser_id($to_id);
			// if the user we are posting to doesn't exist
			if (empty($toDetails))
			{
				$this->Session->setFlash('no user with that id');
				$this->redirect('/');
			}
			else
			{
				$from_id = $this->Session->read('User.id');
				$from_type = $this->Session->read('User.type');
				# depending on the type get the extra info to put them in the table
				# so we don't have to search for them by id.
				if ($from_type == 'artist')
				{
					$this->loadModel('Artist');
					$fromDetails = $this->Artist->findByuser_id($from_id);
					$from_pic = $fromDetails['Artist']['profile_picture'];
					$from_name = $fromDetails['Artist']['name'];
				}
				elseif ($from_type == 'venue')
				{
					$this->loadModel('Venue');
					$fromDetails = $this->Venue->findByuser_id($from_id);
					$from_pic = $fromDetails['Venue']['profile_picture'];
					$from_name = $fromDetails['Venue']['name'];
				}						
				
				// this the actual post
				$text = $postData['postText'];
				// if it's empty do nothing and refresh
				if (empty($text))
					$this->redirect($this->referer());
				// fromat the data in an array
				$postData = array(  'from_id' => $from_id, 
					                'to_id' => $to_id,
					                'text' => $text,
					                'from_type' => $from_type,
					                'from_picture' => $from_pic,
					                'from_name' => $from_name);
				// try to save
				if($this->Post->save($postData))
				{	
					#refresh page
					$this->redirect($this->referer());
				}
				else
				{
					$this->Session->setFlash('Something went wrong, comment is not posted, try again');
					$this->redirect($this->referer());
				}
			}// if the to_id exists
		}//if isset
		else
			$this->redirect($this->referer());
	}//make

	//delete a comment
	function delete($toDelete_id)
	{
		// check if the user is the original poster or the profile's user
		// is asking for delete
		$post = $this->Post->findBypost_id($toDelete_id);
		// the delete requester
		$deleterId = $this->Session->read('User.id');
		// if the deleter is the original poster
		// or if the deleter is the reciever
		if ($deleterId == $post['Post']['from_id']  || $deleterId == $post['Post']['to_id'])
		{	
			//delete the post
			if($this->Post->delete($toDelete_id))
			{
				$this->Session->setFlash('Deleted post with id '.$toDelete_id);
			}						
		}
		else
			$this->Session->setFlash('You can not delete that');
		//refresh
		$this->redirect($this->referer());
	}

	function beforeFilter()
	{
		//check if the user is logged in
		if($this->Session->check('User'))
		{
			// for making comments
			if($this->request->action == 'make')
			{
				// here should check if the users are connected
				return true;
			}
			// in any other action
			return true;
		}		
		else
		{
			$this->redirect('/Users/login');
		}
	} //before filter

	// displays the post with the given id
	function view($id)
	{
		$this->set('testData',$this->Post->findBypost_id($id));
		$this->render('/Users/datatest');
	}
	

		
}