<?php
/**
 *login class
 */
class Login extends Controller
{
    public function index()
    {   
        
        $this->view('home');
    }


    public function student()
    {   
        
        $data['errors'] = [];
        $data['title'] = "login";
        $user = new User();
        $student = new Students();
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if($user -> validateLogin($_POST)){
            $row = $user -> first([
                'email' => $_POST['email'],
                // 'User_email_status' => 'verified'
            ],'uid');
            
            if($row)
            {
                if($row->User_email_status == "verified"){
                    $studentDetails = $student->first([
                        'uid'=>$row->uid
                    ],'studentID');

                        if($row -> role === "Student"){
                            if($studentDetails)
                            {
                                if(password_verify($_POST['password'],$row -> password ))
                                {

                                Auth::authenticate($row);
                                header('Location: ../'.$row -> role.'/home');
                                }
                                $data['errors']['email']= "wrong email or password";
                            }
                            else{
                                $data['errors']['status']= "No Account";
                            }
                        }
                        else{
                            message("Please login as staff");
                        }
                }
                else{
                    $data['errors']['email']= "Please verify your email before login";
                }
                
                
            }
            else{
              
              
                    $data['errors']['email']= "wrong email or password";
                
               
            }
        }
        $data['empty']=$user->error;
        }
        $this->view('student/login',$data);
    }

    
    public function staff()
    {   
        
        $data['errors'] = [];
        $data['title'] = "login";
        $user = new User();
        $staff=new Staff();
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $user -> first([
                'email' => $_POST['email'],
                
            ],'uid');
            // $role=$user -> role([
            //     'email' => $_POST['email'],
            // ],'uid');
            if($row)
            {
                if($row->User_email_status == "verified"){
                    $staffDetails = $staff->first([
                        'uid'=>$row->uid
                    ],'emp_id');


                        if (in_array($row->role,$user->staffs)) {
                            if($staffDetails->emp_status=="1"){
                            if(password_verify($_POST['password'],$row -> password ))
                            {
                            Auth::authenticate($row);
                            header('Location: ../'.$row -> role.'/home');

                            }
                            $data['errors']['email']= "wrong email or password";
                        }
                        else{
                            $data['errors']['email']= "You No longer can Access your account";
                        }
                    }
                    else if($row->role == "Student"){
                        message("Please login as ".$row->role);
                    }

                }

                else{
                    $data['errors']['email']= "Please verify your email before login";
                }

         
                }
                else{
                    $data['errors']['email']= "wrong email or password";
                }
            

            
        }
        $this->view('staff/login',$data);
    }
    public function user($action=null)
    {
        $data=[];
        $user = new User();
        if($action=="email"){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $row = $user -> first([
                    'email' => $_POST['email'],

                ],'uid');

                if($row){
                    $user_otp= rand(100000,999999);
                    $user_activation_code= md5(rand());
                    $email= $_POST['email'];
                    $_POST['User_activation_code'] = $user_activation_code;
                    $result=$user->update(['email'=>$email],$_POST);
                    if($result){


                        $verify = $user -> ForgotPW([
                            'email' => $email,
                            'user_activation_code'=>$user_activation_code,
                            'user_otp'=>$user_otp
                        ]);
                        $data['response']="Please check your email to change your password";
                    }

                }
                else{
                    $data['error']="Invalid email";
                }
            }
            $this->view('email',$data);
        }
        if($action=="change"){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_GET['code'])){
                    $User_activation_code = $_GET['code'];
                    $rows = $user -> first([
                        'User_activation_code' => $_GET['code'],

                    ],'uid');
                    if($rows){
                       if($_POST['password']==$_POST['confpass']){
                            $pattern = '/^.{8,}$/';

                            if (preg_match($pattern, $_POST['password'])) {

                                    $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);//hash password
                                $status = $user->update(
                                [
                                    "uid"=>$rows->uid
                                ],
                                [
                                "password" => $pass,

                                ]
                                );
                                if($status){
                                    $data['response']="Password Change successful!";
                                }


                            }
                        else {
                            $data['errors']['password']="Password must be at least 8 characters long.";

                         }
                        }
                        else{
                            $data['errors']['password']="Passwords do not match";
                        }
                    }
                    else{
                        $data['errors']['account']="No Associated account found";
                    }

            }
        }
        $this->view('forgotpw',$data);
        }

    }

}