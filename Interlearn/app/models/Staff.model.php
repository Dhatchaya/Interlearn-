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

        'emp_ID',
        'NIC_no',
        'username',
        'password',
        'enrollment_date',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'Addressline1',
        'Addressline2',
        'role',
        'display_picture',
        'gender',
        'uid',

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

    public function getStaffDetails(){
        // $query = "SELECT * FROM staff";
        $query = "SELECT staff.*, users.role FROM staff  JOIN users  ON staff.uid = users.uid";
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
        $query = "UPDATE staff SET ";
        $data = $this->update_table($query, $data);
        
        // $values = array();
    
        // foreach ($data as $key => $values) {
        //     if (in_array($key, $this->allowed_columns)) {
        //         $values[] = "$key = ?";
        //     }
        // }
    
        // $query .= implode(", ", $values) . " WHERE emp_ID = ?";
        // $data[] = $emp_id;
    
        // // Debugging statements
        // var_dump($query);
        // var_dump(array_values($data));
    
        // // Execute query
        // $result = $this->query($query, array_values($data));
    
        $result = $this->query($query,$data);
        if (!$result) {
            $this->error[] = 'Failed to update staff data.';
            return false;
        }
    
        return true;
    }

    public function Addstaff(){
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->validate($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            show($data);
            die();

            $this->insert($data);
            

            $this->error['success'] = "Staff added successfully";
        }
        return $this->error;
    }



    public function validate($data)
    {
        $this->error = [];
        foreach ($data as $key => $value) {
            if (empty($data[$key])) {
                $this->error[$key] = ucfirst($key) . " is required";
            }
        }

        // checks email is valid if so it'll check whther it already exists
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = "Email is not valid";
        } else
            if ($this->where(['email' => $data['email']], 'emp_ID')) {
            $this->error['email'] = "Email already exists";
        }
        if (empty($this->error)) {
            return true;
        }
        return false;
    }
}
