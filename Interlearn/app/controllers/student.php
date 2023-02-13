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

    public function payment($id = null)
    {
        if (!Auth::is_student()) {
            redirect('home');
        }
        $id = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid' => $id], 'uid');

        $this->view('student/payment');
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
