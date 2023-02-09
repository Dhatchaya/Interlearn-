<?php
/**
 *Receptionist  class
 */
class Receptionist extends Controller
{
    public function index()
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        $this->view('receptionist/home');
    }
    
    public function course()
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        $this->view('receptionist/course');
    }

    public function class()
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        $this->view('receptionist/class');
    }

    public function details()
    { 
        if(!Auth::is_receptionist()){
            redirect('home');
           
        }
        
        $this->view('receptionist/details');
    }
}
