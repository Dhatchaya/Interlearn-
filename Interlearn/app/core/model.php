<?php 
/**
 * model class
 */

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
    public function role($data,$orderby=null){
        $keys = array_keys($data);
        $query ="select role from ".$this->table." where ";
        
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by $orderby desc limit 1";
        $res = $this -> query($query,$data);
       
        if(is_array($res)){
            if(in_array($res[0]->role,$this->staffs)){
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
                $message_body ='<p> To verify your email address enter this <b>'.$data['user_otp'].'</b>.</p>
                            <p> Sincerely, </p>
                            <p> Interlearn </p>';
                $mail->Body = $message_body;
                if ($mail -> Send()){
                    $query_string = '?code=' . $data['user_activation_code'];
                    $current_url = 'http://localhost/Interlearn/public/verify'.$query_string;
                    header('Location: ' . $current_url);

                    return 1;
                    
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
        $query= "SELECT discussion.*, users.username, users.display_picture from $this->table INNER JOIN users on users.uid =discussion.uid";
        $query .= " order by $orderby  $order";
        $res = $this ->query($query,$data);

        if($res){
            return $res;
        }
        return false;
    }
    public function joinDiscussfirst($data=[],$orderby=null,$order='desc'){

        $keys = array_keys($data);

        $query =" select discussion.*, users.username, users.display_picture FROM ".$this->table." INNER JOIN users on users.uid =discussion.uid where ";
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
    
        $keys = array_keys($data);

        $query ="delete from ".$this->table." where ";
        foreach($keys as $key){
            $query .= $key." =:".$key." , ";
        }
        $query = trim($query," , ");
        // echo ($query);die;
       $res = $this ->query($query,$data);
       
        if($res){
            return true;
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

        $query ="select subject_id,subject,grade from ".$this->table;
        // $query = " INNER JOIN course ON course.subject_id = subject.subject_id";
        $query .= " group by subject, grade";
        $query .= " order by $orderby  $order";
        $res = $this -> query($query,$data);
        // show($query);die;

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function selectTeachers($data=[],$medium='English',$id=null){
        $keys = array_keys($data);
        $query ="SELECT subject.*,course.*,course_instructor.instructor_id,concat(teachers.firstname,' ',teachers.lastname) AS teacherName, concat(instructor.firstname,' ',instructor.lastname) AS instructorName FROM ".$this->table;
        $query .=" RIGHT JOIN course ON course.subject_id = subject.subject_id LEFT JOIN course_instructor ON course.course_id = course_instructor.course_id RIGHT JOIN teachers ON teachers.teacher_id = course.teacher_id LEFT JOIN instructor ON instructor.instructor_id = course_instructor.instructor_id WHERE";
        $query .= " subject.language_medium = '".$medium."'"." and ";
        // $query .= " group by language_medium";


        foreach($keys as $key){
            $query .= "subject.".$key." =:".$key." and ";
        }
        $query = trim($query," and ");
      //echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function selectCourse($data=[],$id=null){

        $query ="SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.* FROM ".$this->table;
        $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id";

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

        $query ="SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.* FROM ".$this->table;
        $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN teachers ON teachers.teacher_id = course.teacher_id";
        $query .= " order by announcement.date $order, announcement.time  $order";
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
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id ";
        $query .= " WHERE teachers.uid = $id";
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

    // select subject.subject_id,subject.subject,grade,language_medium,course.* from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE teachers.uid = '27' AND course.course_id = '6' group by subject, grade;

    public function CoursePg($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,grade,language_medium from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id ";
        $query .= " WHERE teachers.uid = $id AND course.course_id = '6'";
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

    //select subject.subject_id,subject.subject,subject.grade,subject.language_medium from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE student.uid = '24'  group by subject, grade;

    public function studentCourse($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject_id,subject.subject,subject.grade,subject.language_medium,course.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN teachers ON course.teacher_id = teachers.teacher_id INNER JOIN student ON student.studentID = student_course.student_id ";
        $query .= " WHERE student.uid = $id";
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

    //SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.* FROM subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id WHERE student.uid = '3' order by announcement.date DESC, announcement.time  DESC

    public function stdAnnouncements($data=[],$id=null,$orderby=null,$order = 'desc'){

        $query ="SELECT concat(teachers.firstname,' ',teachers.lastname) AS fullname, subject.subject, subject.grade,subject.language_medium,course.*,announcement.*,announcement_course.*,student_course.student_id FROM ".$this->table;
        $query .=" INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN announcement_course ON course.course_id = announcement_course.course_id INNER JOIN announcement ON announcement_course.aid = announcement.aid INNER JOIN student_course ON student_course.course_id = announcement_course.course_id INNER JOIN student ON student.studentID = student_course.student_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id ";
        $query .= " WHERE student.uid = $id ";
        $query .= " order by announcement.date $order, announcement.time  $order";
     //echo $query;die;
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    //select subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.* from subject INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id WHERE course.course_id = '6' group by subject, grade;

    public function stdCoursePg($data=[],$id,$orderby = null, $order=null){
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course.course_id = $id ";
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
        $query = "SELECT subject.subject_id,subject.subject,subject.grade,subject.language_medium,course_material.*,course.*,teachers.* from ".$this->table;
        $query .= " INNER JOIN course ON course.subject_id = subject.subject_id INNER JOIN course_material ON course_material.course_id = course.course_id INNER JOIN teachers ON teachers.teacher_id = course.teacher_id INNER JOIN student_course ON student_course.course_id = course.course_id INNER JOIN student ON student.studentID = student_course.student_id";
        $query .= " WHERE course.course_id = $id ";
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
}
