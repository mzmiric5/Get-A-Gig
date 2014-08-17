<?php
// contains all the gig related actions 
class GigsController extends AppController
{
	//creates a Gig
	function createGig()
	{
		$this->Session->read('User.id');
		$gigData = array('status' => 'upcoming',
						 'artist_name' => 'artistname',
						 'artist_user_id' => 23,
						 'venue_name' => 'venuename',
						 'venue_user_id' => 22,
						 'gig_picture' => '/https something',
						 'about' => 'this is the about',
						 'rating' => 9.0);
		$this->Gig->save($gigData);
	}
	// creates a gig Ad
	function createGigAd()
	{
		//only venues can create a gigAd
		if($this->Session->read('User.type') == 'venue')		
		{
			// get the post data
			$requestData = $this->request->data;
			// read the user id
			$user_id = $this->Session->read('User.id');
			// this is the info needed to go in the database (name sensitive)
			$gigData = array('venue_user_id' => $user_id,
	                         'looking_type' => $requestData['looking_type'],
	                         'looking_genre' => $requestData['looking_genre'],
	                         // the date doesn't work for now
	                         'looking_date' => $requestData['looking_date'],//date('Y-m-d',strtotime()),
	                         'looking_moreinfo' => $requestData['moreInfo']
				            );
			# load the model associated with gig ads 
			$this->loadModel('Gig_ad');
			//try to save the data
			if($this->Gig_ad->save($gigData))
				$this->Session->setFlash('Ad posted sucessfuly');
			else
				$this->Session->setFlash('This is not working');
		}
		else
			$this->Session->setFlash('You are not a venue!');
		//redirect to home
		$this->redirect('/');		
	}
	function createGigRequest($to_venue_id, $gig_ad_id)
	{
		// don't need to provide the gig_ad_id
		$gigData = array('gig_ad_id' => $gig_ad_id,
						 'from_artist_id' => $this->Session->read("User.id"),
	                     'to_venue_id' => $to_venue_id,	                     
	                     'message' => 'hello'
	    				);
		$this->loadModel('Gig_request');
		$this->Gig_request->save($gigData);
		$this->Session->setFlash('Request sent');
		$this->redirect('/');		
	}

	function viewGigRequests()
	{
		$this->loadModel('Gig_ad');
        # finds all the gigAds that the venue created, also the associated requests
        $gigAds = $this->Gig_ad->findAllByvenue_user_id($this->Session->read("User.id"));
        $this->set('gigAdsInfo', $gigAds);
		$this->render("/Venues/viewGigRequests");
	}

	function viewGigAd($id)
	{
		$this->loadModel('Gig_ad');
		$gigAd = $this->Gig_ad->findBygig_ad_id($id);

		# the id of the venue user id that posted that
        $venue_user_id = $gigAd['Gig_ad']['venue_user_id'];
        # find the name of the venue
        $this->loadModel('Venue');
        $venue_details = $this->Venue->findByuser_id($venue_user_id);
        # the venue name
        $venue_name = $venue_details['Venue']['name'];
        #the venue location
        $venue_location = $venue_details['Venue']['location'];
        $gigAd['Gig_ad']['venue_name'] = $venue_name;
        $gigAd['Gig_ad']['venue_location'] = $venue_location;

		$this->set('gigAds', $gigAd);
		$this->render('/Gigs/viewGigAd');
	}

	function gigsHappening()
	{
		$this->render('/Gigs/gigsHappening');
	}
/*
	function viewGigAd($gig_ad_id)
	{
		//disable auto rendering
		$autoRender =false;
		$this->loadModel('Gig_ad');
		return $this->Gig_ad->findBygig_ad_id($gig_ad_id);
		//testing :  $this->set('testData', $this->Gig_ad->findBygig_ad_id($gig_ad_id));		
	} */
}
