<?php 
	  foreach($allConnections as $connection)
	  {
	  	echo '<a href="'.$this->webroot.$connection['Connection']['connection_type'].'s/view/'.$connection['Connection']['connection_id'].'">'.$connection['Connection']['connection_name'].'</a>';
	  }
       ; ?>