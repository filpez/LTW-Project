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
    
    $stmt = $db->prepare("INSERT INTO restaurant(name, local, description, opening_hours, closing_hours) VALUES(:name, :local, :description,'$opening', '$closing')");
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':local',$local,PDO::PARAM_STR);
    $stmt->bindParam(':description',$description,PDO::PARAM_STR);
    $stmt->execute();
	

	$id = $db->lastInsertId();
	include('addImage.php');
	return $id;
}

function checkParameters() {
    global $db;
    global $name;
    global $local;
    global $opening;
    global $closing;
    global $code;
	
    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name=:name");
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Restaurant already exists...";
	
    if (strlen($name) < 1)
        return "Name is too small...";

    if ($code != "666")
        return "Code doesn't match..."; 
}

if(checkParameters())
    echo checkParameters();
else
    echo addNewRestaurant();
?>