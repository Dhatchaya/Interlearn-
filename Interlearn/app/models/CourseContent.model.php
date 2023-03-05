<?php

class CourseContent extends Model
{

    //says what table it has to target
    public $error = [];
    public $table = "course_content";
    protected $allowed_columns = [

        'cid',
        'type',
        'course_id',
        'week_no',
        'upload_name',
        'view_URL',
        'edit_URL',
        'delete_URL'

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

    public function UpdateUploadName($course_id,$cid,$updated_name){
        $query = "UPDATE ".$this->table." SET upload_name =:updateName WHERE course_id =:courseId and cid =:cId";
        $data['updateName'] = $updated_name;
        $data['courseId'] = $course_id;
        $data['cId'] = $cid;
        $res = $this -> update_table($query,$data);
        // echo $res;die;
        // show($query);die;

        if($res){
            return true;
        }else{
            return false;
        }
    }
}