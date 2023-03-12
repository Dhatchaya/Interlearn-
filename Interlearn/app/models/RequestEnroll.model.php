<?php
/**
 *Course class
 */
class RequestEnroll extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "request_enroll";
    protected $allowed_columns = [
        'request_id',
        'emp_id',
        'student_id',
        'course_id',
        'requested_date',
        'status'
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


    public function showRequests(){
        $query = "SELECT DISTINCT request_enroll.*, course.day, course.timefrom, course.timeto, course.teacher_id, (course.capacity - (SELECT COUNT(student_course.student_id) FROM student_course)) AS available, subject.subject, subject.grade, concat(teachers.firstname, ' ', teachers.lastname) AS teacherName, concat(student.first_name,' ',last_name) AS studentName FROM ".$this->table;
        $query .= " INNER JOIN course ON course.course_id = request_enroll.course_id 
        INNER JOIN student_course ON student_course.course_id = course.course_id 
        INNER JOIN teachers ON teachers.teacher_id = course.teacher_id 
        INNER JOIN student ON student.studentID = request_enroll.student_id 
        INNER JOIN subject ON subject.subject_id = course.subject_id";
        $query .= " WHERE request_enroll.status = 'pending'";
        $query .= " ORDER BY requested_date DESC";

        $res = $this -> query($query);

        if(is_array($res)){
            return $res;
        }
        return false;
    }


}