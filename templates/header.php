<?php

    $owner_options = array('Add a restaurant' => 'addRestaurant.php', 'Manage Restaurants' => '404.php');
?>
    <body>
        <div id="header">
       		<a href="home.php">
            	<h1>My Restaurant Review Site</h1>
            	<h2>which I will call "Snorlax's Diary" for now...</h2>
            </a>
		</div>
		<div id="login">
            <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            	<h3>Login</h3>
                <label>Username: <input type="text"></label>
                <label>Password: <input type="password"></label>
                <input type="submit" value="Login"></label>

            </form>
		</div>
        <div id="menu">
            <ul>
                <li><a href="register.php">Register</a></li>
                <?php if(isset($userType)){ ?>
                    <li><a href="404.php">Edit my profile</a></li>
                <?php } ?>
                
                <?php if(isset($userType) && $userType=='owner'){ foreach ($owner_options as $title => $link) { ?>
                    <li><a href=<?=$link?>><?=$title?></a></li>
                <?php }} ?>
                
                <li>
                	<form method="get" action="search.php">
                		<input type="text" id="search_field" name="searchfor" value="Search for restaurant...">
                		<input type="submit" id="search_button" value="Search">
           			</form>
           		</li>
           		
                <li><a href="search.php">Advanced Search</a></li>
            </ul>
        </div>