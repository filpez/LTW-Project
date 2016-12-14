<?php
	include_once('../misc/utilities.php');
    include_once('connection.php');
    session_start();

	function checkParameters(){
		global $db;
		global $username;
		global $name;
		global $email;
		global $pass;
		global $passNew;

		//get original user
		$stmt = $db->prepare('SELECT * FROM user WHERE username=:username');
		$stmt->bindParam(':username',$_SESSION['username'],PDO::PARAM_STR);
		$stmt->execute();
		$originalUser=$stmt->fetch();
		$originalPass=$originalUser['password'];
		$originalID=$originalUser['id'];


		//check strlen
		if (strlen($username) < 6)
        	return "Username is too small...";
        if (strlen($name) < 1)
        	return "Name is too small...";
    	if ($passNew!=""){
    		if(strlen($passNew) < 8)
        		return "New password is too small...";
    	}

		//check username
		$stmt = $db->prepare('SELECT * FROM user WHERE username=:username');
		$stmt->bindParam(':username',$username,PDO::PARAM_STR);
		$stmt->execute();
		$result=$stmt->fetch();
		if($result && $result['id']!=$originalID)
			return 'Username already exists'.$result['id'].' '.$originalID;

		//check email
		$stmt = $db->prepare('SELECT * FROM user WHERE email=:email');
		$stmt->bindParam(':email',$email,PDO::PARAM_STR);
		$stmt->execute();
		$result=$stmt->fetch();
		if($result && $result['id']!=$originalID)
			return 'Email is already associated to another account';

		//check original pass
		$hashed_password = sha1($pass);
		if($originalPass != $hashed_password)
			return "Original password is incorrect";

		return "OK";
	}

	function updateUser(){
		global $db;
		global $username;
		global $name;
		global $email;
		global $passNew;

		$hashed_password=sha1($passNew);

		$stmt = $db->prepare('UPDATE user SET username=:username, name=:name, email=:email, password=:password WHERE username=:oldUsername');
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
		$stmt->bindParam(':oldUsername', $_SESSION['username'], PDO::PARAM_STR);
		$result=$stmt->execute();

		if($result)
			$_SESSION['username']=$username;
		return $result;
	}

	$oldUsername=$_SESSION['username'];
	$username=$_POST['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$passNew=$_POST['password_new'];

	$result=checkParameters();
	if($result != "OK")
		showHeaderMessage($result);
	else{
    	updateUser();
    	header('Location: '.$_SERVER['HTTP_REFERER']);
    }
?>