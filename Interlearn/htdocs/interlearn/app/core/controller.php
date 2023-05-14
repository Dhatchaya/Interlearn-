<?php
/**
 * main controller class
 */

class Controller
{
    public function view($view, $data =[]){
        
        extract($data);//get an array of items and mixed variables with those names
        $filename = "../app/views/".$view.".view.php";
        if(file_exists($filename))
        {
           
            require $filename;
         
        }
        else{
            echo "couldn not find view file: ".$filename;
        }
    }
}