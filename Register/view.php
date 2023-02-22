<?php
        require_once("../connection.php");
        $details = "select first_name from student";
        
        $result = mysqli_query($conn,$details);
        $row = mysqli_fetch_row($result);
        printf("%s ",$row[0]);
        
        // studentID	
// NIC	
// first_name	
// last_name	
// birthday	
// gender	
// email	
// mobile_number	
// address_line1	
// address_line2	
// address_line3	
// school	
// grade	
// language_medium
//         echo("
//         <table border = 1>
//         <tr><th
//         ")


?>