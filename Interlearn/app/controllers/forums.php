<?php
/**
 *forum class
 *removing the trigger for discussion since it creates a duplicate of the forum
 */
class Forums extends Controller
{
    public function index($courseID=null)
    { 
        if($courseID==null){
            $data['title'] = "404";
            $this->view('404',$data);
            exit;
        }
        if(!Auth::logged_in()){
            redirect('home');
           
        }

        $data=[];
        $forum= new Forum();
        $user=Auth::getusername();
        $userid = Auth::getuid();
        $role = Auth::getrole();
        $data['role'] = $role;
        if($role !== "Teacher" && $role !== "Instructor"){
            $data['rows'] =$forum->where(['course_id'=>$courseID],"forum_id");
            $this->view('forums',$data);
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
         
            $_POST['date']= date("Y-m-d H:i:s");
            $_POST['course_id']= '1';
            $_POST['creator']= $user;
            $_POST['uid']= $userid;
        
            if(isset($_FILES['attachment']['name']) AND !empty($_FILES['attachment']['name'])){
                $attachment_tmp = $_FILES['attachment']["tmp_name"];
                $attachment_name = $_FILES['attachment']["name"];
                $error= $_FILES['attachment']['error'];
           
                if($error === 0){
                    $img_ext = pathinfo($attachment_name,PATHINFO_EXTENSION);
                    $img_final_ext = strtolower($img_ext);
            
                    $allowed_ext = array('jpg','png','jpeg','doc','pdf','xls','html','css','js');
                    if(in_array($img_final_ext,$allowed_ext)){
                        $new_image_name = uniqid($_POST['creator'],true).'.'.$img_final_ext;
                     
                        $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/forum_files";
                        if (!is_dir($directory)){
                            mkdir($directory,0644, true);

                        }
                        $destination =  $directory."/".$new_image_name;
                      // echo $destination;die;
                        move_uploaded_file($attachment_tmp,$destination);
                        $_POST['attachment'] = $new_image_name ;
                    }
                    else{
                        $data['errors']['attachment']='you cannot upload this type of file';
                    }
                }
                else{
                    $data['errors']['attachment'] ="unknown error occured";
                    }
                   
            }
            $result= $forum->insert($_POST);
        }
        //display all forums of that course
        $data['rows'] =$forum->where(['course_id'=>$courseID],"forum_id");
  
        
        $this->view('forums',$data);
    }

    //each discussion 
    public function discussion($disID=null,$action=null)

    { 
   
        if(!Auth::logged_in()){
            redirect('home');
           
        }
      

      
        $data=[];
        $forum= new Forum();
        $discuss = new Discuss();
        //get details of the perticular discussion 
        $data['forum']=$discuss = $forum->joinforumfirst([
            'forum_id'=>$disID
        ],'forum_id');
      
        //when a reply is posted
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $discussid = uniqid();
            $content = $_POST['content'];
            $parent_id = $_POST['parent_id'];
            $_POST['topic']= $discuss -> topic;
            $_POST['discussion_id']= $discussid;
            $_POST['uid']= Auth::getuid();
                      
            if(isset($_FILES['attachment']['name']) AND !empty($_FILES['attachment']['name'])){
                $attachment_tmp = $_FILES['attachment']["tmp_name"];
                $attachment_name = $_FILES['attachment']["name"];
                $error= $_FILES['attachment']['error'];
           
                if($error === 0){
                    $img_ext = pathinfo($attachment_name,PATHINFO_EXTENSION);
                    $img_final_ext = strtolower($img_ext);
            
                    $allowed_ext = array('jpg','png','jpeg','doc','pdf','xls','html','css','js');
                    if(in_array($img_final_ext,$allowed_ext)){
                        $new_image_name = uniqid().'.'.$img_final_ext;
                        $destination = "uploads/forum_files/". $new_image_name;
                      // echo $destination;die;
                        move_uploaded_file($attachment_tmp,$destination);
                        $_POST['attachment'] = $new_image_name ;
                    }
                    else{
                        $data['errors']['attachment']='you cannot upload this type of file';
                    }
                }
                else{
                    $data['errors']['attachment'] ="unknown error occured";
                    }
                    
            }

            $discuss = new Discuss();
            
            $result = $discuss->insert($_POST);

            if($result){
                //join username and image with discuss table content and send it to json
                $thread = $data['discuss']=$discuss->joinDiscussfirst(['discussion_id'=>$discussid],'discussion_id');
                
                echo json_encode($thread);
            }
            
            exit;
        }

        if($action == 'all'){
            $discuss = new Discuss();
            //display the whole thread
            $all = $data['discuss']=$discuss->joinDiscuss([],'PostedDate','asc');
            echo json_encode($all);
            exit;
        }
        
        $this->view('discussion',$data);
    }





    public function profile($id = null)
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }

        $id = $id ?? Auth::getID();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        
        $this->view('instructor/profile');
    }
}