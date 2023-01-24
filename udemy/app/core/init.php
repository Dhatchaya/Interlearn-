<?php
//this function is triggered only when a class not found
//this registers and auto loader
//autoloader is a file that loads automatically when a specific file is not found
//anonymous function
//$class_name=nameof the class it is trying to find
spl_autoload_register(

    function ($class_name){
        if($class_name !== "PHPMailer"){
            require "../app/models/".$class_name.".model.php";
        }
        else{
            echo "not this";die;
        }
       
    }
);

require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";//since we want functions,config and database files within the controller we require it after them
require "app.php";
