<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Payments</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/payment-validation.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cash-payment-style.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bank-payment-validation.css">
  <link rel="stylesheet" media="screen and (max-width: 100px)" href="<?= ROOT ?>/assets/css/mobile-nav-bar.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
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
        <a href="">
          <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
          <h3 class="side-bar-txt"> Finance Report</h3>
        </a>
      </div>

      <div class="payment segment">
        <a href="<?= ROOT ?>/receptionist/payments">
          <img src="<?= ROOT ?>/assets/images/sidebar_icons/card.png" alt="card">
          <h3 class="side-bar-txt"> Payment</h3>
        </a>
      </div>

      <div class="enquiry segment">
        <a href="">
          <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
          <h3 class="side-bar-txt"> Enquiry</h3>
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

</body>

</html>