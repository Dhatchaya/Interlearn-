<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM staff
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["staff_id"] = $user["id"];
            
            header("Location: manager/manager.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login_stylesheet.css">
    <link rel="stylesheet" href="../navbar-last.css">
    <link rel="stylesheet" media="screen and (max-width: 100px)" href="../mobile-nav-bar.css">
    
</head>
<body>
<div class="nav-bar">
        <img  id="navbar-logo"  src="../logo_bg_rm.png" alt="">
        <img class="punchi-logo" src="../logo.jpeg" alt="">

   

   

    </div>
    <div class="login-container">
    <h1 class="login-title">Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label class="label" for="email">E-mail</label>
        <br>
        <input class="input" type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
               <br>
        
        <label class="label" for="password">Password</label> <br>
        <input class="input" type="password" name="password" id="password"><br>
        
        <button class= "login-button">Log in</button>

        
    </form>               

    </div>
       
    
</body>
</html>