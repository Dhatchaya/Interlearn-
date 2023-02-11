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
                $_POST['User_activation_code'] = $user_activation_code;
                $_POST['user_otp'] = $user_otp ;
                if(isset($_FILES['pic']['name']) AND !empty($_FILES['pic']['name'])){
                    $pic_tmp = $_FILES['pic']["tmp_name"];
                    $pic_name = $_FILES['pic']["name"];
                    $error= $_FILES['pic']['error'];
                
                    if($error === 0){
                        $img_ext = pathinfo($pic_name,PATHINFO_EXTENSION);
                        $img_final_ext = strtolower($img_ext);
                
                        $allowed_ext = array('jpg','png','jpeg');
                        if(in_array($img_final_ext,$allowed_ext)){
                            $new_image_name = uniqid($_POST['username'],true).'.'.$img_final_ext;
                            $destination = "uploads/images/". $new_image_name;
                          // echo $destination;die;
                            move_uploaded_file($pic_tmp,$destination);
                            $_POST['display_picture'] = $new_image_name ;
                        }
                        else{
                            $data['errors']['pic']='you cannot upload this type of file';
                        }
                    }
                    else{
                        $data['errors']['pic'] ="unknown error occured";
                        }
                if($user->insert($_POST)){
                    $verify = $user -> sendemail([
                        'email' => $email,
                        'user_activation_code'=>$user_activation_code,
                        'user_otp'=>$user_otp
                    ]);
  
                }
              
               
            }
            
            
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
        ],'uid');
       
    }
   

}