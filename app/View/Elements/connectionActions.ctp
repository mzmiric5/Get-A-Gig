<div class="connectionOptions">
	<a href="<?php echo $this->webroot.'Posts/make/'.$profileId; ?>">Leave a public msg</a>
	<a href="">Post an image</a>
	<a href="">Review this venue</a>
</div>
<div class="postMsg" style="width: 500px;">
	<form method="post" onsubmit="return validatePostForm(this)" action="<?php echo $this->webroot.'Posts/make/'.$profileId; ?>">
		<div><textarea wrap="hard" cols="80" name ="postText" id="postText" style="width: 500px; max-width: 500px; height: 80px;"></textarea></div>
		<div style="background-color: whiteSmoke;"><input class="btn btn-danger pull-right" type="submit" name="postBtn" id="postBtn" value="Post"/></div>
	</form>
</div>