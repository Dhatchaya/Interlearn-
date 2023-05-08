<?php
/**
 *Question class
 */
class ZChoices extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "mychoice";
    protected $allowed_columns = [

        'choice1',
        'choice1_mark',
        'choice2',
        'choice2_mark',
        'choice3',
        'choice3_mark',
        'choice4',
        'choice4_mark',
        'question_number'


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

    public function UpdateChoice($id,$updated_title1, $updated_marks1,$updated_title2,$updated_marks2,$updated_title3,$updated_marks3,$updated_title4,$updated_marks4){

        $query = "UPDATE ".$this->table." SET choice1 =:updateTitle1 , choice1_mark =:updateMarks1 ,
        choice2 =:updateTitle2 , choice2_mark =:updateMarks2 ,
        choice3 =:updateTitle3 , choice3_mark =:updateMarks3 ,
        choice4 =:updateTitle4 , choice4_mark =:updateMarks4 WHERE question_number =:ID";

        $data['updateTitle1'] = $updated_title1;
        $data['updateMarks1'] = $updated_marks1;
        $data['updateTitle2'] = $updated_title2;
        $data['updateMarks2'] = $updated_marks2;
        $data['updateTitle3'] = $updated_title3;
        $data['updateMarks3'] = $updated_marks3;
        $data['updateTitle4'] = $updated_title4;
        $data['updateMarks4'] = $updated_marks4;
        $data['ID'] = $id;
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