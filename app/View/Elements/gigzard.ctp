
<div class="modal fade" id="gigModalVenue" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Looking for...</h3>
	</div>
	<div class="modal-body">
		<form id="gigAd" action="<?php echo $this->webroot; ?>gigs/createGigAd" method = "post" >
			<fieldset>
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
					<select name="looking_hours">
						<option>00</option>
						<option>01</option>
						<option>02</option>
						<option>03</option>
						<option>04</option>
						<option>05</option>
						<option>06</option>
						<option>07</option>
						<option>08</option>
						<option>09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
					</select>
					:
					<select name="looking_minutes">
						<option>00</option>
						<option>15</option>
						<option>30</option>
						<option>45</option>
					</select>
					<input id="looking_date" type="text" name="looking_date" />
				</div>
				<div>
					<label for="looking_moreinfo">Add any other information you would like the artist to know.</label>
					<input id="looking_moreinfo" type="text" name="moreInfo" />
				</div>
			</fieldset>  
			<fieldset id="submitFS">
				<input id="submitter" class="btn-danger pull-left" type="submit" value="Submit">
			</fieldset>
		</form>
	</div>
	<div class="modal-footer">
		<p></p>
	</div>
</div>

<div class="modal fade" id="gigModalArtist" style="display: none; ">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Looking for...</h3>
	</div>
	<div class="modal-body">
		you are not capable lol go back to your basement lol, you mad bro ?
	</div>
	<div class="modal-footer">
		<p></p>
	</div>
</div>