<?php
class Post extends AppModel
{
	var $name = 'Posts';
	var $primaryKey = 'post_id';

	public $hasMany = array(
        'Comment' => array(
        	'className' => 'Comment'));
    

	function timeBreakdown($timeStamp) 
	{
		if (!is_int($timeStamp)) $timeStamp = strtotime($timeStamp);
		$currentTime = time();
	 
		$periods = array(
			'years'         => 31556926,
			'months'        => 2629743,
			'weeks'         => 604800,
			'days'          => 86400,
			'hours'         => 3600,
			'minutes'       => 60,
			'seconds'       => 1
		);
	 
		$durations = array(
			'years'         => 0,
			'months'        => 0,
			'weeks'         => 0,
			'days'          => 0,
			'hours'         => 0,
			'minutes'       => 0,
			'seconds'       => 0
		);
	 
		if ($timeStamp) {
			$seconds = $currentTime - $timeStamp;
	 
			if ($seconds <= 0){
				return $durations;
			}
	 
			foreach ($periods as $period => $seconds_in_period) {
				if ($seconds >= $seconds_in_period) {
					$durations[$period] = floor($seconds / $seconds_in_period);
					$seconds -= $durations[$period] * $seconds_in_period;
				}
			}
		}
	 
		return $durations;
    }

    //callback method is called after a find is called
    public function afterFind($results) 
    {
	    foreach ($results as $key => $val) 
	    {
	    	// change the date to offset ( e.g 5 secs ago)
	        if (isset($val['Post']['date'])) 
	        {	// give the array as a breakdown time
	            $results[$key]['Post']['date'] = $this->timeBreakDown($val['Post']['date']);
	        }
	    }
	    return $results;
    }

}
?>