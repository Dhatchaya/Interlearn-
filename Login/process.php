<?php

require_once('../connection.php');
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];

if(isset($_POST['submit'])){
    
    if(empty($user)){
        $error_username = 'Enter username';
    }
    
    else if (empty($pass)){
        $error_pass = 'Enter password';
     
    }
}

$stmt = $conn->prepare("select SID, Username,Password from users where Username= ? and User_email_status = 'verified' ");
$stmt -> bind_param("s",$user);
$stmt->execute();
$stmt->store_result();
$stmt ->bind_result($userid,$username,$password);
if($stmt -> num_rows == 1){
    $stmt -> fetch();
    if(password_verify($pass,$password)){
        echo "The password matches <br/>";
        echo "Login success <br/>";
        $_SESSION['User'] = $user;
        $_SESSION['userid'] = $userid;
    }
    else{
        $_SESSION=[];
        session_destroy();
        echo "password is incorrect";
    }
}
else{
    echo "0 results. nobody with that username and password";
    $_SESSION=[];
    session_destroy();
}
?>


