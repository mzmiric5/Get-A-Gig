
	<div class="modal fade" id="profilePicModal" style="display: none; ">
	  <div class="modal-header">
	    <a class="close" data-dismiss="modal">×</a>
	    <h3>Profile picture</h3>
	  </div>
	  <div class="modal-body">
		<form action="/Uploads/uploadProfilePic" method="post" enctype="multipart/form-data">
			<legend>Upload your profile picture</legend>
			<br />
			<input type="file" name="file" />
			<input class="btn btn-danger pull-right" value="Upload" type="submit" name="Submit">
		</form>
	</div>
	  <div class="modal-footer">
	    <p><span class="label label-info">Notice:</span> Your picture will be uploaded to Amazon S3 bucket owned by Get-A-Gig.</p>
	  </div>
	</div>
	<?php
	
	// list all files from S3
//	listFiles($s3, BUCKET_NAME);
	
	?>
