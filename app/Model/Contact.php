<?php
class Contact extends AppModel
{
	public $name = 'Contact';
	public $primaryKey = 'contact_id';
  
  	public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty                                  
        ),//name
        'surname' => array(
        	'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty     
        ),//surname
        'postcode' => array(
            'notempty' => array(
            	'rule' => 'notEmpty',
            	'message' => 'This field cannot be left blank'
            )//notempty     
        ),//postcode
        'address_1' => array(
        	'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'The field cannot be left blank'
            )//notempty     
        ),//address_1
        'city' => array(
        	'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty     
        ),//city
        'phone_1' => array(
        	'notempty' => array(
                'rule' => 'notEmpty',
                'message' => 'This field cannot be left blank'
            )//notempty
        ),//phone_1
        'email_1' => array(
            'basicRule' => array(
                'rule' => 'email',
                'message' => 'Not a valid email, please provide a vaild one'
            ),//basicRule
        )//email_1                       
    );//validate
}
?>
