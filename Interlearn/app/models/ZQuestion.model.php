<?php
/**
 *Question class
 */
class ZQuestion extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "myquestion";
    protected $allowed_columns = [

        'question_title' ,
        'question_mark' ,
        'question_number' ,
        'category' ,
        'course_id'

    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
    public function validate($data)
    {   
        $this->error = [];
        foreach($data as $key => $value)
        { 
            if(empty($data[$key]))
            {
                $this -> error[$key] = ucfirst($key)." is required";
            }
         }
    
            // // checks email is valid if so it'll check whther it already exists
            // if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            // {
            //     $this->error['email'] = "Email is not valid";
            // }else
            // if($this->where(['email'=>$data['email']])){
            //         $this->error['email'] = "Email already exists";
                
            // }
        if(empty($this->error)){
            return true;
        }
        return false;
    }


    public function ChoiceInnerjoinQuestion($data= null){

        // $query = "SELECT c.choice1, c.choice2, c.choice3, c.choice4, c.choice1_mark, c.choice2_mark, c.choice3_mark,c.choice4_mark,q.question_title, q.question_mark, q.category, q.question_number
        // FROM mychoice c
        // INNER JOIN myquestion q ON c.question_number = q.question_number";


        // $query = "SELECT q.question_number, q.question_title, c.choice1, c.choice1_mark, c.choice2, c.choice2_mark,c.choice3, c.choice3_mark,c.choice4, c.choice4_mark,quiz.quiz_name, quiz.quiz_description, quiz.total_points, quiz.enable_time, quiz.disable_time, quiz.duration, quiz.format_time 
        // FROM myquiz_myquestion qq 
        // JOIN myquiz quiz ON qq.quiz_id = quiz.quiz_id 
        // JOIN myquestion q ON qq.question_number = q.question_number 
        // JOIN mychoice c ON q.question_number = c.question_number 
        // WHERE qq.quiz_id = '640584214e2ff' AND quiz.quiz_id = '640584214e2ff'";


        $query = "SELECT myquiz.* , myquestion.question_title, myquestion.question_mark, mychoice.* FROM myquiz 
        INNER JOIN myquiz_myquestion ON myquiz.quiz_id = myquiz_myquestion.quiz_id 
        INNER JOIN myquestion ON myquestion.question_number = myquiz_myquestion.question_number
        INNER JOIN mychoice ON myquestion.question_number = mychoice.question_number
        where myquiz.quiz_id = '640584214e2ff' and myquiz.course_id = 4";

        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;
           
    }

    public function QuizInnerjoinQuestion($data= null){
        
        $keys = array_keys($data);
        $query = "SELECT  question_number
        FROM myquestion where ";


        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;       
    }

}