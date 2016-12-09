<?php
    include_once('misc/utilities.php');
    session_start();
	session_unset();
	session_destroy();
  	showHeaderMessage("Logged out successfully!");
?>