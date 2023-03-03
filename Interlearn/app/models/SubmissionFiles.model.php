<?php
/**
 *SubmissionFiles class
 */
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
class SubmissionFiles extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "submission_files";
    protected $key = 'fileID';


    protected $allowed_columns = [
        'fileID',
        'submissionId',
        'filename',


    ];

    public function validate($data)
    {   

        $this->error = [];
        $size = 0;
 
            if(empty($_FILES['submission']))
            {
              
                $this -> error['submission'] = "Please upload your files";
            }
            else{
                    foreach ($_FILES['submission']['name'] as $i => $name) {
                        $size = $_FILES['submission']['size'][$i]+$size;
                        
                    }
                 if($size > 5*MB){
                    $this -> error['submission'] = "File size is too large";
                 }
                }

        if(empty($this->error)){
            return true;
        }
        return false;
    }
    // public function joinstudentSubmission($data=[],$orderby=null,$order='desc')
    // {
    //     $keys = array_keys($data);

    //     $query = " select assignment.*, subject.subject, subject.grade FROM ".$this->table;
    //     $query .= " INNER JOIN course on course.course_id =assignment.courseId INNER JOIN subject on course.subject_id= subject.subject_id where ";
    //     foreach($keys as $key){
    //         $query .= $key. " =:".$key." && ";
    //     }
    

    
    //     $query = trim($query,"&& ");
    //     $query .= " order by $orderby  $order limit 1";

    //     $res = $this -> query($query,$data);
    //   //echo $query;die;
    //     if(is_array($res)){
    //        return $res[0];
    //     }
    //     return false;
    // }

}