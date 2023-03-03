<?php
/**
 *Student class
 */
class Student extends Controller
{
    public function index()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/home');
    }
    public function profile($id = null)
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        $id = $id ?? Auth::getUID();
        $user = new User();
        $data['row'] = $user->first(['uid'=>$id],'uid');
        
        $this->view('student/profile');
    }


    public function course()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/course');
    }
    public function progress($action=null)
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        if($action=='performance'){
            $this->view('student/performance');
            exit();
        }
        
        $this->view('student/progress');
    }
    public function overall()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }
        
        $this->view('student/crsoverall');
    }

    public function coursepg($action = null , $id = null)
    { 
        if(!Auth::is_student()){
            redirect('home');   
        }

        //submission status page
        if($action == "submissionstatus"){
            $data = [];
            $courseid= $id;
            $data['submission']=[];
            $data['assignment']=[];
            if(isset($_GET['id'])){
                $sub_id = $_GET['id'];
            }
            else{
                $data['title'] = "404";
                $this->view('404',$data);
                exit;
            }
            $assignment = new Assignment;
            $submission = new Submission;
            $course = new Course;

            $result = $assignment->joinCourseAssignment(['assignmentId'=>$sub_id,'course_id'=>$id],'assignmentId');
            $data['assignment']= $result;
            $getstatus = $submission -> first(['assignmentId'=>$sub_id],'assignmentId');
         // show($result);die;
            if($getstatus){
                $data['assignment']->status = $getstatus->status;
                $data['assignment']->modified = $getstatus->modified;
                
            }
            else{
                
                $data['assignment']->status = "No attempt";
                $data['assignment']->modified = "-";
            }
            //find remaining time for the submission
            $now = new DateTime();
            $deadline =new DateTime($result->deadline);
            $remainingtime= $now->diff($deadline);
            $remaining = $remainingtime->format('%a days %h hours %i minutes');
            $data['assignment']->remaining = $remaining;
           // show($data);die;
            $this->view('student/submissionstatus',$data);
        }



        //file upload page
        if($action == "submission"){
           
            if(isset($_GET['id'])){
                $assignment_id = $_GET['id'];
            }
            else{
                $data['title'] = "404";
                $this->view('404',$data);
                exit;
            }
            $user = Auth::getUsername();
            $userid = Auth::getUID();
            $student = new Students();
            $studentdetails = $student -> first(['uid'=>$userid],'studentID');
       
            $student_id = $studentdetails -> studentID;
            $data['errors'] = [];
            $submissionFiles = new SubmissionFiles();
            $submission = new Submission();


              if($_SERVER["REQUEST_METHOD"]=="POST"){
                $_POST['submissionId']=$submissionid=uniqid($user,true);
                if($submissionFiles -> validate($_FILES)){
                    if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){
                      
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['submission']['name']); $i++) {
                            $submission_tmp = $_FILES['submission']["tmp_name"][$i];
                            $submission_name = $_FILES['submission']["name"][$i];
                            $error= $_FILES['submission']['error'][$i];
                    
                            if($error === 0){
                                $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);
                        
                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                
                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/submissions/".$assignment_id;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;
                                    move_uploaded_file($submission_tmp,$destination);
                                
                                 
                                    
                                   
                                 
                                   
                                    $new_fileID=uniqid();
                                    $filenames[]=['filename'=> $new_file_name,'fileID'=> $new_fileID];

                                    
                                    
                                }
                                else{
                                    $data['errors']['submission']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['submission'] ="Unknown error occured";
                                break;
                            
                                }
                           
                        }
                   
                    }
                }
                else{        
                    $data['errors'] =  $submissionFiles->error;
                }
                if(empty($data['errors'])){
                    $_POST['studentID']=$student_id;
                    $_POST['assignmentId']= $assignment_id;
                    $_POST['status'] = "Submitted";
                    $result2 = $submission->insert($_POST);
                    
                    foreach($filenames as $file){
                        
                       
                        $_POST['filename'] = $file['filename'] ;
                        $_POST['fileID'] = $file['fileID'];
                        $_POST['submissionId']=$submissionid;
               
                        $result = $submissionFiles->insert($_POST);
               
                    
                }
                    echo('success');
                }
                else{
                    echo json_encode($data['errors']);
                }
    
                exit();
              }
            
            $this->view('student/submission',$data);
            exit;
        }

        if($action == "view"){
            $this->view('student/coursepg');
        }
        $data['title'] = "404";
        $this->view('404',$data);
    }

    // public function submission()
    // { 
    //     if(!Auth::is_student()){
    //         redirect('home');
    //         exit;
           
    //     }
    //     if(isset($_GET['id'])){
    //         $submission_id = $_GET['id'];
    //     }
    //     else{
    //         $data['title'] = "404";
    //         $this->view('404',$data);
    //         exit;
    //     }
    //     $user = Auth::getUsername();
    //     $data['errors'] = [];
    //     $submissionFiles = new SubmissionFiles();
        
  
    //       if($_SERVER["REQUEST_METHOD"]=="POST"){
    //         if($submissionFiles -> validate($_FILES)){
    //             if(isset($_FILES['submission']['name']) AND !empty($_FILES['submission']['name'])){
    //                 //checks every file inside the $_FILES array of files
    //                 for($i=0; $i<count($_FILES['submission']['name']); $i++) {
    //                     $submission_tmp = $_FILES['submission']["tmp_name"][$i];
    //                     $submission_name = $_FILES['submission']["name"][$i];
    //                     $error= $_FILES['submission']['error'][$i];
                
    //                     if($error === 0){
    //                         $file_ext = pathinfo($submission_name,PATHINFO_EXTENSION);
    //                         $file_final_ext = strtolower($file_ext);
                    
    //                         $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
    //                         if(in_array($file_final_ext,$allowed_ext)){
    //                             $new_file_name = uniqid($user,true).'.'.$file_final_ext;
    //                             $destination = "../uploads/submissions/". $new_file_name;
    //                             move_uploaded_file($submission_tmp,$destination);
    //                             $_POST['filename'] = $new_file_name ;
    //                             $_POST['fileID']=uniqid($user,true);
    //                             $_POST['submissionId']=$submission_id;
    //                             $result = $submissionFiles->insert($_POST);
    //                         }
    //                         else{
    //                             $data['errors']['submission']='Unsupported file type : '.$file_final_ext;
    //                             break;
    //                         }
    //                     }
    //                     else{
    //                         $data['errors']['submission'] ="Unknown error occured";
    //                         break;
                        
    //                         }
                       
    //                 }
               
    //             }
    //         }
    //         else{        
    //             $data['errors'] =  $submissionFiles->error;
    //         }
    //         if(empty($data['errors'])){
             
    //             echo('success');
    //         }
    //         else{
    //             echo json_encode($data['errors']);
    //         }

    //         exit();
    //       }
        
    //     $this->view('student/submission',$data);
    // }

    public function submissionstatus()
    { 
        if(!Auth::is_student()){
            redirect('home');
           
        }

        
        $this->view('student/submissionstatus');
    }

}