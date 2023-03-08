<?php

/**
 *Student class
 */
class Student extends Controller
{
    public function index()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/home');
    }
    public function profile($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $id = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid' => $id], 'uid');

        $this->view('student/profile');
    }


    public function cardPayment($action = NULL)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }


        include('../public/assets/stripe-php/init.php');
        require_once('../public/assets/stripe/secrets.php');

        \Stripe\Stripe::setApiKey('sk_test_51Mh80UBblwXUQTWeHjt87i6zjsTmnMncmiXZg86ImCp36ac4GMBcLa834MjwhZEMT2girGsJDIS7aK0EXfDzaBFi004sg2RIrQ');
        header('Content-Type: application/json');

        $url =  "http://localhost/Interlearn/public/student/";
        echo $url;
        $YOUR_DOMAIN = $url;

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'lkr',
                    'unit_amount' => 100000,
                    'product_data' => [
                        'name' => "INTERLEARN",
                        'images' => ["../assets/images/sidebar_icons/logo.png"],
                    ],
                ],
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                // 'price' => '{{PRICE_ID}}',
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            // if($action){
            //     this->view('student/sucecc');
            // }
            //     }
            'success_url' => $YOUR_DOMAIN . 'success',
            'cancel_url' => $YOUR_DOMAIN . 'cancel',
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }

    public function checkout()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/checkout');
    }

    public function success()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/success');
    }
    public function cancel()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $this->view('student/cancel');
    }

    public function payment($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $currentStudentID = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid' => $id], 'uid');


        
        $payment_model = new Payment();
        $payment_history = $payment_model->getAll();
        ////////////////////////////////

        $currentDate = date('Y-m-d');

    // check if it is the first of the month
        if (date('d', strtotime($currentDate)) == 1) {
        // retrieve the data from the Course table
        $sql = "SELECT * FROM Course";
        $result = $this->query($sql);
    
        // insert the data into the pending-payment table
        while ($row = mysqli_fetch_assoc($result)) {
            $sql2 = "INSERT INTO pending-payment (course_name, course_fee) VALUES ('".$row['course_name']."', '".$row['course_fee']."')";
            $this->query($sql2);
             }
        }

        /////////////////////////////////

        $pending_payment_model = new Payment();
        $haveToPay = $pending_payment_model->pendingPayments();

        $this->view('student/student-payment',['payment_history'=>$payment_history,'haveToPaySet'=>$haveToPay]);

    }

    public function test($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $currentStudentID = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid' => $id], 'uid');


        
        $payment_model = new Payment();
        $payment_history = $payment_model->getAll();

        $pending_payment_model = new Payment();
        $haveToPay = $pending_payment_model->pendingPayments();

        $this->view('student/test',['payment_history'=>$payment_history,'haveToPaySet'=>$haveToPay]);

        print_r ($haveToPay);
        var_dump ($payment_history);
    }


    public function getBankPayment()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }


        if (isset($_POST)) {
            $payment_model = new BankPayment();
            $payment_model->insert($_POST);
            $this->view("student/student-payment");
        }
        $this->view("student/student-payment");
    }




    public function enquiry($action = null, $eid = null)
    {
        $result = false;
        if (!Auth::logged_in()) {
            message('please login');
            redirect('login/student');
        }


        if (!Auth::is_student()) {
            redirect('home');
        }
        $user_id = Auth::getUid();
        $role = Auth::getrole();
        $enquiry = new Enquiry();
        $data = [];
        $data['action'] = $action;
        $data['id'] = $eid;
        $orderby = 'eid';
        $data['enquiry_title'] = 'New Enquiry';
        $data['some'] = " ";
        $data['reply'] = "set";
        if ($action == "add") {
            $data['action'] = "add";
            $title = new stdClass();
            $title->enquiry_title = 'Add enquiry';
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($title);


            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                if ($enquiry->validate($_POST)) {
                    $_POST['user_Id'] = $user_id;
                    $_POST['date'] = date("Y-m-d H:i:s");
                    $_POST['status'] = "pending";
                    $_POST['role'] = $role;
                    $result = $enquiry->insert($_POST);
                }
                if ($result) {
                    header("Location:http://localhost/Interlearn/public/Student/enquiry");
                }
            }

            exit;
        }

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
            header("Location:http://localhost/Interlearn/public/Student/enquiry");
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

            $this->view('student/enquiry_view', $data);
            exit;
        }

        $data['rows']  = $enquiry->where(['user_Id' => $user_id], $orderby);

        $this->view('student/enquiry', $data);
    }

    public function course()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/course');
    }
    public function progress($action = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        if ($action == 'performance') {
            $this->view('student/performance');
            exit();
        }

        $this->view('student/progress');
    }
    public function overall()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/crsoverall');
    }

    public function coursepg()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/coursepg');
    }

    public function submission()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/submission');
    }

    public function submissionstat()
    {
        if (!Auth::is_student()) {
            redirect('home');
        }

        $this->view('student/submissionstat');
    }
}
