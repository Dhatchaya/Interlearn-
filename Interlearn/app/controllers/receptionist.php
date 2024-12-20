<?php
/**
 *Receptionist  class
 */
class Receptionist extends Controller
{
    public function index($action = null)
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }


        $this->view('receptionist/home');
    }
    public function allprofiles($action = null,$uid=null)
    {
        if(!Auth::is_receptionist()){
            redirect('home');
        }
        $data = [];
        $data['title']='Staff-Profiles';
        $student = new Students();
        $staff = new Staff();
        if($action=="student"){
            $details = $student->studentConnectCourse(['uid'=>$uid],'studentID');
            $data['userData']=$details;
 
            $this->view('student/profiles',$data);
        }
        if($action=="staff"){
            $details = $staff->ProfileDetails($uid);
            $data['userData']=$details;

            $this->view('staff/profiles',$data);
        }


        exit;
    }
    public function course($action = null, $id = null, $option = null)
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
        $student_course = new StudentCourse();
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

                    // if(isset($_POST['courseSubmitBtn'])){

                    // }

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
                    // show($data['errors']);die;

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
                //  show($result);die;
                echo json_encode($result);
                die;
            }
            exit;

        }

        if($action == 'submitAddCourse'){
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
                // show($_POST);die;
                // show($_POST);die;
                // echo json_encode($_POST);
                //     exit;
                if($course -> validate($_POST)){
                    $subject_id = uniqid();
                    //uniqueid("S",true)
                    // echo "check 2";die;
                    // echo json_encode($_POST);
                    // exit;

                    // if(isset($_POST['courseSubmitBtn'])){

                    // }

                    $_POST['subject_id']=$subject_id;
                    $subject->insert($_POST);

                    //  show($_POST);die;

                    // $subject_details = $subject->getSubjectId($_POST['subject'],$_POST['grade'],$_POST['language_medium']);

                    // $_POST['subject_id'] = $subject_details[0]->subject_id;
                    // print_r ($subject_id);die;
                    $course->insert($_POST);

                    // show($subject_id);die;
                    $id= $course->getLastCourse()[0]->course_id;
                    // // // print_r($Course);die;
                    $course_week->createWeek($id, 1);
                    $response = array("status"=>"success");
                    echo json_encode($response);
                    exit;
                    //header("Location:http://localhost/Interlearn/public/receptionist/course");

                }
                else{

                    $data['errors'] =  $course->error;
                    // show($data['errors']);die;
                    echo json_encode($data['errors']);
                    // $data['error']['invalid'] = "There is an unknown error occured!";
                }
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
                // show($data['id']);die;

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
                            // show($data['subjects']);die;
                            // show(count($data['subjects'][$i]));die;
                            for($x=0; $x<count($data['subjects'][$i]); $x++){
                                // show($data['subjects'][$i][$x]->course_id);die;
                                if(!empty($data['subjects'][$i][$x]->course_id)){
                                    // show($data['subjects'][$i][$x]->course_id);die;
                                    $extra= $course_instructor -> getInstructors($data['subjects'][$i][$x]->course_id);
                                    if(!empty($extra)){
                                        // show($extra);die;
                                        $data['teach_instructors'][$data['subjects'][$i][$x]->course_id] = $extra;
                                        $data['course_id'] = $data['subjects'][$i][$x]->course_id;
                                        $result = $data['teach_instructors'][$data['subjects'][$i][$x]->course_id];
                                    }
                                }
                            }
                        }

                    // show($data['teach_instructors']);die;
                    // show($data['subjects']);die;
                
                    }

                    if(empty($data['subjects'])){
                        $subject -> delete(['subject_id'=>$subject_id ]);
                        header("Location:http://localhost/Interlearn/public/receptionist/course");
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
                    // $inputs=array("subject_id"=>$_GET['id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto'],"capacity"=>$_POST['capacity']);
                    //     show($inputs);die;
                    //     $course->insert($inputs);
                    if($course -> validateAdd($_POST)){
                        $inputs=array("subject_Id"=>$_POST['subject_Id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto'],"capacity"=>$_POST['capacity']);
                        // show($inputs);die;
                        $course->insert($inputs);
                        $id= $course->getLastCourse()[0]->course_id;
                        // // // print_r($Course);die;
                        $course_week->createWeek($id, 1);
                    }
                    else{
                        $data['errors'] =  $course->error;
                    }


                    //show($_POST);die;
                }

                if(isset($_POST['add-instructor'])){
                    $inputs1=array("course_id"=>$_POST['course_id'],"emp_id"=>$_POST['emp_id']);
                    // show($inputs1);die;
                    $course_instructor->insert($inputs1);
                }

                // if(isset($_POST['edit-teacher'])){
                //     $course_id = $_POST['course_id'];
                //     $day = $_POST['day'];
                //     $timefrom = $_POST['timefrom'];
                //     $timeto = $_POST['timeto'];
                //     // show($course_id);
                //     // show($day);
                //     // show($timefrom);
                //     // show($timeto);die;
                //     $course -> updateCourse($course_id, $day, $timefrom, $timeto);
                // }

                // if(isset($_POST['submit-delete-course'])){
                //     show($_POST['course_id']);die;
                //     $result = $course->delete($_POST['course_id']);
                //     // header("Location:http://localhost/Interlearn/public/receptionist/course/view/1/".$id);
                // }

                if($option == 'student_view'){
                    // show($id);die;
                    // $course_id = $_GET['id'];
                    // show($course_id);die;

                    $data['students'] = $student_course -> getStudents($id);
                    // show($data['students']);die;

                    if(isset($_POST['submit-delete-student'])){
                        $std_id = $_POST['delete-student'];
                        // show($std_id);die;

                        $student_course -> deleteStudent($std_id,$id);
                        header("Location:http://localhost/Interlearn/public/receptionist/course/view/".$id."/student_view");
                    }

                    $this->view('receptionist/student_view',$data);
                    exit;
                }


                $this->view('receptionist/class',$data);
                exit;
        }

        if($action == 'removeCourse'){
            // show($_POST);die;
            $result2 = $course->deleteCourse($_POST['course_id']);

            echo json_encode($result2);
            exit;
        }

        if($action == 'removeInstructors'){
            $result2 = $course_instructor->deleteInstructors($_GET['instructor_id'],$_GET['course_id']);

            echo json_encode($result2);
            exit;
        }

        if($action == 'getInstructors'){

                    $result = $course_instructor -> getInstructors($_GET['course_id']);
                    // show($_GET['course_id']);die;

                    echo json_encode($result);
                    exit;
        }

        if($action == 'getCourseDetails'){
            // if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // show($_POST['courseID']);die;

                $result = $course -> getCourseDetails($_GET['course_id']);
                echo json_encode($result);
            // }
            exit;
        }

        if($action == 'editCourse'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $course_id = $_POST['course_id'];
                $day = $_POST['day'];
                $timefrom = $_POST['timefrom'];
                $timeto = $_POST['timeto'];
                $capacity = $_POST['capacity'];
                $fee = $_POST['monthlyFee'];
                // show($course_id);
                // show($day);
                // show($timefrom);
                // show($timeto);die;
                $result = $course -> updateCourse($course_id, $day, $timefrom, $timeto, $capacity, $fee);
                echo json_encode($result);
            }
            exit;
        }

        if($action == 'removeInstructor'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $course_instructor -> deleteInstructors($_POST['courseID'], $_POST['instructorID']);
                echo json_encode($result);
            }
            exit;
        }

        if($action == 'checkAvailable'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $course -> getTime($_POST['teacher_id'], $_POST['day']);
                echo json_encode($result);
            }
            exit;
        }

        if($action == 'checkAvailableEdit'){
            // show($_POST);die;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $result = $course -> getTimeEdit($_POST['teacher_id'], $_POST['day'],$_POST['course_id']);
                echo json_encode($result);
            }
            exit;
        }

        if($action == 'checkAvailable1'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // show($_POST);die;

                $result = $course -> getTime($_POST['teacher_id'], $_POST['day']);
                echo json_encode($result);
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

        if($action == 'addTeacher')
        {
            // show($_GET['id']);die;
            // $data['id'] = $id;
            // show($_POST);die;

            if($course -> validateAdd($_POST))
            {
                // echo json_encode($_POST);die;
                $inputs=array("subject_id"=>$_POST['subject_Id'],"teacher_id"=>$_POST['teacher_id'],"day"=>$_POST['day'],"timefrom"=>$_POST['timefrom'],"timeto"=>$_POST['timeto'],"capacity"=>$_POST['capacity'],"monthlyFee"=>$_POST['monthlyFee']);
                // show($inputs);die;
                // echo json_encode($inputs);
                // die;
                $course->insert($inputs);
                $id= $course->getLastCourse()[0]->course_id;
                // // // print_r($Course);die;
                $course_week->createWeek($id, 1);
                // echo json_encode($inputs);
                // die;
            }
            else{
                $data['errors'] =  $course->error;
            }
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
        $announcement_file = new AnnouncementFiles();
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

                    if(isset($_FILES['attachment']['name']) AND !empty($_FILES['attachment']['name'])){
                        // show($_POST);
                        // show($_FILES);die;

                        $_POST['aid'] = $announcement_id;
                        // for($i=0; $i<count($_FILES['attachment']['name']); $i++) {
                            $file = $_FILES['attachment'];
                            // show($file);

                            $fileName = $_FILES['attachment']['name'][0];
                            $fileTmpName = $_FILES['attachment']['tmp_name'][0];
                            $fileSize = $_FILES['attachment']['size'][0];
                            $fileError = $_FILES['attachment']['error'][0];
                            $fileType = $_FILES['attachment']['type'][0];
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
                                        $fileDestination = "/xampp/htdocs/Interlearn/uploads/0/announcements/".$announcement_id;
                                        if (!is_dir($fileDestination)){
                                            // print_r("test1");
                                            mkdir($fileDestination,0644, true);
                                            // print_r("test2");die;

                                        }
                                        $destination =  $fileDestination."/".$fileNameNew;
                                        move_uploaded_file($fileTmpName,$destination);

                                        $new_fileID=uniqid();
                                        $filenames[]=['file_name'=> $fileNameNew,'file_id'=> $new_fileID];
                                        //echo $fileActualExt;exit;
                                        //var_dump($_POST);exit;
                                        //print_r($fileType);exit;

                                    }else{
                                        echo "Image is too large!";
                                    }
                                }else{
                                    echo "There was an error uploading image!";
                                }
                            }else{
                                echo "You cannot upload this file!";
                            }
                        // }

                        // $viewURL="http://localhost/Interlearn/uploads/receptionist/announcements/".$announcement_id."/".$fileNameNew;
                        $viewURL="http://localhost/Interlearn/uploads/0/announcements/".$announcement_id."/".$fileNameNew;
                        // $_POST['file_name'] = $fileNameNew;
                        $_POST['attachment'] = $viewURL;
                        $result1 = $announcement->insert($_POST);

                        echo "Announcement successfully published!";
                        //show($_POST);die;
                        header("Location:http://localhost/Interlearn/public/receptionist/announcement");

                        // if(empty($data['errors'])){
                        //     // $result = $assignment->insert($_POST);

                        //     //  foreach($filenames as $file){

                        //     //         $_POST['aid'] =$announcement_id;
                        //     //         $_POST['file_name'] = $file['file_name'] ;
                        //     //         $_POST['file_id'] = $file['file_id'];
                        //     //         show($_POST);die;

                        //     //         $result2 = $announcement_file->insert($_POST);


                        //     // }
                        //     if($result2){
                        //         echo "Announcement successfully published!";
                        //         //show($_POST);die;
                        //         header("Location:http://localhost/Interlearn/public/receptionist/announcement");
                        //     }
                        // }


                    // $result = $announcement->insert($_POST);
                    }

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

        if($action == 'getAnnouncement'){
            // echo $_POST['aid'];die;

            $result = $announcement -> getAnnouncements($_GET['aid']);
            echo json_encode($result);
            die;
        }

        if($action == 'editAnnouncementFile'){

            // $file_pointer = "gfg.txt";

            // if (!unlink($file_pointer)) {
            //     echo ("$file_pointer cannot be deleted due to an error");
            // }
            // else {
                $result = $announcement -> deleteAnnFile($_GET['aid']);
                echo json_encode($result);
            // }

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
                        $fileDestination = "/xampp/htdocs/Interlearn/uploads/0/".$_POST['aid'];
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
            $viewURL="http://localhost/Interlearn/uploads/0/".$_POST['aid']."/".$fileNameNew;
            // show($_POST['file_name']);die;
            // $_POST['file_name'] = $fileNameNew;
            $_POST['attachment'] = $viewURL;
            }

            if(empty($_POST['file_name'])){
                $_POST['file_name'] = $fileNameNew;
            }

            $result = $announcement -> updateAnnouncement($_POST['aid'],$_POST['title'],$_POST['content'],$_POST['attachment'],$_POST['file_name']);
            echo json_encode($result);
            die;
        }


        if(isset($_POST['submit-delete-announcement'])){
            $aid = $_POST['delete-announcement'];
            // show($aid);die;
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
                if(empty($_POST['content'])){
                    $data['empty']="Please type your reply before submitting";
                }
                else{
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
            $noti = new Notification();
            $notifyuser = new Notify_user();
            $user = new User();
            $id=$_GET['id'];
            $value = $_GET['status'];
            $enqnew = $enquiry->first([
                'eid'=>$id
            ],'eid');

            $status = $enquiry -> update(['eid'=>$id],['status'=>$value]);

            if($status && $value=="escalated"){

                $nid = uniqid();
                $notification['Nid']=$nid;
                $notification['title']=$enqnew->title;
                $notification['category']="Enquiry";
                $managers = $user->where([
                    'role'=>"Manager"
                ],'uid');

                $insertNoti=$noti->insert($notification);
                foreach($managers as $manager){
                    $notiU['uid']=$manager->uid;
                    $notiU['Nid']=$nid;
                    $insertUser=$notifyuser->insert($notiU);
                }
            }

        }

        $data['rows']  = $enquiry->selectUserCourse(null, $orderby);

            
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




        $payment_model = new Payment();
        $payment_history = $payment_model->getAll();

        $callBPdata = new BankPayment();
        $BankPaymentData = $callBPdata->validateBankPayment();


        $this->view('receptionist/receptionist-payments',  ['bankPayments' => $BankPaymentData, 'transactions' => $payment_history]);
    }

    // public function addNewPendingPayments(){
    //     if (!Auth::is_receptionist()) {
    //         redirect('home');
    //     }
    //     $currentMonth = date('m');
    //     $months = array(
    //         "01" => "January",
    //         "02" => "February",
    //         "03" => "March",
    //         "04" => "April",
    //         "05" => "May",
    //         "06" => "June",
    //         "07" => "July",
    //         "08" => "August",
    //         "09" => "September",
    //         "10" => "October",
    //         "11" => "November",
    //         "12" => "December"
    //     );

    //     $month = $months[$currentMonth];
    //     $student = new StudentCourse();
    //     $student->getAll($month);

    //     exit;
    // }


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
            echo json_encode($respond);
            exit;
        }

        exit;
    }


    public function approveBP(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $data = json_decode(file_get_contents("php://input"), true);


        $PaymentID = $data['PaymentID'];
        $BankPaymentID = $data['BankPaymentID'];


            $approveBP = new Payment();
            $res =$approveBP->approveBP($PaymentID);
            if($res == 'success'){
                $removefromBankPayment = new BankPayment();
                $respond = $removefromBankPayment->removefromBankPayment($BankPaymentID);
            }
        echo json_encode($respond);
    }

    public function declineBP(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $data = json_decode(file_get_contents("php://input"), true);


            $removefromBankPayment = new BankPayment();
            $respond = $removefromBankPayment->declined($data['BankPaymentID']);

            if($respond == 'success'){
                $declinedBP = new Payment();
                $respond =$declinedBP->declinedBP($data['PaymentID']);
            }

            else{
                $respond = 'error';
            }

        echo json_encode($respond);
    }
    public function removestudent(){
        if (!Auth::is_receptionist()) {
            redirect('home');
        }
        $student = new Students();
        $user = new User();
        $data = json_decode(file_get_contents("php://input"), true);
  
        $row = $student -> first([
            'studentID' => $data['studentID'],
           
        ],'uid');
        
     
            $respond = $student->delete($data);
            if($respond){
           
                $respond2 = $user->delete(['uid'=>$row->uid]);
            }
           

        echo json_encode($respond);
        exit;
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

        header('Content-Type: application/json');// set the content type to JSON
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
        $student = new Students();
        $res = $student->where(["studentID"=>$studentId],'studentID');
        // $sql = "SELECT * FROM student WHERE studentID = '$studentId'";
        // $model = new Model();
        // $res = $model->query($sql);

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


        if( $respond1 == null){

            $respond = array(array("course_id" => "noCourse"));
            echo json_encode($respond);
            exit;
        }

        else{

            $studentFtCourse = new Course();
            $respond2 = $studentFtCourse->checkStudent($courseId, $studentID);

            if ($respond2 != null) {
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

    public function calendar()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }
        $course = new Course();
        $userid = Auth::getUID();;
        $result= $course->getinstituteClass();


        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
       // $this->view('includes/calendar');
    }

}

