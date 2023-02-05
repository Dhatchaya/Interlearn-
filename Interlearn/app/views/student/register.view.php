
<?php $this->view("includes/header");?>

<body>
    <div class="reg_header">
        <img src="<?=ROOT?>/assets/images/logo_bg_rm.png" alt="" class="logo">
        <a href="<?=ROOT?>/login/student"><button class="reg_buttons"> <p style="display: inline; color:white"><i class="arrow left" ></i></p>Login</button></a>
    </div>
    
    <div class = "scollable-container">
    <h1 class= "reg_title">Welcome to Interlearn Academic Institute</h1>

    <hr>
    <h5 style="color: red; text-align: center; margin:1.5rem">Please be kind enough to fill correct details</h5>
    <div class="reg_container">
        <!--Personal Details-->
        <h2 class="reg_subtitle"><u>Personal Details</u></h2>
        <form name= "Reg_form" method="post" enctype="multipart/form-data" onsubmit="return validate()">
            NIC:<label for="nic" style="color:red;"> *</label><p id="nic_err" class="warning"></p>
            <input class="reg_inp" type="text" name="nic" id = "nic"placeholder="Enter your NIC No" ><br>
            First Name:<label for="fname" style="color:red;"> *</label><p id="fname_err" class="warning"></p>
            <input class="reg_inp" type="text" name="fname"  placeholder="Enter your First Name" ><br>
            Last Name:<label for="lname" style="color:red;"> *</label><p id="lname_err" class="warning"></p>
            <input class="reg_inp" type="text" name="lname"  placeholder="Enter your Last Name" ><br>

            Name with initials:<label for="iname" style="color:red;"> *</label><p id="iname_err" class="warning"></p>
            <input class="reg_inp" type="text" id="initials" name = "iname" placeholder="Enter your Name with Initials" ><br>

            <!-- Birthday:<label for="bday" style="color:red;"> *</label><br>
            <input class="reg_inp" type="date" name="bday" id="bday" ><br>

            Gender:<label for="gender" style="color:red;"> *</label><br>
            <input class="reg_inp reg_radio" type="radio" name="gender" id="male" value="male">
            <label for="male">Male&nbsp;&nbsp;</label>
            <input class="reg_inp reg_radio" type="radio" name="gender" id="female" value="female">
            <label for="female">Female&nbsp;&nbsp;</label><br>  -->

            Email:<label for="email" style="color:red;"> *</label><br/>
            <?php if(!empty($errors['email'])):?>
                <p id="s_email" class="warning"><?=$errors['email'];?></p>
            <?php endif;?>
            <!-- change email to semail -->
            <input class="reg_inp" type="email" name= "email" id="semail" placeholder="Enter your Email" ><br> 
      

            <!-- Mobile Number:<label for="mobile" style="color:red;"> *</label><p id="s_mobile" class="warning"></p>
            <input class="reg_inp" type="text" name="smobile" id="smobile" placeholder="Enter Your Permanent mobile number" ><br>

            Address Line 01:<label for="address" style="color:red;"> *</label><br>
            <input class="reg_inp" type="text" name= "addr1" placeholder="Enter your Home No or Road" ><br>

            Address Line 02:<label for="address" style="color:red;"> *</label><br>
            <input class="reg_inp" type="text" name= "addr2" placeholder="Enter your Area" ><br>

            City:<label for="address" style="color:red;"> *</label><br>
            <input class="reg_inp" type="text" name= "addr3" placeholder="Enter your City" ><br>
            
            School:<label for="school" style="color:red;"> *</label><p id="school" class="warning"></p>
            <input class="reg_inp" type="text" name= "school" placeholder="Enter your School" ><br> -->

            Upload your picture:<label for="picture"  style="color:red;"> *</label><br> <?php 
            if(@$_GET['$em']==true){
            ?>
                <div class="warning"><?php echo $_GET['$em'];?></div>
            <?php 
                }
            ?>
            <input class="reg_inp" type = "file" name = "pic" placeholder="Upload your picture" ><br><br> 

            <!-- <h2 class="reg_subtitle"><u>Parent/Guardian details</u></h2>
            Name:<label for="pname" style="color:red;"> *</label><p id="p_name" class="warning"></p>
            <input class="reg_inp" type="text" name="pname" id="pname" placeholder="Enter your Name" ><br> 
            Email:<label for="email" style="color:red;"> *</label><p id="p_email" class="warning"></p>
            <input class="reg_inp" type="email" name="pemail" id="pemail" placeholder="Enter your Email" ><br> 
            Mobile Number:<label for="pmobile" style="color:red;"> *</label><p id="pmobile_err" class="warning"></p>
            <input class="reg_inp" type="text" name="pmobile" id="pmobile" placeholder="Enter Your Permanent mobile number" ><br>

       <h2 class="reg_subtitle"><u>Academic Details</u></h2>
    
            <label for="grade">Grade:</label><br>
            <select class="reg_select" name="class" id="class">
                <option value="">--</option>
                <option value="secondary">Grade 6-11</option>
                <option value="AL">Advanced Level</option>
            </select>
            <br><br>
            <div class="grade-container" >
            <div id = "grade" class = "grade-select">
        
            <label for="grade">Grade:</label><br>
            <select class="reg_select" name="grade">
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
                <select class="reg_select" name="grade" id="year">
                    <option value="AL23">2023</option>
                    <option value="AL24">2024</option>
                    <option value="AL25">2025</option>
                </select>
              
            </div>
    </div>
            <br>
            <label for="medium">Medium:</label><br>
            <input class="reg_inp reg_radio" type="radio" name="medium" id="sinhala" value="sinhala">
            <label for="sinhala">Sinhala&nbsp;&nbsp;</label>
            <input class="reg_inp reg_radio" type="radio" name="medium" id="english" value="english">
            <label for="english">English&nbsp;&nbsp;</label><br><br> 
            <h2 class="reg_subtitle"><u>Profile</u></h2>  -->
            Username: <label for="Username" style="color:red;">*</label><br/>
              <?php if(!empty($errors['username'])):?>
            <p id="uname_err" class="warning"> 
              
                      <?=$errors['username'];?>
           </p> <?php endif;?>
            <input class="reg_inp" type="text" name= "username" placeholder="Username" ><br><br>
           
            Password:<label for="school" style="color:red;"> *</label><br/>
            <?php if(!empty($errors['password'])):?>
                <p id="pass" class="warning"><?=$errors['password'];?></p> 
            <?php endif;?>
            <input class="reg_inp" type="password" name= "password" placeholder="password" ><br><br>
            
            <div class="btn">
                <button class="reg_buttons" type="submit" >Submit</button>
            </div>
      
           
        </form>
    </div>
    
 
</div>
<script src="<?=ROOT?>/assets/js/register.js"></script>
</body>

</html>