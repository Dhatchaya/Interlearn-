<?php
/**
 *Register class
 */
class Register extends Controller
{
    public function index()
    {  
        $data['errors'] = [];
        $data['details']=[];
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($user -> validate($_POST))
            {
                $user_otp= rand(100000,999999);
                $user_activation_code= md5(rand());
                $email= $_POST['email'];
                $_POST['date'] =date("Y-m-d H:i:s");
                $_POST['role'] ='Student';
                $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);//hash password
                $_POST['user_activation_code'] = $user_activation_code;
                $_POST['user_otp'] = $user_otp ;
                if($user->insert($_POST)){
                    $verify = $user -> sendemail([
                        'email' => $email,
                        'user_activation_code'=>$user_activation_code,
                        'user_otp'=>$user_otp
                    ]);
                   // $this->verify($user);
                    // if($verify){
                 
                    //     $row = $user -> first([
                    //         'User_activation_code' => $_GET['code'],
                    //         'User_otp'=>$_POST['otp']
                    //     ]);
                    //     show( $row );die;
                    //     // if($row>=1){
                    //     //     $status = $user->update([
                    //     //     " User_email_status" => 'verified'
                    //     //     ],
                    //     //     [
                    //     //         "User_activation_code" => $_GET['code']
                    //     //     ]
                    //     //     );
                    //     //     if($status){
                    //     //         echo "successfull registration";die;
                    //     //     }
                    //     // }
                    // }
                    // else{
                    //     echo "unknown error has occured";die;
                    // }
                }
                // message("your profile was successfully created");
               
            }
            
            
        }
   
       
        $data['errors']=$user->error;
        $data['title'] = "register";
        $this->view('student/register',$data);
   
    }

    public function verify($user){
        $this->view('student/otp',$data);
        $row = $user -> first([
            'User_activation_code' => $_GET['code'],
            'User_otp'=>$_POST['otp']
        ]);
        show( $row );die;

    }
    // public function verify($data,$user){
    //     $this->view('student/otp',$data);
    //     $verify = $user -> sendemail([
    //         'email' => $data['email'],
    //         'user_activation_code'=>$data['user_activation_code'],
    //         'user_otp'=>$data['user_otp']
    //     ]);
    //     if($verify){
     
    //         $row = $user -> first([
    //             'User_activation_code' => $_GET['code'],
    //             'User_otp'=>$_POST['otp']
    //         ]);
    //         show( $row );die;
            // if($row>=1){
            //     $status = $user->update([
            //     " User_email_status" => 'verified'
            //     ],
            //     [
            //         "User_activation_code" => $_GET['code']
            //     ]
            //     );
            //     if($status){
            //         echo "successfull registration";die;
            //     }
            // }
    //     }
    //     else{
    //         echo "unknown error has occured";die;
    //     }

    // }

}