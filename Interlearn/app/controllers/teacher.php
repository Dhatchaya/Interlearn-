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
    public function course($action=null,$id = null,$option = null,$extra=null)
    {
       
        if(!Auth::is_teacher()){
            redirect('home');

        }
        $user = Auth::getUsername();
        if($action == "view")
        {
            $data = [];
            $data['action'] = $action;
            $data['id'] = $id;
            //print_r($id);exit;

            $user_id = Auth::getuid();
            $subject = new Subject();
            $course = new Course();
            $teacher = new Teacher();
            $instructor = new Instructor();
            $course_material = new CourseMaterial();
            $student_course = new StudentCourse();
            // $data = [];

            $data['rows']= $course->select([],'course_id');
            //show($data['rows']);die;
            //$data['sums']= $subject -> teacherCourse([],$user_id);
            $data['courses'] = $subject -> stdCourseDetails([],$id);
            //$data['courses'] = $subject -> CoursePg([],$user_id);
            //show($data['sums']);die;
//            show($data['courses']);die;
            $this->view('teacher/course',$data);
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
               // echo "IM here";die;
            if($_SERVER["REQUEST_METHOD"]=="POST"){

                if($assignment -> validatefile($_FILES)&&$assignment -> validate($_POST)){
                    $_POST['courseId'] = intval($id);
                    $_POST['assignmentId'] =$assignmentid= uniqid($user,true);
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
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
                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignment_id;
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

                        }
                        $editURL = "http://localhost/Interlearn/public/teacher/course/assignment/".$id."/view?id=".$assignmentid;
                        $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."?id=".$assignmentid;
                        $_POST['editURL']=$editURL;
                        $_POST['viewURL']=$viewURL;
                        $result = $assignment->insert($_POST);

                        foreach($filenames as $file){

                                $_POST['assignmentId'] =$assignmentid;
                                $_POST['filename'] = $file['filename'] ;
                                $_POST['fileID'] = $file['fileID'];

                                $result2 = $assignmentfiles->insert($_POST);


                        }


                   // $data['link'] ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$assignmentid;



                    }


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
                    $result= $assignmentfiles -> delete(['fileID'=> $fileID]);
                    if($result){
                        echo 'successfully deleted';
                    }
                    else{
                        echo 'error in deletion';
                    }
                    exit;
                }



                $assignment = new Assignment();
                $assignmentfiles = new AssignmentFiles();

                //handle update
            if($_SERVER["REQUEST_METHOD"]=="POST"){

                // $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
                // echo('success');

                if($assignmentfiles -> validate($_POST)){
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
                        if($assignmentfiles -> validatefile($_FILES)){
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

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignment_id;
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
                    }
                }
                else{
                    $data['errors'] =  $assignmentfiles->error;
                }
                if(empty($data['errors'])){
                    try {
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

            $data['errors'] =  $assignment->error;

            $this->view('teacher/submission',$data);
        }
        if($action == "submissions"){
            $submission = new Submission();
            if(isset($_GET['id'])){
                $assignmentID = $_GET['id'];
            }
            else{
                $this->view('teacher/course',$data);
                exit;
            }
            $count = $submission -> submissionsCount(['assignmentId'=> $assignmentID]);
            $data ['count']= $count;


            //Get all submission details
            $submissions = $submission->allsubmissions(['assignmentId'=> $assignmentID]);
           // show($submissions);die;
            if( $submissions){
                foreach ($submissions as $submission){
                    $files = explode(",",$submission->Files);
                    $submission->Files = $files;
                }
        
            $data ['assignment']= $submissions[0]->title;
            $data['submissions'] = $submissions;
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
    }

    public function upload()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        $user_id = Auth::getuid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $course_material = new CourseMaterial();
        $data = [];

        if(isset($_POST['submit']))
        {
            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed1 = array('jpg','jpeg','png');
            $allowed2 = array('pdf','zip','txt','sql','docx','xml','doc','ppt');
            $allowed3 = array('mp3','mp4');

            if(in_array($fileActualExt, $allowed1)){
                // print_r($_FILES['file']);exit;
                if($fileError === 0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'uploads/images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //echo $fileActualExt;exit;
                        //var_dump($_POST);exit;
                        $_POST['course_material'] = $fileNameNew;
                        show($_POST);die;
                        $result = $course_material->insert($_POST);
                        header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
                    }else{
                        echo "Image is too large!";
                    }
                }else{
                    echo "There was an error uploading image!";
                }
            }else{
                echo "You cannot upload this file!";
            }

            if(in_array($fileActualExt, $allowed2)){
                // print_r($_FILES['file']);exit;
                if($fileError === 0){
                    if($fileSize < 10000000){

                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'uploads/documents/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //echo $fileActualExt;exit;
                        //var_dump($_POST);exit;
                        $result = $course_material->insert($_POST);
                        var_dump($_POST);exit;
                        header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
                    }else{
                        echo "File is too large!";
                    }
                }else{
                    echo "There was an error uploading file!";
                }
            }else{
                echo "You cannot upload this file!";
            }

            if(in_array($fileActualExt, $allowed3)){
                // print_r($_FILES['file']);exit;
                if($fileError === 0){
                    if($fileSize < 1000000000){

                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'uploads/videos/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //echo $fileActualExt;exit;
                        $result = $course_material->insert($_POST);
                        header("location: http://localhost/Interlearn/public/teacher/course?uploadsuccess");
                    }else{
                        echo "File is too large!";
                    }
                }else{
                    echo "There was an error uploading file!";
                }
            }else{
                echo "You cannot upload this file!";
            }


        }



        $data['rows']= $course->select([],'course_id');
        //show($data['rows']);die;
        $data['sums']= $subject -> teacherCourse([],$user_id);
        show($data['sums']);die;
        $data['courses'] = $subject -> CoursePg([],$user_id);
          show($data['courses']);die;
        $this->view('teacher/upload',$data);
    }
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

    //-------------After the changes --------------------------------//
    public function quiz($action=null)
    {
        if(!Auth::is_teacher()){
            redirect('home');
           exit;
        }
        $question = new ZQuestion();
        $choice = new ZChoices();

        if($action == 'new'){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $question_number = uniqid();
                $_POST['question_number']=$question_number;

                $_POST['course_id'] = 6;

                // $question = new ZQuestion();
                $result = $question-> insert($_POST);

                // $choice = new ZChoices();
                $result = $choice-> insert($_POST);
                if($result) {
                    header("Location:http://localhost/Interlearn/public/teacher/quiz/");
                }
            }

            $this->view('teacher/Zquiz_new');
            exit();
        }

        if($action == 'create') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $quiz_id = uniqid();
                $_POST['quiz_id']=$quiz_id;

                $_POST['course_id'] = 6;

                $quiz = new ZQuiz();
                $result = $quiz-> insert($_POST);

                if($result) {
                    echo "success";die;
                }
            }
            $this->view('teacher/Zquiz_add');
            exit();
        }

        $data =[];
        $data['rows'] = $question->ChoiceInnerjoinQuestion();
        // show($data);
        $this->view('teacher/Zquiz', $data);
    }

    //--------------------------------------------------------------///

}