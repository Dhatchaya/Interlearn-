<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Staff details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bank-payment.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/staff-view.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cash-payment-style.css?v=<?php echo time(); ?>">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body id="body" style="background-color: #FFFFFF;">
    <?php $this->view("includes/nav"); ?>

    <?php $this->view("includes/sidebar_rece"); ?>


    <div class="bank-payment-form-popup" id="hiddenDiv-1">
        <div class="bank-payment-form-container">
            <div class="payment-form-header">
                <button id="close-button-1">&times;</button>
            </div>
            <div class="payment-form-body">

                <form class="payment-form" action="" method="post" novalidate>
                    <div class="sub-container">

                        <div class="form-group">
                            <label class="payment-label" for="Name">First Name</label>
                            <div class="errorSpace1" id="errorSpace1"> </div>
                            <input value="<?= set_value('firstName') ?>" name="firstaName " class="payment-input" type="text" id="firstName" placeholder="   Manoj">
                        </div>

                        <div class="form-group">
                            <label class="payment-label" for="Address">Last Name</label>
                            <div class="errorSpace2" id="errorSpace2"></div>
                            <input value="<?= set_value('lastName') ?>" name="lastName" class="payment-input" type="text" id="lastName" placeholder="   Pavithra">
                        </div>
                        <div class="form-group">
                            <label class="payment-label" for="gender">Gender</label>
                            <div class="errorSpace1" id="errorSpace3"> </div>
                            <select class="selecter" value="<?= set_value('gender') ?>" name="gender" id="gender">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group  ">
                            <label class="payment-label" for="address">Address</label>
                            <div class="errorSpace1" id="errorSpace4"></div>
                            <input value="<?= set_value('address') ?>" name="address" class="payment-input" type="text" id="address" placeholder=" 248/5 Kirillawa, Weboda">
                        </div>



                        <div class="form-group  ">
                            <label class="payment-label" for="NIC">NIC Number</label>
                            <div class="errorSpace1" id="errorSpace5"></div>
                            <input value="<?= set_value('NIC') ?>" name="NIC" class="payment-input" type="text" id="NIC" placeholder="990331472v" maxlength="12">
                        </div>


                    </div>
                    <div class="sub-container">
                        <div class="form-group">
                            <label class="payment-label" for="PaymentDate">Contract Eding Date</label>
                            <div class="errorSpace1" id="errorSpace6"></div>
                            <input value="" name="ContractEnding" class="payment-input" type="date" id="ContractEnding">
                        </div>
                        <div class="form-group">
                            <label class="payment-label" for="jobtype">Designation</label>
                            <div class="errorSpace1" id="errorSpace7"> </div>
                            <select class="selecter" value="<?= set_value('') ?>" name="jobtype" id="jobtype">
                                <option value="" selected disabled>Select job type </option>
                                <option value="Teacher">Teacher</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>

                        <div class="form-group  ">
                            <label class="payment-label" for="mobileNum">Contact Number</label>
                            <div class="errorSpace1" id="errorSpace11"></div>
                            <input value="<?= set_value('mobileNum') ?>" name="mobileNum" class="payment-input" type="text" id="mobileNum" placeholder="071 234567" maxlength="10">
                        </div>

                        <!-- <div class="form-group  ">
                            <label class="payment-label" for="empImage">Staff Member Image </label>
                            <div class="errorSpace1" id="errorSpace8"></div>
                            <input name="empImage" class="payment-input"  type="file" id="empImage" accept=".jpg">
                        </div> -->
                        <div class="form-group  ">
                            <label class="payment-label" for="emailAddress">E-mail Address</label>
                            <div class="errorSpace1" id="errorSpace9"></div>
                            <input value="<?= set_value('emailAddress') ?>" name="emailAddress" id="emailAddress" class="payment-input" type="text" placeholder=" example@something.com">
                        </div>
                        <div class="form-group">
                            <label class="payment-label" for="password">Password</label> <button class="show-pw" type="button" id="show-password-btn">Show Password</button>
                            <div class="errorSpace1" id="errorSpace10"> </div>
                            <input class="payment-input" value="<?= set_value('password') ?>" type="password" id="password" name="password" required>

                            <script>
                                const passwordInput = document.getElementById('password');
                                const showPasswordBtn = document.getElementById('show-password-btn');

                                showPasswordBtn.addEventListener('click', function() {
                                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);
                                    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
                                });
                            </script>

                        </div>


                    </div>


            </div>
            <button class="submit-button" id="submit-btn" type="" style="top:-20px">Submit</button>

            </form>
        </div>
    </div>

    <div class="bank-payment-form-popup remove-staff-popup">
        <div class="remove-employee-dialog-box">
            <label class="ask" for="">Are you sure to remove this employee....?</label>
            <div class="btn-container">
                <button class="yes">Yes</button>
                <button class="no">No</button>
            </div>
        </div>
        <div class="success-message">
            <label class="ask" for="refresh">Successfully removed the employee</label>
            <br>
            <div class="btn-container ">
                <button onclick="refreshPage()" class="refresh"> click to refresh</button>
            </div>
        </div>
    </div>
    <div class="bank-payment-form-popup re-recrument-popup ">
        <div class="rejoin-db">
            <label class="ask" for="">Are you sure to Re-recrument this employee....?</label>
            <button class="yes" id="yes2">Yes</button>
            <button class="no" id="no2">No</button>
        </div>
        <div class="rejoin-success-message ">
            <label class="ask" for="refresh">Successfully Re-joined the employee</label>
            <br>
            <div class="btn-container ">
                <button onclick="refreshPage()" class="refresh"> click to refresh</button>
            </div>
        </div>
    </div>


    <div class="main-page-container">
        <div class="adding-new-user">
            <h1 class="add-user-lable">Employee details</h1>
            <button class="add-user-btn" id="addStaff-btn">Add New User</button>

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
                        <?php foreach ($staffMembers as $staffMember) : ?>
                            <tr>
                                <td><?= $staffMember->first_name . " " . $staffMember->last_name ?></td>
                                <td><?= $staffMember->role ?></td>
                                <td>0<?= $staffMember->mobile_no ?></td>
                                <td><?= $staffMember->enrollment_date ?></td>
                                <td><button class="remove-btn" data-staff-id="<?= $staffMember->uid ?>">Remove</button></td>

                            </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>

            </div>
        </div>

        <h1 class="table-title">Former Employees</h1>

        <div class="table-container">

            <div class="student-payment">

                <table class="payment-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Contact No.</th>
                            <th>Resigned date</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dumpedStaffSet as $dumpedGuy) : ?>
                            <tr>
                                <td><?= $dumpedGuy->first_name . " " . $dumpedGuy->last_name ?></td>
                                <td><?= $dumpedGuy->role ?></td>
                                <td>0<?= $dumpedGuy->mobile_no ?></td>
                                <td><?= $dumpedGuy->ResignedDate ?></td>
                                <td><button class="recrew-btn" data-staff-id="<?= $dumpedGuy->uid ?>">Re-recruitment</button></td>

                            </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <?php $this->view("includes/footer"); ?>






</body>

<script defer src="<?= ROOT ?>/assets/js/switching2.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/addNewStaff.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/removeStaff.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/reJoinStaff.js?v=<?php echo time(); ?>"></script>


</html>