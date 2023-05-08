<?php
/**
 *Student class
 */
class Student extends Controller
{
    public function index()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        $user = Auth::getUID();
        $course = new Course();
        $subject = new Subject();
        $teacher = new Teacher();
        $student = new Students();
        $announcement = new Announcement();
        $ann_course = new AnnouncementCourse();
        $student_course = new StudentCourse();

        // $res=$student_course->join(
        //     [$announcement->table=>'classid',
        //     $student_course->table=>'course_id'
        // ]);

        $data['students'] = $student -> getStudentName($user);
        // $student_name = $data['students'][0]->fullname;
        // show($data['students'][0]->fullname);die;
        // echo $student_name;die;

        // $res=$student_course->join(['uid'=>$user]);
        $data['announcements'] = $announcement->allRecepAnnouncements([]);
        //$data['announcement'] = $res;
        //show($data['announcements']);die;

        $this->view('student/home',$data);
    }
    public function profile($id = null)
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        $id = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid'=>$id],'uid');
        
        $this->view('student/profile');
    }


    public function course($action = null, $id = null, $option = null)
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        $user_id = Auth::getuid();
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $student_course = new StudentCourse();
        $course_week = new CourseWeek();
        $course_material = new CourseMaterial();
        $course_content = new CourseContent();
        $data = [];

        if($action == 'view')
        {
            // print_r($id);exit;    
            $data = [];
            $data['action'] = $action;
            $data['id'] = $id;
            
            //$data['courses'] = $subject -> CoursePg([],$user_id);
            $data['courses'] = $subject -> stdCourseDetails([],$id);
            //show($data['courses']);die;
            $data['çourseWeeks'] = $course_week->getWeeks($id);

            // $data['materials'] = $subject -> studentCourseMaterials([],$id);
            $data['materials'] = $course_content -> studentCourseContent([],$id);
            // show($data['materials']);die;

            // $data['files'] = $course_material -> downloadFiles([],$id);

            if($option == 'announcement'){
                $announcement = new Announcement();
                $ann_course = new AnnouncementCourse();
                $student_course = new StudentCourse();
                // show($user_id);die;
                // show($id);die;

                $data['announcements'] = $announcement->stdAnnouncements([],$user_id,$id);
                // show($data['announcements']);die;

                $this->view('student/announcement',$data);
            }

            if(!empty($_GET['file_id'])){
                $fid = $_GET['file_id'];
                echo $fid;die;
                $result = $course_material -> downloadFiles([],$fid);
                $filename = basename($_GET['file_id']);
                $filepath = 'uploads/documents/'.$filename;
                if(!empty($filename) && file_exists($filepath)){
                    header("Cache-Control: public");
                    header("Content-Description: File Transfer");
                    header("Content-Disposition: attachment; filename = $filename");
                    header("Content-Type: application/pdf");
                    header("Content-Transfer-Emcoding: binary");
                    header("Expires: 0");
                    header("Content-Length: ".filesize($filepath));

                    readfile($filepath);
                    // $newCount = $data['materials'->'downloads']
                    exit;
                }
                else{
                    echo "File does not exist";
                }
            }
            
            $this->view('student/coursepg',$data);
                
        }
        $data['rows']= $course->select([],'course_id');
        // show($user_id);die;
        $data['sums']= $subject -> studentCourse([],$user_id);
        // show($data['sums']);die;
        

        //$data['courses'] = $subject->stdCoursePg([],$course_id);
        
        $this->view('student/course',$data);
    }
    public function progress($action=null)
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        if($action=='performance'){
            $this->view('student/performance');
            exit();
        }
        
        $this->view('student/progress');
    }

    public function myprogress($action = null, $data = null) 
    {
        if(!Auth::is_student()){
            redirect('home');
           
        }
        $student = new Students();
        $user_id = Auth::getuid();
        $courseStudent = new StudentCourse();

        // show($user_id);
        // $result = $student->getStudentName($user_id);
        // show($result);
        $result = $student->getStudentID($user_id);
        // show($result);
        $student_value = $result[0];
        $student_id = $student_value->studentID;
        // echo $student_id;
        if($action == 'view') {
            
            $id = $_GET['id'];
            $result = new ZResult();
            $data['çount'] = $result->ResultStudentGraph(['course_id' => $id,'studentID' => $student_id]);
            // show($data);

            $newArray = array(
                "A" => 0,
                "B" => 0,
                "C" => 0,
                "S" => 0,
                "W" => 0
            );
            // show($newArray);
            foreach ($data['çount'] as $row) {
                $newArray["A"] += intval($row->A);
                $newArray["B"] += intval($row->B);
                $newArray["C"] += intval($row->C); 
                $newArray["S"] += intval($row->S);
                $newArray["W"] += intval($row->W);
            }
            // show($newArray);
            $json_data = json_encode($newArray);
            $data['newArray'] = $newArray;
                // show($data['newArray']);die;
            // $data['table'] = $data['rows2'];

            $exam = new ZExam();
            $data['rows'] = $exam->ExamResult(['course_id' => $id, 'studentID' => $student_id]);
            // $this->view('student/view_progress', $newArray);
            $this->view('student/view_progress', $data);
            exit();
        }
        $data['rows']= $courseStudent->CourseForStudent(['student_id' => $student_id]);
        // show($data);
        $this->view('student/myprogress', $data);
    }
    
    public function overall()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/crsoverall');
    }

    public function coursepg($action = null , $id = null,$option = null,$extra=null)
    { 
        if(!Auth::is_student()){
            redirect('home');
        }

        //submission status page
        if($action == "submissionstatus"){
            $data = [];
            $courseid= $id;
            $data['submission']=[];
            $data['assignment']=[];
            if(isset($_GET['id'])){
                $sub_id = $_GET['id'];
            }
            else{
                $data['title'] = "404";
                $this->view('404',$data);
                exit;
            }
            $assignment = new Assignment;
            $submission = new Submission;
            $course = new Course;

            $result = $assignment->joinCourseAssignment(['assignmentId'=>$sub_id,'course_id'=>$id],'assignmentId');
            $data['assignment']= $result;
            $getstatus = $submission -> Checkstatus(['assignmentId'=>$sub_id,'uid'=>Auth::getUID()],'assignmentId');
        //  show($getstatus);die;
            if($getstatus){
                $data['assignment']->status = $getstatus->status;
                $data['assignment']->modified = $getstatus->modified;
                 //get the submission ID
                $data['assignment']->submissionID = $getstatus->submissionId;
            }
            else{
      
                $data['assignment']->status = "No attempt";
                $data['assignment']->modified = "-";
            }
            //find remaining time for the submission
            $now = new DateTime();
            $deadline =new DateTime($result->deadline);
            $remainingtime= $now->diff($deadline);
            $remaining = $remainingtime->format('%a days %h hours %i minutes');
            $data['assignment']->remaining = $remaining;
           // show($data);die;
          // show( $data['assignment']);die;
            $this->view('student/submissionstatus',$data);
            exit;
        }



        //file upload page
        if($action == "submission"){
            $user = Auth::getUsername();
            $userid = Auth::getUID();
            $student = new Students();
            $data['errors'] = [];
            $submissionFiles = new SubmissionFiles();
            $submission = new Submission();
   
            if($option == 'view'){
                if(isset($_GET['id'])){
                    $assignment_id = $_GET['id'];
                }
                else if(isset($_GET['sub_id'])){
                 
                }
                else{
                    $data['title'] = "404";
                    $this->view('404',$data);
                    exit;
                }
             
            $studentdetails = $student -> first(['uid'=>$userid],'studentID');

            $student_id = $studentdetails -> studentID;
            $data['errors'] = [];
            $submissionFiles = new SubmissionFiles();
            $submission = new Submission();


              if($_SERVER["REQUEST_METHOD"]=="POST"){
                $_POST['submissionId']=$submissionid=uniqid($user,true);
                if($submissionFiles -> validatefile($_FILES)){
            
                    if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){

                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['submission']['name']); $i++) {
                            $submission_tmp = $_FILES['submission']["tmp_name"][$i];
                            $submission_name = $_FILES['submission']["name"][$i];
                            $error= $_FILES['submission']['error'][$i];
                            $size = $_FILES['submission']['size'][$i];
                            if($error === 0){
                                $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);

                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/submissions/".$assignment_id."/".$submissionid;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;
                                    move_uploaded_file($submission_tmp,$destination);






                                    $new_fileID=uniqid();
                                    $filenames[]=['filename'=> $new_file_name,'fileID'=> $new_fileID,'file_size'=> $size];



                                }
                                else{
                                    $data['errors']['submission']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['submission'] ="Unknown error occured";
                                break;

                                }

                        }

                    }
                    else{
                        $data['errors']['submission'] ="Please upload your files to submit";
                    

                        }
                }
                else{
                    
                    $data['errors'] =  $submissionFiles->error;
                }
                if(empty($data['errors'])){
             
                    $_POST['studentID']=$student_id;
                    $_POST['assignmentId']= $assignment_id;
                    $_POST['status'] = "Submitted";
                    $_POST['file_size'] = $submissionFiles->size;
                    $result2 = $submission->insert($_POST);

                    foreach($filenames as $file){


                        $_POST['filename'] = $file['filename'] ;
                        $_POST['fileID'] = $file['fileID'];
                        $_POST['submissionId']=$submissionid;
                        $_POST['filesize']= $file['file_size'];
                        $result = $submissionFiles->insert($_POST);


                }
                    echo('success');
                }
                else{
                    echo json_encode($data['errors']);
                }

                exit();
              }
            }
              if($option == "edit"){

                header('Content-type: application/json');
                if(isset($_GET['sub_id'])){
                    $submissionID = $_GET['sub_id'];

                }
                if($extra =="d"){
                    $fileID = $_POST['file_id'];
                    $submissionFiles = new SubmissionFiles();
                    $submission = new Submission();
                    $filedetails = $submissionFiles -> joinSubmissionfiles(['fileID'=> $fileID],'fileID');
                    // echo json_encode($filedetails );die;
                    $newfilesize = $filedetails->file_size-$filedetails->filesize;
                    if($newfilesize<0){
                        $newfilesize = 0;
                    }
                    // echo json_encode ( $newfilesize);
                    $result= $submission->update(['submissionId'=>$filedetails->submissionId],['file_size'=>$newfilesize]);
                    $path = "/xampp/htdocs/Interlearn/uploads/".$id."/submissions/".$filedetails->assignmentId."/". $submissionID."/".$filedetails->filename;
                    unlink($path);
                    $result= $submissionFiles -> delete(['fileID'=> $fileID]);
                    if($result){
                        echo 'successfully deleted';
                    }
                    else{
                        echo 'error in deletion';
                    }
                    exit;
                }


            $submission = new Submission();
            $assignment = new Assignment();
            $submissionfiles = new SubmissionFiles();
            $submission_details = $submission -> first(['submissionId'=>$submissionID],'submissionId');
            $assignment_id = $submission_details->assignmentId;
                //handle update
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $previousFilesize = $submissionfiles->getSubmissionsize(['submissionId'=>$submissionID]);

                // $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
     
      
                    if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){
                        if($submissionfiles -> validatefile($_FILES,$previousFilesize->total)){
                         
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['submission']['name']); $i++) {
                            $submission_tmp = $_FILES['submission']["tmp_name"][$i];
                            $submission_name = $_FILES['submission']["name"][$i];
                            $error= $_FILES['submission']['error'][$i];
                            $size = $_FILES['submission']['size'][$i];
                            if($error === 0){
                                $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);

                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                    // $destination = "../uploads/assignments/". $new_file_name;

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/submissions/".$assignment_id."/". $submissionID;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;

                                    move_uploaded_file($submission_tmp,$destination);
                                    $_POST['filename'] = $new_file_name ;
                                    $_POST['submissionId'] = $submissionID;
                                    $_POST['filesize']=$size;
                                     $_POST['fileID']=uniqid($user,true);
                                    $result =  $submissionfiles->insert($_POST);
                                }
                                else{
                                    $data['errors']['submission_files']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['submission_files'] ="Unknown error occured";
                                break;

                                }
                        }
                    }
                    else{
                        $data['errors'] =   $submissionfiles->error;
                    }
                    }
                    else{
                        $submission_details2 = $submission -> first(['submissionId'=>$submissionID],'submissionId');
                        $submissionfiles->size=$previousFilesize->total;
                        if($submission_details2->file_size == 0){
                            $data['errors']['submission'] ="Please upload your files to submit";
                        }
                        
               

                        }
               
                // show($data['errors']);
                if(empty($data['errors'])){
                  
                    try {
                        date_default_timezone_set('Asia/Colombo');
                        $_POST['modified'] = date("Y-m-d H:i:s",time());
                        if(!empty($_POST)){ 
                  

                            $totalfilesize = $submissionfiles->size;

                            $_POST['file_size'] = $totalfilesize;
                            $result = $submission->update(['submissionId'=>$submissionID],$_POST);
                        }
                        else{
                            $result = true;
                        }
                  
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
                $result = $submission -> whereForSubmission(['submissionId'=>$submissionID],'submissionId');

                header('Content-type: application/json');
                echo json_encode($result);
                exit;
            }
                exit;
            }

            $data['errors'] =  $submission->error;

            $this->view('student/submission',$data);
            exit;
        }






        if($action == "view"){
            $this->view('student/coursepg');
        }

        $question = new ZQuestion();

        if($action == "quiz") {

            
            $result = $question->ChoiceInnerjoinQuestion();
            // show($result);
            $quiz = array();
            foreach ($result as $row) {
                $question = array(
                    'q' => $row->question_title,
                    'options' => array(
                        array('text' => $row->choice1, 'marks' => intval($row->choice1_mark)),
                        array('text' => $row->choice2, 'marks' => intval($row->choice2_mark)),
                        array('text' => $row->choice3, 'marks' => intval($row->choice3_mark)),
                        array('text' => $row->choice4, 'marks' => intval($row->choice4_mark))
                    ),
                    'mark' => $row->question_mark,
                    'quiz_description' => $row->quiz_description
                );
                array_push($quiz, $question);
            }
            $json_data = json_encode($quiz);



            // $newquiz = new ZQuiz();
            // $result1 = $newquiz->GetQuiz(['quiz_id'=>'640584214e2ff']);

            // $myquiz = array();
            // foreach ($result1 as $row) {
            //     $newquiz = array(
            //         'quiz_name' => $row->quiz_name,
            //         'quiz_descriptions' => $row->quiz_description,
            //         'enable_time' => $row->enable_time,
            //         'disable_time' => $row->disable_time,
            //         'format_time' => $row->format_time
            //     );
            //     array_push($myquiz, $newquiz);
            // }

            // $json_data1 = json_encode($myquiz);
            header('Content-Type: application/json');
            // echo $json_data1;
            echo $json_data;

            // show($result1);

            exit;

        }

        if ($action == "quiz_view") {
            $this->view('coursepg/quiz');
        }

        $data['title'] = "404";
        $this->view('404',$data);
    }

    // public function submission()
    // {
    //     if(!Auth::is_student()){
    //         redirect('home');
    //         exit;
           
    //     }
    //     if(isset($_GET['id'])){
    //         $submission_id = $_GET['id'];
    //     }
    //     else{
    //         $data['title'] = "404";
    //         $this->view('404',$data);
    //         exit;
    //     }
    //     $user = Auth::getUsername();
    //     $data['errors'] = [];
    //     $submissionFiles = new SubmissionFiles();
        

    //       if($_SERVER["REQUEST_METHOD"]=="POST"){
    //         if($submissionFiles -> validate($_FILES)){
    //             if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){
    //                 //checks every file inside the $_FILES array of files
    //                 for($i=0; $i<count($_FILES['submission']['name']); $i++) {
    //                     $submission_tmp = $_FILES['submission']["tmp_name"][$i];
    //                     $submission_name = $_FILES['submission']["name"][$i];
    //                     $error= $_FILES['submission']['error'][$i];

    //                     if($error === 0){
    //                         $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
    //                         $file_final_ext = strtolower($file_ext);

    //                         $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
    //                         if(in_array($file_final_ext,$allowed_ext)){
    //                             $new_file_name = uniqid($user,true).'.'.$file_final_ext;
    //                             $destination = "../uploads/submissions/". $new_file_name;
    //                             move_uploaded_file($submission_tmp,$destination);
    //                             $_POST['filename'] = $new_file_name ;
    //                             $_POST['fileID']=uniqid($user,true);
    //                             $_POST['submissionId']=$submission_id;
    //                             $result = $submissionFiles->insert($_POST);
    //                         }
    //                         else{
    //                             $data['errors']['submission']='Unsupported file type : '.$file_final_ext;
    //                             break;
    //                         }
    //                     }
    //                     else{
    //                         $data['errors']['submission'] ="Unknown error occured";
    //                         break;

    //                         }

    //                 }

    //             }
    //         }
    //         else{
    //             $data['errors'] =  $submissionFiles->error;
    //         }
    //         if(empty($data['errors'])){

    //             echo('success');
    //         }
    //         else{
    //             echo json_encode($data['errors']);
    //         }

    //         exit();
    //       }

    //     $this->view('student/submission',$data);
    // }

    // public function submissionstatus()
    // { 
    //     if(!Auth::is_student()){
    //         redirect('home');
           
    //     }
        
    //     $this->view('student/submissionstatus');
    // }


    // before adding quiz into course ------------------------------------------------>
    public function quiz($action ='null')
    {
        if(!Auth::is_student()){
            redirect('home');

        }


        // $result = mysqli_query($conn, $query);

        // $question = new Question();
        $question = new ZQuestion();

        if($action == 'marks') {


            $student = new Students();
            $myresult = new ZResult();
            $user_id = Auth::getuid();

            // show($user_id);
            // $result = $student->getStudentName($user_id);
            // show($result);
            $result = $student->getStudentID($user_id);
            // show($result);
            $student_value = $result[0];
            $student_id = $student_value->studentID;
            // echo($student_id);die;
            // show($result);die();
            // echo($_POST['totalMarks']);die;
            // echo($_POST['quizId']);die;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST['studentID'] = $student_id;
                $_POST['marks'] = $_POST['totalMarks'];
                $_POST['exam_id'] = $_POST['quizId'];

                $result = $myresult->insert($_POST);

                if($result) {
                    echo "success";
                }

            }

            exit();
        }

        if($action == "view"){

            $quiz = $_GET['quiz_id'];
           
            $result = $question->ChoicejoinQuestion(['quiz_id' => $quiz]);
            // $result = $question->ChoiceInnerjoinQuestion();
            // show($result);
            $quiz = array();
            foreach ($result as $row) {
                $question = array(
                    'q' => $row->question_title,
                    'options' => array(
                        array('text' => $row->choice1, 'marks' => intval($row->choice1_mark)),
                        array('text' => $row->choice2, 'marks' => intval($row->choice2_mark)),
                        array('text' => $row->choice3, 'marks' => intval($row->choice3_mark)),
                        array('text' => $row->choice4, 'marks' => intval($row->choice4_mark))
                    ),
                    'mark' => $row->question_mark,
                    'quiz_description' => $row->quiz_description
                );
                array_push($quiz, $question);
            }
            $json_data = json_encode($quiz);



            // $newquiz = new ZQuiz();
            // $result1 = $newquiz->GetQuiz(['quiz_id'=>'640584214e2ff']);

            // $myquiz = array();
            // foreach ($result1 as $row) {
            //     $newquiz = array(
            //         'quiz_name' => $row->quiz_name,
            //         'quiz_descriptions' => $row->quiz_description,
            //         'enable_time' => $row->enable_time,
            //         'disable_time' => $row->disable_time,
            //         'format_time' => $row->format_time
            //     );
            //     array_push($myquiz, $newquiz);
            // }

            // $json_data1 = json_encode($myquiz);
            header('Content-Type: application/json');
            // echo $json_data1;
            echo $json_data;

            // show($result1);

            exit;
        }


        // convert the PHP array to a JSON object
        // $quiz_json = json_encode($quiz);

        // // return the JSON object
        // header('Content-Type: application/json');

        // echo $quiz_json;
        // show($quiz_json);
        $this->view('student/quiz');


        // die();
    }

    //before adding quiz into course ----------------------------------------------------->
    public function cardPayment($action = NULL)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }


        include('../public/assets/stripe-php/init.php');
        require_once('../public/assets/stripe/secrets.php');

        \Stripe\Stripe::setApiKey('sk_test_51Mh80UBblwXUQTWeHjt87i6zjsTmnMncmiXZg86ImCp36ac4GMBcLa834MjwhZEMT2girGsJDIS7aK0EXfDzaBFi004sg2RIrQ');
        header('Content-Type: application/json');

        $url =  "http://localhost/Interlearn/public/student/";
        echo $url;
        $YOUR_DOMAIN = $url;

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' =>
                [['price_data' =>
                    ['currency' => 'lkr',
                        'unit_amount' => $pendingPayment->amount,
                        'product_data' => [
                            'name' => "INTERLEARN",
                            'images' => ["../assets/images/sidebar_icons/logo.png"],
                        ],
                    ],
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    // 'price' => '{{PRICE_ID}}',
                    'quantity' => 1,
                ]],
            'mode' => 'payment',
            // if($action){
            //     this->view('student/sucecc');
            // }
            //     }
            'success_url' => $YOUR_DOMAIN . 'success',
            'cancel_url' => $YOUR_DOMAIN . 'cancel',
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }

    public function checkout()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/checkout');
    }

    public function success()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/success');
    }
    public function cancel()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/cancel');
    }



    public function payment($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $currentStudentID = $id ?? Auth::getUID();

        // $payment_model = new Payment();
        // $haveToPay = $payment_model->pendingPayments();

        ////////////////////////////////

        $payment_history = new Payment();
        $each_s_p_h = $payment_history->eachStudentPaymentHistory($currentStudentID);




        $pending_payment_model = new Payment();
        $haveToPay = $pending_payment_model->eachStudentPendingPayment($currentStudentID);

        $this->view('student/student-payment',['payment_history_list'=>$each_s_p_h,'haveToPaySet'=>$haveToPay]);

    }



    // $currentDate = date('Y-m-d');

    // check if it is the first of the month
    // if (date('d', strtotime($currentDate)) == 1) {
    // // retrieve the data from the Course table
    // $sql = "SELECT * FROM Course";
    // $result = $this->query($sql);

    // // insert the data into the pending-payment table
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $sql2 = "INSERT INTO pending-payment (course_name, course_fee) VALUES ('".$row['course_name']."', '".$row['course_fee']."')";
    //     $this->query($sql2);
    //      }
    // }

    /////////////////////////////////


    public function test($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $currentStudentID = $id ?? Auth::getUID();



        $payment_model = new Payment();
        $payment_history = $payment_model->eachStudentPaymentHistory($currentStudentID);

        $pending_payment_model = new Payment();
        $haveToPay = $pending_payment_model->eachStudentPendingPayment($currentStudentID);

        $this->view('student/test',['payment_history'=>$payment_history,'haveToPaySet'=>$haveToPay]);

        print_r ($haveToPay);
        var_dump ($payment_history);
    }


    public function getBankPayment()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }


        if (isset($_POST)) {
            // $_POST['payment_status'] = '1';
            $payment_model = new BankPayment();
            $payment_model->insert($_POST);
            $this->view("student/student-payment");
        }
        $this->view("student/student-payment");
    }


}