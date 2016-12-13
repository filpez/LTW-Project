<?php
function addImage($db, $id){
	$name = $_POST['name'];

	if($id == NULL){
		$stmt = $db->prepare("Select * From restaurant where name=:name");
		$stmt->bindParam(':name',$name,PDO::PARAM_STR);
    	$stmt->execute();
    	$result = $stmt->fetchAll();
		if(count($result) == 0)
			echo 'Error';
		else if (count($result) == 1)
			$id = $result[0]['id'];
	}
	$path = "uploads/";

	//Check if there's a file
	$imgname = $_FILES['photo']['name'];
	if(!$imgname){
		return -1;
	}
		
	//check size
	$size = $_FILES['photo']['size'];
	if ($size > 1024*1024){
		echo "Image file size max 1 MB";
		return -2;
	}

			
	//Check if File is an Image
	$tmp = $_FILES['photo']['tmp_name'];
	$check = getimagesize($tmp);
	if($check === false) {
		echo "File is not an image.";
		return -2;
	}
	
	//Save image
	list($txt, $ext) = explode(".", $imgname);
	//$actual_image_name = time().$name.".".$ext;
	$actual_image_name = time().".".$ext;
	if(move_uploaded_file($tmp, $path.$actual_image_name)){
		echo "<img src='uploads/".$actual_image_name."' class='preview'>";
	}
	else{
		echo "failed";
		return -2;
	}

	echo $id." ".$actual_image_name;
	$stmt = $db->prepare("INSERT INTO restaurant_image(restaurant_id,img_path) VALUES(:id, :actual_image_name)");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->bindParam(':actual_image_name',$actual_image_name,PDO::PARAM_STR);
    $stmt->execute();
}

if (!isset($db))
	include_once('connection.php');

if (!isset($id))
	$id = NULL;


if (isset($_FILES['photo']['name'])){
	if (isset($_FILES['photo']['name']))
	addImage($db, $id);
}

?>