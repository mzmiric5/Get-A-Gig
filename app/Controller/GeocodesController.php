<?php
  class GeocodesController extends AppController 
  {
  	  // import these components to user these apis 
      public $components = array('Geocoder', 'GeoPlaces');
      public $helpers= array('GoogleMapV3');
       
      public function index() 
      { 
          debug($this->Geocode->find('all'));
      } 
	  
	  public function find($slug = null) 
      {
          debug($this->Geocode->findByPostcode($slug));
      } 
	  
	  public function get($slug = null) 
      {
      	// Get the long and lat of any Postcode
      	// Checks the DB if it already exists in system, if not
      	// Fetch it from google
        $dbPostcode = $this->Geocode->findByPostcode($slug);
		if ($dbPostcode != null){
			$lat = $dbPostcode['Geocode']['lat'];
			$long = $dbPostcode['Geocode']['lng'];
			$region = $dbPostcode['Geocode']['country'];
		}
		else {
	        $this->Geocoder->address = $slug;
			$this->Geocoder->geocode();
			$lat = $this->Geocoder->latitude;
			$long = $this->Geocoder->longitude ;
			$region = $this->Geocoder->region;
			
			// This is how to add a new entry for the user
			// other stuff like address can get from the geoplaces api
			$this->Geocode->set(array(
				'lat' => $lat,
				'lng' => $long,
			    'postcode' => $slug,
			    'county' => $region,
			    'user_id' => $this->Session->read('User.id')
			));
	
			$this->Geocode->save();
		}
		
		// find near-by places
		// gets all the information about that place, also the distance
		$distance = 50;
		$latitude = $lat;
		$longitude = $long;
		$sql = "SELECT *, (((acos(sin(($latitude*pi()/180)) * sin((`lat`*pi()/180))+cos(($latitude*pi()/180)) * cos((`lat`*pi()/180)) * cos((($longitude - `lng`)*pi()/180))))*180/pi())*60*1.1515) AS `distance` FROM geocodes HAVING distance < $distance";
		$results = $this->Geocode->query($sql);
		$this->set('results', $results);
		
		// using google places
		$this->GeoPlaces->SetLocation($lat.",".$long);
		// Radius in meters
		$this->GeoPlaces->SetRadius(500);
		$this->GeoPlaces->SetTypes("bar");
		$results = $this->GeoPlaces->Search();
		
      } 
  }
?>
