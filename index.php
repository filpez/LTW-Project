<?php

	session_start();
	$allowedPages = array('home.php', 'register.php', 'restaurant.php', 'search.php', 'editRestaurant.php', 'addRestaurant.php', 'action_login.php', 'action_logout.php');
	?>
	
	<script type="text/javascript"> window.alert("oi") </script>
	
	<?php
	$len = count($allowedPages);
	$pageIsAllowed=false;
	for($i=0; $i<$len; $i++){
		if($_SERVER['PHP_SELF']==$allowedPages[$i]){
			$pageIsAllowed=true;
			break;
		}
	}
	if($pageIsAllowed){
		include_once($_SERVER['PHP_SELF']);
	}
	else header('Location: home.php');


?>