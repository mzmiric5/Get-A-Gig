<?php $posts = $this->requestAction('/Posts/getPostsForProfile/'.$profileId); ?>

<?php

  
   // get all the posts and print them
   foreach ($posts as $post) 
   {
		echo '<div class="post span6" style="padding-top: 10px; padding-bottom:10px; border-bottom: 1px solid #b94a48;">';
		echo '<div class="posterImg pull-left" style="padding-right: 5px;"><img width="50px" height="50px" src="'.$post['Post']['from_picture'].'" /></div>';
		$user_id = $this->Session->read('User.id');
		// if it's the user's profile the post is being printed or the poster is watching it
		// then give them delete option 
		if ( $user_id == $profileId || $user_id == $post['Post']['from_id'])
		{
			echo '<div class="deleteButton pull-right"><a href="'.$this->webroot.'Posts/delete/'.$post['Post']['post_id']
		          .'">X</a></div>';
		}
		echo '<div class="postContent"><a href="/'.$post['Post']['from_type'].'s/view/'.$post['Post']['from_id'].'"><strong>'.$post['Post']['from_name'].' </strong></a> ';
		echo '<p>'.htmlspecialchars($post['Post']['text']).' </p></div>';
		echo '<div><small><a href="">Comment</a> - '.printTime($post['Post']['date']).'</small></div>';
      foreach ($post['Comment'] as $comment)
      {
         echo '<div class="postComment" style="padding-left:15px; font-size:11px;">';
   		echo '<div class="posterImg pull-left" style="padding-right: 5px;"><img width="50px" height="50px" src="'.$comment['author_picture'].'"/></div>';
   		if ( $user_id == $profileId || $user_id == $comment['author_id'] )
   		{
   			echo '<div class="deleteButton pull-right"><a href="../../comments/delete/'.$comment['comment_id'].'">X</a></div>';
   		}
   		echo '<div class="commentContent"><a href="../../'.$comment['author_type'].'s/view/'.$comment['author_id'].'"><strong>'.$comment['author_name'].'</strong></a> ';
   		echo '<p>'.htmlspecialchars($comment['text']).'</p></div>';
   		echo '</div>';  		
      }
      $this->set('postId', $post['Post']['post_id']);
      echo $this->element('commentBox');
      echo '</div><br/>';
   }

   function printTime($timeArray)
   {
	 if($timeArray['months'] == 0)
	 {	
	   	if($timeArray['days'] == 0)
	   	{
	   		if($timeArray['hours'] == 0)
	   		{
	   			if($timeArray['minutes'] == 0)
	   			{
	   				return $timeArray['seconds'].' seconds ago';
	   			}
	   			else
	   			{
	   				return $timeArray['minutes'].' minutes ago';
	   			}
	   		}
	   		else
	   		{
	   			return $timeArray['hours'].' hours and '.$timeArray['minutes'].' minutes ago';
	   	   	}
	   }
	   else
	   {
	   		return $timeArray['days'].' days ago';
	   }
	 }
	 else
	 	return $timeArray['months'].' months ago';
   }//printTime
?>   
	