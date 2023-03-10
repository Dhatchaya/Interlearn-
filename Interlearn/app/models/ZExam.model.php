<?php
/**
 *Question class
 */
class ZExam extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "myexam";
    protected $allowed_columns = [

        'exam_id',
        'exam_month',
        'exam_name',
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


    // public function Exam($data= null){

    //     $query = "SELECT c.choice1, c.choice2, c.choice3, c.choice4, c.choice1_mark, c.choice2_mark, c.choice3_mark,c.choice4_mark,q.question_title, q.question_mark, q.category, q.question_number
    //     FROM mychoice c
    //     INNER JOIN myquestion q ON c.question_number = q.question_number where";

    //     $res = $this -> query($query,$data);

    //     if(is_array($res)){
    //         return $res;
    //     }
    //     return false;
           
    // }

}