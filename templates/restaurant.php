<div class="restaurant">
	<h3 class="restaurant_name"> <?=$restaurant['name']?> </h3>
	<div class="info">
		<p class="points">Points: <?= getRestaurantScore($restaurant['id'])=="-" ? "No users reviewed this restaurant yet" : getRestaurantScore($restaurant['id'])." em 10"?></p>
		<p class="place"> <?=$restaurant['local']?> </p>
		<p class="description"> <?=$restaurant['description']?> </p>
		<?php if($restaurant['opening_hours'] != "") { ?>
			<p class="opening"> Opening: <?=$restaurant['opening_hours']?> </p>
		<?php } if($restaurant['closing_hours'] != "") { ?>
			<p class="closing"> Closing: <?=$restaurant['closing_hours']?> </p>
		<?php } ?>
	</div>
	<?php if (count($images)) { ?>
	<div id="image_gallery">
		<?php 
			foreach ($images as $image){
				$image_path = $image["img_path"];
				echo '<img class="photo" src="database/uploads/'.$image_path.'" alt="300x200">';
			}
		?>
	</div>

	<div id="modal">
		<span class="close">×</span>
		<span class="left_arrow">&#060</span>
		<span class="right_arrow">&#062</span>
  		<img src="" class="modal_image">
	</div>
	<?php } ?>
	<?php if (count($reviews)) { ?>
	<div class="comments">
		<h3 id="comments_title">Comments:</h3>
		<?php foreach ($reviews as $review) { ?>
			<div class="comment">
			<?php 
				$berry_type = rand(1,4);
				for ($i = 1; $i <= $review['points']; $i++) {
					echo '<img class="berry" src="resources/berry'.$berry_type.'.png" alt="berry">';
				} ?>
				<h3><span class="name"> by <?=getUsername($review['reviewer_id'])?></span></h3>
				<p> <?=$review['comment']?> </p>
			</div>
		<?php } ?>
	</div>
	<?php } ?>
</div>
