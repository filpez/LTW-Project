<?php
    session_start();
	include_once('database/connection.php');
	include_once('database/user.php');
    include_once('misc/utilities.php');

    $result = login($_POST['username'], $_POST['password']); //attempt login
    if($result) {
    	$message='Logged in successfully!';
    } else $message='Couldn\'t log in...';

    showHeaderMessage($message, $result ? 'home.php' : $_SERVER['HTTP_REFERER']);

?>
