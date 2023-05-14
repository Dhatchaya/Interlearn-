<?php
/**
 *Register class
 */
class Register extends Controller
{
    public function index($action=null,$extra=null)
    {  
        $data['errors'] = [];
        $data['details']=[];
        $user = new User();
        $student = new Tempstudent();
        $tempStudentcourse = new TempStudentCourse();
         if($action == "view"){
            if($_SERVER['REQUEST_METHOD'] == "POST"){

                $_POST['studentID'] = $student_id =   $student->generateUniqid();
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
                    $_POST['uid'] = $uid = uniqid();
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

                   
                   
                    }
                    if(empty($data['errors'])){
                    
                        if($user->insert($_POST)){
                            
                            if($student->insert($_POST)){
                                $verify = $user -> sendemail([
                                    'email' => $email,
                                    'user_activation_code'=>$user_activation_code,
                                    'user_otp'=>$user_otp
                                ]);
                                echo json_encode(['url' => $verify,'status' => "success","studentID"=>$_POST['studentID']]);
                

                            }
                        
                    
                        } 
                    }
                    else{
                        echo json_encode(['errors'=>$data['errors']]);
                    }
            
                
                
                }
                else{
                    $data['errors']=$user->error;
                    echo json_encode(['errors'=>$data['errors']]);
                }
           
        
             }
  
             exit;
        }
   
 
       
    
        
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
    public function getsubjects($grade,$language){
      $subject = new SubjectCourseStaff();
      $subjects = $subject -> where(["grade"=>$grade,"language_medium" => $language],"grade");
      header("Content-Type: application/json");
      echo json_encode( $subjects);
      exit;
      
    }
    public function course(){
        $tempStudentcourse = new TempStudentCourse();
            //  show($_POST);die;
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                // show($_POST);die;
                if(isset($_GET['stuid'])){
                    $studentID = $_GET['stuid'];
                
              
                foreach ($_POST['course_id'] as $courseId) {
                    $_POST['studentID']=$studentID;
                    $_POST['course_id'] = $courseId;
                    // show($_POST);die;
                    $result = $tempStudentcourse->insert($_POST);
                }
                if($result){
                    echo "sucess";
                }
                else{
                    echo "failed";
                }
            }
            else{
                echo "student ID not set";
            }
            }
        
    }
}