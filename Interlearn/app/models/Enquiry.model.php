<?php
/**
 *Enquiry class
 */
class Enquiry extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "enquiry";
    protected $allowed_columns = [
        'enquiry_no',
        'title',
        'content',
        'type',
        'status',
        'date',
        'user_Id',	
        'role',
        'reply',

    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
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
    
            // // checks email is valid if so it'll check whther it already exists
            // if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
            // {
            //     $this->error['email'] = "Email is not valid";
            // }else
            // if($this->where(['email'=>$data['email']])){
            //         $this->error['email'] = "Email already exists";
                
            // }
        if(empty($this->error)){
            return true;
        }
        return false;
    }
    public function selectUserCourse($data=null,$orderby=null,$order = 'desc')
    {  
  
        
        $query ="select enquiry.*,users.username from ".$this->table;
  
        $query .= " INNER JOIN users on enquiry.user_Id = users.uid order by $orderby  $order";
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;
           
    
    }

    
}