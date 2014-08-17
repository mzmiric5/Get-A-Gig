<div class="modal fade" id="scModal" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Link your profile to SoundCloud <img style="margin-left:10px;" src="<?php $this->webroot;?>/img/sc.png" alt="SoundCloud" /></h3>
	</div>
	<div class="modal-body">
		<form class="from-inline" action="" method="post">
			<fieldset>
				<label for="scUser">SoundCloud Username:</label>
				<input type="text" name="scUser" id="scUser" />
				<input class="btn btn-danger" type="submit" name="Submit" value="Save" />
			</fieldset>
		</form>
	</div>
	<div class="modal-footer">
		<p></p>
	</div>
</div>