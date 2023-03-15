<?php
/**
 *staff class
 */
class Staff extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "staff";
    protected $allowed_columns = [

    'emp_id',
    'NIC_no',
    'uid',
    'username',
    'password',
    'enrollment_date',
    'first_name',
    'last_name',
    'email',
    'mobile_no',
    'Address',
    'role',
    'gender'
    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
    public function getUserDetails($uid){
        $query = "SELECT * FROM staff where uid = '$uid'";
        $data = $this->query($query);
        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function getStaffDetails($emp_id, $data){
        $query = "SELECT * FROM staff";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function updateStaffData($emp_id, $data) {
        // Check if emp_id is set
        if (empty($emp_id)) {
            $this->error[] = 'Emp ID is required.';
            return false;
        }

        // Check if data is empty
        if (empty($data)) {
            $this->error[] = 'No data to update.';
            return false;
        }

        // Validate data
        // ...

        // Build update query
        $query = "UPDATE staff SET ";
        $values = array();

        foreach ($data as $key => $value) {
            if (in_array($key, $this->allowed_columns)) {
                $values[] = "$key = ?";
            }
        }

        $query .= implode(", ", $values) . " WHERE emp_ID = ?";
        $data[] = $emp_id;

        // Execute query
        $result = $this->query($query, $data);

        if (!$result) {
            $this->error[] = 'Failed to update staff data.';
            return false;
        }

        return true;
    }

    // public function updateStaffData(){
    //     $query = "SELECT * FROM staff";
    //     $data = $this->query($query);

    //     if ($data == NULL) {
    //         $data = array();
    //     }

    //     return $data;
    // }
    public function Addstaff(){
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->validate($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->insert($data);
            $this->error['success'] = "Staff added successfully";
        }
        return $this->error;
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
    
            // checks email is valid if so it'll check whther it already exists
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $this->error['email'] = "Email is not valid";
            }else
            if($this->where(['email'=>$data['email']],'emp_ID')){
                    $this->error['email'] = "Email already exists";
                
            }
        if(empty($this->error)){
            return true;
        }
        return false;
    }

    public function getTeachers(){
        $query = "SELECT *, concat(first_name,' ',last_name) AS teacherName FROM ".$this->table;
        $query .= " WHERE role = 'Teacher'";

        $res = $this -> query($query);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }

    public function getInstructors(){
        $query = "SELECT *, concat(first_name,' ',last_name) AS instructorName FROM ".$this->table;
        $query .= " WHERE role = 'Instructor'";

        $res = $this -> query($query);
        //  show($query);die;

        if(is_array($res)){
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }


}