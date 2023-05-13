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
        'month',
        'SlipImage',
        'PaymentDate',
        'monthlyFee',
        'Bank',
        'Branch',
        'ChequeNo',
        'BankPaymentID',
        'status',
        'StudentId',
        'PaymentID',
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

    public function submitBP($data)
    {

        $this->insert($data);


    }

    public function removefromBankPayment ($bankPaymentID){

        $query = "UPDATE bank_payment SET status = '0' WHERE BankPaymentID = '$bankPaymentID'";
        $this->query($query);



    }

    public function declined($bankPaymentID){

        $query = "UPDATE bank_payment SET status = '2' WHERE BankPaymentID = '$bankPaymentID'";


        $res = $this->query($query);

        if ($res !== NULL) {
            return "success";
            exit;
        }
        else{
            $res = 'failed';
            exit;
        }
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
