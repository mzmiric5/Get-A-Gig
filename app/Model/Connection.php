<?php
class Connection extends AppModel
{
	var $name = 'Connection';
	var $primaryKey = 'connection_id';

	// gets two user ids and checks if they are Connnected
	// returns true if they are
	function areConnected($id1, $id2)
	{
		// stupid query ... breaking my nerves in cakephp style I made it on simple query
		$query = "SELECT * FROM connections WHERE ((to_id='".$id1."' AND from_id='".$id2."') OR (to_id='".$id2."' AND from_id='".$id1."'))AND (status='1');";
		$find = $this->query($query);
		if(!empty($find))
			return true;
		else
			return false;
	}
	
}
?>