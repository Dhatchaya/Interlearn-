<?php

/**
 *manager class
 */
class Manager extends Controller
{

    public function index()
    {
        //if not logged in as manager redirect to home 
        if (!Auth::is_manager()) {
            redirect('home');
        }
        $data['title'] = "manager";
        $this->view('manager/home', $data);
    }

    public function profile($id = null)
    {
        if (!Auth::is_manager()) {
            redirect('home');
        }
        //check whether ID exists if not 
        //it'll get the Id of the logged in user
        $id = $id ?? Auth::getId();
        $user = new User();
        //for it to go to view we have to put it inside data
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = "Profile";
        $this->view('manager/profile', $data);
    }

    public function staff($id = null)
    {
        if (!Auth::is_manager()) {
            redirect('home');
        }
        //check whether ID exists if not 
        //it'll get the Id of the logged in user
        // $id = $id ?? Auth::getId();
        // $user = new User();
        //for it to go to view we have to put it inside data
        // $data['row'] = $user->first(['id' => $id]);
        // $data['title'] = "Profile";
        $this->view('manager/view_staff');
    }

    public function addStaff()
    {
        if (!Auth::is_manager()) {
            redirect('home');
        }

        // show($_POST);
        if (isset($_POST)) {
            $data = json_decode(file_get_contents("php://input"), true);

            // $password_hash=   $data['password'];
            // $data['password'] = $password_hash;

            $addStaff = new Payment();
            $addStaff->insert($data);
        }
        echo json_encode($addStaff);
        exit;
    }


    // public function recrewStaff()
    // {   
    //     if (!Auth::is_manager()) {
    //         redirect('home');
    //     }


    //  if (isset($_POST)) {

    //     if (empty($_POST["firstaName"])) {
    //         die("First name is required");
    //     }

    //     if (empty($_POST["lastName"])) {
    //         die("Last name is required");
    //     }
    //     if (!((strlen($_POST["NIC"]) == 10) || (strlen($_POST["NIC"]) == 12))) {
    //         die("NIC number length is not correct");
    //     }

    //     if (  preg_match("/[a-z]/i", $_POST["mobileNum"])) {
    //         die("Mobile number must not contain letters");
    //     }

    //     if (empty($_POST["address"])) {
    //         die("Address is required");
    //     }
    //     if (empty($_POST["gender"])) {
    //         die("Gender is required");
    //     }
    //     $current_timestamp = strtotime(date('Y-m-d '));
    //     if (empty($_POST["ContractEnding"])) {

    //         die("Gender is required");
    //         if($current_timestamp<strtotime($_POST["ContractEnding"])){
    //             die("Contract ending date must be a future date");
    //         }
    //     }

    //     if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    //         die("Valid email is required");
    //     }

    //     if (strlen($_POST["password"]) < 8) {
    //         die("Password must be at least 8 characters");
    //     }

    //     if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    //         die("Password must contain at least one letter");
    //     }

    //     if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    //         die("Password must contain at least one number");
    //     }
    //     $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //     $_POST['password'] = $password_hash;

    //         $payment_model = new Staff();
    //         $payment_model->insert($_POST);
    //         $this->view("manager/view_staff");
    //     }
    //     $this->view("manager/view_staff");
    // }








    public function enquiry($action = null, $eid = null)
    {
        $result = false;
        if (!Auth::logged_in()) {
            message('please login');
            redirect('login/manager');
        }


        if (!Auth::is_manager()) {
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

        if ($action == "delete") {
            $result = $enquiry->delete(['eid' => $eid]);
            header("Location:http://localhost/Interlearn/public/manager/enquiry");
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

            $this->view('manager/enquiry_view', $data);
            exit;
        }

        $data['rows']  = $enquiry->where(['status' => "Escalated"], $orderby);

        $this->view('manager/enquiry', $data);
    }
}
