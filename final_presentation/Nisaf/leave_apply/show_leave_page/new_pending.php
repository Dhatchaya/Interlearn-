<?php

$conn = mysqli_connect('localhost', 'root', 'user', 'interlearn');

if (!$conn) {
    echo"Could not connect to database".mysqli_connect_error();
}

$sql = "SELECT * FROM leave_details";

$result = $conn->query($sql);

echo ("<table border = 1>
    <tr>
        <th>Leave Type</th>
        <th>Start</th>
        <th>End</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>    
");
while ($row = mysqli_fetch_assoc($result)) {
    echo("<tr><td>".$row['type'].
    "</td><td>".$row['From_date'].
    "</td><td>".$row['To_date'].
    "</td><td>".$row['reason'].
    "</td><td>".$row['status'].
    "</td></tr>");
}
echo("</table>");
            
?>
