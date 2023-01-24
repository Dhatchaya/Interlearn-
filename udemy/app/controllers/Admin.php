<?php /**
*admin class
*/
class Admin extends Controller{

    public function index()
    {   
        $data['title'] = "Admin";
        $this->view('admin/dashboard',$data);
    }
    public function profile($id = null)
    {   
        //check whether ID exists if not it'll get the Id of the logged in user
        $id = $id?? Auth::getId();
        $user = new User();
        //for it to go to view we have to put it inside data
        $data['row'] = $user -> first(['id' => $id]);
        $data['title'] = "Profile";
        $this->view('admin/profile',$data);
    }
}