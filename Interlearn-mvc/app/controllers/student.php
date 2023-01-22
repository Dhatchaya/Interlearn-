<?php
/**
 *Student class
 */
class Student extends Controller
{
    public function index()
    { 
        $this->view('student/home');
    }
}