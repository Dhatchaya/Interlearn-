<?php
/**
 *home class
 */
class Staffs extends Controller
{
    public function profileView()
    {
        if (Auth::is_student()) {
            redirect('home');
        }
        else if(!Auth::is_teacher()&&!Auth::is_instructor()&&!Auth::is_manager()&&!Auth::is_receptionist()){
            redirect('home');
        }
        $data=[];
        $students = new Students();
        $details = $students->joinstudentUser([],'first_name','asc');
        $data['rows']=$details;
        $this->view('staff/student_details',$data);
    }

    public function profilestaffView()
    {
        if (Auth::is_student()) {
            redirect('home');
        }
        else if(!Auth::is_manager()&&!Auth::is_receptionist()){
            redirect('home');
        }
        $data=[];
        $staff = new Staff();
        $details = $staff->joinstudentUser([],'first_name','asc');
        $data['rows']=$details;
        $this->view('staff/student_details',$data);
    }
    public function myprofile($action=null)
    {
        if (Auth::is_student()) {
            redirect('home');
        }
                if($action == "editUser")
            {

                    header('Content-Type: application/json; charset=utf-8');



                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        header('Content-Type: application/json; charset=utf-8');

                        $user = new User();

                        $data = $_POST;

                        $data['uid'] = $id ?? Auth::getUID();
                        $row = $user->first([
                            'uid' => $data['uid'],

                        ], 'uid');

                        if (isset($_FILES['display_picture']['name']) and !empty($_FILES['display_picture']['name'])) {
                            $pic_tmp = $_FILES['display_picture']["tmp_name"];
                            $pic_name = $_FILES['display_picture']["name"];
                            $error = $_FILES['display_picture']['error'];
                            if ($error === 0) {
                                $img_ext = pathinfo($pic_name, PATHINFO_EXTENSION);
                                $img_final_ext = strtolower($img_ext);
                                $allowed_ext = array('jpg', 'png', 'jpeg');
                                if (in_array($img_final_ext, $allowed_ext)) {
                                    $new_image_name = uniqid($row->username, true) . '.' . $img_final_ext;
                                    $destination = "uploads/images/" . $new_image_name;
                                    move_uploaded_file($pic_tmp, $destination);
                                    $data['display_picture'] = $new_image_name;
                                    $response = array('status' => 'success', 'message' => 'Image uploaded successfully');
                                } else {
                                    $response = array('status' => 'error', 'message' => 'You cannot upload this type of file');
                                }
                            } else {
                                $response = array('status' => 'error', 'message' => 'Unknown error occurred');
                            }
                        }
        //            echo $data['password'];
                        if (isset($data['password'])&&$data['password']!="null") {

                            if (!password_verify($data['curr_pass'], $row->password)) {
                                $data['password'] = '';
                                $response = array('status' => 'error', 'message' => 'Current password is incorrect');
                                echo json_encode($response);
                                exit;
                            } else {
                                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                            }
                        }

                        $changeProfile = new Staff();

                        $response1 = $changeProfile->updateProfiles(['uid' => $data['uid']], $data);
                        $response2 = $user->updateProfiles(['uid' => $data['uid']], $data);
                        if ($response1 && $response2) {
                            $response = array('status' => 'success');

                        }
                        echo json_encode($response);
                        exit;
                    }

                exit;
            }
                if($action=="view")
            {

                $ProfileData['title'] = "Profile";
                if($action="view"){
                    $currentUserID = Auth::getUID();

                    $staffData = new Staff();
                    $staff_data = $staffData->ProfileDetails($currentUserID);



                    if (!$staff_data) {
                        redirect('home');
                    }

                    $ProfileData['userData'] = $staff_data;
                    $this->view('staff/user', $ProfileData);
                }
                if($action="changepw"){

                    exit;
                }



            }
    }

}