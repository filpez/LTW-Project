<?php
include_once('connection.php');
$name = $_POST['name'];
$local = $_POST['local'];
$description  = $_POST['description'];
$opening = $_POST['opening'];
$closing = $_POST['closing'];
$code = $_POST['code'];
$id;

function addNewRestaurant(){
    global $db;
    global $name;
    global $local;
    global $description;
    global $opening;
    global $closing;
    global $id;
    
    $stmt = $db->prepare("INSERT INTO restaurant(name, local, description, opening_hours, closing_hours) VALUES('$name','$local', '$description','$opening', '$closing')");
    $stmt->execute();
	

	$id = $db->lastInsertId();
	include('addImage.php');
	//$path = addImage($id);
	/*$noImagePath = "../../resources/snorlax.jpg";
    if ($path < 0)
    	$stmt = $db->prepare("INSERT INTO restaurant_image(restaurant_id,img_path) VALUES('$id', '$noImagePath')");
    else
    	$stmt = $db->prepare("INSERT INTO restaurant_image(restaurant_id,img_path) VALUES('$id', '$path')");
    $stmt->execute();*/
}

function checkParameters() {
    global $db;
    global $name;
    global $local;
    global $opening;
    global $closing;
    global $code;
	
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name='$name'");
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Restaurant already exists...";
	
	/*if($opening >= $closed)
		return "Invalid opening time...".$opening.$closing;*/
	
    if (strlen($name) < 1)
        return "Name is too small...";

    if ($code != "666")
        return "Code doesn't match..."; 
}

if(checkParameters())
    echo checkParameters();
else
    addNewRestaurant();
?>