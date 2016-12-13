<?php
$db = new PDO('sqlite:database.db');
$name = $_POST['name'];
$local = $_POST['local'];
$description = $_POST['description'];
$opening = $_POST['opening'];
$closing = $_POST['closing'];
$restaurant = $_POST['res_id'];

function editRestaurant() {
    global $db;
    global $name;
    global $local;
    global $description;
    global $opening;
    global $closing;
    global $restaurant;

    if (strlen($name) > 0) {
        $stmt = $db->prepare("UPDATE restaurant SET name = :name WHERE id = :restaurant");
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
        $stmt->execute();
    }
    
    if (strlen($local) > 0) {
        $stmt = $db->prepare("UPDATE restaurant SET local = :local WHERE id = :restaurant");
        $stmt->bindParam(':local',$local,PDO::PARAM_STR);
        $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
        $stmt->execute();
    }
    
    if (strlen($description) > 0) {
        $stmt = $db->prepare("UPDATE Restaurant SET description = :description WHERE id = :restaurant");
        $stmt->bindParam(':description',$description,PDO::PARAM_STR);
        $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
        $stmt->execute();
    }
    
    if (!(is_null($opening))) {
        $stmt = $db->prepare("UPDATE restaurant SET opening_hours = :opening WHERE id = :restaurant");
        $stmt->bindParam(':opening',$opening,PDO::PARAM_STR);
        $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
        $stmt->execute();
    }
    
    if (!(is_null($closing))) {
        $stmt = $db->prepare("UPDATE restaurant SET closing_hours = :closing WHERE id = :restaurant");
        $stmt->bindParam(':closing',$closing,PDO::PARAM_STR);
        $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
        $stmt->execute();
    }

    return "Saved!";
    
}

function checkParameters() {
    global $db;
    global $name;
    global $local;
    global $opening;
    global $closing;
    global $restaurant;
    
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name=:name AND NOT id =:restaurant");
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':restaurant',$restaurant,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) != 0)
        return "Restaurant already exists...";
 
    if (strlen($name) < 1)
    return "Name is too small..." ;

}

if (checkParameters())
    echo checkParameters();
else
    echo editRestaurant();
?>