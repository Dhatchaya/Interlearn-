Public folder is accessible to everyone therefore all the configurations are maintained only within the app folder


First the index page on public folder loads
-It creates a session
-calls the init page
    init has initialized all the files in the order they should be read
        spl_autoload_register(

        function ($class_name){
            require "../app/models/".$class_name.".model.php";
        }
        );
        -this code segement is a anonymous function loads automatically when a class name is not found
        - this is used to create instances of models
        require "config.php";
        -has all the database configurations
        require "functions.php";
        -this has the common functions that will be used by all the files
        require "database.php";
        -prepared statements for queries
        require "model.php";
        -contains common functions that can be used by all the models to do database operations
        require "controller.php";//since we want functions,config and database files within the controller we require it after them
        -contains common functions that can be used by all the controllers
        require "app.php";
        -handles routing
- creates an instance of app class

APP.php
routes to the relavant controller and then to the correct method in the controller depending on the url

Controllers
404 is to view the 404 error page

singup controller
    initializes error array
    creates an instance of user class which is in user model
        - runs the autoload function in init file
    calls the signup view page
    calls the validate function in user class and insert function in model.php on submit
    calls the message function in functions.php
    redirects to login page
Signup view
    this has the signup UI with php validation
    on creation of a new account it'll redirect to the login page

view/Includes
    -common parts of UI that can be reused

Public/assets
    -styles and images

//display name
in auth create a function with static call that will be called when the program couldn't find the function name 
it'll return the firstname
check auth.model.php and nav.view.php

//add main tag in the header and footer
