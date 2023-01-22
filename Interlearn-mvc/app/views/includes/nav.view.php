
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=ucfirst(APP::$page)?> - <?=APP_NAME?></title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
        <header class="all_header">
        <div class="nav-left">
                <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="logo">
            </div>
      
            <div class="nav-right" id="nav-right">
                <ul class="login-nav">
                    <li class="nav-li"> <a href="#">Home</a></li>
                    <li class="nav-li"> <a href="#">About</a></li>
                    <li class="nav-li"> <a href="#">Classes</a></li>
                    <li class="nav-li"> <a href="#">Contact</a></li>
                </ul>
                    <div class="dropdown">
                        <div class="loginas">
                            <button class="dropbtn">Login as</button>
                            <i class="material-icons">arrow_drop_down</i>
                        </div>
                        <div class="login-content">
                        <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                        <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Teacher</a></li>
                        <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Instructor</a></li>
                        <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Admin</a></li>
                        <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Receptionist</a></li>
                        </div>
                    </div>
                    <div class="menu" id="menu" onclick="displayNav()">
                        <div class="menu-icon"></div>
                        <div class="menu-icon"></div>
                        <div class="menu-icon"></div>
                    </div>
            </div>
           
            
        </header>
        <body>
        <script src="<?=ROOT?>/assets/js/navbar.js"></script>
</body>
</html>