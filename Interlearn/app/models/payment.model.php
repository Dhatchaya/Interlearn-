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


    // $uid



    public function eachStudentPaymentHistory($uid)
    {   
        $get_uid = $uid;
        $query_get_StudentID = "SELECT studentID from student WHERE uid =$get_uid";
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


        $query = "SELECT * FROM payment where  studentID = '$currentSID'  AND payment_status = '0'";
        $data = $this->query($query);

        if ($data == NULL) {
            $data = array();
        }

        return $data;
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


    
    public function checkStudent($courseId, $studentId) {
        $studentID = $studentId;
    
        $query = "SELECT * FROM student_course WHERE student_id = " . $studentID . " AND course_id = " . $courseId;
        $res = $this->query($query);
        
        
        if (empty($res)) {
            $res[0] = new stdClass();
            $res[0]->course_id = "noCourse";
        }
        return $res;
    }

    public function checkPaidOrNot($studentId, $courseId, $month) {
        $query = "SELECT count(*) FROM payment WHERE studentID = $studentId AND courseID = $courseId AND paymentMonth = '$month'";
        $res = $this->query($query);
        if( $res[0]->{'count(*)'} > 0) {
            $res[0]->course_id = "AlreadyPaid";
        }
        return true;
    }
    

        public function getMonthlyFee($courseId){
        $courseID = $courseId; 
        $query = "SELECT monthlyFee FROM course where course_id = " . $courseID ;
        $res = $this -> query($query);

        if ($res == NULL) {
            $res = array();
        }
        
        return $res;
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

// 