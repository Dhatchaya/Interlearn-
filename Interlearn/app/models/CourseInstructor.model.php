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
        'emp_id'

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
        $query = "SELECT concat(staff.first_name,' ',staff.last_name) AS instructorName, staff.*, course_instructor.* from ".$this->table;
        $query .= " INNER JOIN staff ON staff.emp_id = course_instructor.emp_id";
        $query .= " WHERE course_instructor.course_id = :courseID AND staff.role = 'Instructor'";

        $data['courseID'] = $course_id;

        $res = $this -> query($query,$data);
        // echo $query;die;
        // show($res);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function deleteInstructors($course_id,$instructor_id){
        $query = "DELETE FROM ".$this->table;
        $query .= " WHERE course_id = :courseID AND emp_id =:empID";

        $data['courseID'] = $course_id;
        $data['empID'] = $instructor_id;

        $res = $this -> query($query,$data);
        // echo $query;die;
        // show($res);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

}