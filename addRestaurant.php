<?php
    session_start();
	include_once('database/connection.php');
    include_once('database/user.php');
	
	$restaurant_page = FALSE;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Restaurant</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/manage_restaurant.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/search_simple.js"></script>
        <script src="scripts/add_restaurant.js"></script>
    </head>
    <?php
		include('templates/header.php');
        if(!isset($_SESSION['username']) || !usernameExists($_SESSION['username']))
            echo "<p>Page meant only for users who are logged in...</p>";
		else include('templates/add_restaurant.php');
		include('templates/footer.php');
	?>
</html>