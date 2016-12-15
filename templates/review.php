<div class="comment">
    <?php 
	   $berry_type = rand(1,4);
	   for ($i = 1; $i <= $review['points']; $i++) {
	       echo '<img class="berry" src="resources/berry'.$berry_type.'.png" alt="berry">';
	   } 
	?>
	<h3><span class="name"> by <?=getUsername($review['reviewer_id'])?></span></h3>
	
	<p> <?=$review['comment']?> </p>

	<?php
	   $comments = getComments($review['id']);
	   foreach ($comments as $comment){ 
	?>
	       <div class="comment">
	           <p> <?=$comment['comment']?> </p>
	           <h3><span class="name"> by <?=getUsername($comment['reviewer_id'])?></span></h3>
	       </div>
	<?php   
	   }
	?>

    <form class="addComment">
       <input type="hidden" name="review_id" value=<?=$review['id']?>>
	   <label>New comment:<textarea name="comment" rows="2" cols="50"></textarea></label>
	   <input type="submit" value="Send">
	</form>
</div>

