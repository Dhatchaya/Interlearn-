<?php
/**
 *Course class
 */
class CourseInstructor extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "course_instructor";
    protected $allowed_columns = [

        'course_id',
        'instructor_id'

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

    public function getInstructors($course_id){
        $query = "SELECT concat(instructor.firstname,' ',instructor.lastname) AS instructorName, instructor.*, course_instructor.* from ".$this->table;
        $query .= " INNER JOIN instructor ON instructor.instructor_id = course_instructor.instructor_id";
        $query .= " WHERE course_id = :courseID";

        $data['courseID'] = $course_id;

        $res = $this -> query($query,$data);
        // echo $query;

        if($res){
            return $res;
        }else{
            return false;
        }
    }

}