<?php
	session_start();
    include_once('database/connection.php');
    include_once('database/user.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <meta charset="utf-8"/>
        <link href="styles/clear.css" rel="stylesheet">
        <link href="styles/mainstyle.css" rel="stylesheet">
        <link href="styles/content.css" rel="stylesheet">
        <link href="styles/userpage.css" rel="stylesheet">
       	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="scripts/search_text_fade.js"></script>
        <script src="scripts/search_simple.js"></script>
    </head>
	<?php
		include('templates/header.php');
        if(isset($_SESSION['username']) && usernameExists($_SESSION['username'])){
            $user=getUser($_SESSION['username']);
            $restaurants = getRestaurantsFromUser($_SESSION['username']);
            include('templates/user_page.php');
            include('templates/list_restaurants.php');
        }
        else echo "<p>Page meant only for users logged in...</p>";
		include('templates/footer.php');
	?>
</html>