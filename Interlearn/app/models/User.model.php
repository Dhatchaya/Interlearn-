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
        'uid',
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
    public $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
    public function Adduser($data){

        if ($this->validate($data)) {
            // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->insert($data);
            $this->error['success'] = "Staff added to user table successfully with uid: ";
            return true;
        }
        return $this->error;
    }


    public function validate($data)
    {   

        $this->error = [];
        foreach($data as $key => $value)
        { 

            if(($key!= "NIC") && empty($data[$key])||($data[$key]=="undefined") )
            {
                $this -> error[$key] = ucfirst($key)." is required";
            }
         }
         if(isset($data['pic']['name']) AND ($data['pic']=="undefined")){
            
                $this->error['pic'] = "Please upload your picture";
            }
    
            // checks email is valid if so it'll check whther it already exists
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $this->error['email'] = "Email is not valid";
            }else
            if($this->where(['email'=>$data['email']],'uid')){
                    $this->error['email'] = "Email already exists";
                
            }
            if(empty($data['NIC'])){
                if(!empty($data['birthday'])){
                    $today = date('Y-m-d');
                    $diff=date_diff(date_create($data['birthday']),date_create($today));
                    $age= $diff->format("%y");
                    if($age >16){
                        $this->error['NIC'] = "Enter your NIC number";
                    }
                    
                }
              
            }
           
        if(empty($this->error)){
            return true;
        }
        return false;
    }
    public function validateLogin($data)
    {
        $this->error = [];
        foreach($data as $key => $value)
        { 
            if(empty($data[$key]))
            {
                $this -> error[$key] = ucfirst($key)." is required";
            }
         }
        // show($this->error);die;
         if(empty($this->error)){
            return true;
        }
        return false;

    }

}