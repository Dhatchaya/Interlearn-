<?php
/**
 *Question class
 */
class Choices extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "choice";
    protected $allowed_columns = [

        'choice1',
        'choice1_mark',
        'choice2',
        'choice2_mark',
        'choice3',
        'choice3_mark',
        'choice4',
        'choice4_mark',
        'question_number',

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