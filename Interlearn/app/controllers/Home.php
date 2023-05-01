<?php
/**
 *home class
 */
class Home extends Controller
{
    public function index()
    {   
       $db = new Database();
       $res= $db ->query("select *  from users");      
       $data['title'] = "Home";
       $data['role'] = "";
       $this->view('home',$data);
    }
    public function chart($action)
    {
        if($action=="line"){
            $user = new User();
            $data= $user->getYearandMonth();
            echo json_encode($data);
            exit;
        }
        if($action=="pie"){
            $user = new Staff();
            $data= $user->getStaffCount();
            echo json_encode($data);
            exit;
        }
        if($action=="bar"){
            $subject = new Subject();
            $data= $subject->getSubjectCount();
            echo json_encode($data);
            exit;
        }

    }
    public function edit()
    {
        echo "edit page";
        $this->view('edit',$data);
    }

    public function delete($id1)
    {
        echo "delete page".$id1;
    }

    // public function courses()
    // {
    //     // echo "edit page";
    //     $this->view('courses');
    // }
}