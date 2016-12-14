<?php
include_once('connection.php');
$id = $_POST['res_id'];
$path = $_POST['path'];

$path = explode("/", $path);
$path = $path[count($path) -1];

$stmt = $db->prepare("DELETE FROM restaurant_image WHERE restaurant_id=:id AND img_path=:path");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->bindParam(':path',$path,PDO::PARAM_STR);
$stmt->execute();

$path = 'uploads/'.$path;

unlink($path);
?>