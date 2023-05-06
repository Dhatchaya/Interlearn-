<?php
/**
 *Course class
 */
class CourseMaterial extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "course_material";
    protected $allowed_columns = [
        'file_id',
        'cid',
        'course_material',
        'file_type',
        'size',
        'downloads'

    ];
    // protected $staffs = [
    //     'Manager',
    //     'Teacher',
    //     'Instructor',
    //     'Receptionist',

    // ];
    public function validate($data)
    {   
        $this->error = [];
        if(empty($data['upload_name']))
        {
            $this -> error['upload_name'] = "Please provide a name for the upload";
        }
        // if(empty($data['file_input']))
        // {
        //     $this -> error['file_input'] = "Please provide a file for the upload";
        // }
    
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

    // public function UpdateUploadName($course_id,$file_id,$updated_name){
    //     $query = "UPDATE ".$this->table." SET upload_name= :updateName WHERE course_id = :courseId and file_id= :fileId";
    //     $data['updateName'] = $updated_name;
    //     $data['courseId'] = $course_id;
    //     $data['fileId'] = $file_id;
    //     $res = $this -> update_table($query,$data);

    //     if($res){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function deleteUpload($file_no){

    //     $query ="DELETE FROM ".$this->table." WHERE cid = :cId";
        
    //     $data['cId'] = $file_no;

    //     $res = $this -> delete_table($query,$data);
       
    //     if($res){
    //         return true;
    //     }
    //     return false;
    // }

    public function downloadFiles($file_id){
        $query = "SELECT * FROM ".$this->table; 
        $query .= " WHERE file_id =:fileID ";
        $data['fileID'] = $file_id;
        $res = $this -> query($query,$data);
        // echo $query;die;
        // show($res);die;
        if($res){
            return true;
        }else{
            return false;
        }

    }

//     public function addCard( $card_ID, $class_ID){
// //write querry here
//     }



    

}