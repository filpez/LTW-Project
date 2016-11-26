<?php
	include_once('database/connection.php');

	function getAllRestaurants() {
		global $db;
		$stmt = $db->prepare('SELECT * FROM restaurant');
  		$stmt->execute();
  		$result = $stmt->fetchAll();

  		return $result;
	}

	function getRestaurantScore($restaurantID) {
		global $db;
		$stmt = $db->prepare('SELECT AVG(points) as AvgPoints FROM review WHERE restaurant_id=:restaurantID'); //get sum of all user's ratings
		$stmt->bindParam(':restaurantID',$restaurantID,PDO::PARAM_INT);
		$stmt->execute();
		$avg=$stmt->fetch()['AvgPoints'];

		if($avg==null)
			$avg='-';

		return $avg;
	}

	function getReviewsForRestaurant($restaurantID){
		global $db;
		$stmt = $db->prepare('SELECT * FROM review WHERE restaurant_id=:restaurantID'); //get sum of all user's ratings
		$stmt->bindParam(':restaurantID',$restaurantID,PDO::PARAM_INT);
		$stmt->execute();
		$reviews=$stmt->fetchAll();

		return $reviews;
	}


	$restaurants = getAllRestaurants();
?>

<?php foreach($restaurants as $restaurant) { ?>
	<div id="content">
		<div class="restaurant">
				<h3> <?php echo $restaurant['name'] ?> </h3>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
				<p class="points">Pontos: <?php echo getRestaurantScore($restaurant['id']) ?> em 10</p>
				<p class="place"> <?php echo $restaurant['local'] ?> </p>
				<p class="description"> <?php echo $restaurant['description'] ?> </p>
				<p class="opening"> Aberto a partir das <?php echo $restaurant['opening_hours'] ?> </p>
				<p class="closing"> Fecha às <?php echo $restaurant['closing_hours'] ?> </p>
				<ul>
					<li><a href="">ver mais</a></li>
					<li><a href="">críticas (<?php echo sizeof(getReviewsForRestaurant($restaurant['id'])) ?>)</a></li>
				</ul>
			</div>
<?php } ?>
