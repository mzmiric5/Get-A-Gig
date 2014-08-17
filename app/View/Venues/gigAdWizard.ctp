<form id="gigAd" action="<?php echo $this->webroot; ?>gigs/createGigAd" method = "post" >
        <legend>Tell us what you are looking for</legend>
    <div>
	        <label for="looking_type">What kind of artist would you like?</label>
	        <select name="looking_type" class="aType">
	            <option>Choose an option</option>
	        	<option>Solo</option>
	        	<option>DJ</option>
	        	<option>Band</option>
	        	<option>Any</option>
	        </select>
        </div>
    <div>
	        <label for="looking_genre">Which genre would you prefer them to play?</label>
	        <input id="looking_genre" type="text" name="looking_genre" />
    </div>
    <div>
	        <label for="looking_date">What date and time would you like them to play? (hh:mm MM/DD/YY)
	        </label>
	        <input id="looking_date" type="text" name="looking_date" />
    </div>
    <div>
	        <label for="looking_moreinfo">Add any other information you would like the artist to know.</label>
	        <input id="looking_moreinfo" type="text" name="moreInfo" />
    </div>  
    <fieldset id="submitFS">
        <input id="submitter" class="btn-danger pull-left" type="submit" value="Submit">
    </fieldset>
</form>
