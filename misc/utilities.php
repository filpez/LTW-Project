<?php
	/*will immediately redirect to $destination, displaying $message on the header of the page*/
	function showHeaderMessage($message, $destination){
		if(!isset($destination))
			$destination = $_SERVER['HTTP_REFERER'];
		?>
		<form id="messageForm" action="<?=$destination?>" method="post">
    		<input type="hidden" name="message" value="<?=$message?>"/>
    	</form>

    	<script type="text/javascript">
    		document.getElementById("messageForm").submit();
    	</script>
	<?php } ?>