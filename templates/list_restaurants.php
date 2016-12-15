<div id="content">
<?php foreach($restaurants as $restaurant) { ?>
	<div class="restaurant">
		<h3 class="restaurant_name"> <?=$restaurant['name']?> </h3>
		<?php 
				$images = getImagesForRestaurant($restaurant['id']);
				if (count($images) > 0){
					$image_n = rand(0,count($images)-1);
					$image_path = $images[$image_n]["img_path"];
					echo '<img class="photo" src="database/uploads/'.$image_path.'" alt="300x200">';
				}
				else
					echo '<img class="photo" src="resources/snorlax.jpg" alt="300x200">';

		?>
		<p class="points">Points: <?= getRestaurantScore($restaurant['id'])=="-" ? "No users reviewed this restaurant yet" : getRestaurantScore($restaurant['id'])." em 10"?></p>
		<p class="place"> <?=$restaurant['local']?> </p>
		<p class="description"> <?=$restaurant['description']?> </p>
		<?php if($restaurant['opening_hours'] != "") { ?>
			<p class="opening"> Aberto a partir das <?=$restaurant['opening_hours']?> </p>
		<?php } if($restaurant['closing_hours'] != "") { ?>
		<p class="closing"> Fecha às <?=$restaurant['closing_hours']?> </p>
		<?php } ?>
		<ul>
			<li><a href=<?="restaurant.php?id=".$restaurant['id']?> >see reviews (<?=sizeof(getReviewsForRestaurant($restaurant['id']))?>)</a></li>
		</ul>
	</div>
<?php } ?>

</div>
