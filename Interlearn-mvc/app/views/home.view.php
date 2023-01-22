<body>
<div class = "home_parent">
<div class="front">
<?php $this -> view('includes/header'); ?>


<header class="home_header">
        <div class="nav-left">
                <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="logo">
            </div>
            <!-- nav center displays inline -->
           
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
                <div class="login-content"><ul>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/student">Student</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Teacher</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Instructor</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Admin</a></li>
                 <li class="nav-li">  <a href="<?= ROOT ?>/login/staff">Receptionist</a></li>
                 </ul>
                    </div>
                </div>
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
     
    </div>
    <div class="intro">
        
            <div  class="classes">
                <img src="<?=ROOT?>/assets/images/claasses.jpg" alt="classes">
                <div  class="class">Classes</div>
            </div>
       
            <div class="teachers">
                <img src="<?=ROOT?>/assets/images/teachers.jpg" alt="teachers">
                <div class="teacher" >Teachers</div>
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
   
    <div class="forth">
        <?php $this -> view('includes/footer'); ?>
    </div>
    </section>
</div>

<script src="<?=ROOT?>/assets/js/navbar.js"></script>
</body>
</html>