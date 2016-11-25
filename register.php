<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/register.css" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <h1>My Restaurant Review Site</h1>
            <h2>which I will call "Snorlax's Diary" for now...</h2>
		</div>
		<div id="login">
            <form>
            	<h3>Login</h3>
                <label>Username: <input type="text"></label>
                <label>Password: <input type="password"></label>
            </form>
		</div>		<div>
			<form id="register">
				<label>Username: <input type="text" name="username"></label>
				<p>Type of User:</p>
				<label><input type="radio" name="type" value="owner" checked="checked">Owner</label>
				<label><input type="radio" name="type" value="reviewer">Reviewer</label>
				<label>Password: <input type="password" name="password"></label>
				<label>Confirm password: <input type="password" name="c_password"></label>
				<label>Email: <input type="email" name="email"></label>
				<label>Confirm email: <input type="email" name="c_email"></label>
				<img src="resources/secure.png" alt="Secure Code" width="30" height="20"> 
				<label>Insert the text above: <input type="text" name="code"></label>
			</form>
		</div>
		<div id="footer">
			<p>Snorlax esteve por aqui @ FEUP - 2016</p>
		</div>
    </body>
</html>