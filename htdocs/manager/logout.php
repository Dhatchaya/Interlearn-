<?php

session_start();

session_destroy();

header("location: ../adding%20new%20user/login.php");
exit;