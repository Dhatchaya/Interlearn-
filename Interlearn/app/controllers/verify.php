<?php
/**
 *Verify  class
 */
class Verify extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $this->view('student/otp',$data);
        $user = new User();
        if(isset($_GET['otp']) && isset($_GET['code'])){
            $row = $user -> first([
                'User_activation_code' => $_GET['code'],
                'User_otp'=>$_GET['otp']
            ],'uid');

            if($row){
                $User_email_status = 'verified';
                $User_activation_code = $_GET['code'];
                    $status = $user->update(
                    [
                        "uid"=>$row->uid
                    ],
                    [
                    "User_email_status" => $User_email_status,
                    // "User_activation_code" => $User_activation_code
                   
                    ]
                    );
                    if($status){
                        header("Location:../public/verify/success/staff");
                    }
                }
            
            else{
                echo "unknown error has occured";
            }
          
        }
        
    }
    public function success($action=null)
    {
        $data=[];

        if($action=="staff"){
            $data['content']="Sucessfully verified!";
            $data['verify'] ="";
        }
        if($action=="register"){
            $data['content']="Sucessfully Registered!";
            $data['verify']="Please check your email to complete the verification";
        }
        $this->view('otp',$data);
    }
  
}