
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg_style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
  
    <title>Register</title>
</head>
<body>
    <div class="header">
        <img src="logo1.png" alt="" class="logo">
        <a href="../Login/index.php" class="login"><button> <p style="display: inline; color:white"><i class="arrow left" ></i></p>Login</button></a>
    </div>
    
    <div class = "scollable-container">
    <h1>Welcome to Interlearn Academic Institute</h1>

    <hr>
    <h5 style="color: red; text-align: center;">Please be kind enough to fill correct details</h5>
    <div class="container">
        <!--Personal Details-->
        <h2><u>Personal Details</u></h2>
        <form name= "Reg_form" method="post" action="index.php" enctype="multipart/form-data" onsubmit="return validate()">
            NIC:<label for="nic" style="color:red;"> *</label><p id="nic_err" class="warning"></p>
            <input type="text" name="nic" id = "nic"placeholder="Enter your NIC No" required><br>
           
          
            First Name:<label for="fname" style="color:red;"> *</label><p id="fname_err" class="warning"></p>
            <input type="text" name="fname"  placeholder="Enter your First Name" required><br>
            Last Name:<label for="lname" style="color:red;"> *</label><p id="lname_err" class="warning"></p>
            <input type="text" name="lname"  placeholder="Enter your Last Name" required><br>

            Name with initials:<label for="iname" style="color:red;"> *</label><p id="iname_err" class="warning"></p>
            <input type="text" id="initials" name = "iname" placeholder="Enter your Name with Initials" required><br>

            Birthday:<label for="bday" style="color:red;"> *</label><br>
            <input type="date" name="bday" id="bday" required><br>

            Gender:<label for="gender" style="color:red;"> *</label><br>
            <input type="radio" name="gender" id="male" value="male">
            <label for="male">Male&nbsp;&nbsp;</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">Female&nbsp;&nbsp;</label><br>

            Email:<label for="email" style="color:red;"> *</label><p id="s_email" class="warning"></p>
            <input type="email" name= "semail" id="semail" placeholder="Enter your Email" required><br> 

            Mobile Number:<label for="mobile" style="color:red;"> *</label><p id="s_mobile" class="warning"></p>
            <input type="text" name="smobile" id="smobile" placeholder="Enter Your Permanent mobile number" required><br>

            Address Line 01:<label for="address" style="color:red;"> *</label><br>
            <input type="text" name= "addr1" placeholder="Enter your Home No or Road" required><br>

            Address Line 02:<label for="address" style="color:red;"> *</label><br>
            <input type="text" name= "addr2" placeholder="Enter your Area" required><br>

            City:<label for="address" style="color:red;"> *</label><br>
            <input type="text" name= "addr3" placeholder="Enter your City" required><br>
            
            School:<label for="school" style="color:red;"> *</label><p id="school" class="warning"></p>
            <input type="text" name= "school" placeholder="Enter your School" required><br>

            Upload your picture:<label for="picture"  style="color:red;"> *</label><br> <?php 
            if(@$_GET['$em']==true){
            ?>
                <div class="warning"><?php echo $_GET['$em'];?></div>
            <?php 
                }
            ?>
            <input type = "file" name = "pic" placeholder="Upload your picture" required><br><br> 

            <h2><u>Parent/Guardian details</u></h2>
            Name:<label for="pname" style="color:red;"> *</label><p id="p_name" class="warning"></p>
            <input type="text" name="pname" id="pname" placeholder="Enter your Name" required><br> 
            Email:<label for="email" style="color:red;"> *</label><p id="p_email" class="warning"></p>
            <input type="email" name="pemail" id="pemail" placeholder="Enter your Email" required><br> 
            Mobile Number:<label for="pmobile" style="color:red;"> *</label><p id="pmobile_err" class="warning"></p>
            <input type="text" name="pmobile" id="pmobile" placeholder="Enter Your Permanent mobile number" required><br>

       <h2><u>Academic Details</u></h2>
    
            <label for="grade">Grade:</label><br>
            <select name="class" id="class">
                <option value="">--</option>
                <option value="secondary">Grade 6-11</option>
                <option value="AL">Advanced Level</option>
            </select>
            <br><br>
            <div class="grade-container" >
            <div id = "grade" class = "grade-select">
        
            <label for="grade">Grade:</label><br>
            <select name="grade">
                <option value="G6">Grade 6</option>
                <option value="G7">Grade 7</option>
                <option value="G8">Grade 8</option>
                <option value="G9">Grade 9</option>
                <option value="G10">Grade 10</option>
                <option value="G11">Grade 11</option>
            </select>
        </div>
            <br><br>
           
            <div id="AL"class = "grade-select">
            <label for="grade">A/L Exam Year:</label><br>
            <select name="grade" id="year">
                <option value="AL23">2023</option>
                <option value="AL24">2024</option>
                <option value="AL25">2025</option>
            </select>
        </div>
    </div>
            <br>
            <label for="medium">Medium:</label><br>
            <input type="radio" name="medium" id="sinhala" value="sinhala">
            <label for="sinhala">Sinhala&nbsp;&nbsp;</label>
            <input type="radio" name="medium" id="english" value="english">
            <label for="english">English&nbsp;&nbsp;</label><br><br>
            <h2><u>Profile</u></h2> 
            Username: <label for="Username" style="color:red;">*</label><p id="uname_err" class="warning"></p>
            <input type="text" name= "Uname" placeholder="Username" required><br><br>
            Password:<label for="school" style="color:red;"> *</label><p id="pass" class="warning"></p> 
            <input type="password" name= "password" placeholder="password" required><br><br>
            <div class="btn">
                <button type="submit" name="submit">Submit</button>
            </div>
      
           
        </form>
    </div>
    
 
</div>
<script src="register.js"></script>
<script src="validate.js"></script>
</body>

</html>