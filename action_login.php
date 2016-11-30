<?php
    session_start();
	include_once('database/connection.php');
	include_once('database/user.php');

    login($_POST['username'], $_POST['password']); //attempt login

  	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>