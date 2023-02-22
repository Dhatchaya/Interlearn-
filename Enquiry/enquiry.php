<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <script defer src="./enquiry.js"></script>
    </head>
  
    <body>
    <header>
        <div class="nav-left">
            <img src="logo_bg_rm.png" alt="logo">
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
                        <img src="icons/profile pic.png" alt="profile">
                        <span class="user-name">Nisaf <br/> Ahamed</span>
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
                        <span>Logout</span>
                    </a>
                </div>
               
                
            </div>
     <div class="clm2">
    <h2 class="add_heading">Enquiry</h2>
    <button data-modal-target= "#modal" class="Add_enq">+ Add Enquiry</button>

    <div class="modal " id="modal" >
        
        <form action="insert.php" method= "POST">
            <div class = "form-header">
            <h2 class="enq_heading">New Enquiry</h2>
            <button type="button" data-close-button class ="close-btn">&times;</button>
            </div>
            <lable for= "StudentID">Student ID</lable></br>
            <input type = "text" name="sid"/></br>
            <lable for= "category">Category</lable></br>
            <select name = "category">
                <option value = "" selected>--</option>
                <option value = "personal">Personal</option>
                <option value = "suggestion">General Suggestion</option>
                
            </select></br>
            <lable for= "Subject">Description</lable></br>
            <textarea id="sub" name="sub" rows="8" cols="50" placeholder="Type your concern"></textarea></br>  
            <input type = "submit" class ="sub_btn" name="submit" value="Submit"/>
        </form>
  
    <?php 
                if(@$_GET['Empty'] == true)
                {
                    ?>
                    <div class = "warning"> <?php echo $_GET['Empty'] ?></div>
                <?php
                }
                if(@$_GET['Fail']==true){
                    ?>
                    <div class = "failure"> <?php echo $_GET['Fail']?></div>
                    <?php
                }
            ?>
      </div>
    <?php include 'view.php'; ?>
    </div>
    </div>  
    <div  id="overlay"></div>
   
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
                    <li><a href=><i class="fa fa-map-marker" ></i>  50, stanfford ave, colombo, Srilanka</a>  </li>
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
    <script defer src="./enquiry.js"></script>
</body>
</html>

    

</html>