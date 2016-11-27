<?php
	include_once('database/connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/content.css" rel="stylesheet">
       	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
    </head>
	<?php
		include('templates/header.php');
		include('templates/list_restaurants.php');
		include('templates/footer.php');
	?>
</html>