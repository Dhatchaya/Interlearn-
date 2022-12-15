<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../../connection.php');

$NIC= $_POST['nic'];
$first_name	= $_POST['fname'];
$last_name	= $_POST['lname'];
$birthday	= $_POST['bday'];
$gender	= $_POST['gender'];
$email	= $_POST['semail'];
$mobile_number	= $_POST['smobile'];
$address_line1	= $_POST['addr1'];
$address_line2	= $_POST['addr2'];
$address_line3	= $_POST['addr3'];
$school	= $_POST['school'];
$grade	= $_POST['grade'];
$language_medium= $_POST['medium'];	
$uname = $_POST['Uname'];

$pass = $_POST['password'];
$hashed_password = password_hash($pass,PASSWORD_DEFAULT);




//Upload profile picture
if(isset($_FILES['pic']['name']) AND !empty($_FILES['pic']['name'])){
    $pic_tmp = $_FILES['pic']["tmp_name"];
    $pic_name = $_FILES['pic']["name"];
    $error= $_FILES['pic']['error'];

    if($error === 0){
        $img_ext = pathinfo($pic_name,PATHINFO_EXTENSION);
        $img_final_ext = strtolower($img_ext);

        $allowed_ext = array('jpg','png','jpeg');
        if(in_array($img_final_ext,$allowed_ext)){
            $new_image_name = uniqid($uname,true).'.'.$img_final_ext;
            $destination = "../uploads/". $new_image_name;
            move_uploaded_file($pic_tmp,$destination);
        }
        else{
            $em = "You can't upload this type of file";
            header("location:index.php?error=$em");
            exit;
        }
    }
    else{
            $em = "Unknown error occured";
            header("location:index.php?error=$em");
            exit;
    }
    
}


// //validation
// if (!preg_match ("/^[a-zA-z]*$/", $fname) ) {  
//     $Errfname = "Only alphabets and whitespace are allowed.";  
   
// } 
// if (!preg_match ("/^[a-zA-z]*$/", $lname) ) {  
//     $Errlname = "Only alphabets and whitespace are allowed.";  
    
// } 
// if (!preg_match ("/^[a-zA-z]*$/", $uname) ) {  
//     $Erruname = "Only alphabets and whitespace are allowed.";  
    
// } 
// //mobile number
// if (!preg_match ("/^[0-9]*$/", $mobile_number) ){  
    
//     $Errsmob = "Only numeric value is allowed.";  
    
// }
// if (!preg_match ("/^[0-9]*$/", $parent_mobile_number) ){  
//     $Errpmob = "Only numeric value is allowed.";  
    
// }
// $s_len = strlen ($mobile_number);  
// $p_len = strlen ($mobile_number);  
// if ( $s_len < 10 && $s_len > 10) {  
//     $Err_smob_len = "Mobile must have 10 digits.";  

// }
// if ( $p_len < 10 && $p_len > 10) {  
//     $Err_pmob_len = "Mobile must have 10 digits.";  

// }
// //email
// $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
// if (!preg_match ($pattern, $email) ){  
//     $Err_semail = "Email is not valid.";  
           
// }
// if (!preg_match ($pattern, $p_email) ){  
//     $Err_pemail = "Email is not valid.";  
           
// }
// //NIC
// $nic_len = strlen ($NIC);
// if ( $nic_len < 12 && $nic_len > 12) {  
//     $Err_nic_len = "nic must have 12 digits.";  

// }
$sql = "INSERT INTO student(NIC,first_name,last_name,birthday,gender,email,mobile_number,address_line1, address_line2,address_line3,school,grade,language_medium,Picture) 
                Values('$NIC','$first_name','$last_name','$birthday','$gender','$email','$mobile_number','$address_line1','$address_line2','$address_line3','$school','$grade','$language_medium','$new_image_name');";

$result = mysqli_query($conn, $sql);

// $stmt = mysqli_prepare($conn,"INSERT INTO users(SID,Username,Password) Values(?,?,?)");
// $stmt->bind_param("sss",$ID,$uname,$hashed_password); 
// $result = $stmt->execute();
// if($result && )//{
//     include 'view.php';
// }
// else{
//     echo ("failed to insert");
// }
// if(isset($_POST['otp_submit'])){
//     if(empty($_POST['otp'])){
//         header("location:otp_verify.php?Empty= Please Enter the otp");
//     }

// $statement = $connect -> prepare($query);
// $statement -> execute($data);
// // }

if(!empty($uname) || !empty($pass)){
    $user_activation_code = md5(rand());
    $user_otp = rand(100000,999999);
    $data = array(
        
            ':Username' => $uname,
            ':Password' => $pass,
            ':user_email' => $email,
            ':User_activation_code' => $user_activation_code,
            ':User_email_status' => 'not verified',
            'user_otp' => $user_otp
    );
    // // $query = "  INSERT INTO users(SID,Username,Password,user_email,User_activation_code,User_email_status,user_otp)values ('$ID','$user','$pass','$email','$user_activation_code','not verified','$user_otp');
    //             -- SELECT * FROM (SELECT :SID,:Username,:Password,:user_email,:User_activation_code,:User_email_status,:user_otp)as tmp 
    //             -- Where not exitst(
    //             -- SELECT user_email = :user_email) LIMIT 1
    //             ";
            $query = "INSERT INTO users(Username,Password,user_email,User_activation_code,User_email_status,user_otp) Values('$uname','$hashed_password','$email','$user_activation_code','not verified','$user_otp');";
            $resulto = mysqli_query($conn, $query);
            if(!($resulto)){
                $message = 'Email Already register';
            }
            else{
    
               require '../phpmailer/src/Exception.php';
               require '../phpmailer/src/PHPMailer.php';
               require '../phpmailer/src/SMTP.php';
                $mail = new PHPMailer(true);
                $mail -> isSMTP();
                $mail -> Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail -> SMTPAuth = true;
                $mail -> Username ='interlearnsl@gmail.com';
                $mail -> Password = 'qeffokfsaebqwngl';
                $mail->SMTPSecure ='ssl';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                    );
                $mail->From ='interlearnsl@gmail.com';
                $mail -> FromName = 'Interlearn';
                $mail -> AddAddress($email);
                $mail ->IsHTML(true);
                $mail -> Subject = 'Verification code';
                $message_body ='<p> To verify your email address enter this <b>'.$user_otp.'</b>.</p>
                            <p> Sincerely, </p>
                            <p> Interlearn </p>';
                $mail->Body = $message_body;
                if ($mail -> Send()){

                    header ('location:otp_verify.php?code='.$user_activation_code);
                    
                }

                else{
                    $message = $mail -> ErrorInfo;
                    
                }
            }


        }


?>