<?php
/**
 *teacher  class
 */
class Teacher extends Controller
{
    public function index()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/home');
    }

    public function course()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/course');
    }

    public function upload()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/upload');
    }

    public function submission()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/submission');
    }

    public function profile($id = null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }

        $id = $id ?? Auth::getID();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Profile";
        
        $this->view('teacher/profile',$data);
    }
}