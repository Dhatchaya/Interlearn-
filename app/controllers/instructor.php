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
}