<?php
$db = new PDO('sqlite:database.db');
$name = $_POST['name'];
$local = $_POST['local'];
$opening = $_POST['opening'];
$closing = $_POST['closing'];
$code = $_POST['code'];

function addNewRestaurant(){
    global $db;
    global $name;
    global $local;
    global $opening;
    global $closing;

    $stmt = $db->prepare("INSERT INTO restaurant(name, local, description, opening_hours, closing_hours, date_created) VALUES('$name', '$local', '$opening', '$closing', datetime('now'))");
    $stmt->execute();
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
	
	if($opening >= $closed)
		return "Invalid opening time...";
	
    if (strlen($name) < 1)
        return "Name is too small...";

    if ($code != "666")
        return "Code doesn't match..."; 
}

if(checkParameters())
    echo checkParameters();

else{
    addNewRestaurant();
}
?>