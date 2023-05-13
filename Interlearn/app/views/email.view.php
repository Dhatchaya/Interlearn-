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
            <h2 class="title_otp">Email Confirmation</h2>
            <br/>
          
            <?php if(!empty($response)):?>
                <p class="good_res"><?=$response?></p>
            <?php elseif(!empty($error)):?>
                <p class="warning"><?=$error?></p>
            <?php endif;?>
            <input class= "otp-inp" type="email" name = "email"  placeholder=" Enter your email"/><br/> <br/>
            <input class= "otp-inp"  type = "submit" name = "otp_submit" value="Submit"/><br/><br/>

            </form>
        </div>
    </body>
</html>