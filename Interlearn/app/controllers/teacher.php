<?php
/**
 *teacher  class
 */
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
    public function course($action=null, $id=null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        print_r($id);exit; 

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
          show($data['courses']);die;
        $this->view('teacher/course',$data);
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
           
        }
        
        $this->view('teacher/progress');
    }

    public function submission()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/submission');
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
    public function quizz($action=null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        if($action=='add'){
            $this->view('teacher/quiz-add');
            exit();
        }
        if($action=='final'){
            $this->view('teacher/quizz-final');
            exit();
        }
        $this->view('teacher/quizz');
    }
}