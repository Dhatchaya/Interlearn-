<?php
/**
 *SubmissionFiles class
 */

class SubmissionFiles extends Model
{
    //says what table it has to target
    public $error = [];
    public $size = 0;
    protected $table = "submission_files";
    protected $key = 'fileID';


    protected $allowed_columns = [
        'fileID',
        'submissionId',
        'filename',
        'filesize',


    ];

    public function validatefile($data,$previoussize=0)
    {   

        $this->error = [];
        $this->size = 0;
 
            if(!empty($_FILES['submission']))
            {
              
            //     $this -> error['submission'] = "Please upload your files";
            // }
            // else{
                    foreach ($_FILES['submission']['name'] as $i => $name) {
                        $this ->size = $_FILES['submission']['size'][$i]+$this ->size;
                        
                    }
                    $this ->size = $this ->size+$previoussize;
                 if($this ->size > 5*MB){
                    $this -> error['submission'] = "File size is too large";
                 }
                
                 }

        if(empty($this->error)){
        
            return true;
        }
      
        return false;
    }
    public function joinSubmissionfiles($data=[]){
        $keys = array_keys($data);
        $query = "SELECT submission_files.*,submission.* FROM submission_files RIGHT JOIN submission on submission.submissionId=submission_files.submissionId ";
        $query .= " Where ";
        foreach($keys as $key){
                    $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);
        if(is_array($res)){
            return $res[0];
        }
        return false;

    }
    

    public function getSubmissionsize($data=[]){
        $keys = array_keys($data);
        $query = "SELECT SUM(filesize) as total FROM ".$this->table;
        $query .= " Where ";
        foreach($keys as $key){
                    $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);
        if(is_array($res)){
            return $res[0];
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