<?php
	include_once('database/connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/search_menu.css" rel="stylesheet">
        <link href="styles/content.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/search_simple.js"></script>
        <script src="scripts/search_menu_show_minumum_value.js"></script>
    </head>
	<?php
	   include('templates/header.php');
	   include('templates/search_form.php');
	   include('templates/footer.php');
	?>
</html>