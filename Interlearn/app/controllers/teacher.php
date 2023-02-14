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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $question_number = uniqid();
                $_POST['question_number']=$question_number;
            
                $question = new Question();
                $result = $question-> insert($_POST);
                // if($result) {
                //     echo"sucecessfully" ; die;
                // }
                $choice = new Choices();
                $result = $choice-> insert($_POST);
            }
            exit();
        }
        if($action=='final'){
            $this->view('teacher/quizz-final');
            exit();
        }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quizz = new Quizz();
            $result = $quizz-> insert($_POST);
         
            if($result) {
                header("Location:http://localhost/Interlearn/public/teacher/quizz/add");
            }
        }
        
        $this->view('teacher/quizz');
    }
}