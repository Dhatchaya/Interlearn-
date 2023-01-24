<?php
    function show($arr){
        echo '<pre>';
        print_r ($arr);
        echo '</pre>';
    }
    function set_value($key){
        if(!empty($_POST[$key]))
        {
            return $_POST[$key];
        }
        return '';
    }
    function redirect($link)
    {
       header("location: ". ROOT."/".$link);
       die;
    }
    //here we use erase becase if we try to run the to check whether a msg exits
    //this will be set to true and the msg can be displayed and erased
    function message($msg = '',$erase = false)
    {
     if(!empty($msg)){
         $_SESSION['message']= $msg;
     }
     else{
         if(!empty($_SESSION['message']))
         {
            $msg= $_SESSION['message'];
            if($erase){
                unset($_SESSION['message']);
            }
           
            return $msg;
             
         }
     }
     return false;
    }