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
        $query = "SELECT * FROM bank_payment where status = '1'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function getEachBPdata($BP_ID)
{
    $query = "SELECT * FROM bank_payment where  BankPaymentID  = '$BP_ID'";
    $data = $this->query($query);

    if ($data == NULL) {
        $data = array();
    }

    return $data;
}

}
