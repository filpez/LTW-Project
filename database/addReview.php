<?php
session_start();
include_once('connection.php');
$restaurant_id = $_POST['restaurant_id'];
$value = $_POST['value'];
$comment = $_POST['comment'];

$stmt= $db->prepare("SELECT * FROM user WHERE username=:username");
$stmt->bindParam(':username',$_SESSION['username'],PDO::PARAM_STR);
$stmt->execute();
$reviewer_id=$stmt->fetch()['id'];

$stmt = $db->prepare("INSERT INTO review(reviewer_id, restaurant_id, value, comment) VALUES(:reviewer_id, :restaurant_id, :value, :comment)");
$stmt->bindParam(':reviewer_id',$reviewer_id,PDO::PARAM_INT);
$stmt->bindParam(':restaurant_id',$restaurant_id,PDO::PARAM_INT);
$stmt->bindParam(':value',$value,PDO::PARAM_INT);
$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
$stmt->execute();

?>
