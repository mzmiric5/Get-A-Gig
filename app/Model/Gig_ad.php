<?php
class Gig_ad extends AppModel
{
	var $primaryKey = 'gig_ad_id'; 
	//a gig_ad has many requests
	public $hasMany = array(
        'Gig_request' => array(
            'className'    => 'Gig_request',
            'foreignKey'   => 'gig_ad_id',
            'dependent'    => true
        )
    );
}
?>