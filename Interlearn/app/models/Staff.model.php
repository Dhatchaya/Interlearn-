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
        'ResignedDate',
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

        // $last_inserted_email = $data['email'];
        // $query = "SELECT * FROM users where email = '$last_inserted_email'";
        // $newStaffuid = $this->query($query);
        // $data['uid']  = $newStaffuid[0]->uid;
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


    public function ProfileDetails($uid)
    {
        $current_uid = $uid;
        $query = "SELECT staff.*, users.* FROM staff  JOIN users  ON staff.uid = users.uid where staff.uid = '$current_uid'";
        $data = $this->query($query);
        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function crrEmpData()
    {
        // $query = "SELECT * FROM staff";
        $query = "SELECT staff.*, users.role FROM staff  JOIN users  ON staff.uid = users.uid WHERE emp_status= '1' ";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }


    public function formerEmpData()
    {
        // $query = "SELECT * FROM staff";
        $query = "SELECT staff.*, users.role FROM staff  JOIN users  ON staff.uid = users.uid WHERE emp_status!= '1' ";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function updateStaffData($emp_uid, $current_date)
    {
        $emp_id = $emp_uid;
        $resignedDate = $current_date;
        $query = "UPDATE staff SET emp_status = '2', ResignedDate = '$resignedDate' WHERE uid = '$emp_id' ";
        $data = $this->query($query);
        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function rejoinStaff($emp_uid, $current_date)
    {
        $emp_id = $emp_uid;
        $rejoinedDate = $current_date;
        $query = "UPDATE staff SET emp_status = '1', enrollment_date  = '$rejoinedDate' WHERE uid = '$emp_id' ";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function editProfile($data)
    {
        $emp_id = $data['uid'];
        $dp = isset($data['display_picture']) ? "'" . $data['display_picture'] . "'" : "display_picture";
        $first_name = isset($data['first_name']) ? "'" . $data['first_name'] . "'" : "first_name";
        $last_name = isset($data['last_name']) ? "'" . $data['last_name'] . "'" : "last_name";
        $Addressline1 = isset($data['Addressline1']) ? "'" . $data['Addressline1'] . "'" : "Addressline1";
        $mobile_no = isset($data['mobile_no']) ? "'" . $data['mobile_no'] . "'" : "mobile_no";
        $email = isset($data['email']) ? "'" . $data['email'] . "'" : "email";
        
        $query = "UPDATE staff SET 
                    first_name = $first_name, 
                    last_name = $last_name, 
                    Addressline1 = $Addressline1, 
                    mobile_no = $mobile_no
                    WHERE uid = '$emp_id'";
        $this->query($query);
    
        $query = "UPDATE users SET 
                    email = $email,
                    display_picture = $dp  
                    WHERE uid = '$emp_id'";
        $this->query($query);
    
        return array('status' => 'success');
    }
    
    


    // public function editProfile($data)
    // {

    //     if (isset($data['first_name'])) {
    //         $first_name = $data['first_name'];
    //     } else {
    //         $first_name = '';
    //     }

    //     if (isset($data['last_name'])) {
    //         $last_name = $data['last_name'];
    //     } else {
    //         $last_name = '';
    //     }

    //     if (isset($data['email'])) {
    //         $email = $data['email'];
    //     } else {
    //         $email = '';
    //     }
    //     if(isset($data['Addressline1'])){
    //         $Addressline1 = $data['Addressline1'];
    //     }else{
    //         $Addressline1 = '';
    //     }

    //     if(isset($data['mobile_no'])){
    //         $mobile_no = $data['mobile_no'];
    //     }else{
    //         $mobile_no = '';
    //     }


    //     $emp_id = $data['uid'];
    //     $query1 = "UPDATE staff SET 
    //                 first_name = $first_name, 
    //                 last_name =$last_name, 
    //                 Addressline1 = $Addressline1, 
    //                 mobile_no = $mobile_no
    //                 WHERE uid = $emp_id";
    //             $data = $this->query($query1);
    
    //     $query2 = "UPDATE users SET  email = $email, WHERE uid = $emp_id";
    //     $data = $this->query($query1);
    //     return array('status' => 'success');
    // }
    
    

    // public function updateStaffData($emp_id, $data)
    // {


    //     // Check if emp_id is set
    //     if (empty($emp_id)) {
    //         $this->error[] = 'Emp ID is required.';
    //         return false;
    //     }

    //     // Check if data is empty
    //     if (empty($data)) {
    //         $this->error[] = 'No data to update.';
    //         return false;
    //     }
    //     $query = "UPDATE staff SET ";
    //     $data = $this->update_table($query, $data);

    //     // $values = array();

    //     // foreach ($data as $key => $values) {
    //     //     if (in_array($key, $this->allowed_columns)) {
    //     //         $values[] = "$key = ?";
    //     //     }
    //     // }

    //     // $query .= implode(", ", $values) . " WHERE emp_ID = ?";
    //     // $data[] = $emp_id;

    //     // // Debugging statements
    //     // var_dump($query);
    //     // var_dump(array_values($data));

    //     // // Execute query
    //     // $result = $this->query($query, array_values($data));

    //     $result = $this->query($query, $data);


    //     // Validate data
    //     // ...

    //     // Build update query
    //     $query = "UPDATE staff SET ";
    //     $values = array();

    //     foreach ($data as $key => $value) {
    //         if (in_array($key, $this->allowed_columns)) {
    //             $values[] = "$key = ?";
    //         }
    //     }

    //     $query .= implode(", ", $values) . " WHERE emp_ID = ?";
    //     $data[] = $emp_id;

    //     // Execute query
    //     $result = $this->query($query, $data);

    //     if (!$result) {
    //         $this->error[] = 'Failed to update staff data.';
    //         return false;
    //     }

    //     return true;
    // }


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

    public function getTeachers()
    {
        $query = "SELECT *, concat(first_name,' ',last_name) AS teacherName FROM " . $this->table;
        $query .= " WHERE role = 'Teacher'";

        $res = $this->query($query);
        //  show($query);die;

        if (is_array($res)) {
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }

    public function getInstructors()
    {
        $query = "SELECT *, concat(first_name,' ',last_name) AS instructorName FROM " . $this->table;
        $query .= " WHERE role = 'Instructor'";

        $res = $this->query($query);
        //  show($query);die;

        if (is_array($res)) {
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }

    public function getAvailableInstructors($course_id)
    {
        $query = "SELECT staff.emp_id, concat(staff.first_name,' ',staff.last_name) AS instructorName FROM " . $this->table;
        $query .= " WHERE role = 'Instructor' AND staff.emp_id NOT IN (SELECT course_instructor.emp_id FROM course_instructor WHERE course_id IN (SELECT course_id FROM course WHERE (course.day, course.timefrom, course.timeto) = (SELECT day, timefrom, timeto FROM course WHERE course_id =:courseID)) )";

        $data['courseID'] = $course_id;

        $res = $this->query($query, $data);
        //  show($query);die;

        if (is_array($res)) {
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }

    public function getEmpId($user_id)
    {
        $query = "SELECT emp_id FROM " . $this->table;
        $query .= " WHERE uid =:uId";

        $data['uId'] = $user_id;

        $res = $this->query($query, $data);
        //  show($query);die;

        if (is_array($res)) {
            // echo $res;die;
            return $res;
        }
        // echo "hi";die;
        return false;
    }
}
