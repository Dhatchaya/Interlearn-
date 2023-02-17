<?php /**
*manager class
*/
class Manager extends Controller{

    public function index()
    {   
        //if not logged in as manager redirect to home 
        if(!Auth::is_manager()){
            redirect('home');
           
        }
        $data['title'] = "manager";
        $this->view('manager/home',$data);
    }
    public function profile($id = null)
    {    if(!Auth::is_manager()){
            redirect('home');
           
        }
        //check whether ID exists if not 
        //it'll get the Id of the logged in user
        $id = $id?? Auth::getId();
        $user = new User();
        //for it to go to view we have to put it inside data
        $data['row'] = $user -> first(['id' => $id]);
        $data['title'] = "Profile";
        $this->view('manager/profile',$data);
    }
    public function enquiry($action=null, $eid=null)
    {   $result = false;
        if(!Auth::logged_in())
		{
			message('please login');
            redirect('login/manager');
		}
  

        if(!Auth::is_manager()){
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
        $data['reply'] = "set";
        
        if($action == "delete"){
            $result = $enquiry->delete(['eid'=>$eid]);
            header("Location:http://localhost/Interlearn/public/manager/enquiry");
        }
        if($action == "view"){
            $reply = new Reply();
            $enq = $enquiry->first([
                'eid'=>$eid
            ],'eid');
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
                $_POST['eid']=$eid;
                $_POST['senderId']=$user_id;
                $_POST['receiverId']= $enq->user_Id;
                $_POST['reply_user']=$role;
                
           
                $result= $reply->insert($_POST);
             
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
         
            $this->view('manager/enquiry_view',$data);
            exit;
           
        }
      
           // change the status value 
        if(isset($_GET['id'])&&isset($_GET['status'])){
          
            $id=$_GET['id'];
            $value = $_GET['status'];
           
            $status = $enquiry -> update(['eid'=>$id],['status'=>$value]);
           
        }
     
        $data['rows']  = $enquiry->where(['status'=>"escalated"], $orderby);
            
        $this->view('manager/enquiry',$data);
    }
    
}