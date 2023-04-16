<?php
/**
 *Student class
 */
class Students extends Model
{
    
    //says what table it has to target
    public $error = [];
    protected $table = "student";
    protected $key = 'studentID';

    public $allowed_columns = [


    'studentID',	
    'NIC',	
    'first_name',	
    'last_name',	
    'birthday',
    'gender',
    'email',
    'mobile_number',
    'address_line1',
    'address_line2',
    'address_line3',
    'school',
    'grade',
    'language_medium',
    'Picture',
    'course_id',
    'uid',

    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
    // public function validate($data)
    // {   
    //     $this->error = [];
    //     foreach($data as $key => $value)
    //     { 
    //         if(empty($data[$key]))
    //         {
    //             $this -> error[$key] = ucfirst($key)." is required";
    //         }
    //      }
    
    //         // // checks email is valid if so it'll check whther it already exists
    //         // if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
    //         // {
    //         //     $this->error['email'] = "Email is not valid";
    //         // }else
    //         // if($this->where(['email'=>$data['email']])){
    //         //         $this->error['email'] = "Email already exists";
                
    //         // }
    //     if(empty($this->error)){
    //         return true;
    //     }
    //     return false;
    // }

    public function getStudentName($uid){
        $query = "SELECT concat(student.first_name, ' ', student.last_name) AS fullname FROM ".$this->table;
        $query .= " WHERE uid =:uID";
        $data['uID'] = $uid;

        $res = $this -> query($query, $data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }


    public function getStudentID($uid){
        $query = "SELECT studentID FROM ".$this->table;
        $query .= " INNER JOIN users ON student.uid = users.uid";
        $query .= " WHERE student.uid =:UID";

        $data['UID'] = $uid;
        $res = $this -> query($query, $data);

        if($res){
            return $res;
        }else{
            return false;
        }
    }



}