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

        $id = $id ?? Auth::getemp_id();
        $user = new Staff();
        $data['row'] = $user->first(['emp_id'=>$id],'emp_id');
        
        $this->view('instructor/profile');
    }
}