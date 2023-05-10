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
        $course_week = new CourseWeek();
        $staff = new Staff();
        $course_instructor = new CourseInstructor();
        // $instructor_course = new InstructorCourse();
        $data = [];
        // echo $user_id;die;
        // $teacher_id = $teacher-> selectTeacher(['uid'=>$user_id]);
       
        if($action == 'add'){
   
            $data = [];
            $data['action'] = $action;
            $data['id'] = $id; 
        
            $data['errors']=[];

            $data['subjects'] = $subject->getSubject();
            $data['grades'] = $subject->getGrade();
            $data['teachers'] = $staff->getTeachers();
            // show($data['teachers']);die;
            $data['instructors'] = $staff->getInstructors();
            // show($data['instructors']);die;

            // echo "check 1";die;
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {   
                // echo "check 1";die;
                // show($_POST);die;
                if($course -> validate($_POST)){
                    $subject_id = uniqid();
                    //uniqueid("S",true)

                    // show($_POST);die;

                    $_POST['subject_id']=$subject_id;
                    $subject->insert($_POST);

                    // show($_POST);die;

                    // $subject_details = $subject->getSubjectId($_POST['subject'],$_POST['grade'],$_POST['language_medium']);

                    // $_POST['subject_id'] = $subject_details[0]->subject_id;
                    // print_r ($subject_id);die;
                    $course->insert($_POST);

                    // show($subject_id);die;
                    $id= $course->getLastCourse()[0]->course_id;
                    // // // print_r($Course);die;
                    $course_week->createWeek($id, 1);
                    header("Location:http://localhost/Interlearn/public/receptionist/course");

                }
                else{
                    $data['errors'] =  $course->error;

                    // $data['error']['invalid'] = "There is an unknown error occured!";
                }
            }

            $this->view('receptionist/addCourse',$data);
            exit;   
        }

        if($action == 'findGrade'){

            // echo $_POST['subject'];

            $result = $subject -> getSubjectGrades($_POST['subject']);
            echo json_encode($result);
            die;

            // header('Content-type: application/json');
            // echo json_encode($result2);
            // exit;
        }

        if($action == 'findMedium'){
            // echo $_POST['subject'],$_POST['grade'];die;
            $result = $subject -> getSubjectGradeMediums($_POST['subject'], $_POST['grade']);
            echo json_encode($result);
            die;
        }

        if($action == 'available'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $course -> getTime($_POST['teacher_id'], $_POST['day']);
                // show($result);die;
                echo json_encode($result);
                die;
            }
            exit;

        }

        if($action == 'view')
        {
            if(isset($_POST['save-btn']))
            {
                $inputs=array("subject_id"=>$_GET['id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto']);
                //show($inputs);die;
                $course->insert($inputs);
                //show($_POST);die;
            }
            if(isset($_POST['save-btn2']))
            {
                // $inputs=array("subject_id"=>$_GET['id'],"instructor_id"=>$_POST['instructor_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto']);
                $inputs=array("course_id"=>$_GET['id'],"instructor_id"=>$_POST['instructor_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto']);
                $course_instructor->insert($inputs);
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
                        // $allSubjects = $subject -> where(['subject_id'=>$subject_id],'subject_id');
                        $subjectGrade = $subject -> getSubjectGrade($subject_id);
                        // show($subjectGrade->subject_id);die;
                        $subjectName = $subjectGrade[0]->subject;
                        $grade = $subjectGrade[0]->grade;
                        //  echo $subjectName;
                        //  echo $grade;die;
                        $data['mediums'] = $subject -> getMedium($subjectName,$grade);
                        //   show($data['mediums']);die;
                         
                        //show($data['subjectgrd']);die;
                                // show($allSubjects);die;
                               
                    $medium = "Sinhala";
                    
                    //  $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                    $data['subjects'] = [];
                    $a = [];
                    for($i=0; $i<count($data['mediums']);$i++){
                        $subjectDetails = $subject -> selectTeachers(['subject_id'=>$data['mediums'][$i]->subject_id],$data['mediums'][$i]->language_medium);
                        // $data['subjects'] = $subject -> selectTeachers(['subject_id'=>$data['mediums'][$i]->subject_id],$data['mediums'][$i]->language_medium);
                        array_push($a,$subjectDetails);
                        // show($allTeachers);

                    }
                    $data['subjects'] = $a;
                    // show($data['subjects']);die;
                    // $data['subjects'] = $subjectDetails=$subject -> selectTeachers(['subject_id'=>$data['mediums']->subject_id],$data['mediums']->language_medium);
                    
                    $data['sinhalaid'] = $subject->getSubjectId($subjectName,$grade,"Sinhala");
                    $data['englishid'] = $subject->getSubjectId($subjectName,$grade,"English");
                    $data['tamilid'] = $subject->getSubjectId($subjectName,$grade,"Tamil");
                    // show($data['subjects']);die;

                    $data['teach_instructors'] = [];
                    $extra = [];
                    if($data['subjects']){
                        for($i=0; $i<count($data['subjects']); $i++){
                            for($x=0; $x<count($data['subjects'][$i]); $x++){
                                // show($data['subjects'][$i][$x]->course_id);die;
                                if(!empty($data['subjects'][$i][$x]->course_id)){
                                    // show($data['subjects'][$i][$x]->course_id);die;
                                    $extra= $course_instructor -> getInstructors($data['subjects'][$i][$x]->course_id);
                                    if(!empty($extra)){
                                        // show($extra);die;
                                        $data['teach_instructors'][$data['subjects'][$i][$x]->course_id] = $extra;
                                    }
                                }
                            }
                        }
                    // show($data['teach_instructors']);die;
                    // show($data['subjects']);die;
                
                        
                    }


                    // if(empty($subjectDetails)){
                    //     $subject -> delete(['subject_id'=>$subject_id ]);
                    //     header("Location:http://localhost/Interlearn/public/receptionist/course");
                    // }
                    // show($data['teach_instructors']);
                    // //  
                    // die;
                    // }
                }
                $data['teachers'] = $staff->getTeachers();
                // show($data['teachers']);die;
                $data['instructors'] = $staff->getInstructors();
                // show($data['instructors']);die;

                // show($_POST['course_id']);die;
                // $data['availinstructors'] = $staff -> getAvailableInstructors($_POST['course_id']);
                // show($data['availinstructors']);die;

                if(isset($_POST['add-teacher'])){
                    $inputs=array("subject_id"=>$_GET['id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto'],"capacity"=>$_POST['capacity']);
                    //show($inputs);die;
                    $course->insert($inputs);
                    //show($_POST);die;
                }

                if(isset($_POST['add-instructor'])){
                    $inputs1=array("course_id"=>$_POST['course_id'],"emp_id"=>$_POST['emp_id']);
                    // show($inputs1);die;
                    $course_instructor->insert($inputs1);
                }

                if(isset($_POST['edit-teacher'])){
                    $course_id = $_POST['course_id'];
                    $day = $_POST['day'];
                    $timefrom = $_POST['timefrom'];
                    $timeto = $_POST['timeto'];
                    // show($course_id);
                    // show($day);
                    // show($timefrom);
                    // show($timeto);die;
                    $course -> updateCourse($course_id, $day, $timefrom, $timeto);
                }

                if(isset($_POST['submit-delete-course'])){
                    // show("hi");die;
                    $result = $course->delete(['course_id'=>$id]);
                    // header("Location:http://localhost/Interlearn/public/receptionist/course/view/1/".$id);
                }

                if(isset($_POST['submit-remove-instructor'])){
                    // show($_POST);die;
                    // show($_POST['instructorID']);die;
                    // show(['course_id'=>$_POST['courseID']]);die;
                    // show($_POST['courseID']);die;
                    $instructor_id = $_POST['instructorID'];
                    $course_id = $_POST['courseID'];
                    $input1 = array('course_id'=>$course_id,'emp_id'=>$instructor_id);
                    // show($input1);die;
                    $result2 = $course_instructor->deleteInstructors($course_id,$instructor_id);
                }

                $this->view('receptionist/class',$data);
                exit;
        }

        if($action == 'checkAvailable'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $course -> getTime($_POST['teacher_id'], $_POST['day']);
                show($result);die;
                echo json_encode($result);
                die;
            }
            exit;
        }

        if($action == 'checkAvailableInstructors'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $staff -> getAvailableInstructors($_POST['course_id']);
                // show($result);die;
                echo json_encode($result);
                die;
            }
            exit;
        }




        if($action == 'delete'){



                $result = $course->delete(['course_id'=>$id]);

                //header("Location:http://localhost/Interlearn/public/receptionist/course");


            exit;
        }
        //     // $data = [];
        //     // $data['action'] = $action;
        //     // $data['id'] = $id;
            
        //     $this->view('receptionist/class',$data);
        // }
       
        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
        //   show($data['sums']);die;
       
           
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

    public function changePW(){
        
        $data = json_decode(file_get_contents("php://input"), true);
        $data ['uid']= Auth::getUID();
        
        $data['newPW'] = password_hash($data['newPW'], PASSWORD_DEFAULT);

        $user = new User();
        $staff = new Staff();

        if($user->checkPW($data)){
            $staff->updatePassword($data);
            echo json_encode(['status'=>'success']);
        }else{
            echo json_encode(['status'=>'error']);
        }


    }

    
    public function editUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $data['uid'] = $id ?? Auth::getUID();
        if(isset($_FILES['uploadDP']['name']) && $_FILES['uploadDP']['error'] === UPLOAD_ERR_OK && $_FILES['uploadDP']['tmp_name'] !== '' && $_FILES['uploadDP']['size'] > 0){
        // if(isset($_FILES['uploadDP']['name']) && !empty($_FILES['uploadDP']['name'])){
            $pic_tmp = $_FILES['uploadDP']["tmp_name"];
            $pic_name = $_FILES['uploadDP']["name"];
            $error= $_FILES['uploadDP']['error'];
    
            if($error === 0){
                $img_ext = pathinfo($pic_name, PATHINFO_EXTENSION);
                $img_final_ext = strtolower($img_ext);
                $allowed_ext = array('jpg','png','jpeg');
    
                if(in_array($img_final_ext, $allowed_ext)){
                    $img_size = $_FILES['uploadDP']['size'];
                    $max_size = 5 * 1024 * 1024; // 5 MB
    
                    if($img_size <= $max_size){
                        $img_info = getimagesize($pic_tmp);
    
                        if($img_info !== false){
                            $mime_type = $img_info['mime'];
    
                            if(in_array($mime_type, array('image/jpeg', 'image/png', 'image/gif'))){
                                $new_image_name = time() . '_' . uniqid('', true) . '.' . $img_final_ext;
                                $destination = "uploads/images/" . $new_image_name;
    
                                if(move_uploaded_file($pic_tmp, $destination)){
                                    $data['pic'] = $new_image_name;
                                    $response = array('status' => 'success', 'message' => 'Image uploaded successfully');
                                } else {
                                    $response = array('status' => 'error', 'message' => 'Failed to save image file');
                                }
                            } else {
                                $response = array('status' => 'error', 'message' => 'Invalid image type');
                            }
                        } else {
                            $response = array('status' => 'error', 'message' => 'Failed to read image file');
                        }
                    } else {
                        $response = array('status' => 'error', 'message' => 'Image file size exceeds limit (5 MB)');
                    }
                } else {
                    $response = array('status' => 'error', 'message' => 'Invalid file type (only JPG, PNG, and GIF are allowed)');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to upload image file');
            }
        } else {
            $response = array('status' => 'success', 'message' => 'No image file to upload');
        }
    
        $changeProfile = new Staff();
        $changeProfile->editProfile($data);
    
        echo json_encode($response);
        exit;
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
        $staff = new Staff();
        $orderby='course_id';
        $data['id'] = $aid;
        $result1 = $subject->selectCourse([]);
        $data['courses']=$result1;
        $data['errors']=[];

        //show($data['courses']);die;

        if($action == 'add'){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($announcement -> validate($_POST)){
                    $user_id = Auth::getuid();
                    $details = $staff -> ProfileDetails($user_id);
                    // show($details[0]->emp_id);die;
                    $emp_id = $details[0]->emp_id;
                    $announcement_id = uniqid();
                    $_POST['aid'] = $announcement_id;
                    $_POST['empID'] = $emp_id;
                    $_POST['role'] = "Receptionist";


                    $file = $_FILES['attachment'];

                    $fileName = $_FILES['attachment']['name'];
                    $fileTmpName = $_FILES['attachment']['tmp_name'];
                    $fileSize = $_FILES['attachment']['size'];
                    $fileError = $_FILES['attachment']['error'];
                    $fileType = $_FILES['attachment']['type'];
                    $fileExt = explode('.',$fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed1 = array('jpg','jpeg','png', 'pdf','zip','txt','sql','docx','xml','doc','ppt', 'mp3','mp4','php','html','css','js');
                    if(in_array($fileActualExt, $allowed1))
                    {
                        // print_r($_FILES['file']);exit;
                        if($fileError === 0)
                        {
                            if($fileSize < 1000000000)
                            {
                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                $fileDestination = "/xampp/htdocs/Interlearn/uploads/receptionist/announcements/".$announcement_id;
                                if (!is_dir($fileDestination)){
                                    // print_r("test1");
                                    mkdir($fileDestination,0644, true);
                                    // print_r("test2");die;

                                }
                                $destination =  $fileDestination."/".$fileNameNew;
                                move_uploaded_file($fileTmpName,$destination);
                                //echo $fileActualExt;exit;
                                //var_dump($_POST);exit;
                                //print_r($fileType);exit;
                                $viewURL="http://localhost/Interlearn/uploads/receptionist/announcements/".$announcement_id."/".$fileNameNew;
                                $_POST['file_name'] = $fileNameNew;
                                $_POST['attachment'] = $viewURL;
                                $result1 = $announcement->insert($_POST);
                            }else{
                                echo "Image is too large!";
                            }
                        }else{
                            echo "There was an error uploading image!";
                        }
                    }else{
                        echo "You cannot upload this file!";
                    }


                    $result = $announcement->insert($_POST);
                    echo "Announcement successfully published!";
                    //show($_POST);die;
                    header("Location:http://localhost/Interlearn/public/receptionist/announcement");
                }
                else{
                    $data['errors'] = $announcement -> error;
                }


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


        $data['announcements'] = $announcement->allRecepAnnouncements([]);
        // show($data['announcements']);die;
        $time = [];
        if(!empty($data['announcements'])){
            for($i=0; $i<count($data['announcements']); $i++){
                // show($data['announcements'][$i]->date_time);
                $isEditable = $announcement->isAnnEditable($data['announcements'][$i]->date_time);
                // show($isEditable);
                array_push($time,$isEditable);
            }
        }
        // die;
        $data['editable'] = $time;
        // show($data['editable']);die;


        if(isset($_POST['submit-delete-announcement'])){
            $result = $announcement -> delete(['aid'=>$aid]);
        }

        $this->view('receptionist/announcement',$data);
        // private function isCourseEditable($createdAt) {
        //     $expiryTime = strtotime($createdAt) + 60 * 60; // expiry time is 1 hour after creation
        //     $currentTime = time();
        //     return ($currentTime < $expiryTime);
        // }

    }

    public function enrollment($action=null){
        if(!Auth::is_receptionist()){
            redirect('home');

        }
        $user_id = Auth::getUid();
        // show($user_id);die;

        $course = new Course();
        $subject = new Subject();
        $student = new Students();
        $student_course = new StudentCourse();
        $enroll_req = new RequestEnroll();


        $data['requests'] = $enroll_req -> showRequests();
        // show($data['requests']);die;
        // show($data['Allrequests'][0]);die;
        // print_r($_POST);die;
        // $req = [];
        // for($i=0;$i<count($data['requests']);$i++){
        //     // show($data['requests'][$i]->request_id);
        //     $requestDetails = $enroll_req -> showRequestsDetails($data['requests'][$i]->request_id);
        //     array_push($req,$requestDetails[0]);
        // }
        // die;
        // $data['requestDetails'] = $req;
        // show($data['requestDetails']);die;

        if($action == 'getRequestDetails'){
            // echo $_POST['request_id'];die;
            $result = $enroll_req -> showRequestsDetails($_POST['request_id']);
            echo json_encode($result);
            die;
        }

        if(isset($_POST['accept-student']))
        {
            // show($_POST['studentId']);
            // show($_POST['courseId']);die;
            $data = ['student_id'=>$_POST['studentId'],'course_id'=>$_POST['courseId']];
            $result = $student_course -> insert($data);
            $data2 = ['request_id'=>$_POST['requestID']];
            $result2 = $enroll_req -> delete($data2);
            echo "Student added successfully!";
            header("Location:http://localhost/Interlearn/public/receptionist/enrollment");
        }

        if(isset($_POST['submit-reject-request']))
        {
            $data = ['request_id'=>$_POST['requestID']];
            $result = $enroll_req -> delete($data);
            echo "Request rejected!";
            header("Location:http://localhost/Interlearn/public/receptionist/enrollment");
        }


        // $data['id'] = $aid;

        $this->view('receptionist/enrollment',$data);
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
            $user_id = Auth::getUid();
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
                        $updateStatus= $enquiry->update(['eid'=>$eid],['status'=>'inprogress']);
                        }
                        //I think we don't need this not sure tho if you want then uncomment it
                    //    $replied = $reply -> update(['repId'=>$reParent],['status'=>'replied']);
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
            if(isset($_GET['id'])&&isset($_GET['status'])){
            
                $id=$_GET['id'];
                $value = $_GET['status'];
            
                $status = $enquiry -> update(['eid'=>$id],['status'=>$value]);
            
            }

            $data['rows']  = $enquiry->select(null, $orderby);
                
            $this->view('receptionist/enquiry',$data);
        }

    public function profile()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }
        $currentUserID = $id ?? Auth::getUID();

        $staffData = new Staff();
        $staff_data = $staffData->ProfileDetails($currentUserID);

        

        if (!$staff_data) {
            // handle error here
            redirect('home');
        }

        $ProfileData['userData'] = $staff_data;
        // $data['userData2'] = $user_data2;

        $this->view('staff/user', $ProfileData);
    }

    // public function user()
    // {
    //     if (!Auth::is_receptionist()) {
    //         redirect('home');
    //     }
    //     $currentUsetID = $id ?? Auth::getUID();

    //     $staffData = new Staff();
    //     $User_data = $staffData->getUserDetails($currentUsetID);

    //     $data['userData']=$User_data;


    //     $this->view('receptionist/user',  $data);
 
    
    
    public function payments()
    {

        if (!Auth::is_receptionist()) {
            redirect('home');
        }



        if(date("d") == "01"){
            addNewPendingPayments();
        }


        $payment_model = new Payment();
        $payment_history = $payment_model->getAll();

        $callBPdata = new BankPayment();
        $BankPaymentData = $callBPdata->validateBankPayment();


        $this->view('receptionist/receptionist-payments',  ['bankPayments' => $BankPaymentData, 'transactions' => $payment_history]);
    }

    public function addNewPendingPayments(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }
        $currentMonth = date('m');
        $months = array(
            "01" => "January",
            "02" => "February",
            "03" => "March",
            "04" => "April",
            "05" => "May",
            "06" => "June",
            "07" => "July",
            "08" => "August",
            "09" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        );

        $month = $months[$currentMonth];
        $student = new StudentCourse();
        $student->getAll($month);

        exit;
    }


    public function nextCashPayment()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        // show($_POST);
        if (isset($_POST)) {
            $data = json_decode(file_get_contents("php://input"), true);

            $data['method'] =   'cash';
            $data['payment_status'] = '1';

            $payment_model = new Payment();
            $respond = $payment_model->submitCashPayment($data);
        }
        echo json_encode($respond);
        exit;
    }
    public function approveBP(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $currentMonth = date('m');
        $months = array(
            "01" => "January",
            "02" => "February",
            "03" => "March",
            "04" => "April",
            "05" => "May",
            "06" => "June",
            "07" => "July",
            "08" => "August",
            "09" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        );

        $data['month' ]= $months[$currentMonth];
             $data['payment_status'] = '1';
             $data['method'] = 'bank deposit';	
             

            $approveBP = new Payment();
            $return = $approveBP->approveBP($data);

            if($return == "Apple"){
                $removefromBankPayment = new BankPayment();
                $respond = $removefromBankPayment->removefromBankPayment($data['BankPaymentID']);
            }

            // $removefromBankPayment = new BankPayment();
            // $respond = $removefromBankPayment->removefromBankPayment($data['BankPaymentID']);

        
        echo json_encode($respond);
    }

    public function declineBP(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $data = json_decode(file_get_contents("php://input"), true);

        
             $data['method'] = 'bank deposit';	

            $removefromBankPayment = new BankPayment();
            $respond = $removefromBankPayment->declined($data['BankPaymentID']);

        
        echo json_encode($respond);
    }


    public function getPaymentData()
    {
        $payment = new Payment();
        $data = $payment->getAll();
        return $data;
    }

    public function callEachBPdata()
    {
        $data = json_decode(file_get_contents("php://input"), true);
    
        $getEachBPdata = new BankPayment();
        $BankPaymentData = $getEachBPdata->getEachBPdata($data['bankPaymentID']);
    
        header('Content-Type: application/json'); // set the content type to JSON
        echo json_encode($BankPaymentData);
    }

    public function callBankPaymentData()
    {

        $callBPdata = new BankPayment();
        $BankPaymentData = $callBPdata->validateBankPayment();
        return $BankPaymentData;
    }

    public function getStudentName()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $studentId = $data['StudentID'];

        $sql = "SELECT * FROM student WHERE studentID = '$studentId'";
        $model = new Model();
        $res = $model->query($sql);

        echo json_encode($res);
        exit;
    }

    public function getMonthlyFee()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $courseId = $data['CourseID'];
        $studentID = $data['StudentID'];
        $month = $data['Month'];

        
        $monthlyFee = new Course();
        $respond1 = $monthlyFee->getMonthlyFee($courseId);



        if(is_array($respond1) && $respond1[0]['course_id'] == $courseId){
            
            $studentFtCourse = new Course();
            $respond2 = $studentFtCourse->checkStudent($courseId, $studentID);


            if (is_array($respond2) &&$respond2[0]['student_id'] == $studentID) {
                $alreadyPaid = new Payment();
                $respond3 = $alreadyPaid->checkAlreadyPaid($courseId, $studentID, $month);
            
                if ($respond3[0]['course_id'] == 'alreadyPaid') {
                    echo json_encode($respond3);
                    exit;
                } else {
                    echo json_encode($respond1);
                    exit;
                }
            } else {
                $respond = array(array("course_id" => "notRegistered"));
                echo json_encode($respond);
                exit;
            }
            

            
        }
        else{
            $respond = array(array("course_id" => "noCourse"));
            echo json_encode($respond);
            exit;
        }
        
    }

    public function registration($action = null,$id = null)
    {
     $data = [];
     $tempStudent = new Tempstudent();
     $data['rows'] = $tempStudent -> select(null,'date');
     if($action == "view"){
        $data['student'] = $tempStudent -> jointempstudents(['studentID'=>$id],'date');
        
        $this->view('receptionist/Registrations_view',$data);
        exit;
        
     }
     if($action == "delete"){
        $result = $tempStudent -> delete(['studentID'=>$id]);
     }
     $this->view('receptionist/Registrations',$data);
    }

    public function updatestatus($id)
    {
        $tempStudent = new Tempstudent();
        $tempStudentcourse = new TempStudentCourse();
        $student= new Students();
        $studentcourse= new StudentCourse();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {   
            $tempStudent->update(["studentID"=>$id],["status"=>$_POST['status']]);

            if($_POST['status'] == "accept"){
                $details =  $tempStudent->first(["studentID"=>$id],'studentID');
                $student_details = json_decode(json_encode($details), true);
                $result = $student->insert($student_details);
            
                if($result){
                    echo "success";
                    $courses=  $tempStudentcourse->where(["studentID"=>$id],'studentID');
              
                    foreach($courses as $row){
                        $post['student_id'] = $row->studentID;
                        $post['course_id'] = $row->course_id;
                        $result2 =   $studentcourse->insert($post);
                    }
                  
                }
                
                $deleteresult= $tempStudent -> delete(['studentID'=>$id]);
            }
            
        }
    }
    
}

