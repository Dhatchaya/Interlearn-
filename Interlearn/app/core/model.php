<?php

/**
 * model class
 */

class Model extends Database
{
    protected $table = "";

    public function insert($data)
    {
        //remove unwanted columns
        if (!empty($this->allowed_columns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowed_columns)) {

                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);

        $query = "insert into " . $this->table . "(" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);
        return true;



        
    }
    //select all the records that matches 
    public function where($data, $orderby = null, $order = 'desc')
    {
        $keys = array_keys($data);
        $query = "select * from " . $this->table . " where ";
        $id = $this->table[0] . "id";
        foreach ($keys as $key) {
            $query .= $key . " =:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $query .= " order by $orderby  $order";
        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }
        return false;
    }
    //select all the records
    public function select($data = null, $orderby = null, $order = 'desc')
    {

        $query = "select * from " . $this->table;

        $query .= " order by $orderby  $order";
        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }
        return false;
    }
    //select only the first record that matches 
    public function first($data, $orderby = null, $order = 'desc')
    {
        $keys = array_keys($data);
        $id = $this->table[0] . "id";
        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . " =:" . $key . " && ";
        }


        $query = trim($query, "&& ");
        $query .= " order by $orderby  $order limit 1";

        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res[0];
        }
        return false;
    }
    // public function role($data, $orderby = null)
    // {
    //     $keys = array_keys($data);
    //     $query = "select role from " . $this->table . " where ";

    //     foreach ($keys as $key) {
    //         $query .= $key . " =:" . $key . " && ";
    //     }
    //     $query = trim($query, "&& ");
    //     $query .= " order by $orderby desc limit 1";
    //     $res = $this->query($query, $data);

    //     if (is_array($res)) {
    //         if (in_array($res[0]->role, $this->staffs)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }


    public function sendemail($data)
    {

        require_once "../public/assets/phpmailer/src/Exception.php";
        require_once '../public/assets/phpmailer/src/PHPMailer.php';
        require_once '../public/assets/phpmailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'add interlearn email';
        $mail->Password = 'add your password';
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->From = 'interlearnsl@gmail.com';
        $mail->FromName = 'Interlearn';
        $mail->AddAddress($data['email']);
        $mail->IsHTML(true);
        $mail->Subject = 'Verification code';
        $message_body = '<p> To verify your email address enter this <b>' . $data['user_otp'] . '</b>.</p>
                            <p> Sincerely, </p>
                            <p> Interlearn </p>';
        $mail->Body = $message_body;
        if ($mail->Send()) {
            $query_string = '?code=' . $data['user_activation_code'];
            $current_url = 'http://localhost/Interlearn/public/verify' . $query_string;
            header('Location: ' . $current_url);

            return 1;
        } else {
            return 0;
        }
    }
    // public function update($data){

    //     $keys = array_keys($data);
    //     //this will pop the last key and assign it to a variable
    //     $last= array_pop($keys);

    //     $query ="update ".$this->table." set ";
    //     foreach($keys as $key){
    //         $query .= $key. " =:".$key." , ";
    //     }
    //     $query = trim($query,", ")." where ";
    //     $query .= $last." =:".$last;


    //     $res = $this ->update_table($query,$data);

    //     if($res){
    //         return $res;
    //     }
    //     return false;
    // }

    public function update($cred = [], $data = [])
    {

        //remove unwanted columns
        if (!empty($this->allowed_columns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowed_columns)) {

                    unset($data[$key]);
                }
            }
        }

        $id = array_keys($cred);
        $keys = array_keys($data);
        $query = "update " . $this->table . " set ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where " . $id[0] . " =:" . $id[0];

        $data[$id[0]] = array_values($cred)[0];

        $result = $this->update_table($query, $data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data)
    {

        $keys = array_keys($data);

        $query = "delete from " . $this->table . " where ";
        foreach ($keys as $key) {
            $query .= $key . " =:" . $key . " , ";
        }
        $query = trim($query, " , ");
        // echo ($query);die;
        $res = $this->query($query, $data);

        if ($res) {
            return true;
        }
        return false;
    }
}
