<?php
/**
 *Course class
 */
class StudentCourse extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "student_course";
    protected $allowed_columns = [
        'student_id',
        'course_id'
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

    public function getCourses($student_id){
        $query = "SELECT course_id FROM ".$this->table;
        $query .= " WHERE student_id =:studentID";
        $data['studentID'] = $student_id;
        // show($student_id) ;die;

        $res = $this -> query($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;

    }

    public function getAll(){
        $query = "SELECT * FROM student_course ";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function CourseForStudent($data= null){
        
        $keys = array_keys($data);
        //c.name
        $query = "SELECT s.student_id, s.course_id, subject FROM student_course s 
        INNER JOIN course c ON s.course_id = c.course_id
        INNER JOIN subject d ON d.subject_id = c.subject_Id where ";


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

    public function getStudents($course_id){
        $query = "SELECT student_course.student_id, student.* FROM ".$this->table;
        $query .= " INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course_id =:courseId";
        $data['courseId'] = $course_id;
        // show($student_id) ;die;

        $res = $this -> query($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;

    }

    public function deleteStudent($student_id,$course_id){
        $query = "DELETE FROM ".$this->table;
        $query .= " WHERE course_id =:courseId AND student_id = :studentId";
        $data['courseId'] = $course_id;
        $data['studentId'] = $student_id;
        // show($student_id) ;die;

        $res = $this -> delete_table($query,$data);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;

    }
}
