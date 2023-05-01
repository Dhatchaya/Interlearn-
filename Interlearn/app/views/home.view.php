<body>
<div class = "home_parent">
<div class="front">
<?php $this -> view('includes/header'); ?>


<header class="home_header">
        <div class="nav-left">
                <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" class="home-logo-again" alt="logo">
            </div>
            <!-- nav center displays inline -->
           
            <div class="nav-right" id="nav-right">
               <ul class="nav-right-login">
                <li class="nav-li"> <a href="#">Home</a></li>
                <li class="nav-li"> <a href="#">About</a></li>
                <li class="nav-li"> <a href="#">Classes</a></li>
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

        </header>

        <div class="slogan">
            <h1>Make The Move For A Better Life With Us</h1>
            <a href="#learn-more"><button>Learn More</button></a>
        </div>
    </div>
<section id="learn-more">
<div class="facility">
                
                
                <div class="studentimgfaci">
                <div class="purple"></div>
                    <img src="http://localhost/Interlearn/public/assets/images/homepage/study.jpg" alt="student">
                </div>
                <h3 class="aboutUstitlefaci">   Our Facilities</h3>
                <div class="aboutusfaci">
    
                      
                        <div class="services learning">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/online.png" class="imageonline" alt="online">
                          
                        </div>    
                        <div class="subparahead">
                            Online Learning
                            <p class="subpara"> Flexible and convenient education from anywhere, anytime.</p>
                            </div>
                        
                        
                        </div>
                        <div class="services teach">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/expert-teacher.png" class="imageonline" alt="online">
                        </div>   
                        <div class="subparahead">Expert Teachers
                    <p class="subpara"> Flexible and convenient education from anywhere, anytime.</p>
                    </div>
                    </div>
                        <div class="services security">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/security.png" class="imageonline" alt="online">
                        </div>       
                        <div class="subparahead">Security
                        <p class="subpara"> Flexible and convenient education from anywhere, anytime.</p>
                        </div>
                    </div>
                        <div class="services classs">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/spacious-classroom.png" class="imageonline" alt="online">
                        </div> <div class="subparahead">    
                        Spacious Classroom
                        <p class="subpara"> Flexible and convenient education from anywhere, anytime.</p>
                    </div></div>
    
                </div>   
                
            
            </div>
        <div class="about">
                
                
            <div class="aboutuspara">

                    <h3 class="aboutUstitle">About Us</h3>
                    <p>Welcome to Interlearn! We are a top educational institute catering to 
                        students from grade 6 to AL. Our focus is on providing high-quality teaching services for the school 
                        syllabus, allowing students to excel in their academic pursuits. At Interlearn, we are committed to helping students achieve their academic goals. We provide classes that are tailored to the school syllabus, ensuring that our students receive the knowledge and skills necessary to succeed in their studies.
                        Our experienced teachers are passionate about education and are dedicated to helping
                        each student reach their full potential. </p>

            </div>   
            <div class="studentimg">
                <img src="<?=ROOT?>/assets/images/homepage/studentimage.png" alt="student" >
            </div>
        
        </div>
   
        <!-- <div class="facility">
            <h2>Our Facilities</h2>
            
            <div class="aboutus">

                <div class="service">
                    <div class="image">
                        <img src="<?=ROOT?>/assets/images/online-learning.png" alt="online">
                    </div>
                    <div>
                        <a href="#">Online Learning</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="<?=ROOT?>/assets/images/expert-teacher.png" alt="Expert Teachers">
                    </div>
                    <div>
                        <a href="#">Expert Teachers</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="<?=ROOT?>/assets/images/security.png" alt="security">
                    </div>
                    <div>
                        <a href="#">Security</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="<?=ROOT?>/assets/images/spacious-classroom.png" alt="spacious-classroom">
                    </div>
                    <div>
                        <a href="#">Spacious Classroom</a>
                    </div>
                </div>

            </div>    
     
    </div> -->
    <div class="intro">
        
            <div  class="classes">
                <img src="<?=ROOT?>/assets/images/claasses.jpg" alt="classes">
                <div  class="class"><a href="<?=ROOT?>/courses">Classes</a></div>
            </div>
       
            <div class="teachers">
                <img src="<?=ROOT?>/assets/images/teachers.jpg" alt="teachers">
                <div class="teacher" ><a href="#">Teachers</a></div>
            </div>
            <div class="vacancies">
                <img src="<?=ROOT?>/assets/images/vacancyy.jpg" alt="vacancies">
                <div class="vacancy">Vacancies</div>
            </div>
        </div>
    

 
        <div class="third-first">
            <div class="description">
                <p>M.Perry, one of the famous Maths, English and Science tutor who has a bachelor’s degree in mathematics  and a great passion for teaching.</p>
                <h3> Interested in learning from 
                    the best? </h3>
                <button class="adbtn" >Register</button>
            </div>
            <div class="post">
                <img src="<?=ROOT?>/assets/images/New_vacancy.png" alt="vacancy-post">
            </div>
        </div> 
        <div class="third-second">
            <div class="touch">
                <h3>Get In touch...</h3>
            </div>
            <div class="respond">
                <form action="">
                    <label class = "home_form" for="fname">First Name</label>
                    <input  class="home_cnt_inp" type="text" name="fname" id="fname">

                    <label class = "home_form" for="lname">Last Name</label>
                    <input  class="home_cnt_inp" type="text" name="lname" id="lname">

                    <label class = "home_form" for="contact">Contact No.</label>
                    <input class="home_cnt_inp" type="number" name="contact" id="contact">

                    <label class = "home_form" for="message">Message</label>
                    <textarea class="home_cnt_inp" id="message" name="message" placeholder="your opinion.." style="height:50px"></textarea>

                    <input  class = "home_form_sbt" type="submit" value="Submit">
                </form>
            </div>
        </div> 
        </section>
    <div class="forth">
        <?php $this -> view('includes/footer'); ?>
    </div>
  
</div>

<script src="<?=ROOT?>/assets/js/navbar.js"></script>
</body>
</html>