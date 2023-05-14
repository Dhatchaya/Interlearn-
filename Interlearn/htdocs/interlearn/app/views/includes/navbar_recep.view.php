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
<div class="nav-bar">
    <img id="navbar-logo" src="<?= ROOT ?>/assets/images/logo_bg_rm.png" alt="">
    <img class="punchi-logo" src="<?= ROOT ?>/assets/images/punchi- logo.jpeg" alt="">

    <input class="search-bar" type="text" placeholder="           Search">

    <div class="nav-list">
      <ul id="myTopnav">
        <li class="nav-li"><a href="">Home</a></li>
        <li class="nav-li"><a href="">About us</a></li>
        <li class="dropdown nav-li">
          <a class="dropbtn" href="">Classes</a>
          <div class="dropdown-content">
            <a href="#">Science</a>
            <a href="#">Maths</a>
            <a href="#">English</a>
            <a href="#">Arts</a>
          </div>

        </li>
        <li class="nav-li"><a href="">Contact</a></li>

    </div>

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
</body>
</html>

