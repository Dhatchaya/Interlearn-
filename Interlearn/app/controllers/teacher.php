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