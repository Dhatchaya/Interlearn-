<?php
/**
 *Question class
 */
class Confirm extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "quizz_confirm";
    protected $allowed_columns = [

        
    'display_question',
     'quizz_date',
     'enable_time',
     'disable_time',
     'duration',
     'format_time',
     'total_points',
     'quizz_id'
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


}