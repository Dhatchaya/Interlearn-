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
}