<?php
/**
 * main controller class
 * if all the controllers share a same functionality it would not be efficient
 *  to have them seperately in each controller file hece we use this class to specify those functionalities
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