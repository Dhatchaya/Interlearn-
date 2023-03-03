<?php
/**
 *teacher  class
 */
$total_question = 0;
class Teacher extends Controller
{
    public function index()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/home');
    }

    //each course will have a ID when clicked get that ID pass it as a parameter and 
    //access that course
    public function course($action=null,$id = null,$option = null,$extra=null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        $user = Auth::getUsername();
        if($action == "view")
        { 
            $this->view('teacher/course');
        }
        if($action == "assignment")
        { 
            $assignment = new Assignment();
            $assignmentfiles = new AssignmentFiles();
            $data=[];
            $data['errors']=[];
            $filenames = [];
           // echo $option;die;
            if($option == "view"){
               // echo "IM here";die;
            if($_SERVER["REQUEST_METHOD"]=="POST"){
               
                if($assignment -> validatefile($_FILES)&&$assignment -> validate($_POST)){
                    $_POST['courseId'] = intval($id);
                    $_POST['assignmentId'] =$assignmentid= uniqid($user,true);
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['assignment_file']['name']); $i++) {
                            $assignment_tmp = $_FILES['assignment_file']["tmp_name"][$i];
                            $assignment_name = $_FILES['assignment_file']["name"][$i];
                            $error= $_FILES['assignment_file']['error'][$i];
                    
                            if($error === 0){
                                $file_ext = pathinfo($assignment_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);
                        
                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignment_id;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;
                                   // echo($destination);die;
                                    move_uploaded_file($assignment_tmp,$destination);
                                    
                                    $new_fileID=uniqid();
                                    $filenames[]=['filename'=> $new_file_name,'fileID'=> $new_fileID];
                                  
                                    //$result2 = $assignmentfiles->insert($_POST);
                                }
                                else{
                                    $data['errors']['assignment_file']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['assignment_file'] ="Unknown error occured";
                                break;
                            
                                }
                            }
                         
                        }
                        $editURL = "http://localhost/Interlearn/public/teacher/course/assignment/".$id."/view?id=".$assignmentid;
                        $viewURL="http://localhost/Interlearn/public/teacher/course/submissions/".$id."?id=".$assignmentid;
                        $_POST['editURL']=$editURL;
                        $_POST['viewURL']=$viewURL;
                        $result = $assignment->insert($_POST);

                        foreach($filenames as $file){
                        
                                $_POST['assignmentId'] =$assignmentid;
                                $_POST['filename'] = $file['filename'] ;
                                $_POST['fileID'] = $file['fileID'];
                       
                                $result2 = $assignmentfiles->insert($_POST);
                       
                            
                        }
                        
                       
                   // $data['link'] ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$assignmentid;
                   
                   
                        
                    }
                  
                  
            }
           
        }
        if($option == "edit"){
                header('Content-type: application/json');
                if(isset($_GET['id'])){
                    $assignmentID = $_GET['id'];

                }
                if($extra =="d"){
                    $fileID = $_POST['file_id'];
                    $assignmentfiles = new AssignmentFiles();
                    $result= $assignmentfiles -> delete(['fileID'=> $fileID]);
                    if($result){
                        echo 'successfully deleted';
                    }
                    else{
                        echo 'error in deletion';
                    }
                    exit;
                }
                    

                
                $assignment = new Assignment();
                $assignmentfiles = new AssignmentFiles();

                //handle update
            if($_SERVER["REQUEST_METHOD"]=="POST"){
               
                // $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
                // echo('success');
        
                if($assignmentfiles -> validate($_POST)){
                    if(isset($_FILES['assignment_file']['name']) AND !empty($_FILES['assignment_file']['name'])){
                        if($assignmentfiles -> validatefile($_FILES)){
                        //checks every file inside the $_FILES array of files
                        for($i=0; $i<count($_FILES['assignment_file']['name']); $i++) {
                            $assignment_tmp = $_FILES['assignment_file']["tmp_name"][$i];
                            $assignment_name = $_FILES['assignment_file']["name"][$i];
                            $error= $_FILES['assignment_file']['error'][$i];
                            if($error === 0){
                                $file_ext = pathinfo($assignment_name,PATHINFO_EXTENSION);
                                $file_final_ext = strtolower($file_ext);
                        
                                $allowed_ext = array('jpg','jpeg','doc','png','pdf','xls','html','css','js');
                                if(in_array($file_final_ext,$allowed_ext)){
                                    $new_file_name = uniqid($user,true).'.'.$file_final_ext;
                                    // $destination = "../uploads/assignments/". $new_file_name;

                                    $directory = "/xampp/htdocs/Interlearn/uploads/".$id."/assignments/".$assignment_id;
                                    if (!is_dir($directory)){
                                        mkdir($directory,0644, true);

                                    }
                                    $destination =  $directory."/".$new_file_name;

                                    move_uploaded_file($assignment_tmp,$destination);
                                    $_POST['filename'] = $new_file_name ;
                                    $_POST['assignmentId'] = $assignmentID;
                                     $_POST['fileID']=uniqid($user,true);
                                    $result = $assignmentfiles->insert($_POST);
                                }
                                else{
                                    $data['errors']['assignment_files']='Unsupported file type : '.$file_final_ext;
                                    break;
                                }
                            }
                            else{
                                $data['errors']['assignment_files'] ="Unknown error occured";
                                break;
                            
                                }
                        }
                    }
                    }
                }
                else{        
                    $data['errors'] =  $assignmentfiles->error;
                }
                if(empty($data['errors'])){
                    try {
                    $result = $assignment->update(['assignmentId'=>$assignmentID],$_POST);
                    if (!$result) {
                        throw new Exception("Update failed");
                        }
                    }
                    catch (Exception $e) {
                        $response = array("status" => "error", "message" => $e->getMessage());
                        header("Content-Type: application/json");
                        echo json_encode($response);
                        exit;
                        }
                        $response = array("status" => "success");
                        header("Content-Type: application/json");
                        echo json_encode($response);
                        exit;
                }
                else{
                    echo json_encode($data['errors']);
                    exit;
                    
                }
                   // $data['link'] ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?id=".$assignmentid;
             
                exit;
            }
               
                  
           // }
            else{
                $result = $assignment -> whereForAssignment(['assignmentId'=>$assignmentID],'assignmentId');
           
                header('Content-type: application/json');
                echo json_encode($result);
                exit;
            }
                exit;
            }
            
            $data['errors'] =  $assignment->error;
            
            $this->view('teacher/submission',$data);
        }
        if($action == "submissions"){
            $submission = new Submission();
            if(isset($_GET['id'])){
                $assignmentID = $_GET['id'];
            }
            else{
                $this->view('teacher/course',$data);
                exit;
            }
            $count = $submission -> submissionsCount(['assignmentId'=> $assignmentID]);
            $data ['count']= $count;


            //Get all submission details
            $submissions = $submission->allsubmissions(['assignmentId'=> $assignmentID]);
           // show($submissions);die;
     
            foreach ($submissions as $submission){
                $files = explode(",",$submission->Files);
                $submission->Files = $files;
            }
            $data ['assignment']= $submissions[0]->title;
            $data['submissions'] = $submissions;
            //create a zip file of all the submissions
            $file_path = "/xampp/htdocs/Interlearn/uploads/submissions/allfiles.zip";
            if($_SERVER["REQUEST_METHOD"]=="POST"){
         
                if(extension_loaded('zip')){
           
                    if(isset($_POST['files'])and (!empty($_POST['files']))){
                   
                        $zip_file = "../uploads/allfiles.zip";
                        touch($zip_file);
                        $zip = new ZipArchive();
                        $this_zip = $zip -> open($zip_file);
                        $zip_name = time().".zip";
              
                        if($this_zip!== TRUE){
                            //opening file error
                            $data['error']="Sorry zip creation failed at this time";
                        }
                       
                        foreach($_POST['files'] as $file){
                          
                           $folder = "../uploads/".$id."/submissions/". $assignmentID."/".$file;
                           $openFolder = opendir($folder);
                          
                           if($openFolder){
                              
                                while(false !== ($downloadfile = readdir($openFolder))){
                                    if($downloadfile !== '.' &&$downloadfile !== '..'){
                                      
                                        $file_with_path = $folder."/".$downloadfile;
                                        $zip->addFile($file_with_path,$downloadfile); // adding files into zip
                                    }
                                  
                                }
                               
                               
                           }
                           closedir($openFolder);
                            
                            
                        }
                      
              
                       $zip->close();
                       if(file_exists($zip_file)){
                        //push to download the zip
                        header('Content-type:application/zip');
                        header('Content-Disposition:attachment; filename = "'.$zip_name.'"');
                        readfile($zip_file);
                        //delete the zip file from the server
                        unlink($zip_file);
                    }
                    }
                    else{
                       
                        $data['error']= "Please select the files to download";
                      
                    }
             
                }
                else{
                       
                    $data['error']= "Extension not loaded";
                  
                }
               
               
            }
            $this->view('teacher/assignment_submission',$data);
        }
    }

    public function upload()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/upload');
    }
    public function progress()
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        
        $this->view('teacher/progress');
    }



    public function profile($action=null,$id = null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           exit;
        }
        // if($action=='add'){

        // }
        $id = $id ?? Auth::getEMP_ID();
        $staff = new Staff();
        $data['row'] = $staff->first(['emp_id'=>$id],'emp_id');
        $data['title'] = "Profile";
        
        $this->view('teacher/profile',$data);
    }
    public function quizz($action=null)
    { 
        if(!Auth::is_teacher()){
            redirect('home');
           
        }
        if($action=='add'){
            $this->view('teacher/quiz-add');

            $quizz  = new Quizz();
            $id = $_GET['id'];
            $quizz_row = $quizz -> where(['quizz_id'=>$id], 'quizz_id');

            foreach($quizz_row as $row){
                $GLOBALS['total_question'] = $row->quizz_bank;
                // echo ($GLOBALS['total_question']);
            }

            while($GLOBALS['total_question'] >= 0) {
                if($GLOBALS['total_question'] > 0) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $question_number = uniqid();
                    $_POST['question_number']=$question_number;

                    //  $id = $_GET['id'];
                    $_POST['quizz_id']=esc($id);
              

                    $question = new Question();
                    $result = $question-> insert($_POST);
                    // if($result) {
                    //     echo"sucecessfully" ; die;
                    // }
                    $choice = new Choices();
                    $result = $choice-> insert($_POST);
                }
                    exit();
                    $GLOBALS['total_question']--;
                }

            }

        }
        if($action=='final'){
            $this->view('teacher/quizz-final');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $confirm = new Confirm();
                $result = $confirm-> insert($_POST);
                // if($result) {
                //     echo"sucecessfully" ; die;
                // }
            }
            exit();
        }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $quizz_id = uniqid();
                $_POST['quizz_id'] = $quizz_id;
                $quizz = new Quizz();
                // $id = $_POST['quizz_id'];
                $result = $quizz-> insert($_POST);

            if($result) {
                header("Location:http://localhost/Interlearn/public/teacher/quizz/add?id=".$quizz_id);
            }
        }

        $this->view('teacher/quizz');
    }
    
}