<?php $this -> view('includes/header'); ?>
<div class="side-bar">
                <div class="top">    
                <img src="http://localhost/Interlearn/public/assets/images/logo_bg_rm.png" alt="logo" class="sidebar-logo">
                </div>
                <div class="middle">


                        <div class="profile">
                            <a href="<?=ROOT?>/student/profile/view">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/profile.png" alt="profile"></br>
                            <span>Edit Profile</span>
                            </a>
                        </div>
                        <div class="Home">
                            <a href="<?=ROOT?>/student/home">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/home.png" alt="profile"></br>
                            <span>Home</span>
                            </a>
                        </div>
                   
                        <div class="dashboard">
                            <a href="<?=ROOT?>/student/course">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/dashboard.png" alt="Dashboard"></br>
                            <span>Dashboard</span>
                            </a>
                        </div>
                   
                    
                        <div class="payment">
                         <a href="<?=ROOT?>/student/payment">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/card.png" alt="card"></br>
                            <span>My payments</span>
                         </a>
                        </div>
                    
                    <div class="enquiry">
                    <a href="<?=ROOT?>/academic/enquiry">       
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/enquiry.png" alt="enquiry"></br>
                            <span>Enquiry</span>
                       
                    </a>
                    </div>
                    <div class="Progress">
                            <a href="<?=ROOT?>/student/progress">
                            <a href="<?=ROOT?>/student/myprogress">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/progress.svg" alt="progress"></br>
                            <span>Progress</span>
                            </a>
                        </div>
                    
                        <div class="Courses">
                            <a href="<?=ROOT?>/courses">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/book.png" alt="Courses"></br>
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