<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="front">
        <header>
            <div class="nav-left">
                <img src="logo_bg_rm.png" alt="logo">
            </div>
            <div class="nav-center">
                <input type="text" placeholder="search for anything" name="search">
                </div>
            <div class="nav-right">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Classes</a>
                <a href="#">Contact</a>
                <a href="#">    
                    <div class="dropdown">
                    <div class="loginas">
                        <button class="dropbtn">Login as</button>
                        <i class="material-icons">arrow_drop_down</i>
                    </div>
                    <div class="login-content">
                        <a href="../../Dhatchaya/Login/index.php">Student</a>
                        <a href="../../Gagana/Login/login_index.php">Teacher</a>
                        <a href="../login-Nisaf/index.php">Reciptionist</a>
                        <a href="../../Pavithra/Login/login.php">Manager</a>
                        <a href="#">Instructor</a>
                        <a href="#">Accountant</a>
                    </div>
                </div></a>
            </div>
        </header>
        <div class="slogan">
            <h1>Make The Move For A Better Life With Us</h1>
            <button>Learn More</button>
        </div>
    </div>
    <div class="second">
        <!-- <p>content</p> -->
        <div class="facility">
            <h2>Our Facilities</h2>
            
            <div class="aboutus">

                <div class="service">
                    <div class="image">
                        <img src="online-learning.png" alt="online">
                    </div>
                    <div>
                        <a href="#">Online Learning</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="expert-teacher.png" alt="Expert Teachers">
                    </div>
                    <div>
                        <a href="#">Expert Teachers</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="security.png" alt="security">
                    </div>
                    <div>
                        <a href="#">Security</a>
                    </div>
                </div>

                <div class="service">
                    <div class="image">
                        <img src="spacious-classroom.png" alt="spacious-classroom">
                    </div>
                    <div>
                        <a href="#">Spacious Classroom</a>
                    </div>
                </div>

            </div>    
        </div>

        <div class="intro">
            <div class="classes">
                <img src="classes.jpg" alt="classes">
                <div class="class">Classes</div>
            </div>
            <div class="teachers">
                <img src="teachers.jpg" alt="teachers">
                <div class="teacher">Teachers</div>
            </div>
            <div class="vacancies">
                <img src="vacancies.jpg" alt="vacancies">
                <div class="vacancy">Vacancies</div>
            </div>
        </div>
        <div class="curve"></div>
    </div>

    <div class="third">
        <div class="third-first">
            <div class="description">
                <p>M.Perry, one of the famous Maths, English and Science tutor who has a bachelor’s degree in mathematics  and a great passion for teaching.</p>
                <h3> Interested in learning from 
                    the best? </h3>
                <button>Register</button>
            </div>
            <div class="post">
                <img src="vacancy.jpg" alt="vacancy-post">
            </div>
        </div> 
        <div class="third-second">
            <div class="touch">
                <h3>Get In touch...</h3>
            </div>
            <div class="respond">
                <form action="">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">

                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname">

                    <label for="contact">Contact No.</label>
                    <input type="number" name="contact" id="contact">

                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="your opinion.." style="height:50px"></textarea>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div> 
    </div>
    <div class="forth">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col" id="one">

                        <img  src="logo_bg_rm.png" alt="">
                        <p class="slogen">We need to bring learning to people instead of
                        people to learning</p>
                        <hr>
                        <p class="txt"><i class="fa fa-copyright" aria-hidden="true"></i> 2021 All Rights Reserved</p>
                    </div>
                <div class="footer-col" id="three">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="#https://web.facebook.com/UCSC.LK"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                <h4>Contact us</h4>
                <ul>
                    <li><a href="https://goo.gl/maps/YXUhDHjkXJoqjzNx8"><i class="fa fa-map-marker" ></i>  7,Nawala Road, Rajagiriya</a>  </li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>  interlearn@gmail.com</li>
                </ul>
                    </div>
                    <div class="footer-col" id="two">
                        <h4>follow us</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Classes</a></li>
                            <li><a href="#">Vacancies</a></li>
                            <li><a href="#">Customer care</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            </footer>
    </div>
</body>
</html>