<?php
    session_start();
	include_once('database/connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/add_restaurant.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
    </head>
    <?php
		include('templates/header.php');
		include('templates/add_restaurant.php');
		include('templates/footer.php');
	?>
</html>