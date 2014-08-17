<script>var type = 'venue';</script>
<div class="row">
<div class="span10 offset1 well" id="container">
  <form id="theform" action="<?php echo $this->webroot; ?>Registration/addAccount" method = "post" onsubmit="return validateForm(this, 'venue')">
    <fieldset class="step" id="1" data-stepname="Venue Details">
        <legend>Step 1 - Venue Details</legend>
        <br />
        <div>
            <label for="venuename">Venue Name</label>
            <input id="venuename" name="venuename" type="text"/>
        </div>
        <div>
	        <label for="venuetype">Venue Type</label>
	        <select name="venuetype">
	        	<option>Pub</option>
	        	<option>Club</option>
	        	<option>Other</option>
	        </select>
        </div>
        <div>
	        <label for="venuelocation">Postcode:</label>
	        <input id="venuelocation" type="text" name="venuelocation" />
        </div>
        <div>
	        <label for="venuecapacity">Capacity:</label>
	        <input id="venuecapacity" type="text" name="venuecapacity" />
        </div>
        <div>
	        <label for="venuetimes">Opening times:</label>
	        <input id="venuetimes" type="text" name="venuetimes" />
        </div>
    </fieldset>
    <fieldset class="step" id="2" data-stepname="Contact Details">
        <legend>Step 2 - Contact Details</legend>
		<div>
			<label for="contactname">Name:</label>
			<input id="contactname" type="text" name="contactname" />
		</div>
		<div>
			<label for="contactsurname">Surname:</label>
			<input id="contactsurname" type="text" name="contactsurname" />
		</div>
		<div>
			<label for="contactaddress">Address:</label>
			<input id="contactaddress" type="text" name="contactaddress" />
		</div>
		<div>
			<label for="contactcity">City:</label>
			<input id="contactcity" type="text" name="contactcity" />
		</div>
		<div>
			<label for="contactpostcode">Postcode:</label>
			<input id="contactpostcode" type="text" name="contactpostcode" />
		</div>
		<div>
			<label for="contactphone">Phone:</label>
			<input id="contactphone" type="text" name="contactphone" />
		</div>
		<div>
			<label for="contactemail">Contact email:</label>
			<input id="contactemail" type="text" name="contactemail" />
		</div>
		</fieldset>
		<fieldset class="step" id="3" data-stepname="User Information">
		<legend>Step 3 - User Information</legend>
		<div>
			<label for="username">Username:</label>
			<input id="username" type="text" name="username" />
		</div>
		<div>
			<label for="email">Email:</label>
			<input id='email' type="email" name="email" />
		</div>
		<div>
			<label for="password">Password:</label>
			<input id='password' type="password" name="password" />
		</div>
		<div>
			<label for="passwordconfirm">Confirm Password:</label>
			<input id='passwordconfirm' type="password" name="passwordconfirm" />
		</div>
		 <input class="hidden" value="venue" name="formtype" type="text"/>
    </fieldset>
    <fieldset id="submitFS">
        <input id="submitter" class="btn-danger pull-right" type="submit" value="Register">
    </fieldset>
  </form>
</div>​
</div>
