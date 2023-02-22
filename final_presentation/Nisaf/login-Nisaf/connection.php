<?php

$conn = mysqli_connect('localhost','root', 'user', 'interlearn');

if (!$conn) {
    echo"Could not connect to database ";
}
else{
    echo "Connected to database ";
}



?>