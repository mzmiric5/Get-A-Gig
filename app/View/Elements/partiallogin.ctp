<div>
<div id="userInfo">
<div style="float: left;"><img width="50" height="50" src="<?php echo $profilePicture; ?>" />Hello <?php echo $user; ?>, u seem to have mistyped your password, please try again.</div></div>
<div class="clearfix"></div>
<a href="<?php echo $this->webroot; ?>Users/logout">Not <?php echo $user; ?>?</a>
<form action="<?php echo $this->webroot; ?>Users/login" method="POST">
<input type="text" class="hidden" value="<?php echo $_username; ?>" name="username"/>
<label for="userpassword">Password:</label>
<input type="password" name="password" />
<input type="submit" class="btn-danger pull-right" name="submit" value="Log in" />
</form>
</div>