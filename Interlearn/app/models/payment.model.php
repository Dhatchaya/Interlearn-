<?php

class Payment extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "payment";
    protected $allowed_columns = [
        'studentID',
        'studentName',
        'month',
        'amount',
        'courseID',
        'method',
        'status',
        'date',
        'payment_status',
        'PaymentID '

    ];
    public function addNewPendingPayments(){
        $query = "INSERT INTO payment (studentID, courseID, month )SELECT studentID, courseID, 0 FROM student_course;";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function getAll()
    {
        $query = "SELECT * FROM payment WHERE payment_status = 1";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function updateCardPayment($paymentID,$method){

        $query = "UPDATE payment SET method = '$method', payment_status = '1' WHERE PaymentID  = '$paymentID'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array("failed");
        }

        return $data;
    }

    public function approveBP($PaymentID)
    {

        $query = "UPDATE payment 
                    SET 
                        method = 'bank deposit',
                        payment_status = 1
                    WHERE 
                    PaymentID = $PaymentID";

        $res = $this->query($query);

        if ($res !== NULL) {
            return "success";
        }
        return $res;
    }

    public function declinedBP($PaymentID)
    {

        $query = "UPDATE payment 
                    SET 
                        method = 'bank deposit',
                        payment_status = 3
                    WHERE 
                    PaymentID = $PaymentID";

        $res = $this->query($query);

        if ($res !== NULL) {
            return "success";
        }

        return $res;
    }


    public function pendingReview($paymentID)
    {
        show($paymentID);
        $query = "UPDATE payment SET payment_status = 2 WHERE PaymentID  = '$paymentID'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function submitCashPayment($data)
    {
        
        $query = "INSERT INTO payment (studentID, month, amount, method, courseID, payment_status, studentName) VALUES (".$data['studentID'].", 
        '".$data['month']."', 
        ".$data['amount'].", 
        '".$data['method']."', 
        ".$data['courseID'].", 
        ".$data['payment_status'].", 
        '".$data['studentName']."' )";

        $result = $this->query($query);
     
           
        return $result;
    }



    public function eachStudentPaymentHistory($uid)
    {
        $get_uid = $uid;
        $query_get_StudentID = "SELECT studentID from student WHERE uid ='$get_uid'";
        $student_ID = $this->query($query_get_StudentID);

        if (!isset($student_ID['studentID'])) {
        }

        $currentSID = $student_ID[0]->studentID;
        $query = "SELECT * FROM payment where  studentID = '$currentSID'  AND payment_status = '1'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function eachStudentPendingPayment($uid)
    {
        $get_uid = $uid;
        $query_get_StudentID = "SELECT studentID from student WHERE uid ='$get_uid'";
        $student_ID = $this->query($query_get_StudentID);

        
        if (!isset($student_ID['studentID'])) {
        }

        $currentSID = $student_ID[0]->studentID;


        $query = "SELECT * FROM payment WHERE studentID = '$currentSID' AND payment_status IN ('0', '2', '3')";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }


    public function checkAlreadyPaid($courseId, $studentID, $month){
        $query = "SELECT COUNT(*) as count FROM payment WHERE courseID = '$courseId' AND studentID = '$studentID' AND payment.month  = '$month' AND payment_status IN ('1', '2')";
        $data = $this->query($query);

        $data = json_decode(json_encode($data), true);

        if ($data[0]['count'] > 0) {
            return array(array('course_id' => 'alreadyPaid'));
        } else {
            return array(array('course_id' => 'notPaid'));
        }
    }



    public function pendingPayments()
    {
        // where  studentID = '185'

        $query = "SELECT * FROM payment WHERE  payment_status = '0'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }
    /////////////////////
    //     public function addNewPendingPayments()
    //     {
    //         // set the current date
    //     $currentDate = date('Y-m-d');

    //     // check if it is the first of the month
    //         if (date('d', strtotime($currentDate)) == 1) {
    //         // retrieve the data from the Course table
    //         $sql = "SELECT * FROM Course";
    //         $result = $this->query($sql);

    //         // insert the data into the pending-payment table
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $sql2 = "INSERT INTO pending-payment (course_name, course_fee) VALUES ('".$row['course_name']."', '".$row['course_fee']."')";
    //             $this->query($sql2);
    //              }
    //         }
    // ////////////////////
    //     }
}


class GetStudentName extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "student";
    protected $allowed_columns = [
        'studentID',
        'first_name',
        'last_name',
    ];
}
