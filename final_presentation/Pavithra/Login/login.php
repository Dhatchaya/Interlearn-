<?php



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $mysqli = require __DIR__ . "/database.php";
    
               if(empty($email)||empty($pass)){
                    if(empty($email)&& empty($pass)){
                        header("location:index.php?Empty= Enter Email and password");
                    }
                        else if(empty($email)){
                            
                            header("location:index.php?Empty= Enter Email");
                        }
                        
                        else if (empty($pass)){
                            header("location:index.php?Empty= Enter Password");
                         
                        }
                    
                       
                    }
                    
                       
                    
                    else{
                        
                    
                    $stmt = $mysqli->prepare("select SID, Username,Password from users where user_email= ? and User_email_status = 'verified' ");
                    $stmt -> bind_param("s",$email);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt ->bind_result($userid,$username,$password);
                    if($stmt -> num_rows == 1){
                        $stmt -> fetch();
               
                        if(password_verify($pass,$password)){
                            $_SESSION['User'] = $username;
                            $_SESSION['userid'] = $userid;
                    
                            header("location: ../manager/manager.php");
                        }
                        else{
                            header("location:login.php?Empty= Incorrect username or password");
                    
                        }
                    }
                    else{
                        header("location:login.php?Empty= No user found");
                    }
                }
}
    

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login_stylesheet.css">
    <link rel="stylesheet" href="../navbar-last.css">
    <link rel="stylesheet" media="screen and (max-width: 100px)" href="../mobile-nav-bar.css">
    
</head>
<body>
<div class="nav-bar">
        <img  id="navbar-logo"  src="../logo_bg_rm.png" alt="">
        <img class="punchi-logo" src="../logo.jpeg" alt="">

   

   

    </div>
    <div class="login-container">
    <h1 class="login-title">Login</h1>
    
    <?php 
                
                if(@$_GET['Empty'] == true)
                {
                    ?>
                    <div class = "warning"> <?php echo $_GET['Empty'] ?></div>
                <?php
                }
            ?>
    
    <form method="post">
        <label class="label" for="email">E-mail</label>
        <br>
        <input class="input" type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
               <br>
        
        <label class="label" for="password">Password</label> <br>
        <input class="input" type="password" name="password" id="password"><br>
        
        <button class= "login-button">Log in</button>

        
    </form>               

    </div>
       
    
</body>
</html>