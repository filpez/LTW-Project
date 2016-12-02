<?php
    session_start();
	include_once('database/connection.php');
    include_once('database/user.php');
	
	$restaurant_page = FALSE;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/register.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/search_simple.js"></script>
    </head>
    <?php
		include('templates/header.php');
		include('templates/register_form.php');
		include('templates/footer.php');
	?>
</html>