<div class="manage_restaurant">
	<form action="database/createRestaurant.php" method="post"  enctype="multipart/form-data" >
		<label>NAME<input type="text" name="name"></label>
		<label>LOCAL<input type="text" name="local"></label>
		<label>IMAGE<input type="file" id="photo" name="photo"></label>
		<label>DESCRIPTION<textarea name="description" rows="7" cols="50"></textarea >
		<label>OPENING HOURS<input type="time" name="opening"></label>
		<label>CLOSING HOURS<input type="time" name="closing"></label><img src="resources/secure.png" alt="Secure Code" width="60" height="40"> 
		<label>ARE YOU AN HUMAN? INSERT THE NUMBER ABOVE TO PROVE IT!<input type="text" name="code"></label>
		<input type="submit" value="Send">
	</form>
</div>