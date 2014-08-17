<?php $accType = $this->Session->read('User.type'); echo 'You are : '.$this->Session->read('User.type')?>

<div class="row">
	<div class="span10">
		<div class="row">
		  <p>Your search for "The Deaf Institute"<!--this will be pulled form a var--> returned 2<!--this will be pulled form a var--> results:</p>
		</div>
		<div class="row">
		  <a class="span10 largeButton" href="<?php echo $this->webroot; ?>pages/profile?type=venue"><h3 style="padding:15px;">The Deaf Institute</h3><p>Some info about the result here</p></a>
		</div>
		<div class="row">
		  <a class="span10 largeButton" href="<?php echo $this->webroot; ?>pages/profile?type=artist"><h3 style="padding:15px;">The Deaf Artist</h3><p>Some info about the result here(also this shouldn't happens, the artists and venues shouldn't show up in the same search result or? anywho just testing which profile view we show)</p></a>
		</div>
	</div>
	<?php echo $this->element('ad'); ?>
</div>
<br />