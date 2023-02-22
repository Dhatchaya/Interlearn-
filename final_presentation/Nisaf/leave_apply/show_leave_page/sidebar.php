<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style_sidebar.css?v=<?php echo time(); ?>">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
    </head>
    <body>
<div class="side-bar">
                <div class="top">    
                    <div class="aboutme">
                        <img src="../show_leave_page/2.png" alt="picture"/>
                        <span class="user-name"><?php 
                        
                        echo $_SESSION['User'];
                        ?></span>
                        <div>
                        
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="middle">
                    
                        <div class="profile">
                            <a href="#">
                            <img src="icons/profile.png" alt="profile"></br>
                            <span>Edit Profile</span>
                            </a>
                        </div>
                    
                   
                        <div class="dashboard">
                            <a href="#">
                            <img src="icons/dashboard.png" alt="Dashboard"></br>
                            <span>Dashboard</span>
                            </a>
                        </div>
                   
                    
                        <div class="home">
                         <a href="#">
                            <img src="icons/card.png" alt="card"></br>
                            <span>My payments</span>
                         </a>
                        </div>
                    
                    <div class="enquiry">
                    <a href="#">       
                            <img src="icons/enquiry.png" alt="enquiry"></br>
                            <span>Enquiry</span>
                       
                    </a>
                    </div>
                    
                 
                
                </div>
                <div class="bottom">
                    <a href="#">
                        <img src="icons/Group.png" alt="logout">
                        <?php
                      

                            
 
                      echo '<a href ="../../login-Nisaf/logout.php?logout"> Logout </a>';
                            
                           
                            ?>
                        
                    </a>
                </div>
               
                
            </div>
    </body>
</html>