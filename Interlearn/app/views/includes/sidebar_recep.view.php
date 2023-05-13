<?php $this -> view('includes/header'); ?>
<div class="side-bar">
                <div class="top">    
                <img src="http://localhost/Interlearn/public/assets/images/logo_bg_rm.png" alt="logo" class="sidebar-logo">
                </div>
                <div class="middle">
                    
                        <div class="profile">
                            <a href="<?=ROOT?>/receptionist/profile">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/profile.png" alt="profile"></br>
                            <span>Edit Profile</span>
                            </a>
                        </div>
                    
                   
                        <div class="dashboard">
                            <a href="<?=ROOT?>/receptionist">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/dashboard.png" alt="Dashboard"></br>
                            <span>Dashboard</span>
                            </a>
                        </div>
                   
                    
                        <div class="home">
                         <a href="<?=ROOT?>/receptionist/payments">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/card.png" alt="card"></br>
                            <span>payments</span>
                         </a>
                        </div>
                    
                    <div class="enquiry">
                    <a href="<?=ROOT?>/receptionist/enquiry">       
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/enquiry.png" alt="enquiry"></br>
                            <span>Enquiry</span>
                       
                    </a>
                    </div>
                    <div class="Courses">
                            <a href="<?=ROOT?>/receptionist/course">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/book.svg" alt="Courses"></br>
                            <span>Courses</span>
                            </a>
                        </div>
                    
                 
                
                </div>
                <div class="bottom">
                    <a href="#">
                        <img src="<?=ROOT?>/assets/images/sidebar_icons/Group.png" alt="logout">
                        <a href ="<?= ROOT ?>/logout"> Logout </a>

                </div>
               
                
            </div>
    </body>
</html>