<?php
/**
 *Question class
 */
class ZResult extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "myresult";
    protected $allowed_columns = [

        'id',
        'studentID',
        'marks',
        'exam_id'

    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

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


    // public function Exam($data= null){

    //     $query = "SELECT c.choice1, c.choice2, c.choice3, c.choice4, c.choice1_mark, c.choice2_mark, c.choice3_mark,c.choice4_mark,q.question_title, q.question_mark, q.category, q.question_number
    //     FROM mychoice c
    //     INNER JOIN myquestion q ON c.question_number = q.question_number where";

    //     $res = $this -> query($query,$data);

    //     if(is_array($res)){
    //         return $res;
    //     }
    //     return false;
           
    // }

    public function ResultForStudent($examID){
        
        // $keys = array_keys($data);
        $query = "SELECT  id, studentID, marks FROM myresult where exam_id = :examID order by marks desc";

        $data['examID'] = $examID;

        // $query .=where();
        // $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;       
    }

    public function ResultGraph($data= null){
        
        $keys = array_keys($data);
        $query = "SELECT COUNT(CASE WHEN marks >= 75 THEN 1 END) AS A,
                COUNT(CASE WHEN marks BETWEEN 65 AND 74 THEN 1 END) AS B,
                COUNT(CASE WHEN marks BETWEEN 50 AND 64 THEN 1 END) AS C,
                COUNT(CASE WHEN marks BETWEEN 35 AND 49 THEN 1 END) AS S,
                COUNT(CASE WHEN marks < 34 THEN 1 END) AS W
                FROM myresult where ";


        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;       
    }

    public function ResultStudentGraph($data= null){
        
        $keys = array_keys($data);
        $query = "SELECT COUNT(CASE WHEN marks >= 75 THEN 1 END) AS A,
                COUNT(CASE WHEN marks BETWEEN 65 AND 74 THEN 1 END) AS B,
                COUNT(CASE WHEN marks BETWEEN 50 AND 64 THEN 1 END) AS C,
                COUNT(CASE WHEN marks BETWEEN 35 AND 49 THEN 1 END) AS S,
                COUNT(CASE WHEN marks < 34 THEN 1 END) AS W
                FROM myresult m INNER JOIN myexam e ON e.exam_id = m.exam_id where ";


        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;       
    }

    public function UpdateMarks($id,$updated_marks){
        $query = "UPDATE ".$this->table." SET marks =:updateMarks WHERE id =:ID";
        $data['updateMarks'] = $updated_marks;
        $data['ID'] = $id;
        // $data['cId'] = $cid;
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