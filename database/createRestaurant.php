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
    addImage();

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


function addImage(){
	global $name;
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
	$actual_image_name = time().$name.".".$ext;
	if(move_uploaded_file($tmp, $path.$actual_image_name)){
		echo "<img src='uploads/".$actual_image_name."' class='preview'>";
		return $actual_image_name;
	}
	else
		echo "failed";
		return -2;
}
?>