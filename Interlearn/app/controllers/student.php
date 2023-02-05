<?php
/**
 *Student class
 */
class Student extends Controller
{
    public function index()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/home');
    }
    public function profile()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/profile');
    }
    public function enquiry($action=null, $eid=null)
    {   $result = false;
        if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}
        if(!Auth::is_student()){
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
        $data['some']=" ";

        if($action == "add"){
            $data['action']= "add";
            $title = new stdClass();
            $title->enquiry_title= 'Add enquiry';
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($title);
          
            
            if($_SERVER['REQUEST_METHOD'] == "POST")
			{
            
                if($enquiry->validate($_POST)){
                    $_POST['user_Id']= $user_id;
                    $_POST['date']= date("Y-m-d H:i:s");
                    $_POST['status']="pending";
                    $_POST['role']=$role;
                    $result= $enquiry->insert($_POST);
                
                }
                if($result){
                    header("Location:http://localhost/Interlearn/public/Student/enquiry");
                }
                
            }
         
            exit;
        }

        if($action == "edit"){
            $data['enquiry_title'] = 'Edit Enquiry '.$eid;
            $data['edit']=$edit=$enquiry->first([
                'eid'=>$eid
            ],'eid');
            $data['edit']->enquiry_title='Edit Enquiry ';
           
           
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    try {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if (!$data) {
                        $error = json_last_error_msg();
                        throw new Exception($error);
                    }else{
                        $result = $enquiry->update(['eid'=>$eid], $data);
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
            }
            else {
               
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($data['edit']);
                    exit;
                
            }
        }

        if($action == "delete"){
            $result = $enquiry->delete(['eid'=>$eid]);
            header("Location:http://localhost/Interlearn/public/Student/enquiry");
        }
        if($action == "view"){
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            $data['enq']=$enq;
            $this->view('student/enquiry_view',$data);
            exit;
           
        }
     
        $data['rows']  = $enquiry->where(['user_Id'=>$user_id], $orderby);
            
        $this->view('student/enquiry',$data);
    }
}