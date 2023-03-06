<?php
/**
 *Course class
 */
class Course extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "course";
    protected $allowed_columns = [

        'course_id',
        'subject_id',
        'created_date',
        'teacher_id',
        'course_material',
        'day',
        'timefrom',
        'timeto',
        'No_Of_Weeks'

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

    public function getLastCourse(){
        $query = "SELECT * FROM course ORDER BY course_id DESC LIMIT 1"; 
        $res = $this -> query($query);

        if($res){
            return $res;
        }else{
            return false;
        }

    }


    public function getWeekName($Course_id,$week_no){
        $query = "SELECT week_name FROM course_week WHERE course_id = ".$Course_id." and week_no=".$week_no; 
        $res = $this -> query($query);
        // echo $query;die;
        // show($res);die;
        if($res){
            return $res[0];
        }else{
            return false;
        }

    }

    public function getWeekCount($Course_id){
        $query = "SELECT No_Of_Weeks FROM ".$this->table." WHERE course_id = ".$Course_id; 
        $res = $this -> query($query);
        // echo $query;die;
        // show($res);die;
        if($res){
            return $res[0];
        }else{
            return false;
        }

    }

    public function UpdateNoOfWeeks($course_id,$no_of_weeks){
        $query = "UPDATE ".$this->table." SET No_Of_Weeks= :no_of_weeks WHERE course_id = :courseid";
        $data['no_of_weeks'] = $no_of_weeks;
        $data['courseid'] = $course_id;
        $res = $this -> update_table($query,$data);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function getTeacherID($course_id){
        $query = "SELECT teacher_id FROM ".$this->table;
        $query .= " WHERE course_id =:courseID";
        $data['courseID'] = $course_id;
        $res = $this -> query($query, $data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }
    

}