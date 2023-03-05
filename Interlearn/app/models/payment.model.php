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
    ];
    public function getAll()
    {
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }
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
        $query = "SELECT * FROM bank_payment";
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
