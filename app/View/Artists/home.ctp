<?php
$id = $this->Session->read('User.id');
#the data information for the gigAds
$this->set('gigAds', $gigAds);
$this->set('results', $results); ?>
<div class="row home">
	<div class="span10">
		<div class="row">
			<div class="span5 largeButton" style="height: 250px;">
				<div style="margin-left: 5px;">
					<h2><?php echo $artistInfo['type']; ?> Information</h2>
						<h3 style="padding-left: 5px;"><?php echo $artistInfo['name']; ?></h3>
						<h3 style="padding-left: 5px;"><?php echo $artistInfo['location']; ?></h3>
						<?php if ($type = $artistInfo['type'] == 'Band') echo '<h4 style="padding-left: 25px;">Number of members: '.$artistInfo['no_of_members'].'</h4>'; ?>
					
				</div>
				<div style="margin: 10px 0 0 15px;color: #fff;"><i class="icon-pencil icon-white" style="margin-right: 3px;"> </i>Quick actions</div>
				<ul class="row" style="padding-left: 5px; padding-top: 5px; list-style: none; font-weight: bold; color: white;margin-left: 25px;">
				    <li><a style="color: #333;" href="<?php echo 'view/'.$id; ?>">Account Details</a></li>
					<li><a href="<?php echo $this->webroot; ?>pages/settings">Go to your settings</a></li>
					<li><a data-toggle="modal" href="#scModal">Link your profile to SoundCloud <img style="margin-left:10px;"src="<?php $this->webroot;?>/img/sc.png" alt="SoundCloud" /></a></li>
					<li><a data-toggle="modal" href="#profilePicModal">Upload a profile picture</a></li>
				</ul>
			</div>
			
			<div class="span5" style="height: 250px;">
				<div class="row">
					<div class="span5 largeButton" style="height: 120px; margin-top: 0;">
						<!--<a href='../Gigs/gigsHappening'>-->
						<h2 style="padding: 15px;">Current Happenings in the area</h2>
						<!--</a>-->
						<ul style="padding-left: 5px; padding-top: 5px; list-style: none;">
							<li><a href="#">The Spoti-Friday @ The deaf institute on Friday 27 April</a></li>
							<li><a href="#">The Clique @ The deaf institute on Friday 27 April</a></li>
						</ul> 		
					</div>
				</div>
				<div class="row">
					<a class="span5 largeButton" style="height: 120px; text-align: center;" href="#gigOutModal" data-toggle="modal">
						<h1 class="getAgig " style="padding-top: 35px; font-size: 40px;font-weight: normal;letter-spacing: 3px;text-align: center;">Get-A-Gig</h1>	
						<h4>Find a Venue</h4>	
					</a>
				</div>
			</div>
		</div>
		<!--<div class="row">
			<a href=""><div class="span10 largeButton">
				<h2 style="padding-left: 15px;padding-top: 15px;">Organize your music</h2>
				<h4 class="pull-right" style="padding-right: 25px;">Possibly some stuff pulled from sc</h4>
			</div></a>
		</div>-->
		<div class="row">
			<div class="span6 largeButton" style="height: 480px; overflow: scroll;">
				<div id='calendar'></div>
			</div>
			<div class="span4 largeButton" style="height: 480px;">
				<h2 style="padding-left: 15px;padding-top: 15px;padding-bottom: 15px;">Popular venues in area</h2>
				<?php echo $this->element('getMap'); ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('ad'); ?>
</div>
<br />

<?php echo $this->element('uploadPPForm'); ?>
<?php echo $this->element('scModal'); ?>
<?php echo $this->element('gigOut'); ?>