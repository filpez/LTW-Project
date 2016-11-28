<?php
	include_once('restaurants.php');
    if(isset($_GET['search_field'])){
        include_once('connection.php');
        $search_field = $_GET['search_field'];

        $query = "SELECT * FROM restaurant WHERE name LIKE '%$search_field%'";
        if(isset($_GET['minimum_rating']))
           $query = $query . " AND (SELECT AVG(points) FROM review WHERE restaurant_id = restaurant.id) > " . $_GET['minimum_rating'];
        if(isset($_GET['local']))
           $query = $query . " AND local LIKE '%" . $_GET['local'] . "%'";
        if(isset($_GET['owner']))
           $query =  $query . " AND owner_id IN (SELECT id FROM user WHERE name Like '%" . $_GET['owner'] . "%')";
        $query = $query . " ORDER BY name LIMIT 10";
        //echo $query;
       
        $stmt = $db->prepare("$query");
        $stmt->execute();  
        $result = $stmt->fetchAll();

		if(count($result) == 0)
			echo '<h2>No results found</h2>';
		/*else if (count($result) == 1)
			header( 'Location: /restaurant.php?id='.$result[0]['id'] );*/

		else
        	foreach($result as $restaurant) { ?>
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
	<?php }
    }
?>

