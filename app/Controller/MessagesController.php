<?php
class MessagesController extends AppController
{
	function view($message_id)
	{
		// get the message
		$this->Message->findBymessage_id($message_id);
		$this->set('testData', $messageData);
		$this->render('/Users/datatest');
	}

	function getMessagesForHeader()
	{
		$user_id = $this->Session->read('User.id');
		// we get all(actually 5) the messages for the user
		$this->loadModel('User');
		// get the messages for the user
		$userData = $this->User->findByuser_id($user_id);			                                
			                                 
		$userMessages = $userData['RecievedMessage'];
		for($i = 0; $i < count($userMessages); $i ++)
		{
			// get the from details
			$from_id = $userMessages[$i]['from_id'];
			$fromData = $this->User->findByuser_id($from_id);
			// check the type of the sender(venue / artist)
			$fromType = $fromData['User']['account_type'] == 'artist' ? "Artist" : "Venue";
			$userMessages[$i]['from_profile_picture'] = $fromData[$fromType]['profile_picture'];			
		}
		$this->set('testData', $userMessages);
		$this->render('/Users/datatest');
	}
}
?>