<?php
/**
 *home class
 */
class Courses extends Controller
{
    public function index($action = null, $id = null)
    {   
        $subject = new Subject();
        $course = new Course();
        $teacher = new Teacher();
        $instructor = new Instructor();
        $data = [];
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;
        
        if($action == 'view')
        {
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

            $this->view('details',$data);
            exit;

        }

        $data['rows']= $course->select([],'course_id');
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;
       $this->view('courses',$data);
    }

    

    // public function edit()
    // {
    //     echo "edit page";
    //     $this->view('edit',$data);
    // }

    // public function delete($id1)
    // {
    //     echo "delete page".$id1;
    // }

    // public function courses()
    // {
    //     // echo "edit page";
    //     $this->view('courses');
    // }
}