<?php

spl_autoload_register(

    function ($class_name) {
        require "../app/models/" . $class_name . ".model.php";
    }
);

require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";
