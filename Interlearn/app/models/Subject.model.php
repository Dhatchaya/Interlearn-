<?php
/**
 *subject class
 */
class Subject extends Model
{
    //says what table it has to target
    public $error = [];
    public $table = "subject";
    protected $allowed_columns = [
        'subject_id',	
        'subject',
        'grade',
        'language_medium',
        'description',
        'image'
    ];
    public function validate($data)
    {   
        $this->error = [];
        if(empty($data['subject_id']))
            {
                $this -> error['subject_id'] = "a teacher_id is required";
            }
        // foreach($data as $key => $value)
        // { 
        //     if(empty($data[$key]))
        //     {
        //         $this -> error[$key] = ucfirst($key)." is required";
        //     }
        //  }
    
            // checks email is valid if so it'll check whther it already exists
            // if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            // {
            //     $this->error['email'] = "Email is not valid";
            // }else
            // if($this->where(['email'=>$data['email']],'uid')){
            //         $this->error['email'] = "Email already exists";
                
            // }
        if(empty($this->error)){
            return true;
        }
        return false;
    }

    public function getSubject(){
        $query = "SELECT DISTINCT subject FROM ".$this->table;
        $res = $this -> query($query);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getGrade(){
        $query = "SELECT DISTINCT grade FROM ".$this->table;
        $res = $this -> query($query);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getSubjectId($subject_name, $grade, $medium){
        $query = "SELECT subject_id FROM ".$this->table;
        $query .= " WHERE subject = :subject_name AND grade = :grade AND language_medium = :lang_medium";

        $data['subject_name'] = $subject_name;
        $data['grade'] = $grade;
        $data['lang_medium'] = $medium;
        $res = $this -> query($query,$data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getSubjectGrade($subject_id){
        $query = "SELECT subject_id,subject,grade FROM ".$this->table;
        $query .= " WHERE subject_id = :subjectId";

        $data['subjectId'] = $subject_id;
        $res = $this -> query($query,$data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getMedium($subject_name, $grade){
        $query = "SELECT subject_id,language_medium FROM ".$this->table;
        $query .= " WHERE subject = :subjectName AND grade = :grade";

        $data['subjectName'] = $subject_name;
        $data['grade'] = $grade;
        $res = $this -> query($query,$data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getSubjectGradeMediums($subject_name, $grade){
        $query = "SELECT language_medium FROM ".$this->table;
        $query .= " WHERE subject =:subjectName AND grade =:grade";
        $data['subjectName'] = $subject_name;
        $data['grade'] = $grade;

        $res = $this -> query($query,$data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getSubjectGrades($subject_name){

        $query = "SELECT grade FROM ".$this->table;
        $query .= " WHERE `subject` = :subjectName GROUP BY `subject`, `grade` HAVING COUNT(grade) = 3;";
        $data['subjectName'] = $subject_name;

        $res = $this -> query($query,$data);

        if($res){
            return $res;
        } else {
            return false;
        }

    }


}