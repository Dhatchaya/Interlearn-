<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                <a href="#">Contact Us</a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </header>
        <div class="center-body">
            <div class="side-bar">
                <div class="top">    
                    <div class="aboutme">
                        <img src="2.png" alt="profile">
                        <span class="user-name"><?php 
                        
                            echo $_SESSION['User'];
                            ?></span>
                    </div>
                    <hr>
                </div>
                <div class="middle">
                    <a href="#">
                        <div class="home">
                            <i class="material-icons md-48 white">home</i>
                            <span>Home</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="home">
                            <i class="material-icons md-48 white">person</i>
                            <span>My Profile</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="home">
                            <i class="material-icons md-48 white">collections_bookmark</i>
                            <span>Courses</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="home">
                            <i class="material-icons md-48 white">exit_to_app</i>
                            <span>Request Leave</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="home">
                            <i class="material-icons md-48 white">groups</i>
                            <span>Staffs</span>
                        </div>
                    </a>
                    
                </div>
                <div class="bottom">
                    <i class="material-icons md-32 white">logout</i>
                    <span>logout</span>
                </div>
            </div>

            <div class="center-body-middle">
                <h2>Apply Leave </h2>
                <form method="POST" action="apply.php">
                    <label for="leave_type">Leave Type</label><br>
                   <select name="leave_type" id="leave_type" >
                    <option value="Half day"> Half day</option>
                    <option value="full day"> full day</option>
                </select>
                    <label for="start">From</label>
                    <input type="date" name="start" id="start">
                    <label for="end">To</label>
                    <input type="date" name="end" id="end">
                    <label for="days">Number of Days</label>
                    <input type="number" name="days" id="days">

                    <label for="leave_method">Leave Method</label><br>
                    <select name="leave_method" id="leave_method" >
                        <option value="Sick leave"> Sick leave</option>
                        <option value="Personal"> Personal</option>
                    </select>

                    <label for="reason">Reason</label>
                    <textarea id="reason" name="reason" placeholder="your reason.." style="height:50px"></textarea>

                    <input type="submit" value="submit" name="submit">
                </form>
            </div>

            <div class="center-body-right">
                <div class="cal__container">
                    <div class="calendar__top">
                        <span class="arrow" id="back__arrow"><</span>
                        <div class="calendar__day">
                            <span class="cal__month" id="cal__month"></span>
                            <span class="cal__date" id="cal__date"></span>
                        </div>
                        <div class="calendar__time">
                            <span class="cal__time" id="cal__time"></span>
                        </div>
                        <span class="arrow" id="next__arrow">></span>
                    </div>
                    <div class="calendar__bottom">
                        <div class="cal__weekdays" id="cal__weekdays">
                    
                        </div>
                        <div class="cal__days" id="cal__days"></div>
                    </div>
                </div>

                <div class="leave_available">
                    <h2 style="color:black">Available Leaves</h2>
                    <div class="leave-type1">
                        <h3>ANNUAL LEAVES</h3>
                        <h4>12</h4>
                    </div>
                    <div class="leave-type1">
                        <h3>MEDICAL LEAVES</h3>
                        <h4>5</h4>
                    </div>
                    <div class="leave-type1">
                        <h3>ADVANCE LEAVES</h3>
                        <h4>5</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="next">
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
    <script src="index.js"></script>
</body>
</html>