<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/user.php');
    include_once('database/restaurants.php');
    
    if(isset($_GET['id']) && is_numeric($_GET['id']))
        $restaurant=getRestaurant($_GET['id']);
    else $restaurant=0;

    $reviews=getReviewsForRestaurant($restaurant['id']);
	$images = getImagesForRestaurant($restaurant['id']);
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
		if($restaurant != 0)
            include('templates/restaurant.php');
        else echo "<h4>Restaurant not found...</h4>";
		include('templates/footer.php');
	?>
</html>