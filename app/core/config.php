<?php

//app info
define('APP_NAME', 'Interlearn');
define('APP_DESC', 'Institute management system');

//database config
if($_SERVER['SERVER_NAME'] == 'localhost')
{
    //database config for local server
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
}
else{
    //database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
}

?>