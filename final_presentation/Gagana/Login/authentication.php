<?php
include('connection.php');

// if(isset($_POST['submit'])){
//     header('location:../TeacherView/teacher.php');
//     die("Success");
// }

$username = $_POST['user'];
$pass = $_POST['pass'];
session_start();
//to prevent from mysqli injection
$username = stripslashes($username);
$pass = stripcslashes($pass);
$username = mysqli_real_escape_string($con, $username);
$pass = mysqli_real_escape_string($con, $pass);

$stmt = $con->prepare("select SID, Username,Password from users where user_email= ? and User_email_status = 'verified' ");
$stmt -> bind_param("s",$username);
$stmt->execute();
$stmt->store_result();
$stmt ->bind_result($userid,$username,$password);
if($stmt -> num_rows == 1){
    $stmt -> fetch();
   
    if(password_verify($pass,$password)){
        $_SESSION['User'] = $username;
        $_SESSION['userid'] = $userid;
     

        header('location:../Teacher_view/teacher.php');
    }
    else{
        header("location:login_index.php?Empty= Incorrect username or password");

    }
}
else{
    header("location:login_index.php?Empty= No user found");
}







?>