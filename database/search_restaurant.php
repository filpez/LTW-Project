<?php
    if(isset($_GET['search_field'])){
        include_once('database/connection.php');
        $search_field = $_GET['search_field'];

        $query = "SELECT * FROM restaurant WHERE name LIKE '%$search_field%'";
        if(isset($_GET['minimum_rating']))
           $query = $query . " AND (SELECT AVG(points) FROM review WHERE restaurant_id = restaurant.id) > " . $_GET['minimum_rating'];
        if(isset($_GET['local']))
           $query = $query . " AND local LIKE '%" . $_GET['local'] . "%'";
        if(isset($_GET['owner']))
           $query =  $query . " AND owner_id IN (SELECT id FROM user WHERE name Like '%" . $_GET['owner'] . "%')";
        $query = $query . " ORDER BY name LIMIT 10";
        echo $query;
       
        $stmt = $db->prepare("$query");
        $stmt->execute();  
        $result = $stmt->fetchAll();

        foreach($result as $restaurant) { ?>
		     <div class="restaurant">
				<h3> <?php echo $restaurant['name'] ?> </h3>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
			 </div>
<?php } 
    }

?>

