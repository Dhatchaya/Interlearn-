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

        $id = $id ?? Auth::getemp_id();
        $user = new Staff();
        $data['row'] = $user->first(['emp_id'=>$id],'emp_id');

        $this->view('instructor/profile');
    }
    public function editUploadName($id=null)
    {
        $course_content = new CourseContent();
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

            $result = $course_content->UpdateUploadName($id,$_POST['cid'],$_POST['upload_name']);

            echo json_encode($result);
            exit;
        }
    }
    // public function editWeekName($id=null)
    // {
    //     $course_week = new CourseWeek();
    //     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //         show($_POST);die;
    //         $result = $course_week->UpdateWeekName($id,$_POST['week_no'],$_POST['week_name']);

    //         echo json_encode($result);
    //         exit;
    //     }
    // }
    public function course($action=null,$id = null,$week = null,$option = null,$extra=null,$aid=null)
    {
        if(!Auth::is_instructor()){
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
        $announcement = new Announcement();
        $ann_course = new AnnouncementCourse();
        $notification = new Notification();
        $staff = new Staff();
        $data = [];
        $data['course_id'] = $id;

        if($action == "view")
        {
            $data = [];
            $data['action'] = $action;
            $data['course_id'] = $id;
            //print_r($id);exit;
            // $data = [];

            $data['rows']= $course->select([],'course_id');
            //show($data['rows']);die;
            //$data['sums']= $subject -> teacherCourse([],$user_id);
            $data['courses'] = $subject -> teacherCourseDetails([],$id);
            //show($data['courses']);die;
            $weeks = $course->getWeekCount($id);
            $data['noOfWeeks'] = $weeks->No_Of_Weeks;
            $data['courseWeeks'] = $course_week->getWeeks($id);
            
            // show($course_week->getWeeks($id));
            // show($data['courseWeeks']);die;
            //$data['courses'] = $subject -> CoursePg([],$user_id);
            $data['materials'] = $subject -> instructorCourseMaterial([],$id);
            // show($data['materials']->upload_name);die;
            // show($data['materials']);die;

            if(isset($_POST['submit-weeks'])){
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks + $_POST['no_of_weeks']);
                for ($i=1; $i <= $_POST['no_of_weeks'] ; $i++) {
                    $course_week->createWeek($id,$currentWeeks+$i);
                    header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
                }
            }

            // if(isset($_POST['submit-title'])){

            //     $result = $course_week->UpdateWeekName($id,$_POST['weeknumber'],$_POST['title']);
            // }

            // if(isset($_POST['submit-upload'])){
            //     // echo $_POST['upload-title'];die;
            //     // echo $_POST['cid'];die;
            //     $result = $course_content->UpdateUploadName($id,$_POST['cid'],$_POST['upload-title']);
            // }

            if(isset($_POST['submit-delete-week'])){
                $result = $course_week->deleteWeek($_POST['delete-weeknumber']);
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks - 1);
                header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
            }

            if(isset($_POST['submit-delete-up'])){
                // show($_POST['delete-filenumber']);die;
                $result = $course_content->deleteUpload($_POST['delete-filenumber']);
                header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
            }

            if(isset($_POST['submit-delete-text'])){
                // $result = $course_material->deleteUpload($_POST['delete-filenumber']);
                $result = $course_content->deleteUpload($_POST['delete-text-filenumber']);
                header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
            }

            if($option == 'getWeekName'){
                // show($_GET);die;
                // $result = $course_week->getWeekName($id,$_GET['week_no']);
                $result = $course_week->getWeekName($id,$week);


                echo json_encode($result);
                exit;
            }



            if($option == 'getUploadName'){
                // show($_GET);die;
                $result = $course_content->getUploads($id,$week);

                echo json_encode($result);
                exit;
            }

            // if($option == 'editUploadName')
            // {
            //     if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

            //         $result = $course_content->UpdateUploadName($id,$_POST['cid'],$_POST['upload_name']);

            //         echo json_encode($result);
            //         exit;
            //     }
            // }

            if($option == 'editWeekName'){
                // show($_GET);die;
                // $result = $course_week->getWeekName($id,$_GET['week_no']);
                // show($_POST);die;
                $result = $course_week->UpdateWeekName($id,$_POST['week_no'],$_POST['week_name']);

                echo json_encode($result);
                exit;
            }

            if($option == 'getTextName'){
                // show($_GET);die;
                $result = $course_content->getUploads($id,$week);

                echo json_encode($result);
                exit;
            }

            if($option == 'editTextName'){
                // show("hi");
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $result = $course_content->UpdateUploadText($id,$_POST['cid'],$_POST['upload_name'],$_POST['view_URL']);

                    echo json_encode($result);
                    exit;
                }

            }



            $this->view('instructor/course',$data);
        }

        if($action == 'upload') {
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if($course_material -> validate($_POST)){
                    if(isset($_FILES['file']['name']) AND !empty($_FILES['file']['name'])) {
                        $cid = uniqid();
                        $_POST['file_id'] =$fileid= uniqid();
                        $empId = $staff -> getEmpId($user_id);
                        $emp_id = $empId[0] -> emp_id;
                        $_POST['emp_id'] = $emp_id;
                        $file = $_FILES['file'];

                        $fileName = $_FILES['file']['name'];
                        $fileTmpName = $_FILES['file']['tmp_name'];
                        $fileSize = $_FILES['file']['size'];
                        $fileError = $_FILES['file']['error'];
                        $fileType = $_FILES['file']['type'];

                        $fileExt = explode('.',$fileName);
                        $fileActualExt = strtolower(end($fileExt));

                        $allowed1 = array('jpg','jpeg','png', 'pdf','zip','txt','sql','docx','xml','doc','ppt', 'mp3','mp4','php','html','css','js');

                        if(in_array($fileActualExt, $allowed1)) {
                            if($fileError === 0){
                                if($fileSize < 1000000000){
                                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                                    $fileDestination = "/xampp/htdocs/Interlearn/uploads/".$id."/materials/".$cid;
                                    if (!is_dir($fileDestination)){
                                        mkdir($fileDestination,0644, true);

                                    }
                                    $destination =  $fileDestination."/".$fileNameNew;
                                    move_uploaded_file($fileTmpName,$destination);
                                    //echo $fileActualExt;exit;
                                    //var_dump($_POST);exit;
                                    //print_r($fileType);exit;
                                    $viewURL="http://localhost/Interlearn/uploads/".$id."/materials/".$cid."/".$fileNameNew;
                                    $_POST['course_material'] = $fileNameNew;
                                    $_POST['file_type'] = $fileType;
                                    $_POST['size'] = $fileSize;
                                    $_POST['course_id'] = $id;
                                    //show($_POST);die;
                                    $_POST['type'] = "material";
                                    $_POST['cid'] = $cid;
                                    $_POST['view_URL'] = $viewURL;
                                    // show($_POST);die;
                                    $result2 = $course_content->insert($_POST);
                                    $result = $course_material->insert($_POST);
                                    echo "Material successfully published!";
                                    header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
                                } else {
                                    echo "Image is too large!";
                                }
                            } else {
                                echo "There was an error uploading image!";
                            }
                        } else {
                            echo "You cannot upload this file!";
                        }

                    }
                    else {
                        $data['errors']['file'] =  "Unknown error occured!";

                    }
                }
                else {
                    $data['errors'] =  $course_material->error;
                }
            }

            $data['rows']= $course->select([],'course_id');
            // show($data['rows']);die;
            $data['sums']= $subject -> teacherCourse([],$user_id);
            // show($data['sums']);die;
            // $data['courses'] = $subject -> CoursePage(['course_id' => $id],$user_id);
            $data['week_no'] = $week;

            $this->view('instructor/upload',$data);
        }

        if($action == "url"){
            if(isset($_POST['submit']))
            {
                if($course_content -> validate($_POST)){
                    $cid = uniqid();
                    // $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."/".$week."/?id=".$cid;
                    $viewURL = $_POST['URL'];
                    $empId = $staff -> getEmpId($user_id);
                    $emp_id = $empId[0] -> emp_id;
                    $_POST['emp_id'] = $emp_id;

                    $_POST['course_id'] = $id;
                    //show($_POST);die;
                    $_POST['type'] = "URL";
                    $_POST['cid'] = $cid;
                    $_POST['view_URL'] = $viewURL;
                    $result2 = $course_content -> insert($_POST);
                    // $result = $course_url->insert($_POST);
                    echo "Material successfully published!";
                    header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
                }
                else{
                    $data['errors'] =  $course_content->error;

                }
            }
            $data['rows']= $course->select([],'course_id');
            // show($data['rows']);die;
            $data['sums']= $subject -> teacherCourse([],$user_id);
            //show($data['sums']);die;
            // $data['courses'] = $subject -> CoursePage(['course_id' => $id],$user_id);
            $data['week_no'] = $week;
            // show($data['week_no']);die;
            //   show($data['courses']);die;
            $this->view('instructor/url',$data);
        }

        if($action == "text"){
            if(isset($_POST['submit']))
            {
                if($course_content -> validateNote($_POST)){
                    $cid = uniqid();
                    // $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."/".$week."/?id=".$cid;
                    $viewURL = $_POST['content'];

                    $_POST['course_id'] = $id;
                    $empId = $staff -> getEmpId($user_id);
                    $emp_id = $empId[0] -> emp_id;
                    $_POST['emp_id'] = $emp_id;
                    //show($_POST);die;
                    $_POST['type'] = "Note";
                    $_POST['cid'] = $cid;
                    $_POST['view_URL'] = $viewURL;
                    $result2 = $course_content -> insert($_POST);
                    // $result = $course_url->insert($_POST);
                    echo "Note successfully published!";
                    header("Location:http://localhost/Interlearn/public/instructor/course/view/".$id);
                }
                else{
                    $data['errors'] =  $course_content->error;

                }
            }
            $data['rows']= $course->select([],'course_id');
            //show($data['rows']);die;
            $data['sums']= $subject -> teacherCourse([],$user_id);
            //show($data['sums']);die;
            // $data['courses'] = $subject -> CoursePage(['course_id' => $id],$user_id);
            $data['week_no'] = $week;
            // show($data['week_no']);die;
            //   show($data['courses']);die;
            $this->view('instructor/note',$data);
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
                        // $teacher_id = $course -> getTeacherID($id);
                        // $_POST['teacher_id'] = $teacher_id[0]->teacher_ID;
                        $_POST['role'] = 'Instructor';
                        $empId = $staff -> getEmpId($user_id);
                        $emp_id = $empId[0] -> emp_id;
                        // show($emp_id);
                        // $empId = $staff -> getInstructorId($user_id);
                        $_POST['empID'] = $emp_id;

                        // show($_POST);die;
                        // show($teacher_id[0]->teacher_ID);die;
                        //$announcement = new Announcement();
                        if(isset($_FILES['attachment']['name']) AND !empty($_FILES['attachment']['name'])){

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
                                    $viewURL="http://localhost/Interlearn/uploads/".$id."/announcements".$aid."/".$fileNameNew;
                                    // $_POST['file_name'] = $fileNameNew;
                                    $_POST['attachment'] = $viewURL;
                                    // $result1 = $announcement->insert($_POST);
                                }else{
                                    echo "Image is too large!";
                                }
                            }else{
                                echo "There was an error uploading image!";
                            }
                        }else{
                            echo "You cannot upload this file!";
                        }
                        //show($_POST);die;
                    }
                    // show($_POST);die;
                    $result = $announcement->insert($_POST);
                    $result2 = $ann_course->insert($_POST);
                    $n_id = uniqid();
                    $_POST['Nid'] = $n_id;
                    $_POST['category'] = "Announcement";
                    $result3 = $notification->insert($_POST);
                    echo "Announcement successfully published!";
                    header("Location:http://localhost/Interlearn/public/instructor/course/announcement/".$id."/0");
                    }
                    else{
                        $data['errors'] = $announcement -> error;
                    }
                }
                $this->view('instructor/addAnnouncement',$data);
            }



            // echo $id;die;

            $data['announcements'] = $announcement -> showAnnouncement($id);
            // show($data['announcements']);die;

            // if(isset($_POST['edit-announcement'])){
            //     // echo $_POST['upload-title'];die;
            //     $result = $announcement->updateAnnouncement($_POST['aid']);
            // }

            if(isset($_POST['delete-announcement'])){
                $result = $announcement->deleteAnnouncement($_POST['delete-aid']);
                header("Location:http://localhost/Interlearn/public/instructor/course/announcement/".$id."/0");
            }
            // show($data['announcements']);die;

            $this->view('instructor/announcement',$data);
        }

        if($action == 'getAnnouncement'){
            // echo $_POST['aid'];die;

            // show($_GET['aid']);die;

            $result = $announcement -> getInstructorAnnouncements($_GET['aid']);
            echo json_encode($result);
            die;
        }

        if($action == 'editAnnouncementFile'){
            $result = $announcement -> deleteAnnFile($_GET['aid']);
            echo json_encode($result);

            die;
        }

        if($action == 'submitEditAnnouncement'){
            // show($_POST) ;die;

            // $file = $_FILES['attachment'];
                            // show($_FILES);die;
            if(isset($_FILES['attachment']['name']) AND !empty($_FILES['attachment']['name'])){
            $fileName = $_FILES['attachment']['name'];
            $fileTmpName = $_FILES['attachment']['tmp_name'];
            $fileSize = $_FILES['attachment']['size'];
            $fileError = $_FILES['attachment']['error'];
            $fileType = $_FILES['attachment']['type'];
            // show($fileName[0]);die;
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            // show($fileActualExt);die;
            $allowed1 = array('jpg','jpeg','png', 'pdf','zip','txt','sql','docx','xml','doc','ppt', 'mp3','mp4','php','html','css','js');
            if(in_array($fileActualExt, $allowed1))
            {
                // print_r($file);exit;
                if($fileError === 0)
                {
                    if($fileSize < 1000000000)
                    {
                        // echo "helloo";die;
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        // show($fileNameNew);die;
                        $fileDestination = "/xampp/htdocs/Interlearn/uploads".$id."/announcements/".$aid;
                        if (!is_dir($fileDestination)){
                            // print_r("test1");
                            mkdir($fileDestination,0644, true);
                            // print_r("test2");d
                        }
                        $destination =  $fileDestination."/".$fileNameNew;
                        move_uploaded_file($fileTmpName,$destination);
                        $new_fileID=uniqid();
                        $filenames[]=['file_name'=> $fileNameNew,'file_id'=> $new_fileID];
                        //echo $fileActualExt;exit;
                        //var_dump($_POST);exit;
                        //print_r($fileType);ex
                    }else{
                        echo "Image is too large!";
                    }
                }else{
                    echo "There was an error uploading image!";
                }
            }else{
                echo "You cannot upload this file!";
            }
            //
            // $viewURL="http://localhost/Interlearn/uploads/receptionist/announcements/".$announcement_id."/".$fileNameNew;
            $viewURL="http://localhost/Interlearn/uploads/".$id."/announcements".$aid."/".$fileNameNew;
            // $_POST['file_name'] = $fileNameNew;
            $_POST['attachment'] = $viewURL;
            }



            $result = $announcement -> updateAnnouncement($_POST['aid'],$_POST['title'],$_POST['content'],$_POST['attachment'],$_POST['file_name']);
            echo json_encode($result);
            die;
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
                            header("Location:http://localhost/Interlearn/public/instructor/course/progress/".$id."/".$week."/view");
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

                $data['rows2'] = $results->ResultForStudent($exam_id);
                
                $data['newArray'] = $newArray;
                // show($data['newArray']);die;
                $data['table'] = $data['rows2'];

                if(isset($_POST['edit_marks'])){
                    // echo $_POST['mymarks'];die;
                    // echo $_POST['id'];die;
                    $result = $results->UpdateMarks($_POST['id'], $_POST['mymarks']);
                }

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
        
        if($action == "forum")
        {
            $mainForum = new mainForum();
            $data=[];
            $user = new user();
            $staff = new staff();
            $data['course']  = $subject -> coursedetails(['course_id'=>$id]);

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if($mainForum -> validate($_POST)){
                    $mainforum_id = uniqid('F',true);
                    $_POST['mainforum_id']=$mainforum_id;
                    $_POST['course_id']= $id;
                    $userid = Auth::getuid();
                    $row = $staff-> first(["uid"=>$userid],'emp_id');
                    $_POST['emp_id']=$row->emp_id;
                    $editURL = "http://localhost/Interlearn/public/forums/forumedit/view/".$id."/?main=".$mainforum_id;
                    $viewURL="http://localhost/Interlearn/public/forums/".$id."/".$week."/?main=".$mainforum_id;
                    $deleteURL="http://localhost/Interlearn/public/forums/deleteMain?id=".$mainforum_id;
                    $cid = uniqid();
                    $_POST['cid']=$cid;
                    $_POST['edit_URL']=$editURL;
                    $_POST['view_URL']=$viewURL;
                    $_POST['delete_URL']=$deleteURL;
                    $_POST['week_no']=$week;
                    // $_POST['course_material']="Home Work";
                    $_POST['upload_name']=$_POST['subject'];
                    $_POST['type']="forum";
                    //  $_POST['course_id'] = $id;
                    $material = $course_content->insert($_POST);
                    $result =  $mainForum -> insert($_POST);

                    if($result){
                        header('location:http://localhost/Interlearn/public/forums/'.$id.'/'.$week.'/?main='.$mainforum_id);
                    }
                }
                else{

                    $data['errors']= $mainForum->error;

                }
            }

            $this->view('teacher/mainForum',$data);
            exit;
        }



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