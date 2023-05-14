<?php
/**
 * authentication class
 */
class Auth
{
    public static function  authenticate($row)
    {
        if(is_object($row)){
            $_SESSION['USER_DATA'] = $row;
            
        }
        

    }
    public static function  logged_in(){
        if(!empty($_SESSION['USER_DATA'])){
            return true;
        }
        return false;
    }
    public static function  is_admin(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Admin'){
            return true;
            }
        }
        return false;
    }
    public static function  is_student(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Student'){
            return true;
            }
        }
        return false;
    }
    public static function  is_manager(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Manager'){
            return true;
            }
        }
        return false;
    }
    public static function  is_receptionist(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Receptionist'){
            return true;
            }
        }
        return false;
    }
    public static function  is_teacher(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Teacher'){
            return true;
            }
        }
        return false;
    }
    public static function  is_instructor(){
        if(!empty($_SESSION['USER_DATA'])){
            if($_SESSION['USER_DATA'] -> role == 'Instructor'){
            return true;
            }
        }
        return false;
    }
    public static function  logout(){
        if(!empty($_SESSION['USER_DATA'])){
           unset($_SESSION['USER_DATA']);
           session_unset();
           session_regenerate_id();//these two completely remove everyting if you have cart items don't use it
        }
        return false;
    }
    //if you  try to call a function does not exists this function will be called instead
    //arg1 is the function we called, arg2 array of items we passed in
    public static function __callStatic($funcname,$args)
    {
        //if we call the function getEmail it will remove the get part and make the res of the string  lower case
        $key = str_replace("get","",strtolower($funcname));
 
        if(!empty($_SESSION['USER_DATA']->$key)){
            return $_SESSION['USER_DATA']->$key;
        }
        return '';
    }
}