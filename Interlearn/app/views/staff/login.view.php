<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?=ucfirst(APP::$page)?> - <?=APP_NAME?></title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css?v=<?php echo time(); ?>">
</head>
<body class="staff_login">
    <header class="staff_login_nav">
        <div class="staff_login_nav-left">
            <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="logo">
        </div>
        <div class="header_right">
            <div class="login-nav" id="login-nav">
                <ul>
                <li class="nav-li"> <a href="<?=ROOT?>/home">Home</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <div class="loginas">
                    <button class="dropbtn">Login as</button>
                    <i class="material-icons">arrow_drop_down</i>
                </div>
                <div class="login-content">
                    
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Staff</a></li>

                </div>
            </div>
        </div>
    </header>
    <div class="staff_login_front">
        <div class="staff_login_left">
            <h2>Welcome Back !</h2>
            <p>To keep connected with us please login with your personal info</p>
        </div>
        <div class="staff_login_v1"></div>
        <div class="staff_login_right">
            <h2 class ="staff_login_title">Staff Login</h2>
            <?php if(message()):?>
            <div class="display-msg">
                <?=message('',true)?>
            </div>
            <?php endif;?>
            <?php if(!empty($errors['email'])):?>
            <div class="display-error">
                <?=$errors['email']?>
            </div>
            <?php endif;?>
            <?php if(!empty($errors['password'])):?>
            <div class="display-error">
                <?=$errors['password']?>
            </div>
            <?php endif;?>
            <div class="staff_login_inputs">
                <form  method="POST">
                    <div class="staff_login_input1">
                        <input type="email" name="email" placeholder="Enter valid email"> 
                       <!--  <input type="text" name="username" placeholder="username">-->
                    </div>
                    <div class="staff_login_input2">
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="staff_login_button1">
                        <button class="staff_login_btn">Login</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>