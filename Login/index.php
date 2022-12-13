<!DOCTYPE html>
<?php

require_once('../connection.php');


if(isset($_POST['submit'])){
    
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
if(empty($user)||empty($pass)){
if(empty($user)&& empty($pass)){
    header("location:index.php?Empty= Enter Username and password");
}
    else if(empty($user)){
        header("location:index.php?Empty= Enter UserName");
    }
    
    else if (empty($pass)){
        header("location:index.php?Empty= Enter Password");
     
    }

   
}

   

else{


$stmt = $conn->prepare("select SID, Username,Password from users where Username= ? and User_email_status = 'verified' ");
$stmt -> bind_param("s",$user);
$stmt->execute();
$stmt->store_result();
$stmt ->bind_result($userid,$username,$password);
if($stmt -> num_rows == 1){
    $stmt -> fetch();
    if(password_verify($pass,$password)){
 
        $_SESSION['User'] = $user;
        $_SESSION['userid'] = $userid;
        header("location:welcome.php");
    }
    else{
        header("location:index.php?Empty= Incorrect username or password");

    }
}
else{
    header("location:index.php?Empty= No user found");
}
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo_bg_rm.png" alt="logo">
        </div>
        <div class="header_right">
            <a href="#">Contact us</a>
            <div class="dropdown">
                <div class="loginas">
                    <button class="dropbtn">Login as</button>
                    <i class="material-icons">arrow_drop_down</i>
                </div>
                <div class="login-content">
                    <a href="#">Student</a>
                    <a href="#">Teacher</a>
                    <a href="#">Instructor</a>
                    <a href="#">Admin</a>
                    <a href="#">Reciptionist</a>
                    <a href="#">Accountant</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="login">
            <h2>Login </h2>
            <!-- display warning -->
            <?php 
                
                if(@$_GET['Empty'] == true)
                {
                    ?>
                    <div class = "warning"> <?php echo $_GET['Empty'] ?></div>
                <?php
                }
            ?>
            <form action="" method="POST">
            <div class="login-row"><label for="username">Username </label>
            <input class= "login-inp"type="text" id="username" name="username" placeholder="Enter Username"></div>
            <div class="login-row">
            <label for="password">Password </label>
            <input class= "login-inp" type="password" id="password" name="password" placeholder="Enter Password">
            </div>
            <br>
          <button type="submit" name="submit" >Login</button>
            
        </form>
        </div>
        <div class="signup">
            <h2>Don't have an account?</h2>

            <a href= "../Register/register.php"> <button type="submit"> Register</button></a> 
        </div>
    </div>
</body>
</html>