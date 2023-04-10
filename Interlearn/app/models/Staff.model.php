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
        'enrollment_date',
        'first_name',
        'last_name',
        'mobile_no',
        'Addressline1',
        'gender',
        'emp_status',
        'uid',
        'contractEndingDate',
    ];

    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];

    public function Addstaff($data)
    {
        // $this->insert($data);
        
        $data = (array) $data;

        $last_inserted_email = $data['email'];
        $query = "SELECT * FROM users where email = '$last_inserted_email'";
        $newStaffuid = $this->query($query) ;
        $data['uid']  = $newStaffuid[0]->uid;
        $this->insert($data);
        return true;
        

        // $this->error = [];
        // if ($this->where(['NIC_no' => $data['NIC_no']], 'emp_ID')) {
        //     $this->error['NIC_no_error'] = "NIC_no already exists";
        // } else {
        //     $this->insert($data);
        //     $this->error['success'] = "Staff added to staff table successfully";
        // }
    }


    public function getUserDetails($uid)
    {
        $query = "SELECT * FROM staff where uid = '$uid'";
        $data = $this->query($query);
        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function getStaffDetails()
    {
        // $query = "SELECT * FROM staff";
        $query = "SELECT staff.*, users.role FROM staff  JOIN users  ON staff.uid = users.uid";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function updateStaffData($emp_id, $data)
    {


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

        $result = $this->query($query, $data);
        if (!$result) {
            $this->error[] = 'Failed to update staff data.';
            return false;
        }

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