		<?php if ($this->Session->check('User')) echo $this->element('headerLI');
		      else echo $this->element('header'); ?>
		
		<div class="container">
		<div class="alert">
		  <a class="close" data-dismiss="alert">×</a>
		  <strong>Warning!</strong> This site is under development and is currently not functional!
		  <br />This is why the divs have random colors as well :P
		</div>
		
		<!-- Here's where I want my views to be displayed -->
			<?php echo $this->Session->flash(); ?>
		
					<?php echo $this->fetch('content'); ?>
					
		
		<?php echo $this->element('footer'); ?>
	
	    