<?php
require_once("../connection.php");
$Subject = $_POST['sub'];	
$Category = $_POST['category'];		

if(isset($_POST['submit'])){
    if(empty($Subject)||empty($Category)){
            header("location:enquiry.php?Empty= Please fill in all the fields");
    }
}
$q = "INSERT INTO enquiry(content,type) VALUES ('$Subject','$Category')";

$result_in = mysqli_query($conn,$q);
if(!$result_in){
    header("location:enquiry.php?Fail=Failed to Insert");
}
else{
    header("location:enquiry.php");
}

mysqli_close($conn)

?>
