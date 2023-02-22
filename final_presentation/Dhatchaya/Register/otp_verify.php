<?php
    require_once('../../connection.php');
    if(isset($_POST['otp_submit'])){
        if(empty($_POST['otp'])){
            header("location:otp_verify.php?Empty= Please Enter the OTP");
        }
    }
    $error_user_otp = '';
    $user_activation_code = '';
    $message = '';
    if(isset($_GET['code'])){
        
        $user_activation_code = $_GET['code'];
        
        if(isset($_POST["otp_submit"])){
            if (!(empty($_POST["otp"]))){
    
                $query = " 
                SELECT * FROM users
                WHERE User_activation_code ='".$user_activation_code."'
                AND user_otp = '".trim($_POST['otp'])."'
                ";
                $statement = $conn -> prepare($query);
                $statement -> execute();
                $result = $statement->get_result();
                $total_row = $result -> num_rows;

                
                if ($total_row >0)
                {

                    $query = "
                    UPDATE users
                    SET User_email_status = 'verified'
                    WHERE User_activation_code = '".$user_activation_code."'
                    ";
                    $statement = $conn -> prepare($query);
                    if($statement -> execute()){
                        header('location: ../Login/index.php');
                    }
                }
                else{
                    $message = 'Invalid otp number';
                }
                
            }
        }
    
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@500&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="form-div">
            <form  method ="post">
            <h1 class="title_otp">OTP Verification</h1>
            <br/>
            <?php echo $message; ?>
            <?php 
                if(@$_GET['Empty']){
                    ?>
                    <div class = "warning"><?php echo $_GET['Empty']?></div><br/>
                    <?php
                }
            ?>
            
            <input type="text" name = "otp"  placeholder="   Enter verification code"/><br/> <br/>
            <input type = "submit" name = "otp_submit" value="Submit"/><br/><br/>

            </form>
        </div>
    </body>
</html>