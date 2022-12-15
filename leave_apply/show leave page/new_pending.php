<?php

$conn = mysqli_connect('localhost', 'root', 'user', 'new_leave');

if (!$conn) {
    echo"Could not connect to database".mysqli_connect_error();
}

$sql = "SELECT * FROM my_leaves";

$result = $conn->query($sql);

echo ("<table border = 1>
    <tr>
        <th>Leave Type</th>
        <th>Start</th>
        <th>Days</th>
        <th>Reason</th>
    </tr>    
");
while ($row = $result -> fetch_assoc()) {
    echo("<tr><td>".$row['leave_type'].
    "</td><td>".$row['start'].
    "</td><td>".$row['days'].
    "</td><td>".$row['reason'].
    "</td></tr>");
}
?>