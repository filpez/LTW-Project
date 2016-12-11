<?php

	function getAllRestaurants() {
		global $db;
		$stmt = $db->prepare('SELECT * FROM restaurant');
  		$stmt->execute();
  		$result = $stmt->fetchAll();

  		return $result;
	}

	function getRestaurant($id) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM restaurant WHERE id=:id'); //get sum of all user's ratings
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $restaurant=$stmt->fetch();
        return $restaurant;
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
		$stmt = $db->prepare('SELECT * FROM review WHERE restaurant_id=:restaurantID');
		$stmt->bindParam(':restaurantID',$restaurantID,PDO::PARAM_INT);
		$stmt->execute();
		$reviews=$stmt->fetchAll();

		return $reviews;
	}

	function getImagesForRestaurant($restaurantID){
		global $db;
		$stmt = $db->prepare('SELECT * FROM restaurant_image WHERE restaurant_id=:restaurantID');
		$stmt->bindParam(':restaurantID',$restaurantID,PDO::PARAM_INT);
		$stmt->execute();
		$images=$stmt->fetchAll();

		return $images;
	}

	function getUsername($id){
		global $db;
        $stmt = $db->prepare('SELECT * FROM user WHERE id=:id'); //get sum of all user's ratings
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $user=$stmt->fetch();
        return $user['username'];
	}

	//TO BE USED FOR my_page.php
	function getRestaurantsFromUser($username){
		global $db;
		$stmt = $db->prepare('SELECT * FROM user INNER JOIN restaurant ON user.id=restaurant.owner_id WHERE user.username=:username');
		$stmt->bindParam(':username',$username,PDO::PARAM_STR);
		$stmt->execute();
		$restaurants=$stmt->fetchAll();
		return $restaurants;
	}

	function userHasRestaurant($username,$restaurantID){
		global $db;
		$stmt = $db->prepare('SELECT * FROM user INNER JOIN restaurant ON user.id=restaurant.owner_id WHERE user.username=:username AND restaurant.id=:restaurantID');
		$stmt->bindParam(':username',$username,PDO::PARAM_STR);
		$stmt->bindParam(':restaurantID',$restaurantID,PDO::PARAM_INT);
		$stmt->execute();
		$restaurant=$stmt->fetch();
		if($restaurant)
			return true;
		else return false;
	}

?>