<?php

$host = "localhost";
$dbname = "interlearn";
$username = "root";
$password = "user";


$mysqli = new mysqli( $host,  $username, $password,  $dbname);


if($mysqli->connect_errno){
    die("connection error is : ". $mysqli->connect_error);
}

return $mysqli;