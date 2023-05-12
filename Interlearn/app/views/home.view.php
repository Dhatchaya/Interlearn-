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
              
                <li class="nav-li"> <a href="<?=ROOT?>/courses">Classes</a></li>
                <li class="nav-li"> <a href="#footer">Contact</a></li>
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
                    <img src="<?=ROOT?>/assets/images/homepage/studying.jpg" alt="student" >
                </div>

            </div>
<div class="facility">


                <div class="studentimgfaci">
                <div class="purple"></div>
                    <img src="http://localhost/Interlearn/public/assets/images/homepage/study.jpg" alt="student">
                </div>

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
                    <p class="subpara"> Knowledgeable and experienced educators committed to student success.</p>
                    </div>
                    </div>
                        <div class="services security">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/sidebar_icons/security.png" class="imageonline" alt="online">
                        </div>
                        <div class="subparahead">Security
                        <p class="subpara"> Secure environment for learning and personal information protection at Interlearn.</p>
                        </div>
                    </div>
                        <div class="services classs">
                        <div class="imageonline">
                            <img src="<?=ROOT?>/assets/images/spacious-classroom.png" class="imageonline" alt="online">
                        </div> <div class="subparahead">
                        Spacious Classroom
                        <p class="subpara"> Comfortable and conducive environment for focused learning.</p>
                    </div></div>

                </div>


            </div>
            <div class="aboutclass about">

            <div class="stuimgclass">
                    <div class="classesimagebg"></div>
                    <img src="<?=ROOT?>/assets/images/homepage/working.jpg" alt="student" >
                </div>
                <div class="aboutuspara lessspace">
    
                        <h3 class="aboutUstitle">Discover Our Range of Comprehensive Classes</h3>
                        <p>Interlearn's expert teachers provide classes from grade 6 to advanced levels designed to prepare you for success.
                            Our comprehensive curriculumhelps you achieve your academic and career goals. Join our vibrant
                            learning community and unlock your full potential. </p>
                            <h4 ><i>Check out our Classes!</i></h4>
                            <a href="<?=ROOT?>/courses"><button class="adbtn lessmargin" type="button" >Click here</button></a>
                </div>


            </div>

            <div class="joinus">
           <div class="joinuspara">
           Discover a supportive learning community at Interlearn,
           offering expert-led classes from grade 6 to advanced levels to help you
            achieve your academic and career goals. Join us today.
                </div>

            <a href="<?=ROOT?>/register"><button class="newbtn" type="button" >Register </button></a>

           </div>





        </section>
    <div class="forth" id="footer">
        <?php $this -> view('includes/footer'); ?>
    </div>

</div>

<script src="<?=ROOT?>/assets/js/navbar.js"></script>
</body>
</html>