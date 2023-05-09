<?php
/**
 *home class
 */
class Staffs extends Controller
{
    public function profileView()
    {   
    if (Auth::is_student()) {
            redirect('home');
    }
    else if(!Auth::is_teacher()&&!Auth::is_instructor()&&!Auth::is_manager()&&!Auth::is_receptionist()){
        redirect('home');
    }
     $data=[];
     $students = new Students();
     $details = $students->joinstudentUser([],'first_name','asc');
     $data['user']="student";
     $data['rows']=$details;
       $this->view('staff/student_details',$data);
    }

    public function profilestaffView()
    {   
    if (Auth::is_student()) {
            redirect('home');
    }
    else if(!Auth::is_manager()&&!Auth::is_receptionist()){
        redirect('home');
    }
     $data=[];
     $staff = new Staff();
     $details = $staff->joinstudentUser([],'first_name','asc');
     $data['user']="staff";
     $data['rows']=$details;
       $this->view('staff/student_details',$data);
    }

  
}