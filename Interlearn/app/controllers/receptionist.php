<?php
/**
 *Receptionist  class
 */
class Receptionist extends Controller
{
    public function index()
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        $this->view('receptionist/home');
    }
    
    public function course($action = null, $id = null)
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        $user_id = Auth::getuid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $data = [];
        // echo $user_id;die;
        // $teacher_id = $teacher-> selectTeacher(['uid'=>$user_id]);
       
        if($action == 'add'){
   
            $data = [];
            $data['action'] = $action;
            $data['id'] = $id; 

            // $data['days'] = $day->findAll('asc');
            $data['teachers'] = $teacher->select([],'teacher_id','asc');
            //show($data['teachers']);die;
            $data['instructors'] = $instructor->select([],'instructor_id','asc');
            //show($data['instructors']);die;

            // if(isset($_REQUEST['courseSubmitBtn']))
            //     {
            //         //checking for empty fields
            //         if(($_REQUEST['subject'] == "") || ($_REQUEST['description'] == "") || ($_REQUEST['language_medium'] == "") || ($_REQUEST['grade'] == "") || ($_REQUEST['teacher_id'] == "") || ($_REQUEST['day'] == "") || ($_REQUEST['timefrom'] == "") || ($_REQUEST['timeto'] == "") ||($_REQUEST['uploadimg'] == ""))
            //         {
            //             $msg = '<div class="alert">Fill all the fields!</div>';
            //         }
            //     }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// var_dump($_POST);
// exit;
                if(($_POST['subject'] == "") || ($_POST['description'] == "") || ($_POST['language_medium'] == "") || ($_POST['grade'] == "") || ($_POST['teacher_id'] == "") || ($_POST['day'] == "") || ($_POST['timefrom'] == "") || ($_POST['timeto'] == "") ||($_POST['uploadimg'] == ""))
                {
                    $msg = '<div class="alert">Fill all the fields!</div>';
                }else{
                    $subject = $_REQUEST['subject'];
                    $description = $_REQUEST['description'] ;
                    $language_medium = $_REQUEST['language_medium'] ;
                    $grade = $_REQUEST['grade'];
                    $teacher_id = $_REQUEST['teacher_id'];
                    $day = $_REQUEST['day'];
                    $timefrom = $_REQUEST['timefrom'];
                    $timeto = $_REQUEST['timeto'];
                    $uploadimg = $_FILES['uploadimg']['name'];
                }

                if (isset($_POST["submit"])) 
                {
                    $target_dir = "uploads/images/";
                    $target_file = $target_dir . basename($_FILES["uploadimg"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["uploadimg"]["tmp_name"]);
                    if($check !== false) {
                      // Check file size
                      if ($_FILES["uploadimg"]["size"] > 500000) {
                        echo "Sorry, your file is too large.";
                      } else {
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        } else {
                          // Upload file
                          if (move_uploaded_file($_FILES["uploadimg"]["tmp_name"], $target_file)) {
                            // var_dump($_FILES);die;
                            // $course->insert($_FILES["uploadimg"]["name"]);
                            echo "The file ". htmlspecialchars( basename( $_FILES["uploadimg"]["name"])). " has been uploaded.";

                          }else {
                            echo "Sorry, there was an error uploading your file.";
                          }
                        }
                      }
                    } else {
                      echo "File is not an image.";
                    }
                }

                

                if(isset($_POST['subject']))
                {
                    $subject_id = uniqid();
                    $_POST['subject_id']=$subject_id;
                    $result = $subject->insert($_POST);
                }  
                // $_POST['subject_id']='1';
                $result2 = $course->insert($_POST);
                    // show ($course);die;
                    // $row = $course->first(['$teacher_id'=>$teacher_id]);
                    // $sum = $subject->first(['subject_id'=>$subject_id],'subject_id');

                    // message("Your course was successfully created.");
                    // if($row){
                    //     redirect('receptionist/course/edit/'.$row->id);
                    // }else{
                    //     redirect('receptionist/course');
                    // }  

                    if($result == TRUE && $result2 == TRUE){
                        $msg = '<div class="alert">Course added successfully!</div>';
                    }else{
                        $msg = '<div class="alert">Unable to add course!</div>';
                    }
            }
            $this->view('receptionist/addCourse',$data);
            exit;

            // if(isset($_FILES['uploadimg']['name']) AND !empty($_FILES['uploadimg']['name'])){
            //     $pic_tmp = $_FILES['uploadimg']["tmp_name"];
            //     $pic_name = $_FILES['uploadimg']["name"];
            //     $error= $_FILES['uploadimg']['error'];
            
            //     if($error === 0){
            //         $img_ext = pathinfo($pic_name,PATHINFO_EXTENSION);
            //         $img_final_ext = strtolower($img_ext);
            
            //         $allowed_ext = array('jpg','png','jpeg');
            //         if(in_array($img_final_ext,$allowed_ext)){
            //             $new_image_name = uniqid($_POST['username'],true).'.'.$img_final_ext;
            //             $destination = "uploads/images/". $new_image_name;
            //           // echo $destination;die;
            //             move_uploaded_file($pic_tmp,$destination);
            //             $_POST['display_picture'] = $new_image_name ;
            //         }
            //         else{
            //             $data['errors']['uploadimg']='you cannot upload this type of file';
            //         }
            //     }
            //     else{
            //         $data['errors']['uploadimg'] ="unknown error occured";
            //     }
            // }

            

            
           
        }

        if($action == 'view')
        {
            if(isset($_POST['save-btn']))
            {
                $inputs=array("subject_id"=>$_GET['id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto']);
                $course->insert($inputs);
            }
            if(isset($_POST['save-btn2']))
            {
                $inputs=array("subject_id"=>$_GET['id'],"instructor_id"=>$_POST['instructor_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto']);
                $course->insert($inputs);
            }
            
                $data = [];
                $data['action'] = $action;
                $data['id'] = $id;
                $subject = new Subject();
                //show($data['id']);die;

                //if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                        $data['subject_id'] = $subject_id;
                        $allSubjects = $subject -> where(['subject_id'=>$subject_id],'subject_id');
                        $data['subjectgrd'] = $allSubjects;
                        //show($data['subjectgrd']);die;
                                 //show($allSubjects);die;
                    $medium = "Sinhala";
                    
                    $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                    if($id==1){
                        $medium = "Sinhala";
                        $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                        
                        //show($data['subjects']);die;
                        
                    }
                    if($id==2){
                        $medium = "English";
                        $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                    }
                    if($id==3){
                        $medium = "Tamil";
                        $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                     
                        
                        //show($data['subjects']);die;
                    
                    }
                }
                $data['teachers'] = $teacher->select([],'teacher_id','asc');
                $data['instructors'] = $instructor->select([],'instructor_id','asc');

                $this->view('receptionist/class',$data);
                exit;
        }

        // if($action == 'edit'){
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $announcement_id = uniqid();
        //         $_POST['aid'] = $announcement_id;
        //         //show($_POST);die;
        //         //$announcement = new Announcement();
        //         // $result = $announcement->insert($_POST);
        //         // $result2 = $ann_course->insert($_POST);
        //         echo "Announcement successfully published!";
        //         //show($_POST);die;
                
        //     }
        //     $this->view('receptionist/class',$data);
        // }

        if($action == 'delete'){
            $result = $course->delete(['course_id'=>$id]);
            header("Location:http://localhost/Interlearn/public/receptionist/course");
            $this->view('receptionist/class',$data);
        }
       
        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
        //  show($data['sums']);die;
       
           
         $this->view('receptionist/course',$data);
    }

    public function class($action=null, $id = null)
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        // if(isset($_GET['id'])){
        //     $subject_id = $_GET['id'];
        // }
        // $data = [];
        // $teacher = new Teacher();
        // $subject = new Subject();
        // $course = new Course();
        // $instructor = new Instructor();
        // $medium = "Sinhala";
        // // if($id==1){
        //     $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
        //     show($data['subjects']);die;
        // //}
        // if($id==2){
        //     $medium = "English";
        //     $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
            
        // }
        // if($id==3){
        //     $medium = "Tamil";
        //     $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
        // }
        

        // $data['teachers'] = $teacher->select([],'teacher_id','asc');
        // $data['instructor'] = $instructor->select([],'instructor_id','asc');
        //$this->view('receptionist/class',$data);
    }

  
    public function announcement($action=null,$aid=null)
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        

            


        $course = new Course();
        $subject = new Subject();
        $teacher = new Teacher();
        $announcement = new Announcement();
        $ann_course = new AnnouncementCourse();
        $orderby='course_id';
        $data['id'] = $aid;
        $result1 = $subject->selectCourse([]);
        $data['courses']=$result1;
      
        //show($data['courses']);die;

        if($action == 'add'){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $announcement_id = uniqid();
                $_POST['aid'] = $announcement_id;
                //show($_POST);die;
                //$announcement = new Announcement();
                $result = $announcement->insert($_POST);
                $result2 = $ann_course->insert($_POST);
                echo "Announcement successfully published!";
                //show($_POST);die;
                
            }
            $this->view('receptionist/addAnnouncement',$data);
        }

        if($action == 'update'){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $announcement_id = uniqid();
                $_POST['aid'] = $announcement_id;
                //show($_POST);die;
                //$announcement = new Announcement();
                $result = $announcement->insert($_POST);
                $result2 = $ann_course->insert($_POST);
                echo "Announcement successfully published!";
                //show($_POST);die;
                
            }

            

            $this->view('receptionist/addAnnouncement',$data);
        }

        if($action == 'delete'){
            $result = $announcement->delete(['aid'=>$aid]);
            header("Location:http://localhost/Interlearn/public/receptionist/announcement");
            $this->view('receptionist/addAnnouncement',$data);
        }
        

        $data['announcements'] = $subject->allAnnouncements([]);
         //show($data['announcements']);die;
          $isEditable = $announcement->isAnnEditable('time');
          $data['editable'] = $isEditable;

        $this->view('receptionist/announcement',$data);
        // private function isCourseEditable($createdAt) {
        //     $expiryTime = strtotime($createdAt) + 60 * 60; // expiry time is 1 hour after creation
        //     $currentTime = time();
        //     return ($currentTime < $expiryTime);
        // }

    }
    public function enquiry($action=null, $eid=null)
    {   $result = false;
        if(!Auth::logged_in())
		{
			message('please login');
			redirect('login/staff');
            exit;
		}
        if(!Auth::is_receptionist()){
            redirect('home');
           exit;
        }
        $user_id = Auth::getemp_id();
        $role = Auth::getrole();
        $enquiry = new Enquiry();
        $data = [];
		$data['action'] = $action;
		$data['id'] = $eid;
        $orderby = 'eid';
        $data['enquiry_title'] = 'New Enquiry';
        $data['some']=" ";
        $data['reply'] = "set";


        if($action == "edit"){
            $data['enquiry_title'] = 'Edit Enquiry '.$eid;
            $data['edit']=$edit=$enquiry->first([
                'eid'=>$eid
            ],'eid');
            $data['edit']->enquiry_title='Edit Enquiry ';
           
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    try {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$data) {
                        $error = json_last_error_msg();
                        throw new Exception($error);
                    }else{
                        $result = $enquiry->update(['eid'=>$eid], $data);
                        if (!$result) {
                        throw new Exception("Update failed");
                        }
                    }

                    } catch (Exception $e) {
                    $response = array("status" => "error", "message" => $e->getMessage());
                    header("Content-Type: application/json");
                    echo json_encode($response);
                    exit;
                    }
                    $response = array("status" => "success");
                    header("Content-Type: application/json");
                    echo json_encode($response);
                    exit;
            }
            else {
               
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($data['edit']);
                    exit;
                
            }
        }

        if($action == "delete"){
            $result = $enquiry->delete(['eid'=>$eid]);
            header("Location:http://localhost/Interlearn/public/receptionist/enquiry");
        }
        if($action == "view"){
            $reply = new Reply();
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_GET['rid'])){
                    $reParent = $_GET['rid'];
                }
                $_POST['eid']=$eid;
                $_POST['senderId']=$user_id;
                $_POST['receiverId']= $enq->user_Id;
                $_POST['reply_user']=$role;
                
           
                $result= $reply->insert($_POST);
             
                if($result){
                    if($enq->status == 'pending'){
                       $updateStatus= $enquiry->update(['eid'=>$eid],['status'=>'In progress']);
                    }
                   $replied = $reply -> update(['repId'=>$reParent],['status'=>'replied']);
                }
                else{
                    echo"fail";
                }

            }
            $data['reply'] = $reply -> where(['eid'=>$eid],'eid');
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            $data['enq']=$enq;
            $this->view('receptionist/enquiry_view',$data);
            exit;
           
        }
     

        $data['rows']  = $enquiry->select(null, $orderby);
            
        $this->view('receptionist/enquiry',$data);
    }
}