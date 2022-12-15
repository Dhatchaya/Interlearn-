<?php
    session_start();
    if(session_destroy()){
        header("location: ../HomePage/index.html");
    }
?>