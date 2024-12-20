<?php

//Annuncement class

class AnnouncementCourse extends Model{
    public $error = [];
    public $table = "announcement_course";
    protected $allowed_columns = [
        'aid',
        'course_id'
 
    ];
    // protected $staffs = [
    //     'Manager',
    //     'Teacher',
    //     'Instructor',
    //     'Receptionist',

    // ];

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