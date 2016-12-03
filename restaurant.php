<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/user.php');
    include_once('database/restaurants.php');
    
    $restaurant=getRestaurant($_GET['id']);

    $reviews=getReviewsForRestaurant($restaurant['id']);
	
	$restaurant_page = TRUE;
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=$restaurant['name']?></title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/content.css" rel="stylesheet">
        <link href="styles/restaurant.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/search_simple.js"></script>
        <script src="scripts/image_gallery.js"></script>
    </head>
	<?php
		include('templates/header.php');
		include('templates/restaurant.php');
		include('templates/footer.php');
	?>
</html>