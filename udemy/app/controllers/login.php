<?php
/**
 *login class
 */
class Login extends Controller
{
    public function index()
    {   
    //     $db = new Database();
    //    $res= $db ->query("select *  from users");
    //    show($res);
    //in data array errors are stored as a array
        $data['errors'] = [];
  
       $data['title'] = "login";
       $user = new User();

       if($_SERVER['REQUEST_METHOD'] == "POST"){
        $row = $user -> first([
            'email' => $_POST['email'],
        ]);
        if($row){
            
            if(password_verify($_POST['password'],$row -> password )){
                //authenticate
                //we need to have only one instance of auth class so we use a static function and access it
               Auth::authenticate($row);
                redirect('home');
            }
        }
        $data['errors']['email']= "wrong email or password";

    }
       $this->view('login',$data);
    }

}