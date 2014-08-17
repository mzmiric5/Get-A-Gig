<?php $version = "0.5a35" ?>
<!-- Add a footer to each displayed page -->
	<footer>
		<div>
			<p style="float: left;"><small>&copy; Copyright 2011-2012 Get-A-Gig. All Rights Reserved.</small></p>
			<p style="float: right;"><small><a href="<?php echo $this->webroot; ?>pages/privacy">Privacy</a> | <a href="<?php echo $this->webroot; ?>pages/tos">Terms of Services</a> | <a href="<?php echo $this->webroot; ?>pages/ty">Thanks and Credits</a> | <a href="<?php echo $this->webroot; ?>pages/support">Support</a></small></p>
			<div class="clearfix"></div>
			<div class="span4 offset5">
			<p><small>Get-A-Gig is running on <a href="<?php echo $this->webroot; ?>pages/gigwork">GigWork v<?php echo $version; ?></a></small></p>
			</div>
			<div class="clearfix"></div>
			<div class="pull-right"><a href="http://www.w3.org/html/logo/">
			<img width="137px" src="http://www.w3.org/html/logo/badge/html5-badge-h-connectivity-css3-device-multimedia-performance-semantics.png" width="293" height="64" alt="HTML5 Powered with Connectivity / Realtime, CSS3 / Styling, Device Access, Multimedia, Performance &amp; Integration, and Semantics" title="HTML5 Powered with Connectivity / Realtime, CSS3 / Styling, Device Access, Multimedia, Performance &amp; Integration, and Semantics">
			</a></div>
		</div>
		
	</footer>
</div> <!-- /container -->


<?php $pageOn = strtolower($title_for_layout); ?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo $this->webroot; ?>js/libs/jquery-1.7.1.min.js"><\/script>')</script>
		<script type="text/javascript" src="http://konami-js.googlecode.com/svn/trunk/konami.js"></script>
		<script src="http://js.pusher.com/1.11/pusher.min.js"></script>
		
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/transition.js"></script>
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/collapse.js"></script>
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/dropdown.js"></script>
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/alert.js"></script>
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/tab.js"></script>
		<script src="<?php echo $this->webroot; ?>js/libs/bootstrap/modal.js"></script>
		
		<script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
		<script src="<?php echo $this->webroot; ?>js/script.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot; ?>js/validation.js"></script>
		<script src="<?php echo $this->webroot; ?>js/datepicker.js"></script>
		<!-- this is where we put our custom functions -->
		
		<?php echo $this->Html->script('libs/gritter/jquery.gritter.min');
		      echo $this->Html->script('PusherNotifier'); ?>
		<script src="<?php echo $this->webroot; ?>js/functions.js"></script>
		<?php echo $this->Html->script('texty');?>
		<script>$('.dropdown-menu').find('form').click(function (e) {
		   e.stopPropagation();
		 });
		 $('#nav > li').removeClass('active');
		$('#nav li.<?php echo $pageOn ?>').addClass('active');</script>
		<?php global $needsAWizard; if($needsAWizard)	echo $this->Html->script('wizardry'); ?>
		<?php $artistSC = 'locknloadarta'; echo '<script>var artistSC = "'.$artistSC.'"</script>'; ?>
		<?php if ($this->Session->check('User') && preg_match("/artist*/", $pageOn)){ echo '<script type="text/javascript" src="http://stratus.sc/stratus.js"></script>';
		   echo $this->Html->script('soundcloudfooter'); } ?>
		 <?php if ($this->Session->check('User') && $pageOn == 'home'){ echo $this->Html->script('fullcalendar');
		    echo $this->Html->script('calendarhome'); } ?>
		   
		<!-- insert analytics tracking here 
		should replace the UA-XXXXXX-XX with our ID and uncomment to make it work
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		-->
		
	</body>
</html>
