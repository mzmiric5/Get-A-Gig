<?php if ($this->Session->check('User')) echo $this->element('headerLI');
      else echo $this->element('header'); ?>
	
	    <div class="container-fluid">
	    <div class="alert">
	      <a class="close" data-dismiss="alert">×</a>
	      <strong>Warning!</strong> This site is under development and is currently not functional!
	      <br />This is why the divs have random colors as well :P
	    </div>
		<div class="row-fluid">
		    <div class="span2">
		    <div id="toc" class="well">
		      <!--Sidebar content-->
		      <h5>Table of Contents</h5>
		      <ul>
		        <li><a href="#basics" onclick="ScrollTo('basics');">Basics</a>
		         <ul>
		          <li><a href="#basics-subsection" onclick="ScrollTo('basics-subsection');">Subsection</a></li>
		         </ul>
		        </li>
		        <li><a href="#lorem" onclick="ScrollTo('lorem');">Lorem</a></li>
		        <li><a href="#pallen" onclick="ScrollTo('pallen');">Pallen</a></li>
		        <li><a href="#curabitur" onclick="ScrollTo('curabitur');">Curabitur</a></li>
		        <li><a href="#nam" onclick="ScrollTo('nam');">Nam</a></li>
		        <li><a href="#maece" onclick="ScrollTo('maece');">Maecenas</a></li>
		        <li><a href="#etiam" onclick="ScrollTo('etiam');">Etiam</a></li>
		        <li><a href="#ut" onclick="ScrollTo('ut');">Ut vitae</a></li>
		        <li><a href="#nulla" onclick="ScrollTo('nulla');">Nulla</a></li>
		      </ul>
		      </div>
		    </div>
		    <div class="span10">
		
		<!-- Here's where I want my views to be displayed -->
			<?php echo $this->Session->flash(); ?>
		
					<?php echo $this->fetch('content'); ?>
		</div></div> <!-- close the fluid split -->
		<?php echo $this->element('footer'); ?>
		