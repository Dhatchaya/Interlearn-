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

    public function approveBP($data)
    {
        

        $query = "UPDATE payment 
                    SET 
                        amount = '".$data['BPAmount']."',
                        method = '".$data['method']."',
                        payment_status = '1',
                        studentName = '".$data['NameOnSlip']."'
                    WHERE 
                        studentID = '".$data['StudentID']."' AND 
                        courseID = '".$data['CourseID']."'
                        AND month = '".$data['month']."'";
                        // 
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        $apple = "Apple";

        return $apple;
    }

    public function submitCashPayment($data)
    {
        $query = "INSERT INTO payment (studentID, paymentMonth, amount, method, courseID, payment_status, studentName) 
                  VALUES ('".$data['studentID']."', '".$data['month']."', '".$data['Amount']."', '".$data['method']."', '".$data['courseID']."', '".$data['payment_status']."', '".$data['studentName']."')";
        $result = $this->query($query);
    
        return $result;
    }
    


public function eachStudentPaymentHistory($uid)
{   
    // Check if $uid is an integer

    $query_get_StudentID = "SELECT studentID from student WHERE uid ='$uid'";
    $student_ID = $this->query($query_get_StudentID);


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
        
    // Check if $uid is an integer
    if (!ctype_digit($uid)) {
        return array(array('studentID' => 'Invalid user ID'));
    }

    
    $query_get_StudentID = "SELECT studentID from student WHERE uid =$uid";
    $student_ID = $this->query($query_get_StudentID);

    if (!isset($student_ID['studentID'])) {
        return array(array('studentID' => 'StudentID not found'));
    }

        $currentSID = $student_ID[0]->studentID;
        $query = "SELECT * FROM payment where  studentID = '$currentSID'  AND payment_status = '0'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }


    public function checkAlreadyPaid($courseId, $studentID, $month){
        $query = "SELECT COUNT(*) as count FROM payment WHERE courseID = '$courseId' AND studentID = '$studentID' AND paymentMonth  = '$month' AND payment_status = '1'";
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

// class BankPayment extends Model
// {
//     //says what table it has to target
//     public $error = [];

//     protected $table = "bank_payment";
//     protected $allowed_columns = [
//         'NameOnSlip',
//         'Address',
//         'CourseID',
//         'PayerNIC',
//         'SlipImage',
//         'PaymentDate',
//         'Amount',
//         'Bank',
//         'Branch',
//         'ChequeNo',
//         'BankPaymentID',
//         'status',
//     ];

//     public function validateBankPayment()
//     {
//         $query = "SELECT * FROM bank_payment ";
//         $data = $this->query($query);

//         if ($data == NULL) {
//             $data = array();
//         }

//         return $data;
//     }
// }
// class GetStudentName extends Model
// {
//     //says what table it has to target
//     public $error = [];
//     protected $table = "student";
//     protected $allowed_columns = [
//         'studentID',
//         'first_name',
//         'last_name',
//     ];
// }
