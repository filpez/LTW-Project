<?php
    session_start();
	include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/user.php');
	
	$restaurant=getRestaurant($_GET['id']);
	
	$restaurant_page = FALSE;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Restaurant</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/manage_restaurant.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/edit_restaurant.js"></script>
    </head>
    <?php
		include('templates/header.php');

        if(!isset($_SESSION['username']) || !usernameExists($_SESSION['username']))
            echo "<p>Page meant only for users who are logged in...</p>";
        else if(!$restaurant)
            echo "<p>Restaurant does not exist...</p>";
        else if(userHasRestaurant($_SESSION['username'],$restaurant))
                include('templates/edit_restaurant.php');
        else echo "<p>Page meant only for the owner of this restaurant...</p>";
		
        include('templates/footer.php');
	?>
</html>