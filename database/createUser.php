<?php
$db = new PDO('sqlite:database.db');
$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$email = $_POST['email'];
$c_email = $_POST['c_email'];
$type = $_POST['type'];
$code = $_POST['code'];

function addNewUser(){
    global $db;
    global $username;
    global $password;
    global $type;
    global $email;

    $hashed_password = sha1($password);
    echo $hashed_password;

    $stmt = $db->prepare("INSERT INTO user(username, password, email, date_created) VALUES('$username','$hashed_password', '$email', datetime('now'))");
    $stmt->execute(); 
    $stmt = $db->prepare("SELECT * FROM user WHERE username='$username'");
    $stmt->execute();  
    $result = $stmt->fetchAll();
    $id = $result[0]['id'];
    if ($type == "owner")
        $stmt = $db->prepare("INSERT INTO owner(id) VALUES('$id')");
    else
        $stmt = $db->prepare("INSERT INTO reviewer(id) VALUES('$id')");
    $stmt->execute(); 
}

function checkParameters() {
    global $db;
    global $username;
    global $password;
    global $c_password;
    global $email;
    global $c_email;
    global $code;
    if (strlen($username) < 6)
        return "Username is too small...";

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


    $stmt = $db->prepare("SELECT * FROM user WHERE username='$username'");
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Username already exists";
    
    $stmt = $db->prepare("SELECT * FROM user WHERE email='$email'");
    $stmt->execute();  
    $result = $stmt->fetchAll(); 
    if (count($result) != 0)
        return "Email already exists";
}

if(checkParameters())
    echo checkParameters();

else{
    addNewUser();
}
?>