<?php
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    
    $restaurant=getRestaurant($_GET['id']);

    $reviews=getReviewsForRestaurant($restaurant['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/content.css" rel="stylesheet">
    </head>
	<?php
		include('templates/header.php');
		include('templates/restaurant.php');
		include('templates/footer.php');
	?>
</html>