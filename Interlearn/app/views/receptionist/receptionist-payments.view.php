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
          <h3 class="side-bar-txt"> Finance Report</h3>
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
  <button id="validate-btn-1">Validate Bank payments</button>
  <button id="cash-btn">Add Cash payment</button>
  <div class="payment-history">


  </div>

  /******************** bank payment validation popup ********************/
  <div class="bank-payment-validation-popup" id="hiddenDiv-4"> //style="display:flex"

    <button class="close-button-4" id="close-button-4">&times</button>
    <div class="validation-container">
      <div class="pending-list">
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
        <div class="pending-item payment-1">
          <h2>Class ID</h2>
          <h2>Student Name</h2>
          <h2>Ammount</h2>
          <h2>Date</h2>
        </div>
      </div>

      <div class="preview-container">
        <h2>Depositor’s Details</h2><br>
        <div class="preview-group">
          <label class="preview-label">Name on payment slip:</label>
          <span class="preview-value" id="preview-name-on-slip"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Address:</label>
          <span class="preview-value" id="preview-address"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Course Name:</label>
          <span class="preview-value" id="preview-course-name"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">NIC Number:</label>
          <span class="preview-value" id="preview-nic"></span>
        </div>

        <br>
        <h2>Payment Details</h2><br>
        <div class="preview-group">
          <label class="preview-label">Payment Date:</label>
          <span class="preview-value" id="preview-payment-day"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Amount:</label>
          <span class="preview-value" id="preview-amount"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Bank:</label>
          <span class="preview-value" id="preview-bank"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Branch:</label>
          <span class="preview-value" id="preview-branch"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Cheque No.:</label>
          <span class="preview-value" id="preview-cheque-no"></span>
        </div>


        <button class="paynow " id="payment-submission-1" type="submit">Approve</button>
        <button class="next-payment " id="payment-submission-1" type="submit">Next Payment</button>
      </div>

    </div>

  </div>
  </div>
  </div>

  /******************** cash payment popup ********************/
  <div class="payment-form-popup" id="hiddenDiv-3">
    <div class="payment-form-container">
      <button class="close-button" id="close-button-3">&times</button>
      <div class="payment-form-header">

      </div>
      <div class="payment-form-body">
        <form method="post" action="<?= ROOT ?>/receptionist/getPayment">

          <div class="form-group">
            <label class="payment-label" for="student-id">Student ID</label>
            <div class="errorSpace1"></div>
            <input value="<?= set_value('student-ID') ?>" name="studentID" class="payment-input" type="text" id="student-id" placeholder="   2020/cs/127" maxlength="11" onkeyup="getStudentName()">


          </div>

          <div class="form-group">
            <label class="payment-label" for="card-holder-name">Student Name</label>
            <div class="errorSpace2"></div>
            <input value="<?= set_value('student-name') ?>" name="student-name" class="payment-input" type="text" id="student-name" placeholder="  Student Name" readonly>
          </div>


          <div class="form-group div-adjest-1">
            <label class="payment-label" for="payment-month">Payment Month</label>
            <div class="errorSpace3"></div>
            <div class="div-adjest-3">
              <select id="month" class="select-month " name="month">
                <option value="<?= set_value('january') ?>">January</option>
                <option value="<?= set_value('february') ?>">February</option>
                <option value="<?= set_value('march') ?>">March</option>
                <option value="<?= set_value('april') ?>">April</option>
                <option value="<?= set_value('may') ?>">May</option>
                <option value="<?= set_value('june') ?>">June</option>
                <option value="<?= set_value('july') ?>">July</option>
                <option value="<?= set_value('august') ?>">August</option>
                <option value="<?= set_value('september') ?>">September</option>
                <option value="<?= set_value('october') ?>">October</option>
                <option value="<?= set_value('november') ?>">November</option>
                <option value="<?= set_value('december') ?>">December</option>
              </select>
            </div>
          </div>


          <div class="form-group div-adjest-1">
            <label class="payment-label" for="class-ID">Class ID</label>
            <div class="errorSpace4"></div>
            <input value="<?= set_value('courseID') ?>" name="courseID" class="payment-input " type="text" id="couese-ID" placeholder="SCS2202" maxlength="7">
          </div>
          <div class="form-group">
            <label class="payment-label" for="payment value">Payment value</label>
            <div class="payment-input">
              |
            </div>
          </div>
          <button class="paynow" type="submit">Submit Payment</button>
          <button class="next-payment" id="payment-submission" type="submit">Next Payment</button>
        </form>
        <div class="last-cash-payment">last cash payment shows here</div>
      </div>
    </div>
  </div>

  <div class="student-payment">
    <h2 class="table-title">Transaction history</h2>
    <table class="payment-table">
      <thead>
        <tr>
          <th>Print payment slip</th>
          <th>Student Name</th>
          <th>Student ID</th>
          <th>Payment date</th>
          <th>Amount</th>
          <th>Transaction ID</th>
          <th>Payment method</th>
          <th>Subject code</th>
        </tr>
      </thead>
      <tbody>
        <tr>



        </tr>

        <tr>
          <td><button>Print</button></td>
          <td>Pavithra H.M.M</td>
          <td>20001274</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000256</td>
          <td>Credit Card</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Abdul Nisaf</td>
          <td>20000823</td>
          <td>01/02/2023</td>
          <td>Rs. 5000</td>
          <td>1000257</td>
          <td>Credit Card</td>
          <td>ABC256</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Gagana Samarasekara</td>
          <td>20001274</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000258</td>
          <td>Credit Card</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>P. Dutchchair</td>
          <td>20001013</td>
          <td>03/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000259</td>
          <td>Cash payment</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Pavithra H.M.M</td>
          <td>20001274</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000260</td>
          <td>Bank Slip</td>
          <td>ABC256</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Sampath H.M.g</td>
          <td>20002671</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000261</td>
          <td>Credit Card</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Abdul Nisaf</td>
          <td>20000823</td>
          <td>01/02/2023</td>
          <td>Rs. 5000</td>
          <td>1000262</td>
          <td>Credit Card</td>
          <td>ABC256</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Gagana Samarasekara</td>
          <td>20001274</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000263</td>
          <td>Credit Card</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>P. Dutchchair</td>
          <td>20001013</td>
          <td>03/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000264</td>
          <td>Cash payment</td>
          <td>ABC123</td>
        </tr>
        <tr>
          <td><button>Print</button></td>
          <td>Sampath H.M.g</td>
          <td>20002671</td>
          <td>02/02/2023</td>
          <td>Rs. 2000</td>
          <td>1000265</td>
          <td>Bank Slip</td>
          <td>ABC256</td>
        </tr>
      </tbody>
    </table>

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
  <script src="<?= ROOT ?>/assets/js/cash-payment-popup.js"></script>
  <script src="<?= ROOT ?>/assets/js/popup-receptionist-payment.js"></script>
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