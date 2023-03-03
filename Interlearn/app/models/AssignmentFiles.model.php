<?php
/**
 *AssignmentFiles class
 */
// define('KB', 1024);
// define('MB', 1048576);
// define('GB', 1073741824);
// define('TB', 1099511627776);
class AssignmentFiles extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "assignment_files";
    protected $key = 'fileID';


    protected $allowed_columns = [
        'fileID',
        'assignmentId',
        'filename',


    ];

    public function validate($data)
    {   
       
        $this->error = [];
        $size = 0;
        $today = time();

       
            if(empty($data['title']))
            {
                $this -> error['title'] = "Please provide a name for the assignment";
            }
            if(empty($data['deadline']))
            {
                $this -> error['deadline'] = "Please select a deadline";
            }
            if(empty($data['acceptDate']))
            {
                $this -> error['acceptDate'] = "Please select a accept date";
            }
            else if(strtotime($data['deadline']) < strtotime($data['acceptDate'])){
               
                    $this -> error['date'] = "Deadline must be greater than accept date";
                  }
             if(strtotime($data['deadline'])<$today || strtotime($data['acceptDate'])<$today){
               
                $this -> error['today'] = "Deadline/Accept date must be greater than the current date";
             }
                

        if(empty($this->error)){
            return true;
        
        }
        //show($this->error);die;
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
    public function validatefile($data)
    {   

        $this->error = [];
        $size = 0;
 
            // if(empty($data['assignment_file']))
            // {
            //     $this -> error['assignment_file'] = "Please upload your files";
            // }
            // else{
                    foreach ($_FILES['assignment_file']['name'] as $i => $name) {
                        $size = $_FILES['assignment_file']['size'][$i]+$size;
                        
                    }
                 if($size > 5*MB){
                    $this -> error['assignment_file'] = "File size is too large";
                 }
                // }

        if(empty($this->error)){
            return true;
        }
        return false;
    }

}