<?php 

/**
 * app info
 */

define('APP_NAME', "Interlearn App");
define('App_DESC', 'Institute management system');


/**
 * dabase config
 */
if($_SERVER['SERVER_NAME'] == 'localhost'){
    //database config for your local server
    //define some constants
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVE', 'mysql');
    //root path 
    define('ROOT','http://localhost/Interlearn/public');


}
else{
    //database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', 'user');
    define('DBDRIVE', 'mysql');
}