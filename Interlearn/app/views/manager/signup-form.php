<?php




if (empty($_POST["first-name"])) {
    die("First name is required");
}

if (empty($_POST["last-name"])) {
    die("Last name is required");
}
if (!((strlen($_POST["NIC"]) == 10) || (strlen($_POST["NIC"]) == 12))) {
    die("NIC number length is not correct");
}

if (  preg_match("/[a-z]/i", $_POST["mobile-no"])) {
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

$mysqli = require __DIR__ . "adding new user/database.php";

$sql = "INSERT INTO staff (first_name, 
                                last_name, 
                                username,
                                NIC_no,
                                jobtype,
                                mobile_no, 
                                address_line1,
                                address_line2,
                                email_address, 
                                password_hash)
                            VALUES (?, ?,?, ?,?,?,?,?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssssssss",
                  $_POST["first-name"],
                  $_POST["last-name"],
                  $_POST["username"],
                  $_POST["NIC"],
                  $_POST["jobtype"],
                  $_POST["mobile-no"],
                  $_POST["address-line2"],
                  $_POST["address-line2"], 
                  $_POST["email"],
                  $password_hash);

// print_r($_POST);die;
                  
$result=$stmt->execute();
if($result) {

    header(" Location: login.php");
    exit;
    
}
//
else {
    
    if ($mysqli->errno === 1062) {
        die("email is already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

?>