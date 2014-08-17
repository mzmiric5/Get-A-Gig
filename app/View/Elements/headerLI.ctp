<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $needsAWizard = false;
			  $type = $this->Session->read('User.type');
			  $id = $this->Session->read('User.id'); 
		 ?>
		 
		<?php $rightIconData = $this->requestAction('/'.$type.'s/getHeaderInfo/'.$id); ?>
		          
		<title>Get-A-Gig | <?php echo $title_for_layout; ?></title>
		
		<?php App::import('Vendor', 'pusher'); 
		
		$app_key = 'e7d46a16c0337ee608f3';
		$app_secret = '5848e018a46af09faa59';
		$app_id = '17207';
		
		//$pusher = new Pusher($app_key, $app_secret, $app_id);
		//$data = array('message' => 'This is an HTML5 Realtime Push Notification!');
		//$pusher->trigger('my_notifications', 'notifications', $data);
		
		?>
		
		<!-- Include external files and scripts here (See HTML helper for more info.) -->
		<?php
		echo $this->Html->meta('icon');?>
				<meta name="title" content="<?php echo $title_for_layout ?>">
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
		        echo $this->Html->css('jquery.gritter');
		        echo $this->Html->css('datepicker');
		        echo $this->Html->css('fullcalendar');
				echo $this->fetch('meta');
				echo $this->fetch('css');
				echo $this->fetch('script');
		?>
		
		<!--<script src="<?php echo $this->webroot; ?>js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>-->
		
	</head>
	<body>
		<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<!-- get the header info -->
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
	              <li class="dropdown connectionNew">
	              	<a href="#" data-toggle="dropdown"><i class="icon-random icon-white"></i></a>
	              	<ul class="dropdown-menu" id="connections" style="width: 320px;">
	              		<li><div>Connections requests <a class="pull-right" href="">Make connections</a></div></li>
	              		<li class="clearfix divider"></li>
	              		<?php 
	              		  // get the connection requests data 
	              		  // gets as well the User information and the associated artist or venue info
						  $requestData = $this->requestAction('/Connections/getLatestConnectionRequests'); 
					      foreach($requestData as $data)
					      {
					      	// the name must be case sensitive with the first letter Capital for cakephp conventions
					      	$from_type = $data['User']['account_type'] == 'artist' ? "Artist" : "Venue";
					      	// I know it looks horrible but that's it :P Mike please fix the button, I broke it :D
					      	echo '<li><div><div class="pull-left"><img src="'.$data[$from_type]["profile_picture"].'" width="50px" height="50px" />'.$data[$from_type]
					      	 ["name"].'</div> <div class="pull-right"><div class="pull-left"><a href="'.$this->webroot.'Connections/acceptRequest/'.$data["Connection"]["connection_id"].'" class="btn btn-danger">Accept</a></div><div class="pull-right"><a href="" class="btn">Decline</a></div></div></div></li>
					      	    <li class="clearfix divider"></li>';
					      } 
					    ?>
	              		<li><a href="<?php echo $this->webroot; ?>Connections/getAllConnections">Show all connections</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown msgNew">
	              	<a href="#" data-toggle="dropdown"><i class="icon-envelope icon-white"></i></a>
	              	<ul class="dropdown-menu" id="msgs" style="width: 400px;">
	              		<li><div style="padding-left: 10px;">Messages <a class="pull-right" data-toggle="modal" href="#msgModal">Send a message</a></div></li>
	              		<li class="clearfix divider"></li>
	              		
	              		<li><div class="row"><a href=""><div class="span1"><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /></div> <div class="span2"><strong>Name</strong><p>Message text shortened to...</p></div></a></div></li>
	              		<li class="clearfix divider"></li>
	              		<li><div class="row"><a href=""><div class="span1"><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /></div> <div class="span2"><strong>Name</strong><p>Message text shortened to...</p></div></a></div></li>
	              		<li class="clearfix divider"></li>
	              		<li><div class="row"><a href=""><div class="span1"><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /></div> <div class="span2"><strong>Name</strong><p>Message text shortened to...</p></div></a></div></li>
	              		<li class="clearfix divider"></li>
	              		<li><div class="row"><a href=""><div class="span1"><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /></div> <div class="span2"><strong>Name</strong><p>Message text shortened to...</p></div></a></div></li>
	              		<li class="clearfix divider"></li>
	              		
	              		<li><a href="<?php echo $this->webroot; ?>pages/messages">Show all Messages</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown notifNew">
	              	<a href="#" data-toggle="dropdown"><i class="icon-flag icon-white"></i></a>
	              	<ul class="dropdown-menu" id="notif" style="width: 300px;">
	              		<li><div>Notifications</div></li>
	              		<li class="clearfix divider"></li>
	              		
	              		<li><a href=""><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /> <strong>Name</strong><p>Did that and that and that</p></a></li>
	              		<li class="clearfix divider"></li>
	              		<li><a href=""><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /> <strong>Name</strong><p>Did that and that and that</p></a></li>
	              		<li class="clearfix divider"></li>
	              		<li><a href=""><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /> <strong>Name</strong><p>Did that and that and that</p></a></li>
	              		<li class="clearfix divider"></li>
	              		<li><a href=""><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /> <strong>Name</strong><p>Did that and that and that</p></a></li>
	              		<li class="clearfix divider"></li>
	              		<li><a href=""><img src="https://s3-eu-west-1.amazonaws.com/get-a-gig/useravatar/defaultuser.jpg" width="50px" height="50px" /> <strong>Name</strong><p>Did that and that and that</p></a></li>
	              		<li class="clearfix divider"></li>
	              		
	              		
	              		<li><a href="">Show all Notifications</a></li>
	              	</ul>
	              </li>
	            </ul>
	            <ul id="nav" class="nav pull-right">
	                <form class="navbar-search pull-left" onsubmit="return validateSearchForm(this)" method="GET" action="<?php echo $this->webroot; ?>Search/main">
	                  <input type="text" class="search-query span6" name="query" id="query" value="" placeholder="Search">
	                </form>
	                <li class="divider-vertical"></li>
	                <li class="dropdown">
	                	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="16px" src="<?php echo $rightIconData['profile_picture']; ?>" /> <?php echo $rightIconData['name']; ?> <b class="caret"></b></a>
	                    <ul class="dropdown-menu dropdown-form" id="signin-dropdown" style="width:250px; padding: 15px;">
	                    	<li><a href="<?php echo $this->webroot.$type.'s/view/'.$id ?>"> <i class="icon-user"></i> User profile</a></li>
	                    	<!-- remove this once actually fully implemented --> 
	                        <li><a href="<?php echo $this->webroot; ?>pages/settings"> <i class="icon-cog"></i> Account settings</a></li>
	                    	<li><a href="<?php echo $this->webroot; ?>pages/privacysettings"> <i class="icon-eye-open"></i> Privacy settings</a></li>
	                    	<li><a href="<?php echo $this->webroot; ?>Users/logout"> <i class="icon-lock"></i> Logout</a></li>
	                        <li class="divider"></li>
	                        <li><a href="help"><i class="icon-question-sign"></i> Help</a></li>
	                        
	                    </ul>
	                </li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div>
	      </div>
	    </div>
	    <?php echo $this->element('modalMsg'); ?>
