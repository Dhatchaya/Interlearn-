<?php

$conn = mysqli_connect('localhost', 'root', 'user', 'interlearn');

if (!$conn) {
    echo"Could not connect to database".mysqli_connect_error();
}

// if(isset($_POST['leave_type']) && isset($_POST['start']) && isset($_POST['days']) && isset($_POST['leave_method']) && isset($_POST['reason'])){

    $leave_type = $_POST['leave_type'];
    $from = $_POST['start'];
    $days = $_POST['days'];
    $leave_method = $_POST['leave_method'];
    $to = $_POST['end'];
    $reason = $_POST['reason'];
   
    $sql = "INSERT INTO leave_details(To_date,type, reason, From_date,leave_method) Values ('$to', '$leave_type','$reason',  '$from','$leave_method');";
   

    $result = mysqli_query($conn,$sql);

    if($result) {
        header("location:../show_leave_page/index.php");
    }
    else {
        echo("Failed".$conn -> error);
    }

    mysqli_close($conn);


?>

