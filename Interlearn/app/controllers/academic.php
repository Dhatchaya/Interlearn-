<?php
/**
 *academic class
 *common for student teacher and instructor
 */
class Academic extends Controller
{
    public function index()
    {   
       $db = new Database();
       $res= $db ->query("select *  from users");      
       $data['title'] = "Home";
       $data['role'] = "";
       $this->view('home',$data);
    }

    public function enquiry($action=null, $eid=null)
    {   $result = false;
        if(!Auth::logged_in())
		{
			
            redirect('home');
		}
  

        if(!Auth::is_student()&&!Auth::is_teacher()&&!Auth::is_instructor()){
            redirect('home');
           exit;
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
        $data['reply'] = "set";

        if($action == "add"){
            $data['action']= "add";
            $title = new stdClass();
            $title->enquiry_title= 'Add enquiry';
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($title);
          


            exit;
        }
        if($action=="posting"){
            header('Content-Type: application/json; charset=utf-8');
            if($_SERVER['REQUEST_METHOD'] == "POST"){

                    if($enquiry->validate($_POST)){


                           $_POST['user_Id']= $user_id;
                           $_POST['date']= date("Y-m-d H:i:s");
                           $_POST['status']="pending";
                           $_POST['role']=$role;
                           $result= $enquiry->insert($_POST);


                       if($result){
                           $response = array("status"=>"success");
                           echo json_encode( $response);
                           exit;
                           // header("Location:http://localhost/Interlearn/public/academic/enquiry");
                       }
                
                    }
                   else{

                       $data['errors']=$enquiry->error;
                       echo json_encode($data['errors']);
                       exit;

                   }
            exit;

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
            header("Location:http://localhost/Interlearn/public/academic/enquiry");
        }
        if($action == "view"){
            $reply = new Reply();
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // if(isset($_GET['rid'])){
                //     $reParent = $_GET['rid'];
                // }
                if(empty($_POST['content'])){
                    $data['empty']="Please type your reply before submitting";
                }
                else{
                $_POST['eid']=$eid;
             
                $_POST['senderId']=$user_id;
                //receiver unnecessary consider deleting that
                $_POST['receiverId']= $enq->user_Id;
                $_POST['reply_user']=$role;
                
           
                $result= $reply->insert($_POST);
                }
                // if($result){
                //     if($enq->status == 'pending'){
                //        $updateStatus= $enquiry->update(['eid'=>$eid],['status'=>'In progress']);
                //     }
                //    $replied = $reply -> update(['repId'=>$reParent],['status'=>'replied']);
                // }
                // else{
                //     echo"fail";
                // }

            }
            $data['reply'] = $reply -> where(['eid'=>$eid],'eid');
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            $data['enq']=$enq;
         
            $this->view('academic/enquiry_view',$data);
            exit;
           
        }
     
        $data['rows']  = $enquiry->where(['user_Id'=>$user_id], $orderby);
            
        $this->view('academic/enquiry',$data);
    }

}