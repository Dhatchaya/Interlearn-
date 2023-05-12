<?php
/**
 *Quizz class
 */
class ZQuiz extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "myquiz";
    protected $allowed_columns = [	

        'quiz_id',
        'quiz_name',
        'quiz_description',
        'display_question',
        'total_points',
        'category',
        'enable_time',
        'disable_time',
        'duration',
        'format_time',
        'course_id'	
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

    public function GetQuiz($data= null){

        $keys = array_keys($data);
        
        $query = "SELECT quiz_name, quiz_description, display_question, enable_time, disable_time FROM myquiz where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false; 
           
    }

    public function ViewQuiz($data= null){

        $keys = array_keys($data);

        $query = "SELECT * FROM myquiz where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $res = $this -> query($query,$data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function UpdateQuiz($qid, $updated_duration, $updated_description, $updated_qname, $total, $enable, $disable, $format){
        $query = "UPDATE ".$this->table." SET duration =:updateDuration , quiz_description =:updateDescription ,
        quiz_name =:updateName , total_points =:updatePoints , enable_time =:updateEnable , 
        disable_time =:updateDisable , format_time =:updateFormat WHERE quiz_id =:ID";

        $data['updateDescription'] = $updated_description;
        $data['updateDuration'] = $updated_duration;
        $data['updateName'] = $updated_qname;
        $data['updatePoints'] = $total;
        $data['updateEnable'] = $enable;
        $data['updateDisable'] = $disable;
        $data['updateFormat'] = $format;
        $data['ID'] = $qid;
        // $data['cId'] = $cid;
        $res = $this -> update_table($query,$data);
        // echo $res;die;
        // show($query);die;

        if($res){
            return true;
        }else{
            return false;
        }
    }



}