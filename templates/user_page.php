<div class="user">
	<h4>Edit your information:</h4>

	<form action="database/editUser.php" method="post">

		Username: <br><input type="text" name="username" value="<?=$user['username']?>" required="required"><br>
		Name: <br><input type="text" name="name" value="<?=$user['name']?>" required="required"><br>
		Email: <br><input type="text" name="email" value="<?=$user['email']?>" required="required"><br>
		Old Password: <br><input type="password" name="password" required="required"><br>
		New Password: <br><input type="password" name="password_new"><br><br>
		<input type="submit" value="Confirm">

	</form>
</div>
