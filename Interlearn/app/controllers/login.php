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

}