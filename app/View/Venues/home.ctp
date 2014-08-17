<?php
$id = $this->Session->read('User.id');
 ?>

<?php //don't change this line (mike:P)
 # these are the results of the nearby artists needed for the map 
 $this->set('results', $results);
 # venues info 
 $venueInfo = $venueInfo['Venue']; ?>

<div class="row home">
	<div class="span10">
		<div class="row">
			<div class="span5 largeButton" style="height: 250px;">
				<div style="margin-left: 5px;" >
					<h2><?php echo $venueInfo['type']; ?> Information</h2>
						<h3 style="padding-left: 5px;"><?php echo $venueInfo['name']; ?></h3>
						<h3 style="padding-left: 5px;"><?php echo $venueInfo['location']; ?></h3>
						
				</div>
                <div style="margin: 10px 0 0 15px;color: #fff;"><i class="icon-pencil icon-white" style="margin-right: 3px;"> </i>Quick actions</div>
				<ul class="row" style="padding-left: 5px; padding-top: 5px; list-style: none; font-weight: bold; color: white;margin-left: 25px;">
					<li><a style="color: #333;" href="<?php echo 'view/'.$id; ?>">Account Details</a></li>
					<li><a style="color: #333;" href="<?php echo $this->webroot; ?>pages/settings">Go to your settings</a></li>
					<li><a style="color: #333;" href="">New Event</a></li>
					<li><a style="color: #333;" href="">Look for an Artist</a></li>
					<li><a style="color: #333;" data-toggle="modal" href="#profilePicModal">Upload a profile picture</a></li>
				</ul>
			</div>
			<div class="span5">
			<div class="row">
				<a href='../Gigs/viewGigRequests' class="span5 largeButton" style="height: 120px; margin-top: 0;text-align: center;">
					<h2 style="padding-left: 15px;padding-top: 40px;"><strong class="getAgig">Get-A-Gig</strong>-Requests</h2>
				</a>
			</div>
			<div class="row">
				<a href="#gigModalVenue" data-toggle="modal" class="span5 largeButton" style="height: 120px; text-align: center;">
					<h2 style="padding-left: 15px;padding-top: 25px;">Looking for</h2> 		
					<h4>Find a band</h4>	
				</a>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="span10 largeButton">
				<a href='../Gigs/viewGigRequests'>
				<h2 style="padding: 15px;">Current Happenings in the area</h2>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="span6 largeButton" style="height: 480px; overflow: scroll;">
				<div id='calendar'></div>
			</div>
			<div class="span4 largeButton" style="height: 480px;">
				<h2 style="padding-left: 15px;padding-top: 15px;padding-bottom: 15px;">Popular artists in area</h2>
				<?php echo $this->element('getMap'); ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('ad'); ?>
</div>
<br />

<?php echo $this->element('uploadPPForm'); ?>
<?php echo $this->element('gigzard'); ?>