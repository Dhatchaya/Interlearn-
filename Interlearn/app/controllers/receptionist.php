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
        $course_instructor = new CourseInstructor();
        // $instructor_course = new InstructorCourse();
        $data = [];
        // echo $user_id;die;
        // $teacher_id = $teacher-> selectTeacher(['uid'=>$user_id]);
       
        if($action == 'add'){
   
            $data = [];
            $data['action'] = $action;
            $data['id'] = $id; 


            $data['subjects'] = $subject->getSubject();
            $data['grades'] = $subject->getGrade();
            $data['teachers'] = $teacher->select([],'teacher_id','asc');
            //show($data['teachers']);die;
            $data['instructors'] = $instructor->select([],'instructor_id','asc');
            //show($data['instructors']);die;
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
             {   
            //     if(($_POST['subject'] == "") || ($_POST['language_medium'] == "") || ($_POST['grade'] == "") || ($_POST['teacher_id'] == "") || ($_POST['day'] == "") || ($_POST['timefrom'] == "") || ($_POST['timeto'] == ""))
            //     {
            //         $msg = '<div class="alert">Fill all the fields!</div>';
            //     }else{
            //         $subject_name = $_REQUEST['subject'];
            //         $language_medium = $_REQUEST['language_medium'] ;
            //         $grade = $_REQUEST['grade'];
            //         $teacher_id = $_REQUEST['teacher_id'];
            //         $day = $_REQUEST['day'];
            //         $timefrom = $_REQUEST['timefrom'];
            //         $timeto = $_REQUEST['timeto'];
            //     }

                

                $subject_id = uniqid();
                //uniqueid("S",true)

                 $_POST['subject_id']=$subject_id;
                $subject->insert($_POST);
                
                // $subject_details = $subject->getSubjectId($_POST['subject'],$_POST['grade'],$_POST['language_medium']);

                // $_POST['subject_id'] = $subject_details[0]->subject_id;
                // print_r ($subject_id);die;
                $course->insert($_POST);

                // // show($subject_id);die;
                $id= $course->getLastCourse()[0]->course_id;
                // // // print_r($Course);die;
                $course_week->createWeek($id, 1);

            }
            $this->view('receptionist/addCourse',$data);
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
                          //show($data['mediums']);die;
                         
                        //show($data['subjectgrd']);die;
                                // show($allSubjects);die;
                               
                    $medium = "Sinhala";
                    
                    //  $data['subjects']=$subject->selectTeachers(['subject'=>$allSubjects[0]->subject, 'grade'=>$allSubjects[0]->grade],$medium,$subject_id);
                     $data['subjects'] = $subject -> selectTeachers(['subject_id'=>$data['mediums'][0]->subject_id],$data['mediums'][0]->language_medium);
                    
                    $data['sinhalaid'] = $subject->getSubjectId($subjectName,$grade,"Sinhala");
                    $data['englishid'] = $subject->getSubjectId($subjectName,$grade,"English");
                    $data['tamilid'] = $subject->getSubjectId($subjectName,$grade,"Tamil");
                    // show($data['subjects']);die;

                    $data['instructors'] = array();
                    for($i=0; $i<count($data['subjects']); $i++){
                        //show($data['subjects'][$i]->course_id);
                        $data['instructors'] = $course_instructor -> getInstructors($data['subjects'][$i]->course_id);
                        // var_dump($data['instructors']);die;
                        
                    }
                    // show($data['instructors']);
                    // die;
                    // }
                }
                $data['teachers'] = $teacher->select([],'teacher_id','asc');
                // $data['instructors'] = $instructor->select([],'instructor_id','asc');

                if(isset($_POST['submit-delete-course'])){
                    $result = $course->delete(['course_id'=>$id]);
                    header("Location:http://localhost/Interlearn/public/receptionist/course");
                }

                $this->view('receptionist/class',$data);
                exit;
        }

       

        // if($action == 'delete'){
        //     if(isset($_POST['submit-delete-course'])){
        //         $result = $course->delete(['course_id'=>$id]);
        //         header("Location:http://localhost/Interlearn/public/receptionist/course");
        //     }
        //     // $data = [];
        //     // $data['action'] = $action;
        //     // $data['id'] = $id;
            
        //     $this->view('receptionist/class',$data);
        // }
       
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


    public function payments()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view('receptionist/receptionist-payments');
    }

    public function getPayment()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }
        // show($_POST);
        if (isset($_POST)) {
            $payment_model = new Payment();
            $_POST['method'] = 'cash';
            $_POST['status'] = '1';
            $payment_model->insert($_POST);
            $this->view("receptionist/receptionist-payments");
        }
    }


    public function getPaymentData()
    {
        $payment = new Payment();
        $data = $payment->getAll();
        return $data;
    }

}