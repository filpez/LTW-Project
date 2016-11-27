    <body>
        <div id="header">
       		<a href="home.php">
            	<h1>My Restaurant Review Site</h1>
            	<h2>which I will call "Snorlax's Diary" for now...</h2>
            </a>
		</div>
		<div id="login">
            <form>
            	<h3>Login</h3>
                <label>Username: <input type="text"></label>
                <label>Password: <input type="password"></label>
            </form>
		</div>
        <div id="menu">
            <ul>
                <li><a href="">Menu Option 1 (Ideas?)</a></li>
                <li><a href="">Menu Option 2 (Ideas?)</a></li>
                <li>
                	<form method="get" action="database/search_restaurant.php">
                		<input type="text" id="search_field" name="search_field" value="Search for restaurant...">
                		<input type="submit" value="Search">
           			</form>
           		</li>
           		<li><a href="search.php">Advanced Search</a></li>
            </ul>
        </div>