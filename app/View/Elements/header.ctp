<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get-A-Gig | <?php echo $title_for_layout?></title>
		
		<?php $needsAWizard = false; ?>
		
		<!-- Include external files and scripts here (See HTML helper for more info.) -->
		<?php
		echo $this->Html->meta('icon');?>
				<meta name="title" content="<?php echo $title_for_layout; ?>">
				<meta name="description" content="">
				
				<meta name="google-site-verification" content="">
				
				<meta name="author" content="Y8">
				<link type="text/plain" rel="author" href="humans.txt" />
				<meta name="Copyright" content="Copyright Get-A-Gig 2011-2012. All Rights Reserved.">
				
				<!-- Dublin Core Metadata : http://dublincore.org/ -->
				<meta name="DC.title" content="Get-A-Gig">
				<meta name="DC.subject" content="Getting a gig was never this easy!!">
				<meta name="DC.creator" content="Y8">
				
				<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
				
				<meta name="viewport" content="width=device-width">
		<?php		echo $this->Html->css('bootstrap'); ?>
		<?php
		        echo $this->Html->css('validation');		
		        echo $this->Html->css('bootstrap-responsive');
		        echo $this->Html->css('gag');
		        echo $this->Html->css('sticky');
				echo $this->fetch('meta');
				echo $this->fetch('css');
				echo $this->fetch('script');
		?>
		
		<!--<script src="<?php echo $this->webroot; ?>js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>-->
	</head>
	<body>
		<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	    <div class="navbar navbar-fixed-top">
	      <div class="navbar-inner">
	        <div class="container">
	          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </a>
	          <a class="brand getAgig" href="<?php echo $this->webroot; ?>">Get-A-Gig <small>(alpha)</small></a>
	          <div class="nav-collapse">
	            <ul id="nav" class="nav">
	              <li class="home active"><a href="<?php echo $this->webroot; ?>"><i class="icon-home icon-white"></i> Home</a></li>
	              <li class="about"><a href="<?php echo $this->webroot; ?>pages/about"><i class="icon-info-sign icon-white"></i> About</a></li>
	              <li class="services"><a href="<?php echo $this->webroot; ?>pages/services"><i class="icon-cog icon-white"></i> Services</a></li>
	            </ul>
	            <ul id="nav" class="nav pull-right">
	            	<li class="help"><a href="<?php echo $this->webroot; ?>pages/help"><i class="icon-question-sign icon-white"></i> Help</a></li>
	            	<li class="divider-vertical"></li>
	                <li class="dropdown">
	                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Already a member?<b class="caret"></b></a>
	                    <ul class="dropdown-menu dropdown-form" data-no-collapse="true" id="signin-dropdown" style="width:250px; padding: 15px;">
	                    	<li>
	                    	  <form method="post" action="<?php echo $this->webroot; ?>Users/login">
	                    	      <fieldset class="textbox">
	                    	        <label class="username js-username">
	                    	          Username
	                    	          <input class="js-username-field email-input" type="text" name="username" autocomplete="on">
	                    	        </label>
	                    	        <label class="password js-password">
	                    	          Password
	                    	          <input class="js-password-field" type="password" 
	                    	           name="password">
	                    	        </label>
	                    	      </fieldset>
	                    	      
	                    	        <fieldset class="subchck">
	                    	        <label style="float: left;" class="checkbox">
	                    	            <input type="checkbox"> Remember me!	
	                    	          </label>
	                    	        <button style="float: right;" type="submit" class="btn submit">Sign in</button>
	                    	      </fieldset>
	                    	  </form></li>
	                        <li class="divider"></li>
	                        <li><a href="#"> <i class="icon-lock"></i> Forgot your password?</a></li>
	                        <li><a href="#"><i class="icon-user"></i> Forgot your username?</a></li>
	                    </ul>
	                </li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div>
	      </div>
	    </div>