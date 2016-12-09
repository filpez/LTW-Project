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
        <title>Home</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/manage_restaurant.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
    </head>
    <?php
		include('templates/header.php');
		include('templates/edit_restaurant.php');
		include('templates/footer.php');
	?>
</html>