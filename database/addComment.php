<?php
session_start();
include_once('connection.php');
$review_id = $_POST['review_id'];
$comment = $_POST['comment'];

echo     $review_id;
$stmt= $db->prepare("SELECT * FROM user WHERE username=:username");
$stmt->bindParam(':username',$_SESSION['username'],PDO::PARAM_STR);
$stmt->execute();
$reviewer_id=$stmt->fetch()['id'];

$stmt = $db->prepare("INSERT INTO comment(reviewer_id, review_id, comment) VALUES(:reviewer_id, :review_id, :comment)");
$stmt->bindParam(':reviewer_id',$reviewer_id,PDO::PARAM_INT);
$stmt->bindParam(':review_id',$review_id,PDO::PARAM_INT);
$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
$stmt->execute();

?>
