<?php
/**
 *subject class
 */
class Subject extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "subject";
    protected $allowed_columns = [
        'subject_id',	
        'subject',
        'grade',
        'language_medium',
        'description',
        'image'
    ];
    public function validate($data)
    {   
        $this->error = [];
        if(empty($data['subject_id']))
            {
                $this -> error['subject_id'] = "a teacher_id is required";
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