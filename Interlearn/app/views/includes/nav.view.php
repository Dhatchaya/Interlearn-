
<!DOCTYPE html>
<html lang="en">
<!-- <head>
 
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
                    <li class="nav-li"> <a href="<?=ROOT?>/home">Home</a></li>
                    <li class="nav-li"> <a href="#">About</a></li>
                    <li class="nav-li"> <a href="<?=ROOT?>/courses">Classes</a></li>
                    <li class="nav-li"> <a href="#">Contact</a></li>
                </ul>
                <?php if(!Auth::logged_in()):?>
                    <div class="dropdown">
                    <div class="loginas">
                        <button class="dropbtn">Login as</button>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                    
                <div class="login-content"><ul>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Staff</a></li>

                 </ul>
                    </div>
  
                </div>
                <?php else:?>
                    <li class="dropdown_logout">
                    <span>Hi, <?= ucfirst(Auth::getusername())?></span>
                    <div class="logout-content">
                    <ul>
                        <li class="lo-nav"> <a href="<?= ROOT ?>/logout">Logout</a></li>
                    </ul>
                    </div>
                    </li>
                <?php endif; ?>
                <div class="menu" id="menu" onclick="displayNav()">
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                </div>
            </div>
           
            
        </header> -->
        <body>
        <div class="all-header">

                    <div class="aboutme">
                        <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="picture" class="display_picture_img"/>
                        <span class="user-name">

                        <?= ucfirst(Auth::getusername())?>
                        </span>

                    </div class="notibellCount">
                    <div class="noti_bell" id="noti_bell">
                        <div>
                    <span class="badge" id="badge"></span>
                        <img src="<?=ROOT?>/assets/images/sidebar_icons/bell.png" alt="picture" class="display_picture_img"/>
                </div>
                        <div class="notification" id="notification">
                            <div class="allnoti" id="allnoti">

                            </div>
                        </div>

                    </div>
        </div>

        <script defer src="<?=ROOT?>/assets/js/notification.js?v=<?php echo time(); ?>"></script>

        <!-- <script src="<?=ROOT?>/assets/js/navbar.js"></script> -->
</body>
</html>