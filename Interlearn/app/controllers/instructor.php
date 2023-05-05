<?php
/**
 *instructor  class
 */
class Instructor extends Controller
{
    public function index()
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }
        
        $user_id = Auth::getuid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $staff = new Staff();
        $data = [];

        $data['rows']= $course->select([],'course_id');
        $data['sums']= $course -> instructorCourse([],$user_id);
        //   show($data['sums']);die;
        
        $this->view('instructor/home',$data);
    }
    public function profile($id = null)
    { 
        if(!Auth::is_instructor()){
            redirect('home');
        }
        $currentUserID = $id ?? Auth::getUID();

        $staffData = new Staff();
        $staff_data = $staffData->ProfileDetails($currentUserID);



        if (!$staff_data) {
            redirect('home');
        }

        $ProfileData['userData'] = $staff_data;

        $this->view('staff/user', $ProfileData);
    }

    // public function profile($id = null)
    // {
    //     if(!Auth::is_instructor()){
    //         redirect('home');

    //     }

    //     $id = $id ?? Auth::getemp_id();
    //     $user = new Staff();
    //     $data['row'] = $user->first(['emp_id'=>$id],'emp_id');

    //     $this->view('instructor/profile');
    // }


    public function course($action = null, $id = null, $week = null, $option = null, $extra = null, $aid = null)
    {
        if (!Auth::is_instructor()) {
            redirect('home');
           
        }

        $user = Auth::getUsername();
        $user_id = Auth::getUid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $course_material = new CourseMaterial();
        $course_week = new CourseWeek();
        $student_course = new StudentCourse();
        $course_content = new CourseContent();
        $data = [];
        $data['course_id'] = $id;

        if ($action == "view") {
            $data = [];
            $data['action'] = $action;
            $data['course_id'] = $id;
            //print_r($id);exit;


            // $data = [];

            $data['rows'] = $course->select([], 'course_id');
            //show($data['rows']);die;
            //$data['sums']= $subject -> teacherCourse([],$user_id);
            $data['courses'] = $subject -> teacherCourseDetails([],$id);
            //show($data['courses']);die;
            $data['noOfWeeks'] = $course->getWeekCount($id)->No_Of_Weeks;
            $data['courseWeeks'] = $course_week->getWeeks($id);
            
            // show($course_week->getWeeks($id));
            // show($data['courseWeeks']);die;
            //$data['courses'] = $subject -> CoursePg([],$user_id);
            $data['materials'] = $subject -> teacherCourseMaterial([],$id);
            // show($data['materials']->upload_name);die;
            //show($data['materials']);die;

            if(isset($_POST['submit-weeks'])){
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks + $_POST['no_of_weeks']);
                for ($i=1; $i <= $_POST['no_of_weeks'] ; $i++) {
                    $course_week->createWeek($id,$currentWeeks+$i);
                    header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
                }
            }

            if(isset($_POST['submit-title'])){

                $result = $course_week->UpdateWeekName($id,$_POST['weeknumber'],$_POST['title']);
            }

            if(isset($_POST['submit-upload'])){
                // echo $_POST['upload-title'];die;
                echo $_POST['cid'];die;
                $result = $course_content->UpdateUploadName($id,$_POST['cid'],$_POST['upload-title']);
            }

            if(isset($_POST['submit-delete-week'])){
                $result = $course_week->deleteWeek($_POST['delete-weeknumber']);
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks - 1);
                header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
            }

            if(isset($_POST['submit-delete-up'])){
                $result = $course_material->deleteUpload($_POST['delete-filenumber']);
                header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
            }

            $this->view('instructor/course',$data);
        }

        if($action == "announcement")
        {
            $announcement = new Announcement();
            $ann_course = new AnnouncementCourse();

            $data['id'] = $aid;
            $data['course_id'] = $id;
            $result1 = $subject->selectCourse([]);
            $data['courses']=$result1;
            // show($data['course_id']);die;

            if($option == 'add'){
                // echo "hi";die;
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if($announcement -> validate($_POST)){
                        $announcement_id = uniqid();
                        $_POST['aid'] = $announcement_id;
                        $_POST['course_id'] = $id;
                        $teacher_id = $course -> getTeacherID($id);
                        $_POST['teacher_id'] = $teacher_id[0]->teacher_ID;

                        // show($_POST);die;
                        // show($teacher_id[0]->teacher_ID);die;
                        //$announcement = new Announcement();

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
                                    $fileDestination = "/xampp/htdocs/Interlearn/uploads/".$id."/announcements/".$aid;
                                    if (!is_dir($fileDestination)){
                                        mkdir($fileDestination,0644, true);
                                    }
                                    $destination =  $fileDestination."/".$fileNameNew;
                                    move_uploaded_file($fileTmpName,$destination);
                                    //echo $fileActualExt;exit;
                                    //var_dump($_POST);exit;
                                    //print_r($fileType);exit;
                                    $viewURL="http://localhost/Interlearn/uploads/".$id."/announcements/".$aid."/".$fileNameNew;
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
                        $result2 = $ann_course->insert($_POST);
                        echo "Announcement successfully published!";
                        header("Location:http://localhost/Interlearn/public/teacher/course/announcement/".$id."/0");
                        //show($_POST);die;
                    }
                    else{
                        $data['errors'] = $announcement -> error;
                    }
                }
                $this->view('instructor/addAnnouncement',$data);
            }



            // echo $id;die;

            $data['announcements'] = $announcement -> showAnnouncementInstructor($id);
            // show($data['announcements']);die;

            if(isset($_POST['edit-announcement'])){
                // echo $_POST['upload-title'];die;
                $result = $announcement->updateAnnouncement($_POST['aid']);
            }

            if(isset($_POST['delete-announcement'])){
                $result = $announcement->deleteAnnouncement($_POST['delete-aid']);
                header("Location:http://localhost/Interlearn/public/instructor/course/announcement/".$id."/0");
            }
            // show($data['announcements']);die;

            $this->view('instructor/announcement',$data);
        }
        
        if($action == 'progress') {

            $exam = new ZExam();
            $results = new ZResult();
            $data['course_id'] = $id;
            
            if($option == 'add') {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                    $filename = $_FILES['myfile']['name'];
                    $fileTmpName = $_FILES['myfile']['tmp_name'];
                    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
                    $allowedType = array('csv');
                    if(!in_array($fileExtension, $allowedType)) {
                        // display error message
                        echo "add csv file";die;
                    }
                    else {
                        $exam_id = uniqid();
                        $_POST['exam_id'] = $exam_id;
                        $_POST['course_id'] = $id;

                        $result = $exam->insert($_POST);
                        
                        
                        $handle = fopen($fileTmpName, 'r');
                        while(($myData = fgetcsv($handle, 1000, ',')) !== FALSE) {
                            $student_id = $myData[0];
                            $marks = $myData[1];
                            // insert result data into database
                            $_POST['studentID'] = $student_id;
                            $_POST['marks'] = $marks;

                            $student_course = new StudentCourse();
                            $result1 = $student_course->where(['student_id' => $student_id, 'course_id' => $id], 'student_id');
                            // show($result1);

                            if ($result1) {
                                $myresult = new ZResult();
                                $result = $myresult->insert($_POST);
                            }

                        }
                        
                        if($result) {
                            echo "successfully";
                        }
                    }
                }

                $this->view('instructor/add_progress',$data);
                exit();
            }
            if($option == 'view') {

                $data['rows'] = $exam->ExamForCourse(['course_id'=>$id]);
                // $data['rows'] = $question->ChoiceInnerjoinQuestion();
                // show($data);
                // $this->view('teacher/Zquiz', $data);
                $this->view('instructor/view_progress',$data);
                exit();
            }
            if($option == 'overall') {
                // $exam_id = $_GET['overall'];
                // // show($exam_id);
                // // $array = [];
                // $data['rows1'] = $results->ResultGraph(['exam_id' => $exam_id]);
                // show($data);
                // $newArray = array(
                //     "A" => 0,
                //     "B" => 0,
                //     "C" => 0
                // );

                // foreach ($data['rows'] as $row) {
                //     $newArray["A"] += intval($row->A);
                //     $newArray["B"] += intval($row->B);
                //     $newArray["C"] += intval($row->C); 
                // }
                // show($newArray);
                
                // // echo json_encode($newArray);
                // $json_data = json_encode($newArray);
                // header('Content-Type: application/json');
                // // echo $json_data1;
                // echo $json_data;
                // exit;
            }
            if($option == 'overview') {

                $exam_id = $_GET['overall'];
                // show($exam_id);
                $data['rows1'] = $results->ResultGraph(['exam_id' => $exam_id]);
                // show($data);
                $newArray = array(
                    "A" => 0,
                    "B" => 0,
                    "C" => 0,
                    "S" => 0,
                    "W" => 0
                );

                foreach ($data['rows1'] as $row) {
                    $newArray["A"] += intval($row->A);
                    $newArray["B"] += intval($row->B);
                    $newArray["C"] += intval($row->C); 
                    $newArray["S"] += intval($row->S);
                    $newArray["W"] += intval($row->W);
                }
                // show($newArray);
                // echo json_encode($newArray);
                $json_data = json_encode($newArray);
                // echo $json_data;
                // show($newArray);

                $data['rows2'] = $results->ResultForStudent(['exam_id'=>$exam_id]);
                
                $data['newArray'] = $newArray;
                // show($data['newArray']);die;
                $data['table'] = $data['rows2'];
                $this->view('instructor/overview_progress', $data);
                exit();
            }

            if($option == 'delete') {
                $id = $_GET['qnum'];
                // show($id);
                // show($GLOBALS['exam_id']);
                $result = $results->delete(['id'=>$id]);
                // header("Location:http://localhost/Interlearn/public/instructor/course/progress/".$id."/".$week."overview?overall=".$overall);
                exit();
            }

            $this->view('instructor/progress',$data);
            exit();
        }
        
        $this->view('instructor/course',$data);
    }
   
    public function submission()
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }
        
        $this->view('instructor/submission');
        
    }
    public function quizz($action=null)
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }
        if($action=='add'){
            $this->view('instructor/quiz-add');
            exit();
        }
        if($action=='final'){
            $this->view('instructor/quizz-final');
            exit();
        }
        $this->view('instructor/quizz');
    }

}