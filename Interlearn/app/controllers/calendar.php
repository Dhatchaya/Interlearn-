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

    }
    public function instructor()
    {
        if (!Auth::is_instructor()) {
            redirect('home');
        }
        $course = new CourseInstructor();
        $userid = Auth::getUID();;
        $result= $course->getinstructorClasses(['uid'=>$userid]);


        header('Content-Type: application/json');
        echo json_encode($result);

    }

}