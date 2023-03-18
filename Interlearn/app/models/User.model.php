<?php
/**
 *user class
 */
class User extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "users";
    protected $allowed_columns = [
        'username',
        'email',
        'password',
        'role',
        'user_datetime',
        'User_activation_code',
        'User_email_status',
        'user_otp',
       "display_picture",
    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
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
            if($this->where(['email'=>$data['email']],'uid')){
                    $this->error['email'] = "Email already exists";
                
            }
        if(empty($this->error)){
            return true;
        }
        return false;
    }


}