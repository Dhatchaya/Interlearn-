<?php
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
        'StudentID'
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
