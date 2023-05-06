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
        'file_name',
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
        // show($expiryTime);die;
        // show($currentTime);die;
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
        if(empty($data['title']))
        {
            $this -> error['title'] = "Please provide a title for the announcement!";
        }
        if(empty($data['content']))
        {
            $this -> error['content'] = "Please provide a content body for the announcement!";
        }
        if(!empty($data['attachment']))
        {
            if(empty($data['file_name']))
            {
                $this -> error['file_name'] = "Please provide a name for the attachment!";
            }
        }
        // else{
        //     $this -> error['attachement'] = "Please provide a name for the attachement!";
        // }

        if(empty($this->error)){
            return true;
        }
        return false;
    }

    // SELECT concat(teachers.firstname, ' ', teachers.lastname), announcement.* FROM announcement INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE announcement_course.course_id =79
    public function showAnnouncement($course_id, $order = 'desc'){
        $query = "SELECT concat(staff.first_name, ' ', staff.last_name) AS fullname, announcement.* FROM ".$this->table;
        $query .= " INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN staff ON staff.emp_id = course.teacher_ID";
        $query .= " WHERE announcement_course.course_id =:courseID AND staff.role = 'Teacher' ORDER BY announcement.date_time $order";
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
        $query = "SELECT concat(staff.first_name, ' ', staff.last_name) AS fullname, announcement.* FROM ".$this->table;
        $query .= " INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN course_instructor ON course_instructor.course_id = course.course_id INNER JOIN staff ON course_instructor.emp_id = staff.emp_id";
        $query .= " WHERE announcement_course.course_id =:courseID AND staff.role = 'Instructor'";
        $data['courseID'] = $course_id;

        $res = $this -> query($query, $data);
        // echo $res;die;

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function updateAnnouncement($aid, $title, $content, $attachment, $filename){
        $query = "UPDATE ".$this->table;
        $query .= " SET title =:title, content =:content, attachment =:attachment, file_name =:fileName";
        $query .= " WHERE announcement.aid =:aID";
        $data['aID'] = $aid;
        $data['title'] = $title;
        $data['content'] = $content;
        $data['attachment'] = $attachment;
        $data['fileName'] = $filename;

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

        $query ="SELECT concat(staff.first_name,' ',staff.last_name) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.student_id FROM ".$this->table;
        $query .=" INNER JOIN announcement_course ON announcement_course.aid = announcement.aid INNER JOIN course ON course.course_id = announcement_course.course_id INNER JOIN subject ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN staff ON staff.emp_id = course.teacher_ID ";
        $query .= " WHERE student.uid = '$id' AND announcement_course.course_id = $course_id";
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

    public function getAnnouncements($aid,$order = 'desc'){

        $query ="SELECT announcement.* FROM ".$this->table;
        $query .= " WHERE aid =:aID AND announcement.role = 'Receptionist'";
        $query .= " order by announcement.date_time  $order";

        $data['aID'] = $aid;
    // echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function getTeacherAnnouncements($aid,$order = 'desc'){

        $query ="SELECT announcement.* FROM ".$this->table;
        $query .= " WHERE aid =:aID AND announcement.role = 'Teacher'";
        $query .= " order by announcement.date_time  $order";

        $data['aID'] = $aid;
    // echo $query;die;
        $res = $this -> query($query,$data);
        // show($res);die;

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function deleteAnnFile($aid){

        $query = "UPDATE ".$this->table;
        $query .= " SET file_name = ' ' AND attachment = ' '";
        $query .= " WHERE announcement.aid =:aID AND announcement.role = 'Receptionist'";
        $data['aID'] = $aid;

        $res = $this -> update_table($query, $data);

        if($res){
            return $res;
        }else{
            return false;
        }

        // $query ="DELETE attachment, file_name FROM ".$this->table;
        // $query .= " WHERE aid =:aID AND announcement.role = 'Receptionist'";

        // $data['aID'] = $aid;
    // echo $query;die;
        // $res = $this -> query($query,$data);

        // if(is_array($res)){
        //     return $res;
        // }
        // return false;

    }

    // public function
}