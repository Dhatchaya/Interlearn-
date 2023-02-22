<?php


if (empty($_POST["first-name"])) {
    die("First name is required");
}

if (empty($_POST["last-name"])) {
    die("Last name is required");
}
if (  preg_match("/[a-z]/i", $_POST["password"])) {
    die("Mobile number must not contain letters");
}
if (empty($_POST["address"])) {
    die("Address is required");
}


if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["re-password"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO staff (first_name, 
                                last_name, 
                                username,
                                jobtype,
                                mobile_no, 
                                address_line1,
                                address_line2,
                                email, 
                                password_hash)
                            VALUES (?, ?, ?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["first-name"],
                  $_POST["first-name"],
                  $_POST["username"],
                  $_POST["jobtype"],
                  $_POST["mobile-no"],
                  $_POST["address-line2"],
                  $_POST["address-line2"],
                  $_POST["email"],
                  $password_hash);

print_r($_POST);die;
                  
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
}
//D:/software/xampp/htdocs/manager/manager
else {
    
    if ($mysqli->errno === 1062) {
        die("username already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

