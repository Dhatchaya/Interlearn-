<?php

$conn = mysqli_connect('localhost','root', 'user', 'learn');

if ($conn) {
    echo"Could not connect to database ";
}
else{
    echo "Connected to database ";
}

mysqli_close($conn);

?>