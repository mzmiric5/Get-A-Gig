<?php
App::uses('Sanitize', 'Utility');
class SearchController extends AppController
{ 
	# searches artists and venues by names and location
	# needs fine tuning 
	function main()
	{
		#get query 
		$searchString = $this->request->query['query'];
		# sanitize string
		$searchString = Sanitize::html($searchString);
		
		#if search is not specific 
		if($searchString == "" || strlen($searchString) < 2)
		{
			$this->set('failMessage', 'Please be more specific about your search');	
			$this->render('fail');
		}
		else
		{
			#first search for artist #THIS WOULD PROBABLY CHANGE
			$this->loadModel('Artist');
			# find the artist
			$artistResult = $this->Artist->findArtist($searchString);
			
			#load model for venue #THIS WOULD CHANGE
			$this->loadModel('Venue');
			#find the venue
			$venueResult = $this->Venue->findVenue($searchString);                                     

			#merge the results
			$result = array_merge($artistResult, $venueResult);
			#pass the result
			$this->set('result', $result);
			$this->set('searchString', $searchString);
			$this->render('results');
		}
	}//main

	#only logged in can search
	function beforeFilter()
	{
		if($this->checkSession() == false)
		{
			$this->redirect('/');
			return false;
		}
		else
			return true;
	}//beforeFilter
}
?>
