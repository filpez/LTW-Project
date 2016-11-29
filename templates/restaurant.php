<div class="restaurant">
	<h3> <?=$restaurant['name']?> </h3>
	<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
	<p class="points">Pontos: <?=getRestaurantScore($restaurant['id'])?> em 10</p>
	<p class="place"> <?=$restaurant['local']?> </p>
	<p class="description"> <?=$restaurant['description']?> </p>
	<p class="opening"> Aberto a partir das <?=$restaurant['opening_hours']?> </p>
	<p class="closing"> Fecha às <?=$restaurant['closing_hours']?> </p>
	<?php if (count($reviews)) { ?>
	<div class="comments">
		<h3 id="comments_title">Comments:</h3>
		<?php foreach ($reviews as $review) { ?>
			<div class="comment">
			<?php 
				$berry_type = rand(1,4);
				for ($i = 1; $i <= $review['points']; $i++) {
					echo '<img class="berry" src="../resources/berry'.$berry_type.'.png" alt="berry">';
    				//echo '<img src="../resources/berry'.$berry_type.'.png alt="berry">';
				} ?>
				<h3><span class="name"> por <?=getUsername($review['reviewer_id'])?></span></h3>
				<p> <?=$review['comment']?> </p>
			</div>
		<?php } ?>
	</div>
	<?php } ?>
</div>	

