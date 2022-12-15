<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <div class="screen">
            <div class="screen__content">

                <?php if(!empty($_GET['error'])): ?>
                    <h1><?=$_GET['error']?></h1>
                <?php endif;?>
                
                <form class="login" name="lt" action="authentication.php" method="POST">
                    
                    <div class="image">
                        <img src="2.png" alt="" id="image">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" name="user" class="login__input" placeholder="User name / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="pass" class="login__input" placeholder="Password">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="checkbox" name="" id="rmbr"> <font color="white">Remember me </font> 
                    </div>
                    <!-- <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>	 -->
                    <button class="button login__submit" type="submit" name="submit">Log In Now
                        <!-- <span class="button__text">Log In Now</span> -->
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <a href="#">Forgot Password?</a>
                    </div>
                    			
                </form>
            </div>
        </div>
    </div>
    <script src="login_index.js"></script>
</body>
</html>