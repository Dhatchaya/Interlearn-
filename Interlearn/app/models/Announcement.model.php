<?php

//Annuncement class

class Announcement extends Model{
    public $error = [];
    public $table = "announcement";
    protected $allowed_columns = [
        'aid',
        'title',
        'content',
        'attachment',
        'empID',
        'role',
        'date_time'
 
    ];
    // protected $staffs = [
    //     'Manager',
    //     'Teacher',
    //     'Instructor',
    //     'Receptionist',

    // ];

    public function isAnnEditable($createdAt) {
        $expiryTime = strtotime($createdAt) + 60*60; // expiry time is 1 hour after creation
        $currentTime = time();
        return ($currentTime < $expiryTime);
    }

    public function addClassid($data){
        $query = "insert into announcement_course(course_id) values(classid) ";
        $this -> query($query,$data);
        return true;
    }

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

    // SELECT concat(teachers.firstname, ' ', teachers.lastname), announcement.* FROM announcement INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE announcement_course.course_id =79
    public function showAnnouncement($course_id){
        $query = "SELECT concat(teachers.firstname, ' ', teachers.lastname) AS fullname, announcement.* FROM ".$this->table;
        $query .= " INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id";
        $query .= " WHERE announcement_course.course_id =:courseID";
        $data['courseID'] = $course_id;

        $res = $this -> query($query, $data);
        // echo $res;die;

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function showAnnouncementInstructor($course_id){
        $query = "SELECT concat(instructor.firstname, ' ', instructor.lastname) AS fullname, announcement.* FROM ".$this->table;
        $query .= " INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN course_instructor ON course_instructor.course_id = course.course_id INNER JOIN instructor ON course_instructor.instructor_id = instructor.instructor_id";
        $query .= " WHERE announcement_course.course_id =:courseID";
        $data['courseID'] = $course_id;

        $res = $this -> query($query, $data);
        // echo $res;die;

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function updateAnnouncement($aid){
        $query = "UPDATE ".$this->table;
        $query .= " SET title =:title, content =:content, attachment =:attachment";
        $query .= " WHERE announcement.aid =:aID";
        $data['aID'] = $aid;

        $res = $this -> update_table($query, $data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function deleteAnnouncement($aid){
        $query = "DELETE FROM ".$this->table;
        $query .= " WHERE announcement.aid =:aID";
        $data['aID'] = $aid;

        $res = $this -> delete_table($query, $data);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function stdAnnouncements($data=[],$id=null,$course_id=null,$orderby=null,$order = 'desc'){

        $query ="SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.student_id FROM ".$this->table;
        $query .=" INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN subject ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id ";
        $query .= " WHERE student.uid = $id AND announcement_course.course_id = $course_id";
        $query .= " order by announcement.date_time $order";
        // announcement.time  $order";
    // echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function allRecepAnnouncements($data=[],$id=null,$orderby=null,$order = 'desc'){

        $query ="SELECT announcement.* FROM ".$this->table;
        $query .= " WHERE announcement.role = 'Receptionist'";
        $query .= " order by announcement.date_time  $order";
    // echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    // public function 
}