<?php
					  //print_r($gigRequests);
				       
				      	
				      
				      echo '<div class="row">';
				      echo '<div class="span8 offset2 largeButton" style="color:white;">';
				      foreach($gigAdsInfo as $data)
				      {
				      	foreach($data['Gig_request'] as $requests)
				      	{
				      	// the name must be case sensitive with the first letter Capital for cakephp conventions
				      	echo '<div class="row">';
				      	echo '<div class="span4">';
				      	echo '<div class="pull-left">';
				      	echo '<p> Request from <a href=../artists/view'.$requests['from_artist_id'].'/> Stoned Spirit </a>'.
				      	'<a href="../Gigs/viewGigAd/'.$requests['gig_ad_id'].'"/> for that ad </a> ';
				      	/*['account_type'] == 'artist' ? "Artist" : "Venue";
				      	echo "<p>".$data[$from_type]['name']." "."<a href='".$this->webroot."Connections/acceptRequest/".$data['Connection']['connection_id']."' > accept it! </a>"; */
				      	echo '</div>';
				      	echo '</div>';
				      	echo '<div class="span2">';
				      	echo '<div class="pull-right">';
				      	echo '<a href="#" class="btn btn-danger" ">Accept</a><a href="#" class="btn"">Decline</a>';
				      	echo '</div>';
				      	echo '</div>';
				      	echo '</div>';
				      	}
				      } 
				      echo '</div>';
				      echo '</div>';
				      echo '<br />'
					?> 