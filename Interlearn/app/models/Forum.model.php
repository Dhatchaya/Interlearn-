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
        'mainforum_id',

    ];

    public function validate($data)
    {   
        $this->error = [];
        //show($data);die;
        foreach($data as $key => $value)
        { 
            if(empty($data[$key]))
            {
                $this -> error[$key] = ucfirst($key)." is required";
            }
         }
         if (!(preg_match('/^.{0,25}$/', $data['topic']))) {

            $this->error['topic'] = "Maximum number of allowed characters is 25";
         }
         if (!(preg_match('/^.{0,1000}$/', $data['content']))) {

            $this->error['content'] = " Maximum number of allowed characters is 1000";
         }


        if(empty($this->error)){
            return true;
        }
        return false;
    }
    public function validatefile($data,$previoussize=0)
    {   

        $this->error = [];
        $this->size = 0;
 
            if(!empty($_FILES['attachment']))
            {
              

                 
                        $this ->size = $_FILES['attachment']['size'];
                        
                    
                   
                 if($this ->size > 5*MB){
                    $this -> error['attachment'] = "File size is too large";
                 }
                
                 }

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
