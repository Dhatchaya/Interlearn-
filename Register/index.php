<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../connection.php');
$NIC= $_POST['nic'];
$first_name	= $_POST['fname'];
$last_name	= $_POST['lname'];
$birthday	= $_POST['bday'];
$gender	= $_POST['gender'];
$email	= $_POST['email'];
$mobile_number	= $_POST['mobile'];
$address_line1	= $_POST['addr1'];
$address_line2	= $_POST['addr2'];
$address_line3	= $_POST['addr3'];
$school	= $_POST['school'];
$grade	= $_POST['grade'];
$language_medium= $_POST['medium'];	
$uname = $_POST['Uname'];
$pass = $_POST['password'];
$hashed_password = password_hash($pass,PASSWORD_DEFAULT);
$ID = 'S81905';
$sql = "INSERT INTO student(NIC,first_name,last_name,birthday,gender,email,mobile_number,address_line1,address_line2,address_line3,school,grade,language_medium) VALUES ('$NIC','$first_name','$last_name','$birthday','$gender','$email','$mobile_number','$address_line1','$address_line2','$address_line3','$school','$grade','$language_medium')";
$result = mysqli_query($conn, $sql);

// $stmt = mysqli_prepare($conn,"INSERT INTO users(SID,Username,Password) Values(?,?,?)");
// $stmt->bind_param("sss",$ID,$uname,$hashed_password); 
// $result = $stmt->execute();
// if($result && ){
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
    echo"came here";
    $user_activation_code = md5(rand());
    $user_otp = rand(100000,999999);
    $data = array(
            ':SID' => $ID,
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