<?php

/**
 * app info
 */

define('APP_NAME', "Interlearn App");
define('App_DESC', 'Institute management system');


/**
 * dabase config
 */
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    //database config for your local server
    //define some constants
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', 'user');
    define('DBDRIVE', 'mysql');
    //root path 
    define('ROOT', 'http://localhost/Interlearn/public');
    define('pkey', 'pk_test_51Mh80UBblwXUQTWevPoFDWAN4ihJsnOuyCXbDMnVCgzFHOeAu56RzbOG1nJmfkrkePJkdUZRRVuYHtm26Z3ovDmX00e3XuTENk');
    define('skey','sk_test_51Mh80UBblwXUQTWeHjt87i6zjsTmnMncmiXZg86ImCp36ac4GMBcLa834MjwhZEMT2girGsJDIS7aK0EXfDzaBFi004sg2RIrQ');
} else {
    //database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'interlearn');
    define('DBUSER', 'root');
    define('DBPASS', 'user');
    define('DBDRIVE', 'mysql');
}
