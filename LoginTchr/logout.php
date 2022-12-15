<?php
    session_start();
    (session_destroy());
    header("location: ./LoginTchr/login_index.php");
?>