<?php

require_once('connection.php');
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

$stmt = $conn->prepare("select username,password from user where username= ? ");
$stmt -> bind_param("s",$user);
$stmt->execute();
$stmt->store_result();
$stmt ->bind_result($Username,$Password);

// $hashed = password_hash($Password, PASSWORD_DEFAULT);

if($stmt -> num_rows == 1){
    $stmt -> fetch();
    if($pass = $Password){
        // echo "The password matches <br/>";
        // echo "Login success <br/>";
        $_SESSION['User'] = $user;
        header("Location: ./Reciptionist/index.php");
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
