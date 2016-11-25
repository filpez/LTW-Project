        <div id="register">
			<form action="database/createUser.php" method="post">
				<label>USERNAME<input type="text" name="username"></label>
				<div id="radioButton">
					<p>TYPE OF USER</p>
					<input type="radio" name="type" id="owner" value="owner" checked="checked">
					<label for="owner">OWNER</label>
					<input type="radio" name="type" id="reviewer" value="reviewer">
					<label for="reviewer">REVIEWER</label>
				</div>
				<label>PASSWORD<input type="password" name="password"></label>
				<label>CONFIRM PASSWORD<input type="password" name="c_password"></label>
				<label>EMAIL<input type="email" name="email"></label>
				<label>CONFIRM EMAIL<input type="email" name="c_email"></label>
				<img src="resources/secure.png" alt="Secure Code" width="60" height="40"> 
				<label>ARE YOU AN HUMAN? INSERT THE NUMBER ABOVE TO PROVE IT!<input type="text" name="code"></label>
				<input type="submit" value="Send">
			</form>
		</div>