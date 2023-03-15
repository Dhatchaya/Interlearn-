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
    public function getStaffDetails(){
        $query = "SELECT * FROM staff";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function updateStaffData(){
        $query = "SELECT * FROM staff";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }
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
