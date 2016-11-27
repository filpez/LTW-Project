<div class="restaurant">
	<h3> <?=$restaurant['name']?> </h3>
	<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
	<p class="points">Pontos: <?=getRestaurantScore($restaurant['id'])?> em 10</p>
	<p class="place"> <?=$restaurant['local']?> </p>
	<p class="description"> <?=$restaurant['description']?> </p>
	<p class="opening"> Aberto a partir das <?=$restaurant['opening_hours']?> </p>
	<p class="closing"> Fecha às <?=$restaurant['closing_hours']?> </p>
	
	<div class="comments">
	<?php foreach ($reviews as $review) { ?>
		<p> <?=getUsername($review['reviewer_id']).' - '.$review['points'].' of 10'?> </p>
		<p> <?=$review['comment']?> </p>
	<?php } ?>
	</div>
</div>

