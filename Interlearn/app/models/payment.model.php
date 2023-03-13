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
    public function getAll()
    {
        $query = "SELECT * FROM payment WHERE payment_status = 1";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }
    public function eachStudentPaymentHistory()
    {
        $query = "SELECT * FROM payment where  studentID = '185'  AND payment_status = '1'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function pendingPayments()
    {
        // where  studentID = '185'
        $query = "SELECT * FROM payment where  studentID = '185' AND payment_status = '0'";
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

class BankPayment extends Model
{
    //says what table it has to target
    public $error = [];

    protected $table = "bank_payment";
    protected $allowed_columns = [
        'NameOnSlip',
        'Address',
        'CourseID',
        'PayerNIC',
        'SlipImage',
        'PaymentDate',
        'Amount',
        'Bank',
        'Branch',
        'ChequeNo',
        'BankPaymentID',
        'status',
    ];

    public function validateBankPayment()
    {
        $query = "SELECT * FROM bank_payment ";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }
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
