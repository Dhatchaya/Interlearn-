<?php

$conn = mysqli_connect('localhost', 'root', 'user', 'new_leave');

if (!$conn) {
    echo"Could not connect to database".mysqli_connect_error();
}

// if(isset($_POST['leave_type']) && isset($_POST['start']) && isset($_POST['days']) && isset($_POST['leave_method']) && isset($_POST['reason'])){

    $leave_type = $_POST['leave_type'];
    $start = $_POST['start'];
    $days = $_POST['days'];
    $leave_method = $_POST['leave_method'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO my_leaves (leave_type, start, days, leave_method, reason) VALUES ('$leave_type', '$start', '$days', '$leave_method', '$reason')";

    $result = mysqli_query($conn,$sql);

    if($result) {
        header("location:./show leave page/index.php");
    }
    else {
        echo"Failed";
    }

    mysqli_close($conn);

// }
?>

