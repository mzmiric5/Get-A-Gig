<?php
class ArtistsController extends AppController 
{ 
    var $name = "Artists"; 
    public $components = array('Geocoder', 'GeoPlaces');
    public $helpers= array('GoogleMapV3');

    function home()
    {
        #get id
        $id = $this->Session->read('User.id');
        #grab the artist information
        $artistInfo = $this->Artist->findByuser_id($id);
        #grab the gig ads
        #this part should be ajaxed onclick
        $this->loadModel('Gig_ad');
        # finds all the gigAds
        $gigAds = $this->Gig_ad->find('all');
        for ($i = 0; $i < count($gigAds) ; $i++)
        {
            # the id of the venue user id that posted that
            $venue_user_id = $gigAds[$i]['Gig_ad']['venue_user_id'];
            # find the name of the venue
            $this->loadModel('Venue');
            $venue_details = $this->Venue->findByuser_id($venue_user_id);
            # the venue name
            $venue_name = $venue_details['Venue']['name'];
            #the venue location
            $venue_location = $venue_details['Venue']['location'];
            $gigAds[$i]['Gig_ad']['venue_name'] = $venue_name;
            $gigAds[$i]['Gig_ad']['venue_location'] = $venue_location;            
        }

        // also need to find details based on users location from geocodes table
        $this->loadModel('Geocode');
        $dbPostcode = $this->Geocode->findByuser_id($this->Session->read("User.id"));
        // check if it works
        $lat = $dbPostcode['Geocode']['lat'];
        $long = $dbPostcode['Geocode']['lng'];

        // finds all the nearby in $distance radius
        $distance = 50;
        $latitude = $lat;
        $longitude = $long;
        $sql = "SELECT *, (((acos(sin(($latitude*pi()/180)) * sin((`lat`*pi()/180))+cos(($latitude*pi()/180)) * cos((`lat`*pi()/180)) * cos((($longitude - `lng`)*pi()/180))))*180/pi())*60*1.1515) AS `distance` FROM geocodes HAVING distance < $distance";
        $results = $this->Geocode->query($sql);

        $this->set('title_for_layout', 'Home');
        $this->set('artistInfo', $artistInfo['Artist']);
        $this->set('gigAds', $gigAds);
        // for maps
        $this->set('results', $results);
    }

   

    function help()
    {
        $this->set('title_for_layout', 'Help');
        $this->render('/Pages/help');
    }

    function getAGigWizard()
    {
        $this->set('title_for_layout', 'Get a gig');
        $this->render('/Artists/getAGigWizard');
    }

    function view($id)
    {
        #might be a good idea to move this bit into the models
        #get the venue details
        $artistDetails = $this->Artist->findByuser_id($id);
        if(empty($artistDetails))
        {
            #there is no venue with that id
            $this->Session->setFlash("No artist with that id");
            $this->redirect('/');
        }
        else
        {
            $this->loadModel('Connection');
            // check if they users are connected
            $user_id = $this->Session->read('User.id');
            if($this->Connection->areConnected($user_id, $id))
                $areConnected = true;
            else
                $areConnected = false;
            $this->set('areConnected', $areConnected);
            # format the array and pass it to the view
            $artistDetails = $artistDetails['Artist'];
            $this->set('artistDetails', $artistDetails);
        }
    }
    
    #called with request action from the header
    #it's actually getting the data needed for the header
    #the header is actually cached so there is no efficiency problem
    function getHeaderInfo($id)
    {
        #get the Artist name and picture
        $data = $this->Artist->findByuser_id($id);
        $request['name'] = $data['Artist']['name'];
        $request['profile_picture'] = $data['Artist']['profile_picture'];
        #return the array containing the requested data
        return $request;
    }//getHeaderInfo

    // pushes the user soundcloud information to the database
    function pushScInfo()
    {
        $data = $this->request->data;
    }

    # callback method -- should be moved some time
    public function beforeFilter()
    {
        if($this->action == 'home' || $this->action =='help' || $this->action == 'getAGigWizard'
            || $this->action == 'pushScInfo')
        {
            if ($this->Session->check('User') && $this->Session->read('User.type') == 'artist')
            {
                #if there is a session and it's an artist session	
    			return true;
            }
    		else
    		{
            	if($this->Session->read('User.type') == 'venue')
            	{
                    #the user is a venue, redirect to venue home
                	$this->redirect('/');
                    return false;
    			}
                else
    			{  
                    # the user is not logged in -- redirect him to login
                	$this->redirect('/Users/login');
    		        return false;
                }
            }
        } // restrains for home and help
        
        # both account types can view 
        if($this->action == 'view')
        {
            #check for session
            if($this->Session->check('User'))
            {
                return true;
            }
            else
            {
               #send to login
               $this->redirect('/Users/login');
               return false; 
            }

        }// restrains for view
    }//beforeFilter
}//controller
?>