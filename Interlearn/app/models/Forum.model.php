<?php
/**
 *Forum class
 */
class Forum extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "forum";
    protected $allowed_columns = [
        'forum_id',
        'date',
        'content',
        'course_id',
        'topic',
        'creator',
        'attachment',
        'uid',

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
    public function joinforumfirst($data=[],$orderby=null,$order='desc'){

        $keys = array_keys($data);

        $query =" select forum.*, users.username, users.display_picture FROM ".$this->table." INNER JOIN users on users.uid =forum.uid where ";
        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
    

    
        $query = trim($query,"&& ");
        $query .= " order by $orderby  $order limit 1";

        $res = $this -> query($query,$data);
      
        if(is_array($res)){
           return $res[0];
        }
        return false;
    }

}
//trigger used in discussion
// BEGIN
// INSERT INTO discussion(discussion_id,parent_id,topic,last_replied,content,uid)VALUES(new.forum_id, new.forum_id,new.topic, new.creator,new.content,new.uid);
// END