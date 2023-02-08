<?php
/**
 *Reply class
 */
class Reply extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "reply";
    protected $allowed_columns = [
        'eid',
        'repId',
        'senderId',
        'receiverId',
        'content',
        'date',
        'reply_user',
        'status',
        
    ];
    protected $users = [

        'Teacher',
        'Instructor',
        'Student',
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