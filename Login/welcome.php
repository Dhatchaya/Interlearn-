<?php
session_start();

if(isset($_SESSION['User'])){
    echo 'welcome'.$_SESSION['User'].'<br/>';
    echo '<a href ="logout.php?logout"> Logout </a>';
}
else{
    header("location:index.php");
}
?>