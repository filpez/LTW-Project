<?php
	$restaurants = getAllRestaurants();

	foreach($restaurants as $restaurant) { ?>
		<div id="content">
			<div class="restaurant">
				<h3> <?=$restaurant['name']?> </h3>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
				<p class="points">Pontos: <?=getRestaurantScore($restaurant['id'])?> em 10</p>
				<p class="place"> <?=$restaurant['local']?> </p>
				<p class="description"> <?=$restaurant['description']?> </p>
				<p class="opening"> Aberto a partir das <?=$restaurant['opening_hours']?> </p>
				<p class="closing"> Fecha às <?=$restaurant['closing_hours']?> </p>
				<ul>
					<li><a href=<?="restaurant.php?id=".$restaurant['id']?> >ver críticas (<?=sizeof(getReviewsForRestaurant($restaurant['id']))?>)</a></li>
				</ul>
			</div>
		</div>
<?php } ?>
