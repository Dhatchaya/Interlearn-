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

    public function quiz()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        

        // $result = mysqli_query($conn, $query);
        $question = new Question();
        $result = $question->ChoicejoinQuestion();
        $quiz = array();
        foreach ($result as $row) {
            $question = array(
                'q' => $row->question_title,
                'options' => array(
                    array('text' => $row->choice1, 'marks' => intval($row->choice1_mark)),
                    array('text' => $row->choice2, 'marks' => intval($row->choice2_mark)),
                    array('text' => $row->choice3, 'marks' => intval($row->choice3_mark)),
                    array('text' => $row->choice4, 'marks' => intval($row->choice4_mark))
                )
            );
            array_push($quiz, $question);
        }
        // show($quiz);
        header('Content-Type: application/json');
        // convert the PHP array to a JSON object
        // $quiz_json = json_encode($quiz);

        // return the JSON object
        
        echo json_encode($quiz);
        // show($quiz_json);
        $this->view('student/quiz');
        die();
    }
}