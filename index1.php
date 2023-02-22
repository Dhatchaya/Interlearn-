<?php

$NIC= $_POST['nic'];
$first_name	= $_POST['fname'];
$last_name	= $_POST['lname'];
$birthday	= $_POST['bday'];
$gender	= $_POST['gender'];
$email	= $_POST['email'];
$mobile_number	= $_POST['mobile'];
$address_line1	= $_POST['addr1'];
$address_line2	= $_POST['addr2'];
$address_line3	= $_POST['addr3'];
$school	= $_POST['school'];
$grade	= $_POST['grade'];
$language_medium= $_POST['medium'];	

$conn = mysqli_connect('localhost', 'root', '', 'interlearn');

if($conn){
    echo ("success");
}
else{
    echo ("failed");
}

?>