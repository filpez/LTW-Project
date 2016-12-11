<?php
	session_start();
    include_once('database/connection.php');
    include_once('database/user.php');
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
        <script src="scripts/search_simple.js"></script>
    </head>
	<?php
		include('templates/header.php');
        if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){
            $user=getUser($_SESSION['username']);
            include('templates/my_page.php');
        }
        else echo "<p>Page meant only for users logged in...</p>";
		include('templates/footer.php');
	?>
</html>