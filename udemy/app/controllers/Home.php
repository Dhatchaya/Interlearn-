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
       //show($res);
       
       $data['title'] = "Home";
       $this->view('home',$data);
    }
    public function edit()
    {
        echo "edit page";
    }
    public function delete($id1)
    {
        echo "delete page".$id1;
    }
}