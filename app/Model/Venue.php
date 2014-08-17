<?php
class Venue extends AppModel
{
	public $name = 'Venue';
	public $primaryKey = 'venue_id';

	public $validate = array(
        'name' => array(
            'unique' => array(
                'rule'     => 'isUnique',
                'message'  => "There is another venue with the same name, please contact us if you think
                               the other venue is a fraud."
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
        'capacity' => array(
        	'betweenrule' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty     
        ),//capacity
        'opening_times' => array(
        	'betweenrule' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty     
        ),//opening_times #NOTICE probably removed in the future
    );//validate
    
    #check if the type value from the drop box is in the accepted values range
    #NOTICE : If there are changes in the drop list need to change code here as well
    function isAcceptedValue($check)
    {
	  	switch ($check) {
	    case 'Pub':
	        return true;
	        break;
	    case 'Club':
	        return true;
	        break;
	    case 'Other':
	    	return true;
	    	break;
	    default: 
	        return true;
	   }//switch
    }    

    #find Venue either by name or location
    function findVenue($searchString)
    {
        $conditions = array('OR' => array(
                            'Venue.location' => $searchString,
                            'OR' => 
                            array(
                                array("Venue.name LIKE" => "%".$searchString."%"),
                                array("Venue.name LIKE" => "%".$searchString),
                                array("Venue.name LIKE" => $searchString."%"))));
        
        $venueResult = $this->find('all', array('conditions' => $conditions,
                                                'fields' => array('Venue.name', 'Venue.type',
                                                                     'Venue.location', 'Venue.user_id')));
        return $venueResult;
    }

}
?>
