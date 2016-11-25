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
        <link href="styles/register.css" rel="stylesheet">
    </head>
    <?php
		include('templates/header.php');
		include('templates/register_form.php');
		include('templates/footer.php');
	?>
</html>