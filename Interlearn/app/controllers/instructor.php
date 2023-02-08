<?php
/**
 *instructor  class
 */
class Instructor extends Controller
{
    public function index()
    { 
        if(!Auth::is_instructor()){
            redirect('home');
           
        }
        
        $this->view('instructor/home');
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