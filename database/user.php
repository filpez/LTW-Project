<?php

    include_once('database/restaurants.php');

    function getUser($username){
        global $db;
        $stmt = $db->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch();
        return $user;
    }

	function usernameExists($username){
        if(getUser($username))
        	return true;
        else return false;
	}

	function isOwner($username){
	$restaurants=getRestaurantsFromUser($username);
        
    if(count($restaurants) > 0)
       	return true;
    else return false;
	}

	function login($username, $pass){
    if(!isset($username))
        return false;

    $hashed_password = sha1($pass);
    $user=getUser($username);

    if($hashed_password != $user['password'])
        return false;
		
	$_SESSION['username']=$username;
    return true;
	}

?>