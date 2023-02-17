<?php $this -> view('includes/header'); ?>
<div class="side-bar">
                <div class="top">    
                    <div class="aboutme">
                        <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="picture"/> 
                        <span class="user-name">
                        
                        <?= ucfirst(Auth::getusername())?>
                        </span>
                        <div>
                        
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="middle">
                    
                        <div class="profile">
                            <a href="<?=ROOT?>/teacher/profile">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/profile.png" alt="profile"></br>
                            <span>Edit Profile</span>
                            </a>
                        </div>
                    
                   
                        <!-- <div class="dashboard">
                            <a href="<?=ROOT?>/teacher/home">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/dashboard.png" alt="Dashboard"></br>
                            <span>Dashboard</span>
                            </a>
                        </div>
                    -->
                    
                    
                    
                    <div class="enquiry">
                    <a href="<?=ROOT?>/academic/enquiry">       
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/enquiry.png" alt="enquiry"></br>
                            <span>Enquiry</span>
                       
                    </a>
                    </div>
                    <div class="Courses">
                            <a href="<?=ROOT?>/teacher/home">
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