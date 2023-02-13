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
        
        $this->view('instructor/home');
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
    public function course()
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }
        
        $this->view('instructor/course');
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