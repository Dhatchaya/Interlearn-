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
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'date'
    ];
    public function validate($data)
    {   
        show ($data);die;
        $this->error = [];
        if(empty($data['firstname'])){
            $this->error['firstname'] = "A first name is required";
        }
        if(empty($data['lastname'])){
            $this->error['lastname'] = "A last name is required";
        }
    
            // checks email is valid if so it'll check whther it already exists
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            {
                $this->error['email'] = "Email is not valid";
            }else
            if($this->where(['email'=>$data['email']])){
                    $this->error['email'] = "Email already exists";
                
            }
    
 
        if(empty($data['password'])){
            $this->error['password'] = "A password is required";
        }
    
            if($data['password'] !== $data['retype_password']){
                $this->error['password'] = "The passwords do not match";
            }
        
 
        if(empty($data['terms'])){
            $this->error['terms'] = "Please accept the terms and conditions";
        }

       
        if(empty($this->error)){
            return true;
        }
        return false;
    }


}