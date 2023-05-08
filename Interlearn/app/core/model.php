<?php 
/**
 * model class
 */
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
class Model extends Database {
    protected $table = "";
    
    public function insert($data){
        //remove unwanted columns
        if(!empty($this->allowed_columns))
        {
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowed_columns))
                {
               
                    unset($data[$key]);
                }
               
            }
        }
            $keys = array_keys($data);
            
            $query = "insert into ".$this->table."(".implode(",",$keys) .") values (:".implode(",:",$keys).")";

            $this -> query($query,$data);
            return true;
    }
    //select all the records that matches 
    public function where($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order";
        
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;
           
    }
    //select all the records
    public function select($data=null,$orderby=null,$order = 'desc'){
        
        $query ="select * from ".$this->table;
  
        $query .= " order by $orderby  $order";
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;
           
    }
    //select only the first record that matches 
    public function first($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $id = $this->table[0]."id";
        $query ="select * from ".$this->table." where ";
   
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
     
    
        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order limit 1";

        $res = $this -> query($query,$data);
      
        if(is_array($res)){
           return $res[0];
        }
        return false;
           
    }
    public function role($data, $orderby = null)
    {
        $keys = array_keys($data);
        $query = "select role from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . " =:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $query .= " order by $orderby desc limit 1";
        $res = $this->query($query, $data);

        if (is_array($res)) {
            if (in_array($res[0]->role, $this->staffs)) {
                return true;
            }
        }
        return false;
    }


    public function sendemail($data){
      
        require_once "../public/assets/phpmailer/src/Exception.php";
        require_once '../public/assets/phpmailer/src/PHPMailer.php';
        require_once '../public/assets/phpmailer/src/SMTP.php';
        
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $mail -> isSMTP();
                $mail -> Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail -> SMTPAuth = true;
                $mail -> Username ='add interlearn email';
                $mail -> Password = 'add your password';
                $mail->SMTPSecure ='ssl';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                    );
                $mail->From ='interlearnsl@gmail.com';
                $mail -> FromName = 'Interlearn';
                $mail -> AddAddress($data['email']);
                $mail ->IsHTML(true);
                $mail -> Subject = 'Verification code';
                $message_body ='<p> To verify your email address click on the below link <a href=http://localhost/Interlearn/public/verify?code='.$data['user_activation_code'].'&otp='.$data['user_otp'].'> click here </a>.</p>
                            <p> Sincerely, </p>
                            <p> Interlearn </p>';
                $mail->Body = $message_body;

                if ($mail -> Send()){
                    // $query_string = '?code=' . $data['user_activation_code'];
                    $current_url = 'http://localhost/Interlearn/public/verify/success/register';
                    // echo $current_url;die;
                    //  echo json_encode(['url' => $current_url]);
                    //header('Location: ' . $current_url);

                    return $current_url;
                    
                }
                else{
                    return 0;
                }

}
    // public function update($data){
      
    //     $keys = array_keys($data);
    //     //this will pop the last key and assign it to a variable
    //     $last= array_pop($keys);
        
    //     $query ="update ".$this->table." set ";
    //     foreach($keys as $key){
    //         $query .= $key. " =:".$key." , ";
    //     }
    //     $query = trim($query,", ")." where ";
    //     $query .= $last." =:".$last;

      
    //     $res = $this ->update_table($query,$data);
       
    //     if($res){
    //         return $res;
    //     }
    //     return false;
    // }

    public function update($cred=[],$data=[])
	{
    
		//remove unwanted columns
		if(!empty($this->allowed_columns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowed_columns))
				{
                    
					unset($data[$key]);
				}
			}
		}
   
        $id = array_keys($cred);
		$keys = array_keys($data);
		$query = "update ".$this->table." set ";

		foreach ($keys as $key) {
			$query .= $key ."=:" . $key . ","; 

		}

		$query = trim($query,",");
		$query .= " where ".$id[0]." =:".$id[0];

		$data[$id[0]] = array_values($cred)[0] ;
   
        $result=$this->update_table($query,$data);
     
		if($result){
            return true;
        }
        else{
            return false;
        }

	}
    public function joinDiscuss($data=[],$orderby=null,$order='desc'){
        $query= "SELECT discussion.*, forum.course_id, users.username, users.display_picture from $this->table INNER JOIN forum on forum.forum_id=discussion.forum_id INNER JOIN users on users.uid =discussion.uid";
        $query .= " order by $orderby  $order";
        $res = $this ->query($query,$data);

        if($res){
            return $res;
        }
        return false;
    }
    public function joinDiscussfirst($data=[],$orderby=null,$order='desc'){

        $keys = array_keys($data);

        $query =" select discussion.*,forum.course_id, users.username, users.display_picture FROM ".$this->table." INNER JOIN forum on discussion.forum_id=forum.forum_id INNER JOIN users on users.uid =discussion.uid where ";
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }



        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order limit 1";

        $res = $this -> query($query,$data);

        if(is_array($res)){
           return $res[0];
        }
        return false;
    }

    public function delete($data){
        // if(!empty($this->allowed_columns))
        // {
        //     foreach($data as $key => $value){
        //         if(!in_array($key,$this->allowed_columns))
        //         {
               
        //             unset($data[$key]);
        //         }
               
        //     }
        // }
        $keys = array_keys($data);

        $query ="delete from ".$this->table." where ";
        foreach($keys as $key){
            $query .= $key." =:".$key." && ";
        }
        $query = trim($query," && ");
// echo $query;die;
       $res = $this ->delete_table($query,$data);
  
        if($res){
            return true;
            exit;
        }
        return false;
    }
    public function join($data=null){
        $query= "SELECT * FROM announcement WHERE (select course_id from student_course,users,student where users.uid=student.uid AND student.studentID= student_course.student_id AND users.uid=3);";
       //" select course_id from student_course,users,student where users.uid=student.uid AND student.studentID= student_course.student_id AND users.uid=3";
        // inner join  course on
        // course.course_id= student.course_id inner join annoucement on
        // annoucement.course_id= course.course_id";

        //call it in this way 

        // $student = new Student();
        // $annoucement = new Annoucement();
        // $course = new Course();
 
        // $res=$student->join(
        //     [$student->table=>'course_id',
        //     $course->table=>'course_id',
        //     $annoucement->table=>'course_id',
           
        //     ]
        // );

        // $keys = array_keys($data);
        // $values = array_values($data);
        // $query= "select * from ".$keys[0]." INNER JOIN " . $keys[1] . " on ";
        // $query .= $keys[0] .".". $values[0]." = ". $keys[1] .".". $values[1];
        // $query .= " INNER JOIN " . $keys[2] . " on ";
        // $query .= $keys[1] .".". $values[1]." = ". $keys[2] .".". $values[2];
        // echo $query;die;
        $res = $this ->query($query);
        //show($res);die;

       
        if($res){
            return $res;
        }
        return false;
    }

    //findall function
    public function findAll($order = 'desc'){

        $query ="select * from ".$this->table." order by id $order ";

        $res = $this -> query($query);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    //distinct function
    public function distinctSubject($data=[],$orderby=null,$order = 'desc'){

        $query ="SELECT count(language_medium) AS count, subject_id,subject,grade from ".$this->table;
        $query .= " group by subject, grade";
        $query .= " order by $orderby  $order";
        $res = $this -> query($query,$data);
        // show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    // public function countMedium($data=[]){

    //     $query ="SELECT count(language_medium) AS count,subject,grade FROM ".$this->table;
    //     $query .= " group by subject, grade";
    //     $res = $this -> query($query,$data);
    //     // show($query);die;

    //     if(is_array($res)){
    //         return $res;
    //     }
    //     return false;

    // }

    public function selectTeachers($data=[],$medium='English'){
        $keys = array_keys($data);
        $query ="SELECT DISTINCT 
        subject.*, 
        course.*, 
        course_instructor.emp_id,
        teacher.teacherName, 
        instructor.instructorName FROM ".$this->table;
        $query .=" INNER JOIN 
        course ON course.subject_id = subject.subject_id 
        LEFT JOIN 
        course_instructor ON course.course_id = course_instructor.course_id
        INNER JOIN (
            SELECT 
                staff.emp_id, 
                CONCAT(staff.first_name, ' ', staff.last_name) AS teacherName 
            FROM 
                staff 
            WHERE 
                staff.role = 'Teacher'
        ) AS teacher ON teacher.emp_id = course.teacher_ID 
        LEFT JOIN (
            SELECT 
                staff.emp_id, 
                CONCAT(staff.first_name, ' ', staff.last_name) AS instructorName 
            FROM 
                staff 
            WHERE 
                staff.role = 'Instructor'
        ) AS instructor ON instructor.emp_id = course_instructor.emp_id";
        $query .= " WHERE subject.language_medium = '".$medium."'"." and ";
         


        foreach($keys as $key){
            $query .= "subject.".$key." =:".$key;
        }
        $query .= " group by course_id";
        //echo $query;die;

    //   echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function selectCourse($data=[],$id=null){

        $query ="SELECT concat(staff.first_name,' ',staff.last_name) AS fullname, subject.subject, subject.grade,subject.language_medium,course.* FROM ".$this->table;
        $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN staff ON staff.emp_id = course.teacher_id";

    //  echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    //$query = "SELECT subject.subject, subject.grade,subject.language_medium,course.*,teachers.firstname FROM subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id;"
    //SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname,subject.subject, subject.grade,subject.language_medium,course.*,annoucement.* FROM subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN annoucement ON course.course_id = annoucement.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id;

    public function allAnnouncements($data=[],$id=null,$orderby=null,$order = 'desc'){

        $query ="SELECT concat(staff.first_name,' ',staff.last_name) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.* FROM ".$this->table;
        $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN staff ON staff.emp_id = course.teacher_id";
        $query .= " WHERE staff.role = 'Teacher'";
        $query .= " order by announcement.date_time  $order";
    // echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    //select subject ids
    public function subjectID($data=[]){

        $keys = array_keys($data);
        $query ="select subject_id from ".$this->table." where ";
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

    public function selectSubjectName($id){
        $query ="SELECT subject.subject FROM ".$this->table;
        $query .= " WHERE subject.subject_id  $id";
    //  echo $query;die;
        $res = $this -> query($query,$id);

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    //select subject_id from subject where grade = '8' and subject = 'Mathematics' and language_medium = "Sinhala";

    //select subject.subject_id,subject.subject,grade from subject INNER JOIN course ON course.subject_id = subject.subject_id WHERE course.teacher_id = '1' group by subject, grade;

    public function teacherCourse($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,grade,language_medium,course.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN staff ON staff.emp_id = course.teacher_id ";
        $query .= " WHERE staff.uid = '$id'";
        // $query .= " group by subject, grade";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
// show($query);die;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    // select subject.subject_id,subject.subject,grade,language_medium,course.* from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE teachers.uid = '27' AND course.course_id = '6' group by subject, grade;

    public function CoursePg($data=[],$id,$orderby = null, $order=null){
        $keys = array_keys($data);
        $query = "SELECT subject.subject_id,subject.subject,grade,language_medium from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN staff ON staff.emp_id = course.teacher_id ";
        $query .= " WHERE staff.uid = $id AND ";
        foreach($keys as $key){
            $query .= "course.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        $res = $this -> query($query,$data);
         //show($query);die;
         $query .= " group by subject, grade";
        if(is_array($res)){
            return $res;
        }
        return false;
    }

    //select subject.subject_id,subject.subject,subject.grade,subject.language_medium from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE student.uid = '24'  group by subject, grade;

    public function studentCourse($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT concat(staff.first_name,' ',staff.last_name) AS fullname, subject.subject_id,subject.subject,subject.grade,subject.language_medium,course.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN staff ON course.teacher_id = staff.emp_id INNER JOIN student ON student.studentID = student_course.student_id ";
        $query .= " WHERE student.uid = '$id' AND staff.role = 'Teacher'";
        // $query .= " group by subject, grade";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    //SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.* FROM subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE student.uid = '3' order by announcement.date DESC, announcement.time  DESC

    // public function stdAnnouncements($data=[],$id=null,$orderby=null,$order = 'desc'){

    //     $query ="SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.student_id FROM ".$this->table;
    //     $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id ";
    //     $query .= " WHERE student.uid = $id AND announcement_course.course_id = $course_id";
    //     $query .= " order by announcement.date_time $order";
    //     // announcement.time  $order";
    // // echo $query;die;
    //     $res = $this -> query($query,$data);

    //     if(is_array($res)){
    //         return $res;
    //     }
    //     return false;

    // }

    //select subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.* from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE course.course_id = '6' group by subject, grade;

    public function stdCoursePg($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN staff ON staff.emp_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course.course_id = $id AND staff.role = 'Teacher'";
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

    //select subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course.*,teachers.* from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE course.course_id = '6' group by subject, grade;

    public function stdCourseDetails($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course_content.*,course.*,staff.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_content ON course_content.course_id = course.course_id INNER JOIN course_material ON course_material.cid = course_content.cid INNER JOIN staff ON staff.emp_id = course.teacher_ID INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course.course_id = $id AND staff.role = 'Teacher'";
        // $query .= " group by subject.subject, subject.grade";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }
    public function getallAssignments($data=[]){

        $keys = array_keys($data);
        $query ="select assignment.*, subject.* from ".$this->table." INNER JOIN course on assignment.courseId = course.course_id";
        $query.= " INNER JOIN student_course on student_course.course_id= course.course_id";
        $query.=" INNER JOIN student on student.studentID=student_course.student_id  INNER JOIN subject ON subject.subject_id = course.subject_Id  WHERE";
        foreach($keys as $key){
            $query .= " student.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }


    //SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course.*,teachers.* from course_material INNER JOIN course ON course.course_id = course_material.course_id INNER JOIN subject ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE course.course_id = 6 group by course_material.type, course_material.course_material,course_material.card_id

    //student materials
    public function studentCourseMaterials($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course.*,staff.*,course_content.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_content ON course_content.course_id = course.course_id INNER JOIN course_material ON course_material.cid = course_content.cid INNER JOIN staff ON staff.emp_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course.course_id = $id AND staff.role = 'Teacher'";
        $query .= " group by course_material.course_material";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        //show($query);die;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }
    

    public function teacherCourseDetails($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course.*,staff.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN staff ON staff.emp_id = course.teacher_id";
        $query .= " WHERE course.course_id = '$id' AND staff.role = 'Teacher'";
        $query .= " group by subject.subject, subject.grade";
        // $query .= " order by $orderby  $order";
        //var_dump($_SESSION);exit;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }

    public function teacherCourseMaterial($data=[],$id,$orderby = null, $order=null){
        // $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course.*,teachers.*,course_content.* from ".$this->table;
        // $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN course_content ON course_content.cid = course_material.cid INNER JOIN teachers ON teachers.teacher_id = course.teacher_id";
        // $query .= " WHERE course.course_id = $id ";
        // $query .= " group by course_material.course_material";
         $query = "SELECT course_material.*,course_content.* from course_content LEFT JOIN course_material ON course_content.cid = course_material.cid WHERE course_content.course_id = $id;";
        //var_dump($_SESSION);exit;
        //show($query);die;
        $res = $this -> query($query,$data);
         //show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;
    }
    public function getTeacherClasses($data=[]){

        $keys = array_keys($data);
        $query ="select  course.*, subject.* from ".$this->table;
        $query.= " INNER JOIN subject on course.subject_id = subject.subject_Id INNER JOIN staff on staff.emp_id= course.teacher_ID";
        $query.=" WHERE staff.role = 'Teacher' AND ";
        foreach($keys as $key){
            $query .= " staff.".$key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }
    public function coursedetails($data=[]){

        $keys = array_keys($data);
// show($data);die;
        $query =" select subject.* FROM ".$this->table." INNER JOIN course on course.subject_Id =subject.subject_id  where ";
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
    

    
        $query = trim($query,"&& ");
        $query .= " limit 1";

        $res = $this -> query($query,$data);
      
        if(is_array($res)){
           return $res[0];
        }
        return false;
    }
    public function jointempstudents($data,$orderby=null,$order = 'desc'){
        $keys = array_keys($data);
        $id = $this->table[0]."id";
        $query ="select temp_student.*, temp_student_course.course_id from ".$this->table." inner join temp_student_course on temp_student.studentID = temp_student_course.studentID where ";
   
        foreach($keys as $key){
            $query .= "temp_student.".$key. " =:".$key." && ";
        }
     
    
        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order ";

        $res = $this -> query($query,$data);
      
        if(is_array($res)){
           return $res;
        }
        return false;
           
    }
    public function joinstudentUser($data=null,$orderby=null,$order = 'desc'){

        $query ="select ".$this->table.".*, users.display_picture,users.email from ".$this->table." inner join users on ".$this->table.".uid = users.uid";


        $query .= " order by $orderby  $order ";

        $res = $this -> query($query,$data);

        if(is_array($res)){
           return $res;
        }
        return false;

    }
    public function getYearandMonth(){

        $query ="SELECT EXTRACT(year FROM user_datetime) as Year,EXTRACT(month FROM user_datetime) AS month,";
        $query .="count(EXTRACT(year FROM user_datetime)) as Count FROM `users` GROUP BY EXTRACT(month FROM user_datetime),";
        $query .="EXTRACT(year FROM user_datetime);";



        $res = $this -> query($query);

        if(is_array($res)){
           return $res;
        }

        return false;

    }
    public function getStaffCount(){

        $query ="SELECT COUNT(emp_id) as count ,role FROM `staff` GROUP BY role;";



        $res = $this -> query($query);

        if(is_array($res)){
           return $res;
        }

        return false;

    }
    public function getSubjectCount(){

        $query ="SELECT COUNT(subject_id) as count ,grade FROM `subject` GROUP BY grade;";

        $res = $this -> query($query);

        if(is_array($res)){
           return $res;
        }

        return false;

    }

}
