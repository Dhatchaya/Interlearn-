<?php
/**
 *signup class
 */
class Signup extends Controller
{
    public function index()
    {   
    //  $db = new Database();
    //  $db -> create_tables();
    //    $res= $db ->query("select *  from users");
        $data['errors'] = [];
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($user -> validate($_POST)){
                $_POST['date'] =date("Y-m-d H:i:s");
                $_POST['role'] ='user';
                $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);//hash password
                $user->insert($_POST);
             // $query = "insert into users(firstname,lastname,email,password,role,date)values(:firstname,:lastname,:email,:password,:role,:date)";
             // $arr['firstname'] =$_POST['firstname'];
             // $arr['lastname'] =$_POST['lastname'];
             // $arr['email'] =$_POST['email'];
             // $arr['password'] =$_POST['password'];
             // $arr['role'] ="user";
             // $arr['date'] =date("Y-m-d H:i:s");
             // $db = new Database();
             // $db -> query($query,$arr);
             message("your profile was successfully created");
             redirect(('login'));
             }
        }
   
       
        $data['errors']=$user->error;
        $data['title'] = "signup";
        $this->view('signup',$data);
   
    }

}