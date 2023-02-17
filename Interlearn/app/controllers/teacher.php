<?php
/**
 *teacher  class
 */
$total_question = 0;
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

            $quizz  = new Quizz();
            $id = $_GET['id'];
            $quizz_row = $quizz -> where(['quizz_id'=>$id], 'quizz_id');

            foreach($quizz_row as $row){
                $GLOBALS['total_question'] = $row->quizz_bank;
                // echo ($GLOBALS['total_question']);
            }

            while($GLOBALS['total_question'] >= 0) {
                if($GLOBALS['total_question'] > 0) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $question_number = uniqid();
                    $_POST['question_number']=$question_number;

                    //  $id = $_GET['id'];
                    $_POST['quizz_id']=esc($id);
                    // show($_POST);die;

                    $question = new Question();
                    $result = $question-> insert($_POST);
                    // if($result) {
                    //     echo"sucecessfully" ; die;
                    // }
                    $choice = new Choices();
                    $result = $choice-> insert($_POST);
                }
                    exit();
                    $GLOBALS['total_question']--;
                }

            }

        }
        if($action=='final'){
            $this->view('teacher/quizz-final');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $confirm = new Confirm();
                $result = $confirm-> insert($_POST);
                // if($result) {
                //     echo"sucecessfully" ; die;
                // }
            }
            exit();
        }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $quizz_id = uniqid();
                $_POST['quizz_id'] = $quizz_id;
                $quizz = new Quizz();
                // $id = $_POST['quizz_id'];
                $result = $quizz-> insert($_POST);

            if($result) {
                header("Location:http://localhost/Interlearn/public/teacher/quizz/add?id=".$quizz_id);
            }
        }

        $this->view('teacher/quizz');
    }
    
}