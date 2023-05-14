<?php
/**
 *Day class
 */
class Teacher extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "teachers";
    protected $allowed_columns = [
        'teacher_id',	
        'firstname',	
        'lastname',	
        'nic',	
        'address',	
        'mobile_number',
        'gender'
    ];
    public function validate($data)
    {   
        $this->error = [];
        if(empty($data['teacher_id']))
            {
                $this -> error['teacher_id'] = "a teacher_id is required";
            }
        // foreach($data as $key => $value)
        // { 
        //     if(empty($data[$key]))
        //     {
        //         $this -> error[$key] = ucfirst($key)." is required";
        //     }
        //  }
    
            // checks email is valid if so it'll check whther it already exists
            // if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            // {
            //     $this->error['email'] = "Email is not valid";
            // }else
            // if($this->where(['email'=>$data['email']],'uid')){
            //         $this->error['email'] = "Email already exists";
                
            // }
        if(empty($this->error)){
            return true;
        }
        return false;
    }


}