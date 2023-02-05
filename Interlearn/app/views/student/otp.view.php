<!DOCTYPE html>
<html>
    <head>
        <link href="<?=ROOT?>/assets/css/styles.css?v=<?php echo time(); ?>"  type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
    <body class="otp-body">
        <div class="form-div">
            <form  method ="post" class= "otp-form">
            <h1 class="title_otp">OTP Verification</h1>
            <br/>
            <!-- <?php echo $message; ?> -->
            <?php 
                if(@$_GET['Empty']){
                    ?>
                    <div class = "warning"><?php echo $_GET['Empty']?></div><br/>
                    <?php
                }
            ?>
            
            <input class= "otp-inp" type="text" name = "otp"  placeholder="   Enter verification code"/><br/> <br/>
            <input class= "otp-inp"  type = "submit" name = "otp_submit" value="Submit"/><br/><br/>

            </form>
        </div>
    </body>
</html>