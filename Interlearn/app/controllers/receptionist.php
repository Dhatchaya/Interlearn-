<?php

/**
 *Receptionist  class
 */
class Receptionist extends Controller
{
    public function index()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view(
            'receptionist/home'
        );
    }

    public function course()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view('receptionist/course');
    }

    public function class()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view('receptionist/class');
    }



    public function user()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }


        $this->view('receptionist/user');
    }

    public function editUser()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view('receptionist/student');
    }



    public function payments()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $payment_model = new Payment();
        $payment_history = $payment_model->getAll();

        $callBPdata = new BankPayment();
        $BankPaymentData = $callBPdata->validateBankPayment();


        $this->view('receptionist/receptionist-payments',  ['bankPayments' => $BankPaymentData, 'transactions' => $payment_history]);
    }



    public function nextCashPayment()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        // show($_POST);
        if (isset($_POST)) {
            $data = json_decode(file_get_contents("php://input"), true);

            $data['method'] =   'cash';
            $data['payment_status'] = '1';

            $payment_model = new Payment();
            $payment_model->insert($data);
        }
        // echo json_encode($payment_model);
        exit;
    }



    public function getPaymentData()
    {
        $payment = new Payment();
        $data = $payment->getAll();
        return $data;
    }

    public function callBankPaymentData()
    {

        $callBPdata = new BankPayment();
        $BankPaymentData = $callBPdata->validateBankPayment();
        return $BankPaymentData;
    }



    public function details()
    {
        if (!Auth::is_receptionist()) {
            redirect('home');
        }

        $this->view('receptionist/details');
    }
    public function enquiry($action = null, $eid = null)
    {
        $result = false;
        if (!Auth::logged_in()) {
            message('please login');
            redirect('login/staff');
            exit;
        }
        if (!Auth::is_receptionist()) {
            redirect('home');
            exit;
        }
        $user_id = Auth::getemp_id();
        $role = Auth::getrole();
        $enquiry = new Enquiry();
        $data = [];
        $data['action'] = $action;
        $data['id'] = $eid;
        $orderby = 'eid';
        $data['enquiry_title'] = 'New Enquiry';
        $data['some'] = " ";
        $data['reply'] = "set";


        if ($action == "edit") {
            $data['enquiry_title'] = 'Edit Enquiry ' . $eid;
            $data['edit'] = $edit = $enquiry->first([
                'eid' => $eid
            ], 'eid');
            $data['edit']->enquiry_title = 'Edit Enquiry ';


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$data) {
                        $error = json_last_error_msg();
                        throw new Exception($error);
                    } else {
                        $result = $enquiry->update(['eid' => $eid], $data);
                        if (!$result) {
                            throw new Exception("Update failed");
                        }
                    }
                } catch (Exception $e) {
                    $response = array("status" => "error", "message" => $e->getMessage());
                    header("Content-Type: application/json");
                    echo json_encode($response);
                    exit;
                }
                $response = array("status" => "success");
                header("Content-Type: application/json");
                echo json_encode($response);
                exit;
            } else {

                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data['edit']);
                exit;
            }
        }

        if ($action == "delete") {
            $result = $enquiry->delete(['eid' => $eid]);
            header("Location:http://localhost/Interlearn/public/receptionist/enquiry");
        }
        if ($action == "view") {
            $reply = new Reply();
            $enq = $enquiry->first([
                'eid' => $eid
            ], 'eid');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_GET['rid'])) {
                    $reParent = $_GET['rid'];
                }
                $_POST['eid'] = $eid;
                $_POST['senderId'] = $user_id;
                $_POST['receiverId'] = $enq->user_Id;
                $_POST['reply_user'] = $role;


                $result = $reply->insert($_POST);

                if ($result) {
                    if ($enq->status == 'pending') {
                        $updateStatus = $enquiry->update(['eid' => $eid], ['status' => 'In progress']);
                    }
                    $replied = $reply->update(['repId' => $reParent], ['status' => 'replied']);
                } else {
                    echo "fail";
                }
            }
            $data['reply'] = $reply->where(['eid' => $eid], 'eid');
            $enq = $enquiry->first([
                'eid' => $eid
            ], 'eid');
            $data['enq'] = $enq;
            $this->view('receptionist/enquiry_view', $data);
            exit;
        }


        $data['rows']  = $enquiry->select(null, $orderby);

        $this->view('receptionist/enquiry', $data);
    }

    public function getStudentName()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $studentId = $data['StudentID'];

        $sql = "SELECT * FROM student WHERE studentID = '$studentId'";
        $model = new Model();
        $res = $model->query($sql);

        echo json_encode($res);
        exit;
    }
    public function getMonthlyFee()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $courseId = $data['CourseID'];

        $sql = "SELECT * FROM course WHERE course_id = '$courseId'";
        $model = new Model();
        $res = $model->query($sql);

        echo json_encode($res);
        exit;
    }
}
