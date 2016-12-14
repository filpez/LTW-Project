<?php
session_start();
include_once('../misc/utilities.php');
include_once('connection.php');
$name = $_POST['name'];
$local = $_POST['local'];
$description  = $_POST['description'];
$opening = $_POST['opening'];
$closing = $_POST['closing'];
$code = $_POST['code'];

function addNewRestaurant(){
    global $db;
    global $name;
    global $local;
    global $description;
    global $opening;
    global $closing;
    
    $stmt= $db->prepare("SELECT * FROM user WHERE username=:username");
    $stmt->bindParam(':username',$_SESSION['username'],PDO::PARAM_STR);
    $stmt->execute();
    $owner_id=$stmt->fetch()['id'];

    $stmt = $db->prepare("INSERT INTO restaurant(owner_id, name, local, description, opening_hours, closing_hours) VALUES(:owner_id, :name, :local, :description, :opening, :closing)");
    $stmt->bindParam(':owner_id',$owner_id,PDO::PARAM_INT);
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':local',$local,PDO::PARAM_STR);
    $stmt->bindParam(':description',$description,PDO::PARAM_STR);
    $stmt->bindParam(':opening',$opening,PDO::PARAM_STR);
    $stmt->bindParam(':closing',$closing,PDO::PARAM_STR);
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

    return "OK";
}
$result=checkParameters();
if($result != "OK")
    showHeaderMessage($result,$_SERVER['HTTP_REFERER']);
else echo addNewRestaurant();
?>
