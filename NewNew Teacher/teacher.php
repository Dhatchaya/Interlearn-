<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <link rel="stylesheet" href="tchr_style.css?v=<?php echo time(); ?>">
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
            <a href="../HomePage/index.html">Home</a>
            <a href="#">About</a>
            <a href="#">Classes</a>
            <a href="#">Contact Us</a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </header>
    <div class="center-body">
        <?php include 'sidebar.php'?>
            
        <!--Content-->
    <div class="container">
        <h1>Good Morning Monica!</h1><br>
        <div class="rectangle">
            <a href="#">
                <img src="icons/2023.jpg" alt="" class="img">
                <p>2023 A/L</p>
                <p>Combined Maths</p>
                <p>Hall No 04</p>
            </a>
        </div>
        <div class="rectangle">
            <a href="#">
                <img src="2024.jpg" alt="" class="img">
                <p>2024 A/L</p>
                <p>Combined Maths</p>
                <p>Hall No 04</p>
            </a>
        </div>
        <div class="rectangle">
            <a href="#">
                <img src="icons/2025.jpeg" alt="" class="img">
                <p>2025 A/L</p>
                <p>Combined Maths</p>
                <p>Hall No 05</p>
            </a>
        </div>
        <div class="rectangle">
            <a href="#">
                <img src="icons/2023.jpg" alt="" class="img">
                <p>2023 A/L</p>
                <p>Combined Maths</p>
                <p>Paper Class</p>
                <p>Hall No 05</p>
            </a>
        </div>
        <div class="rectangle">
            <a href="#">
                <img src="icons/2023.jpg" alt="" class="img">
                <p>2023 A/L</p>
                <p>Combined Maths</p>
                <p>Revision Class</p>
                <p>Hall No 05</p>
            </a>
        </div>
    </div>
  <?php include 'calendar.php'?>
    
    </div>
    </div>  
    <div  id="overlay"></div>
    <?php include 'footer.php'?>
    <script defer src="./enquiry.js"></script>
</body>
</html>

    

</html>