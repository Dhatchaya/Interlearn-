<?php 

// echo "<pre>";
// print_r($_SERVER); //this gives information about the server

/**
 * app info
 */
//reason for using define is constants are global variables whereever you are in the application you can use that constant
//if it is variable you can't use is inside class functions etc.

define('APP_NAME', "Interlearn App");
define('App_DESC', 'Free and paid tutorials');


/**
 * dabase config
 */
if($_SERVER['SERVER_NAME'] == 'localhost'){
    //database config for your local server
    //define some constants
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy');
    define('DBUSER', 'root');
    define('DBPASS', 'user');
    define('DBDRIVE', 'mysql');
    //root path 
    define('ROOT','http://localhost/udemy/public');


}
else{
    //database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy');
    define('DBUSER', 'root');
    define('DBPASS', 'user');
    define('DBDRIVE', 'mysql');
}