
    <body>
        <div id="header">
       		<a href="home.php">
            	<h1>Snorlax's Diary</h1>
            	<h2>If Snorlax likes it, you will also!</h2>
            </a>
		</div>
		<div id="login">
            <?php if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){ ?>
                <li><a href="my_page.php"><?php echo 'Welcome '.$_SESSION['username'].', check your page!'?></a></li>
                <li><a href="action_logout.php">Logout</a></li>
            <?php } else { ?>
                <form method="post" action="<?=htmlspecialchars('action_login.php');?>">
            	   <h3>Login</h3>
                    <label>Username: <input type="text" name="username"></label>
                    <label>Password: <input type="password" name="password"></label>
                    <input type="submit" value="Login"></label>
                </form>
            <?php } ?>
            <?php if(isset($_POST['message'])) echo '<h4 id="message">'.$_POST['message'].'</h4>'?>
		</div>
        <div id="menu">
            <ul>
                <?php if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){ ?>
                    <li><a href="addRestaurant.php">Add a restaurant</a></li>
                    <?php if(isOwner($_SESSION['username'])) { ?>
                        <li><a href="404.php">Manage Restaurants</a></li>
                        <?php if(isset($restaurant_page) && $restaurant_page) { ?>
				            <li><a href=<?="editRestaurant.php?id=".$restaurant['id']?> >Edit Restaurant</a></li>;
                <?php }}} else { ?> <!-- if not user -->
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