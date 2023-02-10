<!DOCTYPE html>
<html lang="en">

<head>
  <title>Payments</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/student-payment.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/card-payment-style.css">
  <link rel="stylesheet" media="screen and (max-width: 100px)" href="<?= ROOT ?>/assets/css/mobile-nav-bar.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body style="background-color: #FFFFFF;">
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
          <h3 class="side-bar-txt"> Dashboard</h3>
        </a>
      </div>

      <div class="payment segment">
        <a href="">
          <img class="edit-img" src="<?= ROOT ?>/assets/images/edit2.png" alt="">
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
  <button id="btn" class="paynow-btn">paynow</button>


  <div class="payment-form-popup" id="hiddenDiv">
    <div class="payment-form-container">
      <div class="payment-form-header">
        <h3>Card Payment</h3>
        <button class="close-button" id="close-button">&times;</button>
      </div>
      <div class="payment-form-body">

        <form action="#">

          <div class="form-group">
            <label class="payment-label" for="card-number">Card Number</label>
            <div class="errorSpace1"></div>
            <input class="payment-input" type="text" id="card-number" placeholder="   0000 0000 0000 0000" maxlength="16">
          </div>

          <div class="form-group">
            <label class="payment-label" for="card-holder-name">Card Holder Name</label>
            <div class="errorSpace2"></div>
            <input class="payment-input" type="text" id="card-holder-name" placeholder="   Pavithra H.M.M.">
          </div>


          <div class="form-group div-adjest-1">
            <label class="payment-label" for="expiry-month">Expiry Month/Year</label>
            <div class="errorSpace3"></div>
            <div class="div-adjest-2">
              <input class="payment-input" type="text" id="expiry-month" placeholder="MM" maxlength="2">
              <input class="payment-input" type="text" id="expiry-year" placeholder=" YY" maxlength="2">
            </div>
          </div>


          <div class="form-group div-adjest-1">
            <label class="payment-label" for="cvv">CVV</label>
            <div class="errorSpace4"></div>
            <input class="payment-input div-adjest-3" type="text" id="cvv" placeholder="***" maxlength="3">
          </div>


          <div class="form-group">
            <!-- <label class="payment-label" for="card-type">Select Card Type</label> -->

            <img src="<?= ROOT ?>/assets/images/mastercard-logo.png" class="card-type-icon" alt="Mastercard logo">
            <img src="<?= ROOT ?>/assets/images/visa-logo.png" class="card-type-icon" alt="Visa logo">
            <img src="<?= ROOT ?>/assets/images/amex-logo.jpg" class="card-type-icon" alt="American Express logo">
          </div>
          <button class="paynow" id="payment-submission" type="submit">Pay Now</button>
        </form>
      </div>
    </div>
  </div>
  <div class="main-page-container">

    <div class="table-container">

      <h2 class="table-title">Payment history</h2>

      <div class="student-payment">

        <table class="payment-table">
          <thead>
            <tr>
              <th>Payment status</th>
              <th>Payment month</th>
              <th>Payment date</th>
              <th>Amount</th>
              <th>Method</th>
              <th>Subject code</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><button>Print</button></td>
              <td>January</td>
              <td>01/01/2023</td>
              <td>$100</td>
              <td>Credit Card</td>
              <td>ABC123</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Cash</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
            <tr>
              <td><button>Print</button></td>
              <td>February</td>
              <td>02/01/2023</td>
              <td>$200</td>
              <td>Card Payment</td>
              <td>XYZ456</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  </div>
  </div>
  <div class="footer-support"></div>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col" id="one">

          <img class="footer-logo" src="<?= ROOT ?>/assets/images/logo_bg_rm.png" alt="">
          <p class="slogen">We need to bring learning to people instead of
            people to learning</p>
          <hr 1.1.4>
          <p class="txt"><i class="fa fa-copyright" aria-hidden="true"></i> 2021 All Rights Reserved</p>
        </div>
        <div class="footer-col" id="two">
          <h4>follow us</h4>
          <div class="social-links">
            <a class="footer-link-icon" href="#https://web.facebook.com/UCSC.LK"><i class="fab fa-facebook-f"></i></a>
            <a class="footer-link-icon" href="#"><i class="fab fa-twitter"></i></a>
            <a class="footer-link-icon" href="#"><i class="fab fa-instagram"></i></a>
            <a class="footer-link-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <h4>Contact us</h4>
          <ol class="footer-list">
            <li><a class="footer-link" href="https://goo.gl/maps/YXUhDHjkXJoqjzNx8"><i class="fa fa-map-marker"></i> 7,Nawala Road, Rajagiriya</a> </li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i> interlearn@gmail.com</li>
          </ol>
        </div>
        <div class="footer-col" id="three">
          <h4>follow us</h4>
          <ol class="footer-list">
            <li><a class="footer-link" href="#">About us</a></li>
            <li><a class="footer-link" href="#">Teachers</a></li>
            <li><a class="footer-link" href="#">Classes</a></li>
            <li><a class="footer-link" href="#">Vacancies</a></li>
            <li><a class="footer-link" href="#">Customer care</a></li>
          </ol>

        </div>

      </div>
    </div>
  </footer>
  <!-- <script src="salaryCal.js"></script> -->
  <script src="<?= ROOT ?>/assets/js/card-payment-validation.js"></script>
  <script src="<?= ROOT ?>/assets/js/switching.js"></script>
  <script>
    // *******************************************************************************//



    const footer = document.querySelector(".footer")
    const sidebar = document.querySelector(".side-col")
    const container = document.querySelector(".sidebar-container")

    const footerApperOptions = {
      rootMargin: "0px 0px -100px 0px"
    };

    const observer = new IntersectionObserver(function(
        entries,
        observer
      ) {
        entries.forEach(entry => {
          console.log(entry.target)
          if (entry.isIntersecting) {
            sidebar.classList.add("sidebar-short");
            container.classList.add("segment-out");
          } else {
            sidebar.classList.remove("sidebar-short");
            container.classList.remove("segment-out");
          }
        });
      },
      footerApperOptions);

    observer.observe(footer);


    //***********************footer support hright changer********************************//


    var div1 = document.getElementByClassName("student-payment");
    var div2 = document.getElementByClassName("footer-support");
    div2.style.height = div1.offsetHeight + "px";
  </script>



</body>

</html>