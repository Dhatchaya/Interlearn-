<?php
/**
 *home class
 */
class Courses extends Controller
{
    public function index()
    {   
        $subject = new Subject();
        $data['sums']= $subject -> distinctSubject([],'subject');
        //show($data['sums']);die;
       $this->view('courses',$data);
    }

    

    // public function edit()
    // {
    //     echo "edit page";
    //     $this->view('edit',$data);
    // }

    // public function delete($id1)
    // {
    //     echo "delete page".$id1;
    // }

    // public function courses()
    // {
    //     // echo "edit page";
    //     $this->view('courses');
    // }
}