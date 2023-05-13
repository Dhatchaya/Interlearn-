<!DOCTYPE html>
<html>
    <head>
        <link href="<?=ROOT?>/assets/css/styles.css?v=<?php echo time(); ?>"  type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/favicon/fv.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
    <body class="otp-body">
        <div class="form-div">
            <form  method ="post" class= "otp-form">
            
            <br/>
        <?php if(!empty($response)):?>
                <p class="good_res"><?=$response?></p>
         <?php elseif(!empty($errors)):?>
            <?php foreach($errors as $error):?>
              <p class="warning">  <?=$error?></p>
            <?php endforeach;?>
        <?php endif;?>
            
            <input class= "otp-inp" type="password" name = "password"  placeholder="   Enter your new password"/><br/> 
            <input class= "otp-inp" type="password" name = "confpass"  placeholder="   confirm password"/>
            <input class= "otp-inp"  type = "submit" name = "otp_submit" value="Submit"/><br/><br/>

            </form>
        </div>
    </body>
</html>