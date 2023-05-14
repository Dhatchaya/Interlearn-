<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Payments</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/payment-validation.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/footer-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bank-payment-validation.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cash-payment-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" media="screen and (max-width: 100px)" href="<?= ROOT ?>/assets/css/mobile-nav-bar.css?v=<?php echo time(); ?>">
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css?v=<?php echo time(); ?>"> -->

</head>

<body style="background-color: #FFFFFF;">
<div class="main-body-div">
<?php $this->view("includes/sidebar_recep"); ?>
<div class="top-to-bottom-content">
  <?php $this->view("includes/nav"); ?>
  <div class="all-payment-content">




  <button id="val-bank-btn" class="val-bank-ban">Validate Bank Payment</button>
  <button id="cash-btn" class="cash-btn" style="cursor: pointer">Cash Payments</button>

  <!-- /******************** bank payment validation popup style="display:flex" ********************/ -->
  <div class="bank-payment-validation-popup" id="hiddenDiv-1">
    <button class=" close-button-4" id="close-button-1">&times</button>
    <div class="validation-container">
      <div class="pending-list">
      <?php foreach ($bankPayments as $bankPayment) : ?>
  <div class="pending-item each-payment" id="<?= $bankPayment->BankPaymentID ?>" data-status="<?= $bankPayment->status ?>">
    <h4><?= $bankPayment->CourseID  ?></h4>
    <h4><?= $bankPayment->NameOnSlip  ?></h4>
    <h4><?= $bankPayment->monthlyFee ?></h4>
    <h4><?= $bankPayment->PaymentDate  ?></h4>
  </div>
<?php endforeach; ?>


      </div>

      <div class="preview-container">
        <h2>Depositor’s Details</h2><br>
        <div class="preview-group">
          <label class="preview-label">Name on payment slip:</label>
          <span class="preview-value" id="preview-name-on-slip"></span>
        </div>
        <input type="hidden" value="" id="bankpaymentID"/>
        <div class="preview-group">
          <label class="preview-label">StudentID:</label>
          <span class="hidden" id="PaymentID"></span>
          <span class="preview-value" id="preview-StudentID"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">Course ID:</label>
          <span class="preview-value" id="preview-course-name"></span>
        </div>
        <div class="preview-group">
          <label class="preview-label">month:</label>
          <span class="preview-value" id="preview-month"></span>
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
        <div class="preview-group">
          <label class="preview-label1">Bank Slip:</label>
         <a href="" id="slipimage" class= "attachment-link">View Attachment</a>
        </div>

        <button class="paynow " id="approve" type="submit">Approve</button>
        <button class="next-payment " id="decline" type="submit">Decline</button>
      </div>

    </div>

  </div>

  <!-- /******************** cash payment popup style="display:flex" ********************/ -->
  <div class="payment-form-popup" id="hiddenDiv-2">
  <button class="close-button" id="close-button-2">&times</button>
    <div class=" payment-form-container">

      <div class="payment-form-header">

      </div>
      <div class="payment-form-body">
        <form method="post" id="cash_paymen_form" action="<?= ROOT ?>/receptionist/payments" novalidate>

          <div class="form-group">
            <label class="payment-label" for="student-id">Student ID <span class="required-star">*</span></label>
            <div class="errorSpace1"></div>
            <input value="<?= set_value('student-ID') ?>" name="studentID" class="payment-input" type="text" id="student-id" placeholder="   2020/cs/127" maxlength="11" required>
          </div>

          <div class="form-group div-adjest-1">
            <label class="payment-label" for="class-ID">Class ID <span class="required-star">*</span></label>
            <div class="errorSpace2"></div>
            <input value="<?= set_value('courseID') ?>" name="courseID" class="payment-input " type="text" id="couese-ID" placeholder="SCS2202" maxlength="7" required>
          </div>

          <div class="form-group">
            <label class="payment-label" for="card-holder-name">Student Name <span class="required-star">*</span></label>
            <div class="errorSpace3"></div>
            <input value="<?= set_value('student-name') ?>" name="student-name" class="payment-input" type="text" id="student-name" placeholder="  Student Name" readonly>
          </div>


          <div class="form-group div-adjest-1">
            <label class="payment-label" for="payment-month">Payment Month <span class="required-star">*</span></label>
            <div class="errorSpace4"></div>
            <div class="div-adjest-3">
              <select id="month" class="select-month " name="month" required>
                <option disabled selected value=""> Select Month </option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="payment-label" for="payment value">Payment value</label>
            <input class="payment-input" id="amount" readonly>
          </div>
          <button class="paynow" id="payment-submission" type="button">Submit Payment</button>
          <button class="next-payment" id="next-payment" type="button">Next Payment</button>
        </form>
      </div>
    </div>
  </div>



  <div class="student-payment">
    <h2 class="table-title">Transaction history</h2>
    <table class="payment-table" id="payment-table">
      <thead>
        <tr>
          <th>Transaction ID</th>
          <th>Class ID</th>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Payment date</th>
          <th>Amount</th>
          <th>Payment method</th>
          <th>Print payment slip</th>
        </tr>
      </thead>
      <tbody id="payment-table-body">
        <?php foreach ($transactions as $transaction) : ?>
          <tr>
            <td><?= $transaction->PaymentID ?></td>
            <td><?= $transaction->courseID ?></td>
            <td><?= $transaction->studentID ?></td>
            <td><?= $transaction->studentName ?></td>
            <td><?= $transaction->payment_date ?></td>
            <td><?= $transaction->amount ?></td>
            <td><?= $transaction->method ?></td>
            <td><button class="print-btn" onclick="printPaymentSlip(this)" >Print</button></td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  </div>
  </div>
  </div>
  </div>
  </div>


  <?php $this->view("includes/manojge_footer_eka"); ?>

  <!-- <script src="salaryCal.js"></script> -->



  <!-- <script defer src="<?= ROOT ?>/assets/js/cash_payment_validation.js?v=<?php echo time(); ?>"></script> -->



</body>
<script defer src="<?= ROOT ?>/assets/js/popup-receptionist-payment.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/getMonthlyFee.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/getStudentName.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/nextPayment.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/preview-bank-payments.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/callBankPaymentData.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/approveBP.js?v=<?php echo time(); ?>"></script>
<script defer src="<?= ROOT ?>/assets/js/printRecipt.js?v=<?php echo time(); ?>"></script>




</html>