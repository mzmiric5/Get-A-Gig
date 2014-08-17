<?php
class VenuesController extends AppController 
{ 
    var $name = "Venues"; 
    public $components = array('Geocoder', 'GeoPlaces');
    public $helpers= array('GoogleMapV3');

    function home()
    {  
        $this->set('title_for_layout', 'Home');
        $user_id = $this->Session->read('User.id');
        // get and set venueInfo
        $venueInfo = $this->Venue->findByuser_id($user_id);
        // also need to find details based on users location from geocodes table
        $this->loadModel('Geocode');
        $dbPostcode = $this->Geocode->findByuser_id($user_id);
        // check if it works
        $lat = $dbPostcode['Geocode']['lat'];
        $long = $dbPostcode['Geocode']['lng'];

        // finds all the nearby in $distance radius
        $distance = 50;
        $latitude = $lat;
        $longitude = $long;
        $sql = "SELECT *, (((acos(sin(($latitude*pi()/180)) * sin((`lat`*pi()/180))+cos(($latitude*pi()/180)) * cos((`lat`*pi()/180)) * cos((($longitude - `lng`)*pi()/180))))*180/pi())*60*1.1515) AS `distance` FROM geocodes HAVING distance < $distance";
        $results = $this->Geocode->query($sql);
        // set these to the view
        $this->set('results', $results);
        $this->set('venueInfo', $venueInfo);
    }
    
    function view($id)
    {
        #might be a good idea to move this bit into the models
        #get the venue details
        $venueDetails = $this->Venue->findByuser_id($id);
        if(empty($venueDetails))
        {
            #there is no venue with that id
            $this->Session->setFlash("No venue with that id");
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
            $venueDetails = $venueDetails['Venue'];
            $this->set('venueDetails', $venueDetails);
        }
    }//view

    //work in progress
    function uploadPic()
    {}
    

    #renders the help view
    function help()
    {
        $this->set('title_for_layout', 'Help');
        $this->render('/Pages/help');
    }

    #called with request action from the header
    #it's actually getting the data needed for the header
    #the header is actually cached so there is no efficiency problem
    function getHeaderInfo($id)
    {
        
        $data = $this->Venue->findByuser_id($id);
        $request['name'] = $data['Venue']['name'];
        $request['profile_picture'] = $data['Venue']['profile_picture'];
        return $request;
    }

    #callback method -- should be moved sometime
    public function beforeFilter()
    {
    	if($this->action == 'home' || $this->action =='help')
        {
            if ($this->Session->check('User') && $this->Session->read('User.type') == 'venue')
            {
                #if there is a session and it's an artist session   
                return true;
            }
            else
            {
                if($this->Session->read('User.type') == 'artist')
                {
                    #the user is an artist, redirect to artist home
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
    }

    //the wizard to create ads
    function gigAdWizard()
    {
        $this->set('title_for_layout', 'Create a gig Ad');
        $this->render('/Venues/gigAdWizard');
    }
}//controller
?>
