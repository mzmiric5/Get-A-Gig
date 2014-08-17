<div class="modal fade" id="gigOutModal" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>The GigOut Wizard</h3><!-- why not the Get a gig wizard ? -->
	</div>
	<div class="modal-body">
		<p>The wizard is so simple and easy. Below you see a list of what venues in your area
		   are looking for currently. Just click the button in every ad that you are interested in
		   and then proceed to the gig checkout(next pane). Review your request(s) and finally submit them. See? 2 buttons.</p>
		<div class="tabbable">
		  <ul class="nav nav-tabs">
		    <li class="active"><a href="#1" data-toggle="tab">Venues Looking for</a></li>
		    <!--<li><a href="#2" data-toggle="tab">Gig check out</a></li>-->
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane active" id="1" style="height: 160px; overflow: scroll;">
			      <h2>What venues are looking for?</h2>
			      <ul>
			      	<?php
			      	// print_r($gigAds);
			      	// How to get the gigAds info:
			      	// add some documentation here
			      	for ($i=0; $i < count($gigAds); $i++)
			      	{	
			      	echo "<li>The <a href='../Venues/view/".$gigAds[$i]['Gig_ad']['venue_user_id']
			      	 		."'>".$gigAds[$i]['Gig_ad']['venue_name']."</a> in <em>"
			      	 		.$gigAds[$i]['Gig_ad']['venue_location']."</em> is looking for a <em>"
			      	 		.$gigAds[$i]['Gig_ad']['looking_type']." ".$gigAds[$i]['Gig_ad']['looking_genre']
			      	 		." artist</em> to play on <em>Monday 13 March</em>"
			      	 		// mike setup the button to call the createGigRequest() action
			      	 		// the url is /Gigs/createGigRequest with ajax
			      	 		.'<br /><a class="btn" href="../Gigs/createGigRequest/'.$gigAds[$i]['Gig_ad']['venue_user_id'].'/'.$gigAds[$i]['Gig_ad']['gig_ad_id'].
			      	 		'">Get this gig</a></li>' ;	
			      	}
			      	?>
			      	<!-- 
			      	<li>The <a href="venueProfile">Sleepy willow</a> in <em>Manchester</em>(pull venue location from db here) is looking for a <em>solo rock artist</em>(pull from db) to play on <em>Monday 13 March</em>(pull from db)<br /><a class="btn" href="getGig?id=">Get this gig</a></li>
			      	<li>The <a href="venueProfile">Sleepy willow</a> in <em>Manchester</em>(pull venue location from db here) is looking for a <em>solo rock artist</em>(pull from db) to play on <em>Monday 13 March</em>(pull from db)<br /><a class="btn" href="getGig?id=">Get this gig</a></li>
			      	<li>The <a href="venueProfile">Sleepy willow</a> in <em>Manchester</em>(pull venue location from db here) is looking for a <em>solo rock artist</em>(pull from db) to play on <em>Monday 13 March</em>(pull from db)<br /><a class="btn" href="getGig?id=">Get this gig</a></li>
			      	<li>The <a href="venueProfile">Sleepy willow</a> in <em>Manchester</em>(pull venue location from db here) is looking for a <em>solo rock artist</em>(pull from db) to play on <em>Monday 13 March</em>(pull from db)<br /><a class="btn" href="getGig?id=">Get this gig</a></li>
			      	<li>The <a href="venueProfile">Sleepy willow</a> in <em>Manchester</em>(pull venue location from db here) is looking for a <em>solo rock artist</em>(pull from db) to play on <em>Monday 13 March</em>(pull from db)<br /><a class="btn" href="getGig?id=">Get this gig</a></li> --> 
			      </ul>
		    </div>
		    <!--<div class="tab-pane" id="2" style="height: 160px; overflow: scroll;">
			      <form method="post" action="">
			      	<legend>Gig check out</legend>
			      	<fieldset>
			      		<label class="checkbox">
			      			<input type="checkbox" name="option1" value="option1" />
			      			This place that time that date
			      		</label>
			      		<label class="checkbox">
			      			<input type="checkbox" name="option2" value="option2" />
			      			This place that time that date
			      		</label>
			      		<label class="checkbox">
			      			<input type="checkbox" name="option3" value="option3" />
			      			This place that time that date
			      		</label>
			      	</fieldset>
			      	<legend>Should we send a request to the selected venue(s)?</legend>
			      	<fieldset>
			      		
			      		<input type="submit" name="Submit" class="btn btn-danger" value="Send" />
			      		<input type="buton" name="dismis" value="I changed my mind" class="btn" />
			      	</fieldset>
			      </form>
		    </div>-->
		  </div>
		</div>
	</div>
	<div class="modal-footer">
		<p>Using the GigOut Wizard does not guarantee you will Get-A-Gig. This decision is made by the Venue and Get-A-Gig is in no way responsible </p>
	</div>
</div>