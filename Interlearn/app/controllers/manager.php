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

    public function staff()
    {
        //if not logged in as manager redirect to home 
        if (!Auth::is_manager()) {
            redirect('home');
        }

        $data['title'] = "manager";
        $this->view('manager/view_staff', $data);
    }

    public function add_staff()
    {
        //if not logged in as manager redirect to home 
        if (!Auth::is_manager()) {
            redirect('home');
        }

        $data['title'] = "manager";
        $this->view('manager/view_staff', $data);
    }

    public function signup_form()
    {
        //if not logged in as manager redirect to home 
        if (!Auth::is_manager()) {
            redirect('home');
        }

        $data['title'] = "manager";
        $this->view('manager/staff_signup_form', $data);
    }


    public function profile($id = null)
    {
        if (!Auth::is_manager()) {
            redirect('home');
        }

        $this->view('manager/home');
        //check whether ID exists if not 
        //it'll get the Id of the logged in user
        $id = $id ?? Auth::getemp_id();
        $staff = new Staff();
        //for it to go to view we have to put it inside data
        $data['row'] = $staff->first(['emp_id' => $id], 'emp_id');
        $data['title'] = "Profile";
        $this->view('manager/profile', $data);
    }






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
                    header("Location:http://localhost/Interlearn/public/manager/enquiry");
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

        $data['rows']  = $enquiry->where(['user_Id' => $user_id], $orderby);

        $this->view('manager/enquiry', $data);
    }
}
