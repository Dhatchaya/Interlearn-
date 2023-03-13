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
        'day',
        'timefrom',
        'timeto',
        'capacity',
        'No_Of_Weeks',
        'monthlyFee'

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
        $size = 0;
        $today = time();

       
            if(empty($data['subject']))
            {
                $this -> error['subject'] = "Please provide a name for the subject";
            }
            if(empty($data['grade']))
            {
                $this -> error['grade'] = "Please select a grade";
            }
            if(empty($data['language_medium']))
            {
                $this -> error['language_medium'] = "Please select a language_medium";
            }
            if(empty($data['teacher_id']))
            {
                $this -> error['teacher_id'] = "Please select a teacher_id";
            }
            if(empty($data['timefrom']))
            {
                $this -> error['timefrom'] = "Please select a start time";
            }
            if(empty($data['timeto']))
            {
                $this -> error['timeto'] = "Please select an ending time";
            }
            else if(strtotime($data['timeto']) < strtotime($data['timefrom'])){
               
                $this -> error['time'] = "Ending must be greater than starting time";
            }
            if(empty($data['capacity']))
            {
                $this -> error['capacity'] = "Please select a capcity for the class";
            }
                

        if(empty($this->error)){
            return true;
        
        }
        //show($this->error);die;
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

    public function instructorCourse($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,grade,language_medium,course.*,course_instructor.* from ".$this->table;
        $query .= " INNER JOIN subject ON course.subject_id = subject.subject_id INNER JOIN course_instructor ON course.course_id = course_instructor.course_id INNER JOIN staff ON staff.emp_id = course_instructor.emp_id ";
        $query .= " WHERE instructor.uid = $id AND staff.role = 'Instructor'";
        $query .= " group by subject, grade";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function getSubjectCourse($data=[]){
        $query = "SELECT * FROM ".$this->table;
        $query .= " INNER JOIN subject ON subject.subject_id = course.subject_id";

        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function getDays($subject_id, $teacher_id){
        $query = "SELECT course.day, course.timefrom, course.timeto FROM ".$this->table;
        $query .= " INNER JOIN subject ON subject.subject_id = course.subject_id";
        $query .= " WHERE course.subject_id =:subjectID AND course.teacher_id =:teacherID";
        $data['subjectID'] = $subject_id;
        $data['teacherID'] = $teacher_id;

        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function getCourseID($subject_id, $teacher_id, $day, $timefrom, $timeto){
        $query = "SELECT course.course_id FROM ".$this->table;
        $query .= " INNER JOIN subject ON subject.subject_id = course.subject_id";
        $query .= " WHERE course.subject_id =:subjectID AND course.teacher_id =:teacherID AND course.day =:Day AND course.timefrom =:timeFrom AND course.timeto =:timeTo";
        $data['subjectID'] = $subject_id;
        $data['teacherID'] = $teacher_id;
        $data['Day'] = $day;
        $data['timeFrom'] = $timefrom;
        $data['timeTo'] = $timeto;

        $res = $this -> query($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }

    public function getTime($teacher_id, $day){
        $query = "SELECT timefrom, timeto FROM ".$this->table;
        $query .= " WHERE teacher_id =:teahcerID AND day =:Day";

        $data['teahcerID'] = $teacher_id;
        $data['Day'] = $day;

        $res = $this -> query($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }
    

}