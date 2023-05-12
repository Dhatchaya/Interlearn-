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
        $query = "SELECT * FROM bank_payment where status IN( '1','2')";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
    }

    public function removefromBankPayment ($bankPaymentID){

        $query = "UPDATE bank_payment SET status = '0' WHERE BankPaymentID = '$bankPaymentID'";
        $this->query($query);



    }

    public function declined($bankPaymentID){

        $query = "UPDATE bank_payment SET status = '2' WHERE BankPaymentID = '$bankPaymentID'";


        $this->query($query);
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
