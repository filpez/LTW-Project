<?php
include_once('connection.php');
$id = $_POST['res_id'];

//APAGAR REVIEWS
$stmt = $db->prepare("DELETE FROM review WHERE restaurant_id=:id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();


//APAGAR IMAGEs
$stmt = $db->prepare("SELECT * FROM restaurant_image WHERE restaurant_id=:id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $image){
    unlink('uploads/'.$image["img_path"]);}
    
$stmt = $db->prepare("DELETE FROM restaurant_image WHERE restaurant_id=:id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();

//APAGAR RESTAURANT
$stmt = $db->prepare("DELETE FROM restaurant WHERE id=:id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
?>