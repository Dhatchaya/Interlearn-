<?php 
        require_once("../Login/connection.php");

        $view = "select enquiry_no,content,type,status,date from  enquiry";
            $result = mysqli_query($con,$view);
            echo ("<table border= 1 class='enq_tbl'>
                <tr>
                    <th>Enquiry No</th>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Enquiry Date</th>
                </tr>
                
           
            ");
            while($row = mysqli_fetch_assoc($result)){
                echo(
                    "<tr><td>".$row['enquiry_no'].
                    "</td><td>".$row['content'].
                    "</td><td>".$row['type'].
                    "</td><td>".$row['status'].
                    "</td><td>".$row['date']."</td></tr>");
                
            }
            echo("</table>");
            mysqli_close($con);

    ?>