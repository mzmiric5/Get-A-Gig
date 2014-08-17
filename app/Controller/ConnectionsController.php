<?php
class ConnectionsController extends AppController
{
	// request a connection from a user to another user
	function requestConnection($to_id)
	{
		//read the from_id
		$from_id = $this->Session->read('User.id');
		if($from_id == $to_id)
		{
			$this->Session->setFlash("You can't connect to yourself");
			$this->redirect('/');
		}
		$this->Connection->create();
		if($this->Connection->save(array('to_id' => $to_id,
			                             'from_id' => $from_id)))		                    
		{	
			$this->Session->setFlash('Request send');
			$this->redirect('/');
		}
	 // requestConnection
	}
	// accepts a request
	function acceptRequest($connection_id)
	{
		// update the status of the connection to accepted -- 1
		$this->Connection->id = $connection_id;
		if($this->Connection->save(array('status' => 1)))
			$this->redirect('/');		
	}

	// get the latest connection requests (ok at the moment get's all the requests)
	function getLatestConnectionRequests()
	{
		// read the user's id
		$user_id = $this->Session->read('User.id');
		// search for all the requests that have his id
		$connRequests = $this->Connection->find('all',array(
			                                          'conditions' => array(
			                                          'Connection.to_id' => $user_id,
			                                          'Connection.status' => 0)));
		$this->loadModel('User');
		for ($i = 0; $i < count($connRequests) ; $i++)
		{
			$userInfo = $this->User->find('first', array('User.user_id' => $connRequests[$i]['Connection']['from_id'] ));
			$connRequests[$i] = array_merge($connRequests[$i], $userInfo);
		}
		return $connRequests;
	} // getLatestConnectionRequest

	// returns all the connections of the given user
	function getAllConnections()
	{	
		// get the user id	
		$user_id = $this->Session->read('User.id');
		// find all the related connections
		$connections = $this->Connection->find('all', array(
							                    'conditions' => array( 
							                    	 'Connection.status' => 1,
							                    	 "OR" => array(
							                    	 	'Connection.from_id' => $user_id,
							                    	 	'Connection.to_id' => $user_id))));
		for($i = 0; $i < count($connections); $i++)
		{
			$from_id = $connections[$i]['Connection']['from_id'];
			if($from_id == $user_id)
				$connectedWithId = $connections[$i]['Connection']['to_id'];
			else
				$connectedWithId = $from_id;
			// search for his details
			$this->loadModel('User');
			$user_data = $this->User->findByuser_id($connectedWithId);
			$connectedWithType = $user_data['User']['account_type'] == 'artist' ? "Artist" : "Venue";

			// CONNECTION_NAME
			$connections[$i]['Connection']['connection_name'] = $user_data[$connectedWithType]['name'];
			// CONNECTION_PICTURE
			$connections[$i]['Connection']['connection_picture'] = $user_data[$connectedWithType]['profile_picture'];
			// CONNECTION TYPE (if it's artist or venue you are connected with)
			$connections[$i]['Connection']['connection_type'] = $connectedWithType;
			// CONNECTION_ID (the id of the user you are connected to)
			$connections[$i]['Connection']['connection_id']=$connectedWithId;

		}
		$this->set('allConnections',$connections);		
		$this->render('/Connections/viewAll');
	} // getConnections

} // ConnectionsController
?>