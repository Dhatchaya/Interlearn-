<?php
/**
 *Receptionist  class
 */
class StaffProfile extends Controller
{

public function editUser()
    {
        
        

        {
            $data = json_decode(file_get_contents("php://input"), true);
            
            $data['uid'] = $id ?? Auth::getUID();

            $changeProfile = new Staff();
            $res = $changeProfile->editProfile($data);
    
            echo json_encode($res);
            exit;
        }
        exit;
    }

}