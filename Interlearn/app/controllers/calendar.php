<?php
/**
 *Calendar class
 */
class Calendar extends Controller
{
    
    public function staff()
    {
      
        $course = new Course();
       
        $result= $course->getinstituteClass();


        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
       // $this->view('includes/calendar');
    }
    public function teacher()
    {
        if (!Auth::is_teacher()) {
            redirect('home');
        }
        $course = new Course();
        $userid = Auth::getUID();;
        $result= $course->getTeacherClasses(['uid'=>$userid]);


        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
       // $this->view('includes/calendar');
    }
    public function student()
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
    // public function courses()
    // {
    //     // echo "edit page";
    //     $this->view('courses');
    // }
}