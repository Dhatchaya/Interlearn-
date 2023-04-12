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
        $query = "SELECT request_enroll.*, course.day, course.timefrom, course.timeto, course.teacher_id,course.subject_Id,
        subject.subject,
        concat (staff.first_name,' ',staff.last_name) AS teacherName FROM ".$this->table;
        $query .= " INNER JOIN course ON course.course_id = request_enroll.course_id
        INNER JOIN subject ON subject.subject_id = course.subject_Id
        INNER JOIN staff ON staff.emp_id = course.teacher_ID";
        $query .= " ORDER BY requested_date DESC";

        // echo $query;die;
        $res = $this -> query($query);
        

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function showRequestsDetails($req_id){
        $query = "SELECT request_enroll.*, course.day, course.timefrom, course.timeto, course.teacher_id,course.subject_Id,
        subject.*,
        concat (staff.first_name,' ',staff.last_name) AS teacherName,
        concat (student.first_name,' ',student.last_name) AS studentName,
        (course.capacity - (SELECT COUNT(student_course.student_id) FROM student_course WHERE student_course.course_id = request_enroll.course_id AND student_course.student_id = request_enroll.student_id)) AS available FROM ".$this->table;
        $query .= " INNER JOIN course ON course.course_id = request_enroll.course_id
        INNER JOIN subject ON subject.subject_id = course.subject_Id
        INNER JOIN staff ON staff.emp_id = course.teacher_ID
        INNER JOIN student ON student.studentID = request_enroll.student_id";
        $query .= " WHERE request_enroll.request_id =:reqID";
        $query .= " ORDER BY requested_date DESC";

        $data['reqID'] = $req_id;

        // echo $query;die;
        $res = $this -> query($query,$data);
        // show($res);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function getRequestedCourses($student_id){
        $query = "SELECT course_id FROM ".$this->table;
        $query .= " WHERE student_id =:studentID";

        $data['studentID'] = $student_id;

        // echo $query;die;
        $res = $this -> query($query,$data);
        

        if(is_array($res)){
            return $res;
        }
        return false;
    }


}