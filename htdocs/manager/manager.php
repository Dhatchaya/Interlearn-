
<?php
    require_once (__DIR__ . "/database.php" ) ;
    $sql = "SELECT * FROM staff";
    $employee = $mysqli->query($sql);
    // D:/software/xampp/htdocs/manager/adding new user

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manager</title>
    <link rel="stylesheet" href="navbar-last.css">
    <link rel="stylesheet" href="manager.css">
    <link rel="stylesheet" href="footer last edition/footer-style.css">
    <link rel="stylesheet" media="screen and (max-width: 100px)" href="mobile-nav-bar.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body style="background-color: #FFFFFF;">
    <div class="nav-bar">
        <img  id="navbar-logo"  src="logo_bg_rm.png" alt="">
        <img class="punchi-logo" src="punchi- logo.jpeg" alt="">

    <input class="search-bar" type="text" placeholder="           Search">

    <div class="nav-list" >
        <ul id="myTopnav">
            <li class="nav-li"><a href="">Home</a></li>
            

    </div>

    <div class="notification">
        <img class="notifi-dwn" src="4.png" alt="">
        <img id="dropbtn" class="notifi-up"  src="3.png" alt="">
        <div class="dropdown-content">
            <a href="#">notification 1</a>
            <a href="#">notification 2</a>
            <a href="#">notification 3</a>
            <a href="#">notification 4</a>
        </div>
    </div>
    <div class="profile ">
        <img class="profile-dwn"  src="2.png" alt="">
        <img class="profile-up" src="1.png" alt="">
    </div>

    </div>

    <div class="side-col ">
        <div class="profile ">
            <a href="">
                <img class="profile-dwn"  src="2.png" alt="">
                <img class="profile-up" src="1.png" alt="">
                <h3 id="user-name"> Manoj</h3>
                <!-- <hr class="sidebar-hr"> -->
            </a>
        </div>

        <div class="sidebar-container">
            <div class="edit-profile segment">
                <a href="">
                    <img class="edit-img" src="edit2.png" alt="">
                    <h3 class="side-bar-txt" > Edit profile</h3>
                </a>
            </div>
    
            <div class="dashboard segment">
                <a href="finance-report.html">
                    <img class="edit-img" src="edit2.png" alt="">
                    <h3 class="side-bar-txt" > Finance Report</h3>
                </a>
            </div>
    
            <div class="payment segment">
                <a href="">
                    <img class="edit-img" src="edit2.png" alt="">
                    <h3 class="side-bar-txt" > Student Payment</h3>
                </a>
            </div>
    
            <div class="enquiry segment">
                <a href="">
                    <img class="edit-img" src="edit2.png" alt="">
                    <h3 class="side-bar-txt" > Request Leave</h3>
                </a>
            </div>
        </div>

        

        <div class="logout ">
            <a href="">
                <img class="edit-img" src="edit2.png" alt="" id="logout-img">
                <h3 id="logout-txt" > Logout</h3>
            </a>
        </div>

    </div>

    <div class="adding-new-user">
        <label class="add-user-lable" for=""><h2>Add new user</h2></label>
        <a class="add-user-button" href="adding new user/add_new_user.html">New user</a>
        <!--  -->
    </div>

    <div class="staff-payments">

        <div class="fields">
            <h2 class="record-items ">Name</h2>
            <h2 class="record-items">Position</h2>
            <h2 class="record-items">Contact No.</h2>
            <h2 class="record-items">Joined date</h2>
        </div>

    <?php
            while($row=mysqli_fetch_assoc($employee))
            {

    ?>

                                                      <!-- mekata php dala thiyenne -->
        <div class="employee-record">
            <div class="record-items staff"><img src="1.png" alt=""> <h3 class="user-name"></h3><?php  echo $row["first_name"] . " " . $row["last_name"]; ?></div>
            <div class="record-items Position"><?php echo $row ["jobtype"] ?></div>
            <div class="record-items ">0<span class="per-class-pay"><?php echo $row ["mobile_no"] ?></span></div>
            <div class="record-items class-count"><?php echo $row ["enrollment_date"] ?></div>
        </div>

        <?php

            }

        ?>
        
    </div>
    <div class="footer-support"></div>

  <footer class="footer"  >
    <div class="container" >
        <div class="row" >
            <div class="footer-col" id="one">

       <img class="footer-logo"  src="logo_bg_rm.png" alt="">
       <p   class="slogen">We need to bring learning to people instead of
         people to learning</p>
         <hr 1.1.4>
       <p class="txt"><i class="fa fa-copyright" aria-hidden="true"></i> 2021 All Rights Reserved</p>
            </div>
     <div class="footer-col" id="two">
                <h4>follow us</h4>
                <div class="social-links">
                    <a class="footer-link-icon" href="#https://web.facebook.com/UCSC.LK"><i class="fab fa-facebook-f"></i></a>
                    <a class="footer-link-icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="footer-link-icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="footer-link-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
       <h4>Contact us</h4>
       <ol class="footer-list">
         <li><a class="footer-link" href="https://goo.gl/maps/YXUhDHjkXJoqjzNx8"><i class="fa fa-map-marker" ></i>  7,Nawala Road, Rajagiriya</a>  </li>
         <li><i class="fa fa-envelope" aria-hidden="true"></i>  interlearn@gmail.com</li>
       </ol>
            </div>
            <div class="footer-col" id="three">
                <h4>follow us</h4>
                <ol class="footer-list">
                    <li><a class="footer-link" href="#">About us</a></li>
                    <li><a class="footer-link" href="#">Teachers</a></li>
                    <li><a class="footer-link" href="#">Classes</a></li>
                    <li><a class="footer-link" href="#">Vacancies</a></li>
                    <li><a class="footer-link" href="#">Customer care</a></li>
                </ol>
                
            </div>

        </div>
    </div>
</footer>
  <script src="salaryCal.js"></script>

<script >
    //***********************salary calculater********************************//

   
 //*******************************************************************************//
    



const footer = document.querySelector(".footer")
const sidebar = document.querySelector(".side-col")
const container = document.querySelector(".sidebar-container")

const footerApperOptions = {
    rootMargin: "0px 0px -100px 0px"
};

const observer = new IntersectionObserver
(function(
    entries,
    observer
) {
    entries.forEach(entry => {
        console.log(entry.target)
        if (entry.isIntersecting){
            sidebar.classList.add("sidebar-short");
            container.classList.add("segment-out");
        }
        else{
            sidebar.classList.remove("sidebar-short");
            container.classList.remove("segment-out");
        }
    });
},
footerApperOptions);

observer.observe(footer);
</script>



</body>
</html>
