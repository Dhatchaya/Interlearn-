<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/student-payment.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/card-payment.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cash-payment-style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="<?= ROOT ?>/assets/js/switching.js?v="></script>
    <script src="<?= ROOT ?>/assets/js/footer and sidebar event listner.js?v="></script>
</head>

<body style="background-color: #FFFFFF;">
    <?php $this->view("includes/header"); ?>
    <?php $this->view("includes/nav"); ?>


    <div class="side-col ">
        <div class="profile ">
            <a href="">
                <img class="profile-dwn" src="<?= ROOT ?>/assets/images/2.png" alt="">
                <img class="profile-up" src="<?= ROOT ?>/assets/images/1.png" alt="">
                <h3 id="user-name"> Manoj</h3>
                <!-- <hr class="sidebar-hr"> -->
            </a>
        </div>

        <div class="sidebar-container">
            <div class="edit-profile segment">
                <a href="">
                    <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
                    <h3 class="side-bar-txt"> Edit profile</h3>
                </a>
            </div>

            <div class="dashboard segment">
                <a href="finance-report.html">
                    <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
                    <h3 class="side-bar-txt"> Finance Report</h3>
                </a>
            </div>

            <div class="payment segment">
                <a href="">
                    <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
                    <h3 class="side-bar-txt"> Student Payment</h3>
                </a>
            </div>

            <div class="enquiry segment">
                <a href="">
                    <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
                    <h3 class="side-bar-txt"> Request Leave</h3>
                </a>
            </div>
        </div>



        <div class="logout ">
            <a href="">
                <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="" id="logout-img">
                <h3 id="logout-txt"> Logout</h3>
            </a>
        </div>

    </div>


    <div class="adding-new-user">
        <label class="add-user-lable" for="">
            <h2>Add new user</h2>
        </label>
        <button class="add-user-button" id="new-user"> New user </a>

    </div>
    <div class="payment-form-popup " id="hiddenDiv-2" style="display:flex">
        <button class="close-button" id="close-button-2">&times;</button>
        <div class="payment-form-container">

            <div class="form-part-1">
                <form class="signup-form" action="signup-form.php" method="post" novalidate>
                    <div class="form-group">
                        <label class="payment-label" for="name">First name</label><br>
                        <input class="payment-input" type="text" id="name" name="first-name" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="name">Last name</label><br>
                        <input class="payment-input" type="text" id="name" name="last-name" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="username">Username</label><br>
                        <input class="payment-input" type="text" id="name" name="username" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="NIC">NIC No.</label><br>
                        <input class="payment-input" type="text" id="name" name="NIC" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="jobtype">Jobtype</label><br>
                        <select class="select-month" name="jobtype" id="jobtype">
                            <option value="Teacher">Teacher</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
            </div>


            <div class="form-part-2">
                <div class="form-group">
                    <label class="payment-label" for="mobile-no">Mobile No: </label><br>
                    <input class="payment-input" type="text" id="mobile-no" name="mobile-no" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="address-line1">Address</label><br>
                    <input class="payment-input" type="text" id="address" name="address" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="address-line2">Address Line 2</label><br>
                    <input class="payment-input" type="text" id="address-line2" name="address-line2" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="email">E-mail</label><br>
                    <input class="payment-input" type="text" id="email" name="email" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="password">Password</label><br>
                    <input class="payment-input" type="password" id="password" name="password" required>
                    <div class="error"></div>
                </div>
                <div class="form-group">
                    <label class="payment-label" for="re-password">Re-entre password</label><br>
                    <input class="payment-input" type="password" id="re-password" name="re-password" required>
                    <div class="error"></div>
                </div>

            </div>


            <button class="submit">Submit</button>

            </form>



        </div>

    </div>

    <div class="staff-payments">

        <div class="fields">
            <h2 class="record-items ">Name</h2>
            <h2 class="record-items">Position</h2>
            <h2 class="record-items">Contact No.</h2>
            <h2 class="record-items">Joined date</h2>
        </div>



        <!-- mekata php dala thiyenne
        <div class="employee-record">
            <div class="record-items staff"><img src="<?= ROOT ?>/assets/images/1.png" alt="">
                <h3 class="user-name"></h3><?php echo $row["first_name"] . " " . $row["last_name"]; ?>
            </div>
            <div class="record-items Position"><?php echo $row["jobtype"] ?></div>
            <div class="record-items ">0<span class="per-class-pay"><?php echo $row["mobile_no"] ?></span></div>
            <div class="record-items class-count"><?php echo $row["enrollment_date"] ?></div>
        </div> -->







    </div>
    <div class="footer-support"></div>


    <?php $this->view("includes/footer"); ?>





</body>

</html>