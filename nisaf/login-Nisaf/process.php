<?php

require_once('connection.php');
session_start();
$email = $_POST['email'];
$pass = $_POST['password'];

if(isset($_POST['submit'])){

    if(empty($email)){
        $error_username = 'Enter username';
    }
    
    else if (empty($pass)){
        $error_pass = 'Enter password'; 
    }
}

$stmt = $conn->prepare("select SID, Username,Password from users where user_email= ? and User_email_status = 'verified' ");
$stmt -> bind_param("s",$email);
$stmt->execute();
$stmt->store_result();
$stmt ->bind_result($userid,$username,$password);
$hashed = password_hash($Password, PASSWORD_DEFAULT);

if($stmt -> num_rows == 1){
    $stmt -> fetch();
    if(password_verify($pass,$password)) {
        $_SESSION['User'] = $Username;
        header("location: ../test/index.php");
    }

    else{
        header("location:index.php?Empty= Incorrect username or password");

    }
}
else{
    header("location:index.php?Empty= No user found");
    }   



?>
