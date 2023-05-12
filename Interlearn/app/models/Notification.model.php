<?php
/**
 *Discuss class
 */
class Notification extends Model
{
    //says what table it has to target
    public $error = [];
    protected $table = "notification";
    protected $allowed_columns = [
    "Nid",	
    "category",	
    "title",	
    "course_id",	

    ];
    protected $staffs = [
        'Manager',
        'Teacher',
        'Instructor',
        'Receptionist',

    ];
    public function notificationUsercheck()
    {   
    $userid=Auth::getUID();
        $query ="select * from ".$this->table." INNER JOIN notify_user on notification.Nid=notify_user.Nid INNER JOIN subjectcoursestaff on subjectcoursestaff.course_id=notification.course_id where notify_user.uid='$userid'";

        $res = $this -> query($query,[]);

        if(is_array($res)){
            return $res;
        }
        return false;
    }


}