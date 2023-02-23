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
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if(isset($_POST['subject']))
                {
                    $subject_id = uniqid();
                    $_POST['subject_id']=$subject_id;
                    $subject->insert($_POST);
                }  
                // $_POST['subject_id']='1';
                $course->insert($_POST);
                    // show ($course);die;
                    // $row = $course->first(['$teacher_id'=>$teacher_id]);
                    // $sum = $subject->first(['subject_id'=>$subject_id],'subject_id');

                    // message("Your course was successfully created.");
                    // if($row){
                    //     redirect('receptionist/course/edit/'.$row->id);
                    // }else{
                    //     redirect('receptionist/course');
                    // }  
            }
            $this->view('receptionist/addCourse',$data);

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

            
           
        }

        if($action == 'view')
        {
                $data = [];
                $data['action'] = $action;
                $data['id'] = $id;
                //show($data['id']);die;

                //if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                        $data['subject_id'] = $subject_id;
                    }
    
                    $medium = "Sinhala";
                    if($id==1){
                        $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
                        show($data['subjects']);die;
                        
                    }
                    if($id==2){
                        $medium = "English";
                        $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
                    }
                    if($id==3){
                        $medium = "Tamil";
                        $data['subjects']=$subject->selectTeachers([],$medium,$subject_id);
                        show($data['subjects']);die;
                    //}
                }

                $this->view('receptionist/class',$data);
        }
       
        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
         //show($data['sums']);die;
       
           
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

    // public function addCourse($action = null, $id = null)
    // { 
    //     if(!Auth::is_receptionist()){
    //         redirect('home');
           
    //     }
    //     $user_id = Auth::getuid();
    //     $course = new Course();
    //     $teacher = new Teacher();
    //     $data = [];
    //     $data['action'] = $action;
    //     $data['id'] = $id; 

    //     if($action == 'add'){
            
    //         $day = new Day();

    //         // $data['days'] = $day->findAll('asc');
    //         $data['teachers'] = $teacher->findAll('asc');
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             if($course->validate($_POST)){
                    
    //                 $_POST['date'] = date("H:i:s");
    //                 $_POST['teacher_id'] = $teacher_id;

    //                 $course->insert($_POST);
    //                 $row = $course->first(['$teacher_id'=>$teacher_id]);

    //                 message("Your course was successfully created.");
    //                 if($row){
    //                     redirect('receptionist/course/edit/'.$row->id);
    //                 }else{
    //                     redirect('receptionist/course');
    //                 }
    //             }

    //             $data['error'] = $course->error;
    //         }
    //     }
        
    //     $this->view('receptionist/addCourse',$data);
    // }
    public function announcement($action=null)
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        $course = new Course();
        $subject = new Subject();
        $teacher = new Teacher();
        $announcement = new Announcement();
        $orderby='course_id';
        $result1 = $subject->selectCourse([]);
        $data['courses']=$result1;
        //show($data['courses']);die;

        if($action == 'add'){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //$announcement = new Announcement();
                $result = $announcement->insert($_POST);
            }
            $this->view('receptionist/addAnnouncement',$data);
        }

        $data['announcements'] = $subject->allAnnouncements([]);
         show($data['announcements']);die;
        $this->view('receptionist/announcement',$data);
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