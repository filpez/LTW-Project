<?php
    session_start();
	include_once('database/connection.php');
	include_once('database/user.php');

    $result = login($_POST['username'], $_POST['password']); //attempt login
    //if($result)
    //	$message='Logged in successfully!';
    //else $message='Couldn\'t log in...';

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
    <!--<form id="messageForm" action="<?=$_SERVER['HTTP_REFERER']?>" method="get">
    	<input type="hidden" name="message" value="<?=$message?>"/>
    </form>

    <script type="text/javascript">
    	document.getElementById("messageForm").submit();
    </script>-->
