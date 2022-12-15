<?php
include('connection.php');

// if(isset($_POST['submit'])){
//     header('location:../TeacherView/teacher.php');
//     die("Success");
// }

$username = $_POST['user'];
$password = $_POST['pass'];

//to prevent from mysqli injection
$username = stripslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "select *from login where username = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row){
    $_SESSION['user'] = $row;
}
else{
    echo '<script type = "text/javascript">';
    echo 'alert("Invalid username or password)"';
    echo 'window.location.href = "authentication.php"';
    echo '</script>';
}

$message = array();
if(empty($_SESSION['user'])){
    $message['error'] = "Error";
    header("Location:login_index.php?".http_build_query($message));
}else{
    header('location:../TeacherView/teacher.php');
}



// if($row){
//     echo "<script>alert('Successfully logged in')</script>";
// }
// else{
//     echo "<script>alert('Invalid username or password')</script>";
// }


?>