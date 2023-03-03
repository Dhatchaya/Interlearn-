<?php

//Annuncement class

class Announcement extends Model{
    public $error = [];
    public $table = "announcement";
    protected $allowed_columns = [
        'aid',
        'title',
        'content',
        'attachment',
        'teacher_id',
        'date'
 
    ];
    // protected $staffs = [
    //     'Manager',
    //     'Teacher',
    //     'Instructor',
    //     'Receptionist',

    // ];

    public function isAnnEditable($createdAt) {
        $expiryTime = strtotime($createdAt) + 60*60; // expiry time is 1 hour after creation
        $currentTime = time();
        return ($currentTime < $expiryTime);
    }

    public function addClassid($data){
        $query = "insert into announcement_course(course_id) values(classid) ";
        $this -> query($query,$data);
        return true;
    }

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