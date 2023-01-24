<?php 
/**
 * model class
 */

class Model extends Database {
    protected $table = "";
    public function insert($data){
        //remove unwanted columns
        if(!empty($this->allowed_columns))
        {
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowed_columns))
                {
                    unset($data[$key]);
                }
            }
        }
            $keys = array_keys($data);
            $query = "insert into ".$this->table."(".implode(",",$keys) .") values (:".implode(",:",$keys).")";
            $this -> query($query,$data);
            return true;
    }
    //select all the records that matches 
    public function where($data){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." where ";

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
    //select only the first record that matches 
    public function first($data){
        $keys = array_keys($data);
        $query ="select * from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by SID desc limit 1";
        $res = $this -> query($query,$data);
        
        if(is_array($res)){
           return $res[0];
        }
        return false;
           
    }
    public function role($data){
        $keys = array_keys($data);
        $query ="select role from ".$this->table." where ";

        foreach($keys as $key){
            $query .= $key. " =:".$key." && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by SID desc limit 1";
        $res = $this -> query($query,$data);
       
        if(is_array($res)){
            if(in_array($res[0]->role,$this->staffs)){
                return true;
            }
           
        }
        return false;
    }


    public function sendemail($data){
      
        require_once "../public/assets/phpmailer/src/Exception.php";
        require_once '../public/assets/phpmailer/src/PHPMailer.php';
        require_once '../public/assets/phpmailer/src/SMTP.php';
        
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $mail -> isSMTP();
                $mail -> Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail -> SMTPAuth = true;
                $mail -> Username ='interlearnsl@gmail.com';
                $mail -> Password = 'qeffokfsaebqwngl';
                $mail->SMTPSecure ='ssl';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                    );
                $mail->From ='interlearnsl@gmail.com';
                $mail -> FromName = 'Interlearn';
                $mail -> AddAddress($data['email']);
                $mail ->IsHTML(true);
                $mail -> Subject = 'Verification code';
                $message_body ='<p> To verify your email address enter this <b>'.$data['user_otp'].'</b>.</p>
                            <p> Sincerely, </p>
                            <p> Interlearn </p>';
                $mail->Body = $message_body;
                if ($mail -> Send()){
                    $query_string = '?code=' . $data['user_activation_code'];
                    $current_url = '../verify'.$query_string;
                    header('Location: ' . $current_url);
                    // // header ('location:?code='.$data['user_activation_code']);
                    return 1;
                    
                }
                else{
                    return 0;
                }

}
    public function update($data){
      
        $keys = array_keys($data);
        //this will pop the last key and assign it to a variable
        $last= array_pop($keys);
        
        $query ="update ".$this->table." set ";
        foreach($keys as $key){
            $query .= $key. " =:".$key." , ";
        }
        $query = trim($query,", ")." where ";
        $query .= $last." =:".$last;

      
        $res = $this ->update_table($query,$data);
       
        if($res){
            return $res;
        }
        return false;
    }
}
