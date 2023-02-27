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
        'Ammount',
        'Bank',
        'Branch',
        'ChequeNo',
        'BankPaymentID',
        'status',
    ];
}