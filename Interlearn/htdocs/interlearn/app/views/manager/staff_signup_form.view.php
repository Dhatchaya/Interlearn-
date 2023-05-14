<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <script defer src="<?= ROOT ?>/assets/js/client_side_data_validation.js"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
    <link rel="stylesheet" media="screen and (max-width: 100px)" href="<?= ROOT ?>/assets/images/mobile-nav-bar.css">
    <link rel="stylesheet" href="signup-page-styling.css">
</head>

<body>

    <div class="nav-bar">
        <img id="navbar-logo" src="<?= ROOT ?>/assets/images/logo_bg_rm.png" alt="">
        <img class="punchi-logo" src="<?= ROOT ?>/assets/images/logo.jpeg" alt="">

        <input class="search-bar" type="text" placeholder="           Search">



        <div class="notification">
            <img class="notifi-dwn" src="<?= ROOT ?>/assets/images/4.png" alt="">
            <img id="dropbtn" class="notifi-up" src="<?= ROOT ?>/assets/images/3.png" alt="">
            <div class="dropdown-content">
                <a href="#">notification 1</a>
                <a href="#">notification 2</a>
                <a href="#">notification 3</a>
                <a href="#">notification 4</a>
            </div>
        </div>
        <div class="profile ">
            <img class="profile-dwn" src="<?= ROOT ?>/assets/images/2.png" alt="">
            <img class="profile-up" src="<?= ROOT ?>/assets/images/1.png" alt="">
        </div>

    </div>

    <h1 class="add-user">Add new user</h1>
    
    <div class="signup-container hiddenDiv">
        <form class="signup-form" action="signup-form.php" method="post" novalidate>
            <div class="sub-container">
                <label class="label" for="name">First name</label><br>
                <input class="input" type="text" id="name" name="first-name" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="name">Last name</label><br>
                <input class="input" type="text" id="name" name="last-name" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="username">Username</label><br>
                <input class="input" type="text" id="name" name="username" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="NIC">NIC No.</label><br>
                <input class="input" type="text" id="name" name="NIC" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="jobtype">Jobtype</label><br>
                <select class="select" name="jobtype" id="jobtype">
                    <option value="Teacher">Teacher</option>
                    <option value="Instructor">Instructor</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Manager">Manager</option>
                </select>
            </div>

            <div class="sub-container">
                <label class="label" for="mobile-no">Mobile No: </label><br>
                <input class="input" type="text" id="mobile-no" name="mobile-no" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="address-line1">Address</label><br>
                <input class="input" type="text" id="address" name="address" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="address-line2">Address Line 2</label><br>
                <input class="input" type="text" id="address-line2" name="address-line2" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="email">E-mail</label><br>
                <input class="input" type="text" id="email" name="email" required>
                <div class="error"></div>
            </div>

            <div class="sub-container">
                <label class="label" for="password">Password</label><br>
                <input class="input" type="password" id="password" name="password" required>
                <div class="error"></div>
            </div>
            <div class="sub-container">
                <label class="label" for="re-password">Re-entre password</label><br>
                <input class="input" type="password" id="re-password" name="re-password" required>
                <div class="error"></div>
            </div>



            <button class="submit">Submit</button>

        </form>

    </div>
    <div class="bottom-space">
        <br>
        <br>
        <br>

    </div>


</body>

</html>