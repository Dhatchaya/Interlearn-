<?php
/**
 *submission class
 */

class Submission extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "submission";
    protected $key = 'submissionId';

    protected $allowed_columns = [     
        'studentID',
        'submissionId',
        'assignmentId',
        'modified',
        'status',
        'file_size',


    ];

    public function submissionsCount($data){
        $keys = array_keys($data);
        $query ="select count(".$this->key.") as count from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);
      //  show ($res[0]);die;
        if(is_array($res)){
            return $res[0];
        }
        return false;
           
    }
    public function allsubmissions($data){
        $keys = array_keys($data);
        $query ="Select GROUP_CONCAT(submission_files.fileName SEPARATOR ', ') as Files,submission.*,assignment.*, concat (student.first_name,' ',student.last_name) as Name from ".$this->table;
        $query .=" INNER JOIN submission_files ON submission.submissionId = submission_files.submissionId ";
        $query .="INNER JOIN student on student.studentID = submission.studentID INNER JOIN assignment ON submission.assignmentId=assignment.assignmentId where ";


        foreach($keys as $key){
            $query .= "submission.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .=" GROUP BY submission.submissionId";
      //  echo $query;die;
        $res = $this -> query($query,$data);
      //  show ($res[0]);die;
        if(is_array($res)){
            return $res;
        }
        return false;
           
    }
    public function whereForSubmission($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $query ="select submission.*,submission_files.* from ".$this->table." INNER JOIN assignment ON assignment.assignmentId = submission.assignmentId";
        $query .=" LEFT JOIN submission_files on submission_files.submissionId = submission.submissionId where ";
        foreach($keys as $key){
            $query .= "submission.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by submission.$orderby  $order";
       // echo $query;die;
        $res = $this -> query($query,$data);
        
        if(is_array($res)){
            return $res;
        }
        return false;
           
    }
    public function Checkstatus($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $id = $this->table[0]."id";
        $query ="select * from ".$this->table." inner join student on student.studentID =".$this->table.".studentID where ";
   
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
     
    
        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order limit 1";

        $res = $this -> query($query,$data);
      
        if(is_array($res)){
           return $res[0];
        }
        return false;
           
    }
}