<?php echo 'This is some info based on your cookie: '.$this->Session->read('User.id')."</br>"
      .$this->Session->read('User.type')."</br>".$this->Session->read('User.'); ?>
you can logout clicking <a href = "<?php echo $this->webroot; ?>Users/logout" > here </a>

<div class="row home">
	<div class="span10">
		<div class="row">
			<div class="span5 largeButton" style="height: 150px;">
				<h2 style="padding-left: 15px;padding-top: 15px;">Artist Information</h2>
				<h5 style="padding-left: 15px;padding-top: 15px;">Possible actions</h5>
				<ul style="padding-left: 5px; padding-top: 5px; list-style: none;">
					<li><a href="">Account Details</a></li>
					<li><a href="">Add Music or Images</a></li>
					<li><a href="">Look for a Gig</a></li>
				</ul>
			</div>
			<div class="span5 largeButton" style="height: 150px;">
				<h2 style="padding-left: 15px;padding-top: 15px;">New invitations</h2>
			</div>
		</div>
		<div class="row">
			<div class="span10 largeButton">
				<h2 style="padding-left: 15px;padding-top: 15px;">Artist's Music</h2>
			</div>
		</div>
		<div class="row">
			<div class="span5 largeButton" style="height: 120px;">
				<h2 style="padding-left: 15px;padding-top: 15px;">Calendar</h2>
			</div>
			<div class="span5 largeButton" style="height: 120px;">
				<h2 style="padding-left: 15px;padding-top: 15px;">Popular venues in area</h2>
			</div>
		</div>
	</div>
	<?php echo $this->element('ad'); ?>
</div>
<br />