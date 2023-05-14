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
  <script src="https://js.stripe.com/v3/"></script>
</head>

<body style="background-color: #FFFFFF;">

  <?php
  $userid =  Auth::getUID();
  $courseid
  ?>

  <body style="background-color: #FFFFFF;">
    <div class="main-body-div">
      <?php $this->view("includes/sidebar"); ?>
      <div class="top-to-bottom-content">
        <?php $this->view("includes/nav"); ?>


        <div class="all-payment-content">








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

                    <?php $totalPayment = 0;
                          $studentID = '';
                          $studentName = '';
                    if (!empty($haveToPaySet)) : ?>
                      <?php // Initialize the total payment variable
                      foreach ($haveToPaySet as $pendingPayment) :
                        // Add the current payment amount to the total payment
                        $totalPayment += $pendingPayment->amount;
                      ?>
                        <tr class="pending-payment-record" >
                          <td class="courseID pending-payment-data"><?= $pendingPayment->courseID ?></td>
                          <td class="month pending-payment-data"><?= $pendingPayment->month ?></td>
                          <td><?= $dueDate = date("Y-m-30"); ?></td>
                          <td class="amount pending-payment-data"><?= $pendingPayment->amount ?></td>
                          <td pending-payment-data>
                            <!-- <button id="" class="card-btn" >paynow</button> -->
                            <?php
                            echo '<form action="' . ROOT . '/student/payment" method="POST">
                  <input type="text" name="PaymentID" value="' . $pendingPayment->PaymentID . '" hidden>
                  <input type="number" name="amount" value="' . $pendingPayment->amount . ' " hidden>
                  <input type="text" name="rest_key" value="' . skey . '" hidden>
                  <script
                      src="https://checkout.stripe.com/checkout.js"
                      class="stripe-button"
                      data-key="' . pkey . '"
                      data-name="Online Payment"
                      data-description="Course ID - ' . $pendingPayment->courseID . '        ' . 'Month - ' . $pendingPayment->month . '"
                      data-amount="' . $pendingPayment->amount . '00"
                      data-PaymentID="' . $pendingPayment->PaymentID . '"
                      data-email="' . $pendingPayment->studentID . '"
                      data-currency="lkr">
                  </script>
              </form>';

                            ?>
                              <button class="bank-btn"
                                      data-course-id="<?= $pendingPayment->courseID ?>"
                                      data-month="<?= $pendingPayment->month ?>"
                                      data-amount="<?= $pendingPayment->amount ?>"
                                      data-PaymentID="<?= $pendingPayment->PaymentID ?>"
                                      data-payment_status="<?= $pendingPayment->payment_status ?>"

                                      >Bank Payment</button>
                            </td >
                        </tr>

                        <?php
                        $courseid = $pendingPayment->courseID;
                        $month = $pendingPayment->month;
                        $amount = $pendingPayment->amount;
                        $studentID = $pendingPayment->studentID;
                        $studentName = $pendingPayment->studentName ?>

                      <?php endforeach; ?>

                    <?php else : ?>
                      <p>No payments to do.</p>
                    <?php endif; ?>

                    <tr>
                      <td colspan="3" style="text-align:right;">Total Payment:</td>
                      <td><?= $totalPayment ?></td>
                      <td>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>

            <div class="bank-payment-form-popup" id="hiddenDiv-1">
              <div class="bank-payment-form-container">
                <div class="payment-form-header">
                  <button id="close-button-1">&times;</button>
                </div>
                <div class="payment-form-body">

                  <div class="payment-form" action="#" method="post"   encType='multipart/form-data'>
                    <div class="sub-container">
                      <div class="form-group">
                        <label class="payment-label" for="student-id">Student ID </label>
                        <div class="errorSpace1" id="errorSpace1"></div>
                        <input name="studentID" class="payment-input" type="text" id="student-id" value="<?= $studentID ?>" maxlength="20" readonly>
                      </div>

                      <div class="form-group  ">
                        <label class="payment-label" for="CourseID">Course ID</label>
                        <div class="errorSpace2" id="errorSpace2"></div>
                        <input name="CourseID " class="payment-input" type="text" id="couese-ID" maxlength="5" placeholder="  <?= $courseid ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label class="payment-label" for="Name">Name on payment slip</label>
                        <div class="errorSpace1" id="errorSpace3" ></div>
                        <input name="NameOnSlip " class="payment-input" type="text" id="student-name" value="<?= $studentName ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label class="payment-label" for="PaymentDate">Paid Date<span class="required-star">*</span></label>
                        <div class="errorSpace1" id="errorSpace6"></div>
                        <input value="" name="paidDate" class="payment-input" type="date" id="paidDate">
                        <span class="hidden" id="month"><?=$month?></span>
                      </div>

                    </div>
                    <div class="sub-container ">



                      <div class="form-group">
                        <label class="payment-label" for="card-holder-name">Amount(LKR)<span class="required-star">*</span></label>
                        <div class="errorSpace1" id="errorSpace7"></div>
                        <input name="Amount" class="payment-input" type="currency" maxlength="4" id="amount" placeholder=" <?= $amount ?>">
                      </div>

                      <div class="form-group ">
                        <label class="payment-label" for="ChequeNo">Cheque No. (only if pay on cheque)</label>
                        <div class="errorSpace11" id="errorSpace11"></div>
                        <input name="ChequeNo" class="payment-input" type="text" id="Cheque-No" maxlength="24" placeholder=" 0000 0000 0000 0000">
                      </div>
                      <div class="form-group  ">
                        <label class="payment-label" for="Bank">Bank<span class="required-star">*</span></label>
                        <div class="errorSpace1" id="errorSpace8"></div>
                        <select class="selecter" id="bank">
                          <option value="" disabled selected>Select a bank</option>
                          <option value="Bank of Ceylon">Bank of Ceylon</option>
                          <option value="Commercial Bank">Commercial Bank of Ceylon</option>
                          <option value="People's Bank">People's Bank</option>
                          <option value="National Savings Bank">National Savings Bank</option>
                          <option value="Sampath Bank">Sampath Bank</option>
                          <option value="Hatton National Bank">Hatton National Bank</option>
                          <option value="Pan Asia Bank">Pan Asia Bank</option>
                          <option value="Seylan Bank">Seylan Bank</option>
                        </select>
                      </div>
                      <div class="form-group div-adject-4 ">
                        <label class="payment-label" for="Branch">Branch<span class="required-star">*</span></label>
                        <div class="errorSpace1" id="errorSpace9"></div>
                        <input name="Branch" class="payment-input" type="text" id="branch" placeholder=" Colombo">
                      </div>

                      <div class="form-group  ">
                        <label class="payment-label div-adject-5" for="SlipImage">Payment Slip Image (.pdf is only acceptable)<span class="required-star">*</span></label>
                        <div class="errorSpace1" id="errorSpace10"></div>
                        <input name="SlipImage" class="payment-input" type="file" id="file-upload" accept=".pdf" >
                      </div>




                    </div>


                </div>

                <button class="submit-button" id="payment-submission" type="button"   style="top:50px;">Submit</button>

                    </div>
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

                    <?php if (!empty($payment_history_list)) : ?>
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
                    <?php else : ?>
                      <p>No payment history found.</p>
                    <?php endif; ?>
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <!-- <td><button>Print</button></td> -->
                    </tr>


                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="footer-support"></div>


    <?php $this->view("includes/manojge_footer_eka"); ?>
    <!-- <script src="salaryCal.js"></script> -->
    <script src="<?= ROOT ?>/assets/js/card-payment-validation.js"></script>
    <script src="<?= ROOT ?>/assets/js/submitBP.js"></script>
    <script src="<?= ROOT ?>/assets/js/switching.js"></script>




  </body>

</html>