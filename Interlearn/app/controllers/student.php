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
        // $data['announcements'] = $subject->stdAnnouncements([],$user);
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

            $data['materials'] = $subject -> studentCourseMaterials([],$id);

            // $data['files'] = $course_material -> downloadFiles([],$id);

            if($option == 'announcement'){
                $announcement = new Announcement();
                $ann_course = new AnnouncementCourse();
                $student_course = new StudentCourse();

                $data['announcements'] = $announcement->stdAnnouncements([],$user_id,$id);

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
        $data['sums']= $subject -> studentCourse([],$user_id);
        //show($data['sums']);die;
        

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
    public function overall()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/crsoverall');
    }

    public function coursepg($action = null , $id = null)
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
            $getstatus = $submission -> first(['assignmentId'=>$sub_id],'assignmentId');
         // show($result);die;
            if($getstatus){
                $data['assignment']->status = $getstatus->status;
                $data['assignment']->modified = $getstatus->modified;

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
            $this->view('student/submissionstatus',$data);
        }



        //file upload page
        if($action == "submission"){

            if(isset($_GET['id'])){
                $assignment_id = $_GET['id'];
            }
            else{
                $data['title'] = "404";
                $this->view('404',$data);
                exit;
            }
            $user = Auth::getUsername();
            $userid = Auth::getUID();
            $student = new Students();
            $studentdetails = $student -> first(['uid'=>$userid],'studentID');

            $student_id = $studentdetails -> studentID;
            $data['errors'] = [];
            $submissionFiles = new SubmissionFiles();
            $submission = new Submission();


              if($_SERVER["REQUEST_METHOD"]=="POST"){
                $_POST['submissionId']=$submissionid=uniqid($user,true);
                if($submissionFiles -> validate($_FILES)){
                    if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){

                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['submission']['name']); $i++) {
                            $submission_tmp = $_FILES['submission']["tmp_name"][$i];
                            $submission_name = $_FILES['submission']["name"][$i];
                            $error= $_FILES['submission']['error'][$i];

                            if($error === 0){
                                $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);

                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/submissions/".$assignment_id;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;
                                    move_uploaded_file($submission_tmp,$destination);






                                    $new_fileID=uniqid();
                                    $filenames[]=['filename'=> $new_file_name,'fileID'=> $new_fileID];



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
                }
                else{
                    $data['errors'] =  $submissionFiles->error;
                }
                if(empty($data['errors'])){
                    $_POST['studentID']=$student_id;
                    $_POST['assignmentId']= $assignment_id;
                    $_POST['status'] = "Submitted";
                    $result2 = $submission->insert($_POST);

                    foreach($filenames as $file){


                        $_POST['filename'] = $file['filename'] ;
                        $_POST['fileID'] = $file['fileID'];
                        $_POST['submissionId']=$submissionid;

                        $result = $submissionFiles->insert($_POST);


                }
                    echo('success');
                }
                else{
                    echo json_encode($data['errors']);
                }

                exit();
              }

            $this->view('student/submission',$data);
            exit;
        }

        if($action == "view"){
            $this->view('student/coursepg');
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

    public function submissionstatus()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/submissionstatus');
    }

    public function quiz($action ='null')
    {
        if(!Auth::is_student()){
            redirect('home');

        }


        // $result = mysqli_query($conn, $query);

        $question = new Question();


        if($action == "view"){
            $result = $question->ChoicejoinQuestion();
            $quiz = array();
            foreach ($result as $row) {
                $question = array(
                    'q' => $row->question_title,
                    'options' => array(
                        array('text' => $row->choice1, 'marks' => intval($row->choice1_mark)),
                        array('text' => $row->choice2, 'marks' => intval($row->choice2_mark)),
                        array('text' => $row->choice3, 'marks' => intval($row->choice3_mark)),
                        array('text' => $row->choice4, 'marks' => intval($row->choice4_mark))
                    )
                );
                array_push($quiz, $question);
            }
        $json_data = json_encode($quiz);

        header('Content-Type: application/json');
        echo $json_data;
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
    public function payment($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $id = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid' => $id], 'uid');

        $this->view('student/student-payment');
    }

    public function getBankPayment()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }


        if (isset($_POST)) {
            $payment_model = new BankPayment();
            $payment_model->insert($_POST);
            $this->view("student/student-payment");
        }
        $this->view("student/student-payment");
    }
    public function calendar()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $assignment = new Assignment();
        $userid = Auth::getUID();;
        $result= $assignment->getallAssignments(['uid'=>$userid]);
        

        header('Content-Type: application/json');
        echo json_encode($result);
       // $this->view('includes/calendar');
    }

}