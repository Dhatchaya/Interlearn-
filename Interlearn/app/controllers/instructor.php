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
                    $announcement_id = uniqid();
                    $_POST['aid'] = $announcement_id;
                    $_POST['course_id'] = $id;
                    $teacher_id = $course -> getTeacherID($id);
                    $_POST['teacher_id'] = $teacher_id[0]->teacher_id;

                    // show($_POST);die;
                    // show($teacher_id[0]->teacher_id);die;
                    //$announcement = new Announcement();
                    $result = $announcement->insert($_POST);
                    $result2 = $ann_course->insert($_POST);
                    echo "Announcement successfully published!";
                    header("Location:http://localhost/Interlearn/public/instructor/course/announcement/".$id."/0");
                    //show($_POST);die;
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