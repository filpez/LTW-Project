<?php
    include_once('../misc/utilities.php');
    include_once('connection.php');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $email = $_POST['email'];
    $c_email = $_POST['c_email'];
    $code = $_POST['code'];

function addNewUser(){
    global $db;
    global $username;
    global $name;
    global $password;
    global $email;

    $hashed_password = sha1($password);

    $stmt = $db->prepare('INSERT INTO user(username, name, password, email, date_created) VALUES(:username, :name, :hashed_password, :email, datetime(\'now\'))');
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':hashed_password',$hashed_password,PDO::PARAM_STR);
    $stmt->bindParam(':email',$email,PDO::PARAM_STR);
    $stmt->execute(); 
    $stmt = $db->prepare("SELECT * FROM user WHERE username=:username");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->execute();  
    $result = $stmt->fetchAll();
    $id = $result[0]['id'];
}

function addImage(){
	global $name;
	$path = "userPhotos/";

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
	$actual_image_name = $name.".".$ext;
	if(move_uploaded_file($tmp, $path.$actual_image_name)){
		echo "<img src='uploads/".$actual_image_name."' class='preview'>";
		return $actual_image_name;
	}
	else
		echo "failed";
		return -2;
}

function checkParameters() {
    global $db;
    global $username;
    global $name;
    global $password;
    global $c_password;
    global $email;
    global $c_email;
    global $code;
    if (strlen($username) < 6)
        return "Username is too small...";
    
    if (strlen($name) < 1)
        return "Name is too small...";

    if (strlen($password) < 8)
        return "Password is too small...";

    if ($password != $c_password){
        echo $password;
        echo $c_password;
        return "Passwords don't match...";}

    if ($email != $c_email)
        return "Emails don't match...";

    if ($code != "666")
        return "Code doesn't match..."; 


    $stmt = $db->prepare("SELECT * FROM user WHERE username=':username'");
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Username already exists";
    
    $stmt = $db->prepare("SELECT * FROM user WHERE email=':email'");
    $stmt->bindParam(':email',$username,PDO::PARAM_STR);
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Email already exists";
    return "OK";
}
$result=checkParameters();
if($result != "OK")
    showHeaderMessage($result);

else{
    addNewUser();
    header('Location: '.$_SERVER['HTTP_REFERER']."/../home.php");
}
?>