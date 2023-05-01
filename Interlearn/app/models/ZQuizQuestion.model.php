<?php
/**
 *ZQuizQuestion class
 */
class ZQuizQuestion extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "myquiz_myquestion";
    protected $allowed_columns = [	

        'qq_id',
        'question_number',
        'quiz_id'	

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

    public function totalQuestion($data= null){
        
        $keys = array_keys($data);
        $query = "SELECT COUNT(*) AS num_questions FROM myquiz_myquestion WHERE quiz_id = '643e15c9958df'";


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