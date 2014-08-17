<div class="row">
	<div class="span6 offset3 well">
		<div>Sorry, no user matching the provided details was found. Please try logging in again.</div>
		<form action="<?php echo $this->webroot; ?>Users/login" method="POST">
			<label for="username">Username:</label>
			<input type="text" name="username" />
			<label for="userpassword">Password:</label>
			<input type="password" name="password" />
			<input type="submit" class="btn-danger pull-right" name="submit" value="Log in" />
		</form>
		</div>
	</div>
</div>