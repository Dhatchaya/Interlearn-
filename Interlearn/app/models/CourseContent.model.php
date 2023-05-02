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
        if(empty($data['upload_name']))
        {
            $this -> error['upload_name'] = "Please provide a name for the upload!";
        }
        if(empty($data['URL']))
        {
            $this -> error['URL'] = "Please provide a url to be linked!";
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

    //student contents
    public function studentCourseContent($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT course.*,course_content.* FROM ".$this->table; 
        $query .= " INNER JOIN course ON course.course_id = course_content.course_id ";
        $query .= " WHERE course.course_id = $id";
        // $query .= " order by $orderby  $order";
        // var_dump($_SESSION);exit;
        //show($query);die;
        $res = $this -> query($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // show($res);die;
            return $res;
        }
        return false;
    }

    public function deleteUpload($cid){

        $query ="DELETE FROM ".$this->table." WHERE cid = :cId";
        
        $data['cId'] = $cid;

        $res = $this -> delete_table($query,$data);
       
        if($res){
            return true;
        }
        return false;
    }
}