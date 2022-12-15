<?php

$conn = mysqli_connect('localhost','root', 'user', 'login');

if (!$conn) {
    echo"Could not connect to database ";
}
else{
    echo "Connected to database ";
}



?>