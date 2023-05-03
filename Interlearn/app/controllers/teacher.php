<?php
/**
 *teacher  class
 */
$total_question = 0;
$qid = 0;
class Teacher extends Controller
{
    public function index($action = null, $id = null)
    {
        if(!Auth::is_teacher()){
            redirect('home');

        }
        $user_id = Auth::getuid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $data = [];

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

                $this->view('teacher/course',$data);
                exit;
        }
        $data['rows']= $course->select([],'course_id');
        //show($data['rows']);die;
        // $data['sums']= $subject -> distinctSubject([],'subject');
        // if(isset($_GET['id'])){
        //     $teacher_id = $_GET['id'];
        //     $data['teacher_id'] = $teacher_id;
        //     $allSubjects = $course -> where(['teacher_id'=>$teacher_id],'teacher_id');
        //     $data['subjectgrd'] = $allSubjects;
        //     //show($data['subjectgrd']);die;
        // }
        // var_dump($_GET);
        // var_dump($user_id);
        // exit;
        $data['sums']= $subject -> teacherCourse([],$user_id);
          //show($data['sums']);die;

        $this->view('teacher/home',$data);
    }

    //each course will have a ID when clicked get that ID pass it as a parameter and
    //access that course
    // $action=null,$id = null,$week = null, $option = null,$extra=null

    public function course($action=null,$id = null,$week = null,$option = null,$extra=null,$aid=null)
    {
        if(!Auth::is_teacher()){
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
        $course_url = new CourseUrl();
        $data = [];
        $data['course_id'] = $id;
        $data['week_no'] = $week;
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
            $data['noOfWeeks'] = $course->getWeekCount($id)->No_Of_Weeks;
            $data['courseWeeks'] = $course_week->getWeeks($id);

            // show($course_week->getWeeks($id));
            // show($data['courseWeeks']);die;
            //$data['courses'] = $subject -> CoursePg([],$user_id);
            //show($data['sums']);die;
           // show($data['courses']);die;
              //show($data['sums']);die;
              //show($data['courses'][0]->getWeekName(6,1));die;
            $data['materials'] = $subject -> teacherCourseMaterial([],$id);
            // show($data['materials']->upload_name);die;
            //show($data['materials']);die;
            // if(isset($_POST['submit'])){
            //     $week_name = $_POST['title'];
            //     $result = $course_week->UpdateWeekName();
            // }

            if(isset($_POST['submit-weeks'])){
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks + $_POST['no_of_weeks']);
                for ($i=1; $i <= $_POST['no_of_weeks'] ; $i++) {
                    $course_week->createWeek($id,$currentWeeks+$i);
                }
                header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
            }

            if(isset($_POST['submit-title'])){
                // show($_POST);die;

                $result = $course_week->UpdateWeekName($id,$_POST['weeknumber'],$_POST['title']);
            }

            if(isset($_POST['submit-upload'])){
                // echo $_POST['upload-title'];die;
                // echo $_POST['cid'];die;
                $result = $course_content->UpdateUploadName($id,$_POST['cid'],$_POST['upload-title']);
            }

            if(isset($_POST['submit-delete-week'])){
                $result = $course_week->deleteWeek($_POST['delete-weeknumber']);
                $currentWeeks = $course->getWeekCount($id)->No_Of_Weeks;
                $course->UpdateNoOfWeeks($id,$currentWeeks - 1);
                header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
            }

            if(isset($_POST['submit-delete-up'])){
                // $result = $course_material->deleteUpload($_POST['delete-filenumber']);
                $result = $course_content->deleteUpload($_POST['delete-filenumber']);
                header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
            }

            $this->view('teacher/course',$data);
        }

        if($action == 'upload') {
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if($course_material -> validate($_POST)){
                    if(isset($_FILES['file'])) {
                        $cid = uniqid();
                        $_POST['file_id'] =$fileid= uniqid();
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
                                    $result2 = $course_content->insert($_POST);
                                    $result = $course_material->insert($_POST);
                                    echo "Material successfully published!";
                                    header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
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
            $data['courses'] = $subject -> CoursePage(['course_id' => $id],$user_id);
            $data['week_no'] = $week;

            $this->view('teacher/upload',$data);
        }

        if($action == "url"){
            if(isset($_POST['submit']))
            {
                if($course_content -> validate($_POST)){
                    $cid = uniqid();
                    // $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."/".$week."/?id=".$cid;
                    $viewURL = $_POST['URL'];

                    $_POST['course_id'] = $id;
                    //show($_POST);die;
                    $_POST['type'] = "URL";
                    $_POST['cid'] = $cid;
                    $_POST['view_URL'] = $viewURL;
                    $result2 = $course_content -> insert($_POST);
                    // $result = $course_url->insert($_POST);
                    echo "Material successfully published!";
                    header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
                }
                else{
                    $data['errors'] =  $course_content->error;

                }
            }
            $data['rows']= $course->select([],'course_id');
            //show($data['rows']);die;
            $data['sums']= $subject -> teacherCourse([],$user_id);
            //show($data['sums']);die;
            $data['courses'] = $subject -> CoursePage(['course_id' => $id],$user_id);
            $data['week_no'] = $week;
            // show($data['week_no']);die;
            //   show($data['courses']);die;
            $this->view('teacher/url',$data);
        }

        if($action == "announcement") {
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

                        $_POST['empID'] = $teacher_id[0]->teacher_ID;
                        $_POST['role'] = 'Teacher';

                        $file = $_FILES['attachment'];
                        $fileName = $_FILES['attachment']['name'];
                        $fileTmpName = $_FILES['attachment']['tmp_name'];
                        $fileSize = $_FILES['attachment']['size'];
                        $fileError = $_FILES['attachment']['error'];
                        $fileType = $_FILES['attachment']['type'];
                        $fileExt = explode('.',$fileName);
                        $fileActualExt = strtolower(end($fileExt));

                        $allowed1 = array('jpg','jpeg','png', 'pdf','zip','txt','sql','docx','xml','doc','ppt', 'mp3','mp4','php','html','css','js');

                        if(in_array($fileActualExt, $allowed1)) {
                            if($fileError === 0) {
                                if($fileSize < 1000000000) {
                                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                                    $fileDestination = "/xampp/htdocs/Interlearn/uploads/".$id."/announcements/".$announcement_id;
                                    if (!is_dir($fileDestination)){
                                        mkdir($fileDestination,0644, true);
                                    }
                                    $destination =  $fileDestination."/".$fileNameNew;
                                    move_uploaded_file($fileTmpName,$destination);
                                    $viewURL="http://localhost/Interlearn/uploads/".$id."/announcements/".$announcement_id."/".$fileNameNew;
                                    $_POST['file_name_new'] = $fileNameNew;
                                    $_POST['attachment'] = $viewURL;
                                    // $_POST['file_name'] =
                                    $result = $announcement->insert($_POST);
                                    $result2 = $ann_course->insert($_POST);
                                    echo "Announcement successfully published!";
                                    header("Location:http://localhost/Interlearn/public/teacher/course/announcement/".$id."/0");
                                } else {
                                    echo "Image is too large!";
                                }
                            } else {
                                echo "There was an error uploading image!";
                            }
                        } else {
                            echo "You cannot upload this file!";
                        }
                    } else {
                        $data['errors'] = $announcement -> error;
                    }
                }
                $this->view('teacher/addAnnouncement',$data);
            }



            // echo $id;die;

            $data['announcements'] = $announcement -> showAnnouncement($id);
            // show($data['announcements']);die;

            if(isset($_POST['edit-announcement'])){
                show($_POST['attachment']);die;
                $result = $announcement->updateAnnouncement($_POST['aid'],$_POST['title'],$_POST['content'],$_POST['attachment']);
            }

            if(isset($_POST['delete-announcement'])){
                $result = $announcement->deleteAnnouncement($_POST['delete-aid']);
                header("Location:http://localhost/Interlearn/public/teacher/course/announcement/".$id."/0");
            }
            // show($data['announcements']);die;

            $this->view('teacher/announcement',$data);
        }

        if($action == "assignment")
        {
            $assignment = new Assignment();
            $assignmentfiles = new AssignmentFiles();
            $data=[];
            $data['errors']=[];
            $filenames = [];
           // echo $option;die;
            if($option == "view"){
               
               
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if($assignment -> validate($_POST)){
                    // echo "IM here";die;
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
                        if($assignmentfiles -> validatefile($_FILES)){
                   
                    $_POST['courseId'] = intval($id);
                    $_POST['assignmentId'] =$assignmentid= uniqid($user,true);
                    
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['assignment_file']['name']); $i++) {
                            $assignment_tmp = $_FILES['assignment_file']["tmp_name"][$i];
                            $assignment_name = $_FILES['assignment_file']["name"][$i];
                            $error= $_FILES['assignment_file']['error'][$i];

                            if($error === 0){
                                $file_ext = pathinfo($assignment_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);

                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignmentid;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;
                                   // echo($destination);die;
                                    move_uploaded_file($assignment_tmp,$destination);

                                    $new_fileID=uniqid();
                                    $filenames[]=['filename'=> $new_file_name,'fileID'=> $new_fileID];

                                    //$result2 = $assignmentfiles->insert($_POST);
                                }
                                else{
                                    $data['errors']['assignment_file']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['assignment_file'] ="Unknown error occured";
                                break;

                                }
                            }

                        
                        $editURL = "http://localhost/Interlearn/public/teacher/course/assignment/".$id."/".$week."/view?id=".$assignmentid;
                        $deleteURL = "http://localhost/Interlearn/public/teacher/course/assignment/".$id."/".$week."/delete?id=".$assignmentid;
                        $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."/".$week."/?id=".$assignmentid;
                        $studentView ="http://localhost/Interlearn/public/student/coursepg/submissionstatus/".$id."/?id=".$assignmentid;;
                        $cid = uniqid();
                        $_POST['cid']=$cid;
                        $_POST['edit_URL']=$editURL;
                        $_POST['view_URL']=$viewURL;
                        $_POST['studentView_URL']=$studentView;
                        $_POST['delete_URL']=$deleteURL;
                        $_POST['week_no']=$week;
                        // $_POST['course_material']="Home Work";
                        $_POST['upload_name']=$_POST['title'];
                        $_POST['type']="assignment";
                        $_POST['course_id'] = $id;
                        $_POST['file_size'] = $assignmentfiles->size;
// show($assignmentfiles->size);die;
                       $material = $course_content->insert($_POST);
                       if(empty($data['errors'])){
                       $result = $assignment->insert($_POST);

                        foreach($filenames as $file){

                                $_POST['assignmentId'] =$assignmentid;
                                $_POST['filename'] = $file['filename'] ;
                                $_POST['fileID'] = $file['fileID'];

                                $result2 = $assignmentfiles->insert($_POST);


                        }
                    
                        if($result && $result2){
                            header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
                        }
                    }

                   // $data['link'] ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$assignmentid;



                    }
                    else{
                        $data['errors'] =  $assignmentfiles->error;
                      
                    }
                    }
                }
                else{
                    $data['errors'] =  $assignment->error;
                 
                }

                    // header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
            }

        }
        if($option == "edit"){
                header('Content-type: application/json');
                if(isset($_GET['id'])){
                    $assignmentID = $_GET['id'];

                }
                if($extra =="d"){
                    $fileID = $_POST['file_id'];
                    $assignmentfiles = new AssignmentFiles();
                    $filedetails = $assignmentfiles -> first(['fileID'=> $fileID],'fileID');
                    $path = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignmentID."/".$filedetails->filename;
                    unlink($path);
                    $result= $assignmentfiles -> delete(['fileID'=> $fileID]);
                    if($result){
                        echo 'successfully deleted';
                        exit;
                    }
                    else{
                        echo 'error in deletion';
                        exit;
                    }
                    exit;
                }



                $assignment = new Assignment();
                $assignmentfiles = new AssignmentFiles();

                $allfiles = $assignmentfiles -> where(['assignmentId'=>$assignmentID],'fileID');
                $allassignment = $assignment -> where(['assignmentId'=>$assignmentID],'assignmentId');
                // show($allassignment[0]->file_size);die;

                //handle update
            if($_SERVER["REQUEST_METHOD"]=="POST"){
       
                // $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
                // echo('success');
                // show($_POST);die;
                if($assignment -> validate($_POST)){
                 
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
                        if($assignmentfiles -> validatefile($_FILES,$allassignment[0]->file_size)){
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['assignment_file']['name']); $i++) {
                            $assignment_tmp = $_FILES['assignment_file']["tmp_name"][$i];
                            $assignment_name = $_FILES['assignment_file']["name"][$i];
                            $error= $_FILES['assignment_file']['error'][$i];
                            if($error === 0){
                                $file_ext = pathinfo($assignment_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);

                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                    // $destination = "../uploads/assignments/". $new_file_name;

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignmentID;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;

                                    move_uploaded_file($assignment_tmp,$destination);
                                    $_POST['filename'] = $new_file_name ;
                                    $_POST['assignmentId'] = $assignmentID;
                                     $_POST['fileID']=uniqid($user,true);
                                    $result = $assignmentfiles->insert($_POST);
                                }
                                else{
                                    $data['errors']['assignment_files']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['assignment_files'] ="Unknown error occured";
                                break;

                                }
                        }
                    }
                    else{
                        $data['errors'] =  $assignmentfiles->error;
                    }
                    }
                }
                else{
                    $data['errors'] =  $assignment->error;
                }
                if(empty($data['errors'])){
                    try {
                    $_POST['file_size'] = $assignmentfiles->size;
    
                    $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
                    if (!$result) {
                        throw new Exception("Update failed");
                        }
                    }
                    catch (Exception $e) {
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
                else{
                    echo json_encode($data['errors']);
                    exit;

                    }
                    // $data['link'] ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$assignmentid;

                    exit;
                }


            // }
                else{
                    $result = $assignment -> whereForAssignment(['assignmentId'=>$assignmentID],'assignmentId');

                    header('Content-type: application/json');
                    echo json_encode($result);
                    exit;
                }
                    exit;
            }

            if($option == "delete"){
                    if(isset($_GET['id'])){
                        $assignmentId = $_GET['id'];
                    }
                    
                    $assignment = new Assignment();
                    $content = new CourseContent();
                    $contentdetails = $assignment->first(['assignmentId'=> $assignmentId],'assignmentId');
                    $result1=   $content  -> delete(['cid'=>  $contentdetails->cid]);
                    $result= $assignment  -> delete(['assignmentId'=> $assignmentId]);
                    if($result && $result1){
                        header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
                    }
                 
                    exit;
                
            }

            $thisCourse = $subject -> coursedetails(['course_id'=> $id]);
            $data["courseTitle"] = $thisCourse->subject;
            $data["Grade"] = $thisCourse->grade;
            $data['errors'] =  $assignment->error;

            $this->view('teacher/submission',$data);
        }
        if($action == "submissions"){
            $submission = new Submission();
            $assignment = new Assignment();
            $data = [];
            if(isset($_GET['id'])){
                $assignmentID = $_GET['id'];
            }
            else{

                header("location:http://localhost/Interlearn/public/teacher/course/view/".$id);
                $this->view('teacher/course',$data);
                exit;
            }
            $count = $submission -> submissionsCount(['assignmentId'=> $assignmentID]);
            $data ['count']= $count;


            //Get all submission details
            $submissions = $submission->allsubmissions(['assignmentId'=> $assignmentID]);
           //show($submissions);die;
           $assignment_details = $assignment -> where(['assignmentId'=> $assignmentID],'assignmentId');
          // show($assignment_details);die;
            if( $submissions){
                foreach ($submissions as $submission){
                    $files = explode(",",$submission->Files);
                    $submission->Files = $files;
                
                }
              

            $data ['assignment']= $submissions[0]->title;
            $data['submissions'] = $submissions;
            }
            else{
                $data ['assignment'] =  $assignment_details[0]->title;
            }
            //create a zip file of all the submissions
            $file_path = "/xampp/htdocs/Interlearn/uploads/submissions/allfiles.zip";
            if($_SERVER["REQUEST_METHOD"]=="POST"){

                if(extension_loaded('zip')){

                    if(isset($_POST['files'])and (!empty($_POST['files']))){

                        $zip_file = "../uploads/allfiles.zip";
                        touch($zip_file);
                        $zip = new ZipArchive();
                        $this_zip = $zip -> open($zip_file);
                        $zip_name = time().".zip";

                        if($this_zip!== TRUE){
                            //opening file error
                            $data['error']="Sorry zip creation failed at this time";
                        }

                        foreach($_POST['files'] as $file){

                           $folder = "../uploads/".$id."/submissions/". $assignmentID."/".$file;
                           $openFolder = opendir($folder);

                           if($openFolder){

                                while(false !== ($downloadfile = readdir($openFolder))){
                                    if($downloadfile !== '.' &&$downloadfile !== '..'){

                                        $file_with_path = $folder."/".$downloadfile;
                                        $zip->addFile($file_with_path,$downloadfile); // adding files into zip
                                    }

                                }


                           }
                           closedir($openFolder);


                        }


                       $zip->close();
                       if(file_exists($zip_file)){
                        //push to download the zip
                        header('Content-type:application/zip');
                        header('Content-Disposition:attachment; filename = "'.$zip_name.'"');
                        readfile($zip_file);
                        //delete the zip file from the server
                        unlink($zip_file);
                    }
                    }
                    else{

                        $data['error']= "Please select the files to download";

                    }

                }
                else{

                    $data['error']= "Extension not loaded";

                }


            }
            $this->view('teacher/assignment_submission',$data);
        }
        // $action=null,$id = null,$week = null, $option = null,$extra=null
        // http://localhost/Interlearn/public/teacher/course/quiz/4/79/create
        if($action == 'quiz') {
            $question = new ZQuestion();
            $choice = new ZChoices();
            $quiz = new ZQuiz();

            $data = [];
            $data['id'] = $id;
            if(isset($_GET['qnum'])) {
                $qnum = $_GET['qnum'];
            }


            if($option == 'create') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $quiz_id = uniqid();
                        $_POST['quiz_id']=$quiz_id;

                        $_POST['course_id'] = $id;

                        $result = $quiz-> insert($_POST);
                        // show($_POST);
                        if($result) {
                            $questions = [];
                            $quiz_question = new ZQuizQuestion();
                            // show($_POST['quiz_bank']);
                            $result1 = $question->QuizInnerjoinQuestion(['quiz_bank'=>$_POST['quiz_bank']]);
                            // var_dump($result1);
                            // show($result1);
                            shuffle($result1);
                            $count = 0;
                            $total_question = $_POST['display_question'];
                            // show($total_question);
                            foreach($result1 as $i ){
                                if($count < $total_question) {
                                    foreach($i as $question=>$number){
                                        $questions[$question] = $number;
                                        $questions['quiz_id'] = $quiz_id;
                                        $result2= $quiz_question->insert($questions);

                                    }
                                    $count = $count + 1; 
                                }
                                else {
                                    break;
                                }
                                
                            }

                            $exam = new ZExam();
                            $_POST['exam_id'] = $quiz_id;
                            $quiz_name = $_POST['quiz_name'];
                            $_POST['exam_name'] = $quiz_name;
                            $_POST['course_id'] = $id;
                            $month_name = date('F');
                            $_POST['exam_month'] = $month_name;
                            $result3 = $exam->insert($_POST);
                            // show(date('F'));

                            $content = new CourseContent();
                            $cid = uniqid();
                            $_POST['cid'] = $cid;
                            $_POST['type'] = 'quiz';
                            $_POST['course_id'] = $id;
                            $_POST['week_no'] = $week;
                            $_POST['upload_name'] = $_POST['quiz_name'];
                            $_POST['view_URL'] = 'http://localhost/Interlearn/public/teacher/course/quiz/4/79/view';
                            $_POST['edit_URL'] =  'http://localhost/Interlearn/public/teacher/course/quiz/4/79/edit';
                            $_POST['delete_URL'] = 'http://localhost/Interlearn/public/teacher/course/quiz/4/79/edit';
                            $_POST['student_URL'] = 'http://localhost/Interlearn/public/STUDENT/course/quiz/4/79/'.$quiz_id;

                            $result = $content->insert($_POST);

                            // $array = json_decode(json_encode($result1), true);

                            // $data1 =[];
                            // $data1 = (array) $result1;
                            // show($data1);

                            // foreach($result1 as $i ) {
                            //     print_r($i);
                            //     array_push($i,(object)['quiz_id'=>$quiz_id]);
                            //     print_r($i);
                            //     $result = $quiz_question-> insert($i);
                            // }
                            // show($result1);
                            // $questions = array();

                            // // Loop through each object and extract the question number
                            // foreach ($result1 as $obj) {
                            //     $questions[] = $obj->question_number;
                            // }

                            // Output the resulting array of question numbers
                            // print_r($questions);
                            // // show($array);
                            // show($_POST);
                            // die;
                            // $result2 = $quiz_question->insert($result1);
                            // show($result2);

                            header("Location:http://localhost/Interlearn/public/teacher/course/view/".$id);
                        }
                }
                $question = new ZQuestion();
                $data['rows'] = $question->QuestionDropdown(['course_id'=>$id]);
                $this->view('teacher/Zquiz_add', $data);
                exit();
            }
            if($option == 'new') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $question_number = uniqid();
                    $_POST['question_number']=$question_number;

                    $_POST['course_id'] = $id;
                    // show($id);die;
                    // $question = new ZQuestion();
                    $result = $question-> insert($_POST);

                    // $choice = new ZChoices();
                    $result = $choice-> insert($_POST);
                    if($result) {
                        header("Location:http://localhost/Interlearn/public/teacher/course/quiz/".$id."/".$week);
                    }
                }

                $this->view('teacher/Zquiz_new');
                exit();
            }

            if($option == 'delete') {
                // $id = $_GET['id'];
                $result = $question->delete(['question_number'=>$qnum]);
                header("Location:http://localhost/Interlearn/public/teacher/course/quiz/".$id."/".$week);
                exit();
            }

            $data['rows'] = $question->ChoiceInnerjoinQuestion(['course_id'=>$id]);
        // show($data['rows']);die;
            $this->view('teacher/Zquiz', $data);
        }



        if($action == "forum")
        {
            $mainForum = new mainForum();
            $data['course']  = $subject -> coursedetails(['course_id'=>$id]);

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $mainforum_id = uniqid('F',true);
                $_POST['mainforum_id']=$mainforum_id;
                $_POST['course_id']= $id;

                $editURL = "#";
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

            $this->view('teacher/mainForum',$data);
        }
    }

    // public function upload()
    // {
    //     if(!Auth::is_teacher()){
    //         redirect('home');

    //     }
    //     $user_id = Auth::getuid();
    //     $subject = new Subject();
    //     $course = new Course();
    //     $teacher = new Teacher();
    //     $instructor = new Instructor();
    //     $course_material = new CourseMaterial();
    //     $data = [];

    //     if(isset($_POST['submit']))
    //     {
    //         $file = $_FILES['file'];

    //         $fileName = $_FILES['file']['name'];
    //         $fileTmpName = $_FILES['file']['tmp_name'];
    //         $fileSize = $_FILES['file']['size'];
    //         $fileError = $_FILES['file']['error'];
    //         $fileType = $_FILES['file']['type'];

    //         $fileExt = explode('.',$fileName);
    //         $fileActualExt = strtolower(end($fileExt));

    //         $allowed1 = array('jpg','jpeg','png');
    //         $allowed2 = array('pdf','zip','txt','sql','docx','xml','doc','ppt');
    //         $allowed3 = array('mp3','mp4');

    //         if(in_array($fileActualExt, $allowed1)){
    //             // print_r($_FILES['file']);exit;
    //             if($fileError === 0){
    //                 if($fileSize < 1000000){
    //                     $fileNameNew = uniqid('',true).".".$fileActualExt;
    //                     $fileDestination = 'uploads/images/'.$fileNameNew;
    //                     move_uploaded_file($fileTmpName,$fileDestination);
    //                     //echo $fileActualExt;exit;
    //                     //var_dump($_POST);exit;
    //                     $_POST['course_material'] = $fileNameNew;
    //                     show($_POST);die;
    //                     $result = $course_material->insert($_POST);
    //                     header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
    //                 }else{
    //                     echo "Image is too large!";
    //                 }
    //             }else{
    //                 echo "There was an error uploading image!";
    //             }
    //         }else{
    //             echo "You cannot upload this file!";
    //         }

    //         if(in_array($fileActualExt, $allowed2)){
    //             // print_r($_FILES['file']);exit;
    //             if($fileError === 0){
    //                 if($fileSize < 10000000){

    //                     $fileNameNew = uniqid('',true).".".$fileActualExt;
    //                     $fileDestination = 'uploads/documents/'.$fileNameNew;
    //                     move_uploaded_file($fileTmpName,$fileDestination);
    //                     //echo $fileActualExt;exit;
    //                     //var_dump($_POST);exit;
    //                     $result = $course_material->insert($_POST);
    //                     var_dump($_POST);exit;
    //                     header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
    //                 }else{
    //                     echo "File is too large!";
    //                 }
    //             }else{
    //                 echo "There was an error uploading file!";
    //             }
    //         }else{
    //             echo "You cannot upload this file!";
    //         }

    //         if(in_array($fileActualExt, $allowed3)){
    //             // print_r($_FILES['file']);exit;
    //             if($fileError === 0){
    //                 if($fileSize < 1000000000){

    //                     $fileNameNew = uniqid('',true).".".$fileActualExt;
    //                     $fileDestination = 'uploads/videos/'.$fileNameNew;
    //                     move_uploaded_file($fileTmpName,$fileDestination);
    //                     //echo $fileActualExt;exit;
    //                     $result = $course_material->insert($_POST);
    //                     header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
    //                 }else{
    //                     echo "File is too large!";
    //                 }
    //             }else{
    //                 echo "There was an error uploading file!";
    //             }
    //         }else{
    //             echo "You cannot upload this file!";
    //         }


    //     }



    //     $data['rows']= $course->select([],'course_id');
    //     //show($data['rows']);die;
    //     $data['sums']= $subject -> teacherCourse([],$user_id);
    //     show($data['sums']);die;
    //     $data['courses'] = $subject -> CoursePg([],$user_id);
    //       show($data['courses']);die;
    //     $this->view('teacher/upload',$data);
    // }

    public function progress()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           exit;
        }

        $this->view('teacher/progress');
    }



    public function profile($action=null,$id = null)
    {
        if(!Auth::is_teacher()){
            redirect('home');
           exit;
        }
        // if($action=='add'){

        // }
        $id = $id ?? Auth::getEMP_ID();
        $staff = new Staff();
        $data['row'] = $staff->first(['emp_id'=>$id],'emp_id');
        $data['title'] = "Profile";
        
        $this->view('teacher/profile',$data);
    }

    // -----------------------Not used ------------------------------------//
    public function quizz($action=null,$id = null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }

        if($action=='add') {

            $data = [];
            $data['quizz_id']=[];
            $quizz  = new Quizz();
            $id = $_GET['id'];
            $quizz_row = $quizz -> where(['quizz_id'=>$id], 'quizz_id');

            foreach($quizz_row as $row){
                $GLOBALS['total_question'] = $row->quizz_bank;
                $GLOBALS['qid'] = $row->quizz_id;  // getting the quizz_id to qid global
                // echo ($GLOBALS['total_question']);
            }

            // while($GLOBALS['total_question'] >= 0) {
            // if($GLOBALS['total_question'] > 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $question_number = uniqid();
                    $_POST['question_number']=$question_number;

                    //  $id = $_GET['id'];
                    $_POST['quizz_id']=esc($id);
                    // show($_POST);die;

                    $question = new Question();
                    $result = $question-> insert($_POST);
                    // if($result) {
                    //     echo"sucecessfully" ; die;
                    // }
                    $choice = new Choices();
                    $result = $choice-> insert($_POST);
                    // $GLOBALS['total_question']--;
                    // echo ($GLOBALS['total_question']);
                    // if($GLOBALS['total_question'] == 3) {
                    //     echo "Im 3";
                    // }
                }
                $data['quizz_id']=$GLOBALS['qid'];
                $this->view('teacher/quiz-add',$data);
                exit();
                    // $GLOBALS['total_question']--;

                    // header("Location:http://localhost/Interlearn/public/teacher/quizz/add?id=".$quizz_id);
                // }

            // }

        }
        if($action=='final'){
            $confirm = new Confirm();
            $id = $_GET['id'];
            // echo $id;
            if($_SERVER["REQUEST_METHOD"]=="POST") {

                $_POST['quizz_id']=$id ;

                $result = $confirm-> insert($_POST);

                if($result) {
                    header("Location:http://localhost/Interlearn/public/teacher/course");
                }
            }
            // $data['quizz_id']=$GLOBALS['qid'];
            $this->view('teacher/quizz-final');
            exit();
        }
        if($action=='all'){

            $question = new Question();
            $data['rows'] = $question->ChoicejoinQuestion();


            $this->view('teacher/quizz_all');

            // $quizz = new Quizz();
            // $id = $_GET['id'];

            // $data['row'] = $quizz->first(['quizz_id'=>$id],'quizz_id');
            // show($data['row']);

            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $quizz_id = uniqid();
                $_POST['quizz_id'] = $quizz_id;


                $quizz = new Quizz();
                // $id = $_POST['quizz_id'];
                $result = $quizz-> insert($_POST);


                $data['quizz_id']=$quizz_id;
                $learn = new Learning();
                $quizz_url = "http://localhost/Interlearn/public/student/quizz/add?id=".$quizz_id;
                $_POST['url'] = $quizz_url;
                $result = $learn->insert($_POST);

            if($result) {
                header("Location:http://localhost/Interlearn/public/teacher/quizz/add?id=".$quizz_id);
            }
        }

        $this->view('teacher/quizz');
    }

    // -------------------------------------------------------------------------//


    //-------------After the changes --------------------------------//
    // public function quiz($action=null, $id = null)
    // {
    //     if(!Auth::is_teacher()){
    //         redirect('home');
    //        exit;
    //     }
    //     $question = new ZQuestion();
    //     $choice = new ZChoices();
    //     $quiz = new ZQuiz();
    //     $data = [];
    //     $data['id'] = $id;

    //     if($action == 'new'){

    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //             $question_number = uniqid();
    //             $_POST['question_number']=$question_number;

    //             $_POST['course_id'] = 4;

    //             // $question = new ZQuestion();
    //             $result = $question-> insert($_POST);

    //             // $choice = new ZChoices();
    //             $result = $choice-> insert($_POST);
    //             if($result) {
    //                 header("Location:http://localhost/Interlearn/public/teacher/quiz/");
    //             }
    //         }

    //         $this->view('teacher/Zquiz_new');
    //         exit();
    //     }

    //     if($action == 'create') {

    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //             $quiz_id = uniqid();
    //             $_POST['quiz_id']=$quiz_id;

    //             $_POST['course_id'] = 4;

    //             $result = $quiz-> insert($_POST);

    //             if($result) {
    //                 echo "success";die;
    //             }
    //         }
    //         $this->view('teacher/Zquiz_add');
    //         exit();
    //     }

    //     if($action == 'delete') {

    //         // $id = $_GET['id'];
    //         $result = $question->delete(['question_number'=>$id]);
    //         header("Location:http://localhost/Interlearn/public/teacher/quiz");
    //     }

    //     if($action == 'edit') {

    //         // $id = $_GET['id'];
    //         $result = $question->update(['question_number'=>$id]);
    //         header("Location:http://localhost/Interlearn/public/teacher/quiz");
    //     }
    //     // $data =[];
    //     $data['rows'] = $question->ChoiceInnerjoinQuestion();
    //     // show($data);
    //     $this->view('teacher/Zquiz', $data);
    // }

    //--------------------------------------------------------------///






}