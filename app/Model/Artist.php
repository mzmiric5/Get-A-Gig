<?php
class Artist extends AppModel
{
	public $name = 'Artist';
	public $primaryKey = 'artist_id';

	public $validate = array(
        'name' => array(
            'unique' => array(
                'rule'     => 'isUnique',
                'message'  => "There is another artist with the same name, please contact us if you think
                               the other artist is a fraud."
            ),//unique
            'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty                                  
        ),//name
        'location' => array(
        	'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty     
        ),//location
        'type' => array(
            'acceptedvalue' => array(
            	'rule' => 'isAcceptedValue',
            	'message' => 'The value is not accepted type'
            )//acceptedvalue     
        ),//type
        'bio' => array(
        	'betweenrule' => array(
                'rule' => array('between',50, 1000),
                'message' => 'Please provide more than 50 words for the bio'
            )//notempty     
        ),//bio       
    );//validate
  
  #check if the type value from the drop box is in the accepted values range
  # NOTICE : If there are changes in the drop list need to change code here as well
  function isAcceptedValue($check)
  {
	  	switch ($check) {
	    case "Solo":
	        return true;
	        break;
	    case "Dj":
	        return true;
	        break;
	    case "Band":
	        return true;
	        break;
	    case "Other":
	    	return true;
	    	break;
	    default: 
	        return true;
	   }//switch
  }

  # finds an artist either by location or by name
  function findArtist($searchString)
  {
    #set the conditions enabling either on location search either in name
        $conditions = array('OR' =>array(
                            'Artist.location' => $searchString,
                            'OR' => 
                            array(
                                array("Artist.name LIKE" => "%".$searchString."%"),
                                array("Artist.name LIKE" => "%".$searchString),
                                array("Artist.name LIKE" => $searchString."%")))); // artist name
                        
        #query the database and grab result
        $artistResult = $this->find('all', array('conditions' => $conditions,
                                                'fields' => array('Artist.name', 'Artist.type',
                                                                     'Artist.location', 'Artist.user_id')));
        return $artistResult;
  }
}
?>
