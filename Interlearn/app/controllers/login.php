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

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $user -> first([
                'email' => $_POST['email'],
                'User_email_status' => 'verified'
            ],'uid');
            if($row)
            {
                if($row -> role === "Student"){
                
                    if(password_verify($_POST['password'],$row -> password ))
                    {

                    Auth::authenticate($row);
                    header('Location: ../'.$row -> role.'/home');
                    }
                    $data['errors']['email']= "wrong email or password";
                }
                message("Please login as staff");
            }
            else{
                $data['errors']['email']= "wrong email or password";
            }
           
        }
        $this->view('student/login',$data);
    }

    
    public function staff()
    {   
        
        $data['errors'] = [];
        $data['title'] = "login";
        $staff = new Staff();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $staff -> first([
                'email' => $_POST['email'],
                
            ],'emp_id');
            $role=$staff -> role([
                'email' => $_POST['email'],
            ],'emp_id');
            if($row)
            {
               
                if ($role) {
                    if($_POST['password']==$row -> password )
                    {
                    Auth::authenticate($row);
                    header('Location: ../'.$row -> role.'/home');
                    
                    }
                    $data['errors']['email']= "wrong email or password";
                }
                message("Please login as ".$row->role);
         
                }
                else{
                    $data['errors']['email']= "wrong email or password";
                }
            

            
        }
        $this->view('staff/login',$data);
    }

}