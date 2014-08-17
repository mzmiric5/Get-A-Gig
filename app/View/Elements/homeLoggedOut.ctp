<div class="hero-unit">
	<h1>Welcome to <div class = "getAgig">Get-A-Gig!</div></h1> 
	<p>The easiest way to get a gig :)</p>
	<p>Use the links below to find out more and sign up or click <a href="<?php echo $this->webroot; ?>pages/tutorial?video=menu">here</a> to watch a small demonstrational tutorial.</p>	
</div>
<div class="row home">
	<div class="span10">
		<div class="row">
		  <a class="span5 largeButton" style="height: 150px;" href="<?php echo $this->webroot; ?>pages/signup?type=venue"><h2 style="padding-left: 15px;padding-top: 15px;">Looking to hire a band?</h2><h4 style="padding-left: 20px;">(Register as a venue)</h4></a>
		  <a class="span5 largeButton" style="height: 150px;" href="<?php echo $this->webroot; ?>pages/signup?type=artist"><h2 style="padding-left: 15px;padding-top: 15px;">Looking for a gig?</h2><h4 style="padding-left: 20px;">(Register as an performer)</h4></a>
		</div>
		<div class="row">
		  <a class="span10 largeButton" href="<?php echo $this->webroot; ?>pages/about"><h3 style="padding:15px;">How It Works?</h3></a>
		</div>
		<div class="row">
		  <a class="span5 largeButton" style="height: 120px;" href="<?php echo $this->webroot; ?>pages/services"><h3 style="padding-left: 15px;padding-top: 15px;">What We Offer?</h3></a>
		  <div class="span5 largeButton" style="height: 120px;"><a href="<?php echo $this->webroot; ?>pages/gigs?filterdate=$datetoday"><h3 style="padding-left: 15px;padding-top: 15px;">Gigs Happening Tonight</h3></a><ul style="padding-left: 5px; padding-top: 5px; list-style: none;"><li><a href="#">The Spoti-Friday @ The deaf institute on Friday 27 April</a></li>
		  <li><a href="#">The Clique @ The deaf institute on Friday 27 April</a></li></ul></div>
		</div>
	</div>
	<?php echo $this->element('ad'); ?>
</div>
<br />
<?php echo $this->element('homequotes'); ?>
<?php echo $this->element('twitter'); ?>