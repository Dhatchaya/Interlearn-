<?php
/**
 *forum class
 */
class Forums extends Controller
{
    public function index($courseID=null)
    { 
        $data=[];
        if(!Auth::logged_in()){
            redirect('home');
           
        }
        $forum= new Forum();
        $user=Auth::getusername();
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
         
            $_POST['date']= date("Y-m-d H:i:s");
            $_POST['course_id']= '1';
            $_POST['creator']= $user;
  
            // $user = new User();
            // $data['row'] = $user->first(['forum_id'=>'1'],"forum_id");
            $result= $forum->insert($_POST);
           
        }
        $data['rows'] =$forum->where(['course_id'=>$courseID],"forum_id");
  
        
        $this->view('forums',$data);
    }
    public function discussion($disID=null)
    { 
        $data=[];
        if(!Auth::logged_in()){
            redirect('home');
           
        }
        $forum= new Forum();
        $data['discuss']=$discuss = $forum->first([
            'forum_id'=>$disID
        ],'forum_id');
        
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