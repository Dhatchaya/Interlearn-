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
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET['code'])){
            $row = $user -> first([
                'User_activation_code' => $_GET['code'],
                'User_otp'=>$_POST['otp']
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
                    "User_activation_code" => $User_activation_code
                   
                    ]
                    );
                    if($status){
                        header("Location:../public/student");
                    }
                }
            
            else{
                echo "unknown error has occured";die;
            }
          
        }
        
    }

}