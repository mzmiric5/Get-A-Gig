
	<div class="modal fade" id="msgModal" style="display: none; ">
	  <div class="modal-header">
	    <a class="close" data-dismiss="modal">×</a>
	    <h3>Send a message</h3>
	  </div>
	  <div class="modal-body">
		<form action="/Uploads/uploadProfilePic" method="post" enctype="multipart/form-data">
			<legend>Send a new message and start a conversation</legend>
			<br />
			<label for="sendTo">To:</label>
			<input type="text" name="sendTo" id="sendTo" value="" />
			<label for="msgContent">Message:</label>
			<textarea id="msgContent" name="msgContent"></textarea>
			<input class="btn btn-danger pull-right" value="Send" type="submit" name="Submit">
		</form>
	</div>
	  <div class="modal-footer">
	    <p></p>
	  </div>
	</div>