<?php
/**
 *home class
 */
class Notifications extends Controller
{
    public function index()
    {   
       $noti = new Notification();
       $res= $noti ->notificationUsercheck();   
       header('Content-type: application/json');   
       echo json_encode($res);
        // echo json_encode($res);
    }
    public function delete()
    {   
        $userid=Auth::getUID();
        header('Content-type: application/json');  
       $noti = new Notify_user();
       if($_SERVER['REQUEST_METHOD']=="POST"){
        //    show($_POST);die;
        $res= $noti ->delete(['Nid'=>$_POST['Nid'],'uid'=>$userid]);  

      

       }
     
    
    }

}