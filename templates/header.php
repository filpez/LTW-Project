<?php
    
    $owner_options = array('Add a restaurant' => 'addRestaurant.php', 'Manage Restaurants' => '404.php');
?>
    <body>
        <div id="header">
       		<a href="home.php">
            <?php
                if(isset($POST['message']))
                    echo $POST['message'];
            ?>
            	<h1>My Restaurant Review Site</h1>
            	<h2>which I will call "Snorlax's Diary" for now...</h2>
            </a>
		</div>
		<div id="login">
            <?php if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){ ?>
                <li><a href="my_page.php"><?php echo 'Welcome '.$_SESSION['username']?></a></li>
                <li><a href="action_logout.php">Logout</a></li>
            <?php } else { ?>
                <form method="post" action="<?=htmlspecialchars('action_login.php');?>">
            	   <h3>Login</h3>
                    <label>Username: <input type="text" name="username"></label>
                    <label>Password: <input type="password" name="password"></label>
                    <input type="submit" value="Login"></label>
                </form>
            <?php } ?>
		</div>
        <div id="menu">
            <ul>
                <?php if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){
                    if(isOwner($_SESSION['username'])){ foreach ($owner_options as $title => $link) { ?>
                        <li><a href=<?=$link?>><?=$title?></a></li>
                    <?php }}} else { ?>
                        <li><a href="register.php">Register</a></li>
                    <?php } ?>
                
                
                <li>
                	<form method="get" action="search.php">
                		<input type="text" id="search_field" name="searchfor" value="Search for restaurant...">
                		<input type="submit" id="search_button" value="Search">
           			</form>
           		</li>
           		
                <li><a href="search.php">Advanced Search</a></li>
            </ul>
        </div>