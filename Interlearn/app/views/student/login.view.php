<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst(APP::$page)?> - <?=APP_NAME?></title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <span class = "login_body">
    <header class = "login_header">
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
    <div class="login_container">
        <div class="login">
            <h2 class="login_title">Login </h2>
            <?php if(message()):?>
            <div class="display-msg">
                <?=message('',true)?>
            </div>
            <?php endif;?>
            <?php if(!empty($errors)):?>
                <?php foreach($errors as $error):?>
                    <div class="display-error">
                        <?=$error?>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <!-- <?php if(!empty($errors['password'])):?>
            <div class="display-error">
                <?=$errors['password']?>
            </div>
            <?php endif;?> -->

            <!-- display warning -->
            <form  class = "st_lgn_frm"  method="POST">
            <div class="login-row"><label class = "lgn_form" for="username">Email</label>
             
            <input value ="<?= set_value('email')?>" class= "login-inp"type="email" id="username" name="email" placeholder="Enter Email address"></div>
            <?php if(!empty($empty['email'])):?>
            <div class="fieldError">
            <?=$empty['email']?>
            </div>
            <?php endif;?>
            <div class="login-row">
            <label class = "lgn_form" for="password">Password </label>
            
            <input value ="<?= set_value('password')?>" class= "login-inp"  type="password" id="password" name="password" placeholder="Enter Password">
            <?php if(!empty($empty['password'])):?>
            <div class="fieldError">
            <?=$empty['password']?>
            </div>
            <?php endif;?>    
            <a href="<?= ROOT ?>/login/user/email" class="forpw">Forgot Password?</a>
        </div>
            <br>
          <button type="submit"  class="st_lgn_btn">Login</button>

        </form>
        </div>
        <div class="signup">
            <h2 class="login_title">Don't have an account?</h2>
            <a href= "<?= ROOT ?>/register" class="a_nst"> <button type="submit"> Register</button></a> 
        </div>
    </div>
</span>
</body>
</html>