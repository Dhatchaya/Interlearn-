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
        
        $this->view('student/home');
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
   

    public function course()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/course');
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

    public function coursepg()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/coursepg');
    }

    public function submission()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/submission');
    }

    public function submissionstat()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/submissionstat');
    }

}