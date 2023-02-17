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

    public function edit()
    {
        echo "edit page";
        $this->view('edit',$data);
    }

    public function delete($id1)
    {
        echo "delete page".$id1;
    }
}