<?php
/**
 *Assignment class
 */
// define('KB', 1024);
// define('MB', 1048576);
// define('GB', 1073741824);
// define('TB', 1099511627776);
class Assignment extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "assignment";
    protected $key = 'assignmentId';

    protected $allowed_columns = [     
    'assignmentId',
    'Nid',
    'title',
    'courseId',
    'description',
    'file_size',
    'deadline',
    'acceptDate',
    'edit_URL',
    'view_URL',
    'cid',

    ];

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
    public function validate($data)
    {   
        // show($data);
        $this->error = [];
        $size = 0;
        $today = time();
        // echo (!empty($data['deadline']));
       
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
                
        //   die;
        if(empty($this->error)){
            return true;
        
        }
        
      
        return false; 
    }
    public function joinCourseAssignment($data=[],$orderby=null,$order='desc')
    {
        $keys = array_keys($data);

        $query = " select subject.subject, subject.grade,assignment_files.*,assignment.* FROM ".$this->table;
        $query .= " INNER JOIN course on course.course_id =assignment.courseId INNER JOIN subject on course.subject_id= subject.subject_id left join assignment_files on";
        $query .= " assignment.assignmentId = assignment_files.assignmentId where assignment.";
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
    public function whereForAssignment($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." LEFT JOIN assignment_files ON assignment.assignmentId = assignment_files.assignmentId where ";

        foreach($keys as $key){
            $query .= "assignment.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by assignment.$orderby  $order";
        $res = $this -> query($query,$data);
        
        if(is_array($res)){
            return $res;
        }
        return false;
           
    }

}