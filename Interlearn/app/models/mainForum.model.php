<?php
/**
 *Forum class
 */
class mainForum extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "mainforum";
    protected $allowed_columns = [
        'subject',
        'description',
        'mainforum_id',
        'course_id',
        'cid',


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

    // public function joinforumdiscussion($data=[]){

    //     $keys = array_keys($data);

    //     $query ="SELECT forum.*, discussion.* from ".$this->table." LEFT JOIN discussion on forum.forum_id = discussion.forum_id where ";
    //     foreach($keys as $key){
    //         $query .= "forum.".$key. " =:".$key." && ";
    //     }



    //     $query = trim($query,"&& ");
    //    $query .= "  GROUP by forum.forum_id";

    //     $res = $this -> query($query,$data);

    //     if(is_array($res)){
    //        return $res;
    //     }
    //     return false;
    // }

}
//trigger used in discussion
// BEGIN
// INSERT INTO discussion(discussion_id,parent_id,topic,last_replied,content,uid)VALUES(new.forum_id, new.forum_id,new.topic, new.creator,new.content,new.uid);
// END