<?php
/**
 *Course class
 */
class CourseWeek extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "course_week";
    protected $allowed_columns = [

        'course_id',
        'week_no',
        'week_name'

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

    // public function UpdateNoOfWeeks($course_id,$no_of_weeks){
    //     $query = "SELECT max(week_no) AS max_week FROM course_week WHERE course_id = ".$course_id;
    //     $res = $this -> query($query);
    //     // show($res);die;
    //     $max_week = $res[0]->max_week;
    //     for($i=1; $i<=$no_of_weeks; $i++){
    //         $week= $max_week+$i;
    //         $query="INSERT INTO course_week VALUES ($course_id,$week,'Week $week')";
    //         $res = $this -> query($query);
    //     }
    //     if($res){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function getWeekName($Course_id,$week_no){
    //     $query = "SELECT week_name FROM course_week WHERE course_id = ".$Course_id." and week_no=".$week_no; 
    //     $res = $this -> query($query);
    //     // echo $query;die;
    //     // show($res);die;
    //     if($res){
    //         return $res[0];
    //     }else{
    //         return false;
    //     }

    // }

    // public function getWeekCount($Course_id){
    //     $query = "SELECT count(*) AS week_count FROM course_week WHERE course_id = ".$Course_id; 
    //     $res = $this -> query($query);
    //     // echo $query;die;
    //     // show($res);die;
    //     if($res){
    //         return $res[0];
    //     }else{
    //         return false;
    //     }

    // }

    // public function UpdateWeekName($course_id,$week_no,$week_name){
    //     $query = "UPDATE week_name FROM course_week SET week_name=".$week_name." WHERE course_id = ".$course_id." and week_no=".$week_no;
    //     $res = $this -> query($query);
    //     // show($res);die;
    //     // $max_week = $res[0]->max_week;
    //     // for($i=1; $i<=$no_of_weeks; $i++){
    //     //     $week= $max_week+$i;
    //     //     $query="INSERT INTO course_week VALUES ($course_id,$week,'Week $week')";
    //     //     $res = $this -> query($query);
    //     // }
    //     if($res){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function getWeeks($course_id) {
        $query = "SELECT * FROM ".$this->table." WHERE course_id = :courseId";
        $data['courseId'] = $course_id;
        $res = $this -> query($query,$data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getWeekName($course_id,$week_no){
        $query = "SELECT * FROM ".$this->table;
        $query .= " WHERE course_id =:courseId AND week_no =:weekNo";
        $data['courseId'] = $course_id;
        $data['weekNo'] = $week_no;
        $res = $this -> query($query,$data);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function UpdateWeekName($course_id,$week_no,$updated_name){
        $query = "UPDATE ".$this->table." SET week_name= :updateName WHERE course_id = :courseId and week_no= :weekNo";
        $data['updateName'] = $updated_name;
        $data['courseId'] = $course_id;
        $data['weekNo'] = $week_no;
        $res = $this -> update_table($query,$data);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function createWeek($course_id, $week_no){
        $query = "INSERT INTO ".$this->table." VALUES (:courseId,:weekNo,:Name)";
        $data['courseId'] = $course_id;
        $data['weekNo'] = $week_no;
        $data['Name'] = 'Week '.$week_no;
        $res = $this -> query($query,$data);

        if($res){
            return true;
        }else{
            return false;
        }
    }
    
    public function deleteWeek($week_no){

        $query ="DELETE FROM ".$this->table." WHERE week_no = :weekNo";
        
        $data['weekNo'] = $week_no;

        $res = $this -> delete_table($query,$data);
       
        if($res){
            return true;
        }
        return false;
    }

}