<?php
  function show($arr){
    echo '<pre>';
    print_r ($arr);
    echo '</pre>';
}

function get_date($date){
    return $date;
}

    function set_value($key,$default=''){
        if(!empty($_POST[$key]))
        {
            return $_POST[$key];
        }else
        if(!empty($default)){
            return $default;

        }
        return '';
    }

    function set_select($key, $value, $default=''){
        if(!empty($_POST[$key]))
        {
            if($value == $_POST[$key])
            {
                return ' selected ';
            }
        }else
        if(!empty($default)){
            if($value == $default)
            {
                return ' selected ';
            }

        }
        return '';
    }

    function redirect($link)
    {
       header("location: ". ROOT."/".$link);
       die;
    }
    function esc($str)
    {
        return nl2br(htmlspecialchars($str));
    }

    
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