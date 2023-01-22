<?php
/**
 *login class
 */
class Login extends Controller
{
    public function index()
    {   
        
        $data['errors'] = [];
        $data['title'] = "login";
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $user -> first([
                'email' => $_POST['email'],
            ]);
            if($row)
            {
                if(in_array($row['role'],$user->$roles))
                {
                    if(password_verify($_POST['password'],$row -> password ))
                    {
                        Auth::authenticate($row);
                        redirect(lcfirst($row['role']).'/home');
                    }
                }
                $data['errors']['role']= "No user found please retry";
            }
            $data['errors']['email']= "wrong email or password";
        }
        
        $this->view('login',$data);
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
            ]);
            if($row)
            {
                
                if(password_verify($_POST['password'],$row -> password ))
                {

                Auth::authenticate($row);
                    redirect('home');
                }
            }
            $data['errors']['email']= "wrong email or password";
        }
        $this->view('student/login',$data);
    }

    
    public function staff()
    {   
        
        $data['errors'] = [];
        $data['title'] = "login";
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $row = $user -> role([
                'email' => $_POST['email'],
            ]);
            // show($row);die;
            if($row)
            {
                
                if(password_verify($_POST['password'],$row -> password ))
                {
                Auth::authenticate($row);
               
                   header('location:../'.$row->role);
                
                }
            }
            $data['errors']['email']= "wrong email or password";
        }
        $this->view('staff/login',$data);
    }

}