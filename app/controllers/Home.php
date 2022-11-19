<?php
//home class
class Home extends Controller{
    public function index()
    {
        $db = new Database();
        // $db->create_tables();
        $data['title'] = "Home";
        $this->view('home',$data);
    }
}

?>