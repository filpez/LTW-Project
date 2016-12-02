<?php

	function usernameExists($username){
        global $db;
        $stmt = $db->prepare('SELECT * FROM user WHERE username=:username');
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch();
        
        if($user)
        	return true;
        else return false;
	}

	function isOwner($username){
	global $db;
        $stmt = $db->prepare('SELECT * FROM user INNER JOIN owner ON owner.id = user.id WHERE user.username=:username');
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch();
        
        if($user)
        	return true;
        else return false;
	}

	function login($username, $pass){
	global $db;
	if(!isset($username))
		return false;
        $stmt = $db->prepare('SELECT * FROM user WHERE username=:username AND password=:pass');
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->bindParam(':pass',$pass,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch();
		
	if(isset($user)) $_SESSION['username']=$username;
    return true;
	}

?>