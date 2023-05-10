<!DOCTYPE html>
<html lang="en">

<head>
  <title>Payments</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar-last.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/student-payment.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bank-payment.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/card-payment.css">
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
      </ul>
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


  /****bank payment ******/

  <div class="bank-payment-form-popup" id="hiddenDiv-1">
    <div class="bank-payment-form-container">
      <div class="payment-form-header">
        <button id="close-button-1">&times;</button>
      </div>
      <div class="payment-form-body">

        <form class="payment-form" action="<?= ROOT ?>/student/getBankPayment" method="post">
          <div class="sub-container">

            <div class="form-group">
              <h2>Depositor’s Details</h2><br>
              <label class="payment-label" for="Name">Name on payment slip<span class="required-star">*</span></label>
              <div class="errorSpace1" style="top: 65px"></div>
              <input value="<?= set_value('NameOnSlip') ?>" name="NameOnSlip " class="payment-input" type="text" id="name-on-slip" placeholder="   Pavithra H.M.M">
            </div>

            <div class="form-group">
              <label class="payment-label" for="Address">Address<span class="required-star">*</span></label>
              <div class="errorSpace2"></div>
              <input value="<?= set_value('Address') ?>" name="Address" class="payment-input" type="text" id="address" placeholder="   ">
            </div>


            <div class="form-group  ">
              <label class="payment-label" for="CourseID">Course ID<span class="required-star">*</span></label>
              <div class="errorSpace3"></div>
              <input value="<?= set_value('CourseID') ?>" name="CourseID " class="payment-input" type="text" id="address" maxlength="5" placeholder="   ">
            </div>
            <div class="form-group  ">
              <label class="payment-label" for="NIC">NIC Number<span class="required-star">*</span></label>
              <div class="errorSpace4"></div>
              <input value="<?= set_value('PayerNIC') ?>" name="PayerNIC" class="payment-input" type="text" id="NIC" placeholder="990331472v" maxlength="12">
            </div>
            <div class="form-group  ">
              <label class="payment-label" for="SlipImage">Payment Slip Image (.pdf is only acceptable)<span class="required-star">*</span></label>
              <div class="errorSpace4"></div>
              <input name="SlipImage" class="payment-input" type="file" id="file-upload" accept=".pdf" onchange="showUploadButton()">
              <button id="upload-button" disabled>Upload</button>
            </div>

          </div>
          <div class="sub-container">
            <div class="form-group">
              <h2>Payment Details</h2><br>
              <label class="payment-label" for="PaymentDate">Payment Date<span class="required-star">*</span></label>
              <div class="errorSpace1" style="top: 65px"></div>
              <input value="<?= set_value('PaymentDate') ?>" name="PaymentDate" class="payment-input" type="date" id="card-number">
            </div>

            <div class="form-group">
              <label class="payment-label" for="card-holder-name">Ammount(LKR)<span class="required-star">*</span></label>
              <div class="errorSpace2"></div>
              <input value="<?= set_value('Ammount') ?>" name="Ammount" class="payment-input" type="currency" maxlength="7" id="ammount" placeholder=" 5000">
            </div>
            <div class="form-group  ">
              <label class="payment-label" for="Bank">Bank<span class="required-star">*</span></label>
              <div class="errorSpace4"></div>
              <select class="selecter">
                <option value="" disabled selected>Select a bank</option>
                <option value="1">Commercial Bank of Ceylon</option>
                <option value="2">People's Bank</option>
                <option value="3">National Savings Bank</option>
                <option value="4">Sampath Bank</option>
                <option value="5">Hatton National Bank</option>
                <option value="6">Pan Asia Bank</option>
                <option value="7">Seylan Bank</option>
              </select>
            </div>
            <div class="form-group div-adject-4 ">
              <label class="payment-label" for="Branch">Branch<span class="required-star">*</span></label>
              <div class="errorSpace3"></div>
              <input value="<?= set_value('Branch') ?>" name="Branch" class="payment-input" type="text" id="Cheque-No" placeholder=" Colombo">
            </div>
            <div class="form-group div-adject-4 ">
              <label class="payment-label" for="ChequeNo">Cheque No. (only if pay on cheque)</label>
              <div class="errorSpace3"></div>
              <input value="<?= set_value('ChequeNo') ?>" name="ChequeNo" class="payment-input" type="text" id="Cheque-No" maxlength="11" placeholder=" 00000000000000">
            </div>



          </div>


      </div>
      <?php
      $userid =  Auth::getUID();
      $_POST['StudentID'] = $userid
      ?>

      <button class="submit-button" id="payment-submission-1" type="submit">Submit</button>

      </form>
    </div>
  </div>



  <div class="main-page-container">
    <div class="table-container">

      <h2 class="table-title">Pending Payments</h2>
      <div class="pending-payment">

        <table class="payment-table">
          <thead>
            <tr>
              <th>Subject code</th>
              <th>Payment month</th>
              <th>Payment due date</th>
              <th>Amount</th>
              <th>Payment Options</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>ABC123</td>
              <td>January</td>
              <td>01/01/2023</td>
              <td>$100</td>
              <td>Credit Card</td>
              <td><button id="" onclick="checkout()" class="card-btn">paynow</button>

                <script>
                  function checkout() {
                    window.location.href = "<?= ROOT ?> /student/checkout";
                  }
                </script>

                <button id="bank-btn" class="bank-btn">Bank Payment</button>
              </td>
                
            </tr>  -->
            
          <?php if (!empty($haveToPaySet)): ?>
            <?php // Initialize the total payment variable
              foreach ($haveToPaySet as $pendingPayment) :// Add the current payment amount to the total payment
                
              $totalPayment = 0;
              $totalPayment += $pendingPayment->amount; 
            ?>
              <tr>
                <td><?= $pendingPayment->courseID  ?></td>
                <td><?= $pendingPayment->month ?></td>
                <td><?= $dueDate = date("Y-m-30"); ?></td>
                <td><?= $pendingPayment->amount ?></td>
                <td>
                  <button id="" onclick="checkout(<?= json_encode($pendingPayment) ?>)" class="card-btn">paynow</button>
                  <button id="bank-btn" class="bank-btn">Bank Payment</button>
                  <script>
                    function checkout() {
                      console.log("print checkout");
                      // Redirect to the checkout page with the payment data as a URL parameter
                      window.location.href = "<?= ROOT ?>/student/checkout?payment=" + encodeURIComponent(JSON.stringify($pendingPayment));
                    }
                  </script>
                </td>
              </tr>
            <?php endforeach; ?>
                        
            <?php else: ?>
                <p>No payments ot do.</p>
            <?php endif; ?>


            <tr>
              <td colspan="3" style="text-align:right;">Total Payment:</td>
              <td><?= $totalPayment ?></td>
              <td><button id="" onclick="checkout( json_encode($haveToPaySet))" class="card-btn">paynow</button>
                <button id="bank-btn" class="bank-btn">Bank Payment</button>
              </td>
            </tr>

            <script>
              function fullPayment() {
                // Redirect to the checkout page with the payment data as a URL parameter
                window.location.href = "<?= ROOT ?>/student/checkout?payment=" + encodeURIComponent(JSON.stringify($haveToPaySet));
              }
            </script>


          </tbody>
        </table>

      </div>

    </div>


    <div class="table-container">

      <h2 class="table-title">Payment history</h2>

      <div class="payment-history">

        <table class="payment-table">
          <thead>
            <tr>
              <th>Subject code</th>
              <th>Payment month</th>
              <th>Payment date</th>
              <th>Payment ID</th>
              <th>Amount</th>
              <th>Method</th>
              <!-- <th>Print Payment Slip</th> -->
            </tr>
          </thead>
          <tbody>

          <?php if (!empty($payment_history_list)): ?>
    <?php foreach ($payment_history_list as $payments) : ?>
        <tr>
            <td><?= $payments->courseID ?></td>
            <td><?= $payments->month ?></td>
            <td><?= date('Y-m-d', strtotime($payments->payment_date)) ?></td>
            <td><?= $payments->PaymentID ?></td>
            <td><?= $payments->amount ?></td>
            <td><?= $payments->method ?></td>
            <!-- <td><button>Print</button></td> -->
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No payment history found.</p>
<?php endif; ?>



          </tbody>
        </table>

      </div>
    </div>
  </div>
  <div class="footer-support"></div>


  <?php $this->view("includes/manojge_footer_eka"); ?>
  <!-- <script src="salaryCal.js"></script> -->
  <script src="<?= ROOT ?>/assets/js/card-payment-validation.js"></script>
  <script src="<?= ROOT ?>/assets/js/show-upload-button.js"></script>
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
          // console.log(entry.target);
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


    // var div1 = document.getElementByClassName("student-payment");
    // var div2 = document.getElementByClassName("footer-support");
    // div2.style.height = div1.offsetHeight + "px";
  </script>



</body>

</html>