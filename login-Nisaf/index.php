<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <form action="./process.php" method="POST">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="nav-left">
            <img src="logo_bg_rm.png" alt="logo">
        </div>
        <div class="nav-center">
            <input type="text" placeholder="search for anything" name="search">
            </div>
        <div class="nav-right">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Classes</a>
            <a href="#">Contact Us</a>
        </div>
    </header>
    <div class="front">
        <div class="left">
            <h2>Welcome Back !</h2>
            <p>To keep connected with us please login with your personal info</p>
        </div>
        <div class="v1"></div>
        <div class="right">
            <h2>Reciptionist Login</h2>
            <div class="logo">
                <img src="facebook.png" alt="facebook">
                <img src="linkedin.png" alt="linkedin">
                <img src="twitter.png" alt="twitter">
            </div>
            <div class="inputs">
                <form action="./process.php" method="POST">
                    <div class="input1">
                        <!-- <input type="email" name="email" placeholder="Enter valid email"> -->
                        <input type="text" name="username" placeholder="username">
                    </div>
                    <div class="input2">
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="button1">
                        <button>Login</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>