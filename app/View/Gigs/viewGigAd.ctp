
<?php // prints the details of a single gig Ad
	echo '<div class="row">';
	echo '<div class="span6 offset3 largeButton" style="colour:white; padding-left:5px;"><ul style="list-style:none;">';
	echo "<li>The <a href='../Venues/view/".$gigAds['Gig_ad']['venue_user_id']
			      	 		."'>".$gigAds['Gig_ad']['venue_name']."</a> in <em>"
			      	 		.$gigAds['Gig_ad']['venue_location']."</em> is looking for a <em>"
			      	 		.$gigAds['Gig_ad']['looking_type']." ".$gigAds['Gig_ad']['looking_genre']
			      	 		." artist</em> to play on <em>Monday 13 March</em></li></ul>" ;
	echo '</div>';
	echo '</div><br />';
			      	 		 ?>	