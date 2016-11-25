<?php
$db = new PDO('sqlite:database.db');
$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$email = $_POST['email'];
$c_email = $_POST['c_email'];
$type = $_POST['type'];
$code = $_POST['code'];

function checkParameters() {
    global $db;
    global $username;
    global $password;
    global $c_password;
    global $email;
    global $c_email;
    global $code;
    if (strlen($username) < 8)
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

echo checkParameters();
?>