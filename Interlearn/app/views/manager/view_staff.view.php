<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/staff-view.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/staff-signup.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script src="<?= ROOT ?>/assets/js/switching.js?v="></script>
    <script src="<?= ROOT ?>/assets/js/footer and sidebar event listner.js?v="></script>
</head>

<body style="background-color: #FFFFFF;">
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

    <div class="payment-form-popup " id="hiddenDiv-2">
        <button class="close-button" id="close-button-2" type="submit" name="hideDiv">&times;</button>
        <div class="payment-form-container">

            <div class="form-part-1">
                <form class="signup-form" action="signup-form.php" method="post" novalidate>
                    <div class="form-group">
                        <label class="payment-label" for="name">First name</label><br>
                        <input class="payment-input" value="<?=set_value('first-name')?>" type="text" id="name" name="first-name" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="name">Last name</label><br>
                        <input class="payment-input" value="<?=set_value('last-name')?>" type="text" id="name" name="last-name" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="username">Username</label><br>
                        <input class="payment-input" value="<?=set_value('username')?>" type="text" id="name" name="username" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="NIC">NIC No.</label><br>
                        <input class="payment-input" value="<?=set_value('NIC')?>" type="text" id="name" name="NIC" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label class="payment-label" for="jobtype">Jobtype</label><br>
                        <select class="selecter" value="<?=set_value('jobtype')?>" name="jobtype" id="jobtype">
                            <option value="Teacher">Teacher</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="payment-label" for="mobile-no">Mobile No: </label><br>
                        <input class="payment-input" value="<?=set_value('mobile-no')?>" type="text" id="mobile-no" name="mobile-no" required>
                        <div class="error"></div>
                    </div>
            </div>


            <div class="form-part-2">


                <div class="form-group">
                    <label class="payment-label" for="address-line1">Address</label><br>
                    <input class="payment-input" value="<?=set_value('address')?>" type="text" id="address" name="address" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="address-line2">Address Line 2</label><br>
                    <input class="payment-input" value="<?=set_value('address-line2')?>" type="text" id="address-line2" name="address-line2" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="email">E-mail</label><br>
                    <input class="payment-input" value="<?=set_value('email')?>" type="text" id="email" name="email" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label class="payment-label" for="password">Password</label><br>
                    <input class="payment-input" value="<?=set_value('password')?>" type="password" id="password" name="password" required>
                    <div class="error"></div>
                </div>
                <div class="form-group">
                    <label class="payment-label" for="re-password">Re-entre password</label><br>
                    <input class="payment-input" value="<?=set_value('re-password')?>" type="password" id="re-password" name="re-password" required>
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <button class="submit">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["showDiv"])) {
        echo "<style>#hiddenDiv-2 { display: block; }</style>";
    }

    if (isset($_POST["hideDiv"])) {
        echo "<style>#hiddenDiv-2 { display: none; }</style>";
    }
    ?>

    <script>
        const showBtn = document.getElementById("showBtn");
        const hideBtn = document.getElementById("hideBtn");
        const myDiv = document.getElementById("hiddenDiv-2");

        showBtn.addEventListener("click", function() {
            myDiv.style.display = "block";
        });

        hideBtn.addEventListener("click", function() {
            myDiv.style.display = "none";
        });
    </script>


    <div class="main-page-container">
        <div class="adding-new-user">
            <label class="add-user-lable" for="">
                <h2>Add new user</h2>
            </label>
            <button class="add-user-button" id="new-user" type="submit" name="showDiv"> New user </button>
        </div>
        <div class="table-container">

            <div class="student-payment">

                <table class="payment-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Contact No.</th>
                            <th>Joined date</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button>Print</button></td>
                            <td>January</td>
                            <td>01/01/2023</td>
                            <td>$100</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td><button>Print</button></td>
                            <td>February</td>
                            <td>02/01/2023</td>
                            <td>$200</td>
                            <td>$100</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="footer-support"></div>


    <?php $this->view("includes/footer"); ?>





</body>

</html>