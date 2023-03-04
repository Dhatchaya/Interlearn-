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
    
   
}