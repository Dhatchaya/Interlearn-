<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Staff details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bank-payment.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/staff-view.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #FFFFFF;">
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
                                <option value="" disabled>Select</option>
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
                            <input value="<?= set_value('PayerNIC') ?>" name="PayerNIC" class="payment-input" type="text" id="NIC" placeholder="990331472v" maxlength="12">
                        </div>
                        <div class="form-group  ">
                            <label class="payment-label" for="mobileNum">Contact Number</label>
                            <div class="errorSpace1" id="errorSpace11"></div>
                            <input value="<?= set_value('mobileNum') ?>" name="mobileNum" class="payment-input" type="text" id="mobileNum" placeholder="071 234567" maxlength="10">
                        </div>

                    </div>
                    <div class="sub-container">
                        <div class="form-group">
                            <label class="payment-label" for="PaymentDate">Contract Eding Date</label>
                            <div class="errorSpace1" id="errorSpace6"></div>
                            <input value="<?= set_value('ContractEnding') ?>" name="ContractEnding" class="payment-input" type="date" id="ContractEnding">
                        </div>
                        <div class="form-group">
                            <label class="payment-label" for="jobtype">Designation</label>
                            <div class="errorSpace7" id="errorSpace7"> </div>
                            <select class="selecter" value="<?= set_value('jobtype') ?>" name="jobtype" id="jobtype">
                                <option value="" disabled>Select job type </option>
                                <option value="Teacher">Teacher</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>

                        <div class="form-group  ">
                            <label class="payment-label" for="empImage">Staff Member Image </label>
                            <div class="errorSpace1" id="errorSpace8"></div>
                            <input name="empImage" class="payment-input" type="file" id="empImage" accept=".pdf">
                        </div>
                        <div class="form-group  ">
                            <label class="payment-label" for="emailAddress">E-mail Address</label>
                            <div class="errorSpace1" id="errorSpace9"></div>
                            <input value="<?= set_value('emailAddress') ?>" name="emailAddress" id="emailAddress" class="payment-input" type="text" placeholder=" example@something.com">
                        </div>
                        <div class="form-group">
                            <label class="payment-label" for="password">Password</label> <button type="button" id="show-password-btn">Show Password</button>
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






    <div class="main-page-container">
        <div class="adding-new-user">
            <h1 class="add-user-lable">Staff details</h1>
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
                        <tr>
                            <td>Manoj Pavithra</td>
                            <td>Teacher</td>
                            <td>01711606520</td>
                            <td>02/01/2023</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Abdul Nisaf</td>
                            <td>Teacher</td>
                            <td>0741605689</td>
                            <td>17/01/2023</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Gagana Samarasekara</td>
                            <td>Manager</td>
                            <td>0769845627</td>
                            <td>02/01/2023</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Dachaya Prabhakaran</td>
                            <td>Receptionist</td>
                            <td>01711606520</td>
                            <td>02/01/2023</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Gihan Sampath</td>
                            <td>instructor</td>
                            <td>0751306520</td>
                            <td>21/06/2020</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Kavishka Anjuna</td>
                            <td>Instructor</td>
                            <td>0726531456</td>
                            <td>02/03/2022</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Ayusha Shasthraka</td>
                            <td>Teacher</td>
                            <td>0774764865</td>
                            <td>14/10/2021</td>
                            <td><button>Update</button></td>
                        </tr>
                        <tr>
                            <td>Sineth Thamuditha</td>
                            <td>Instructor</td>
                            <td>0710456079</td>
                            <td>02/01/2023</td>
                            <td><button>Update</button></td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <?php $this->view("includes/footer"); ?>






</body>

<script defer src="<?= ROOT ?>/assets/js/switching2.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/addNewStaff.js?v=<?php echo time(); ?>"></script>

</html>