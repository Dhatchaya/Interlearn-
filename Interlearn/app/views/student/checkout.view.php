<!DOCTYPE html>
<?php
// Retrieve the payment data from the URL parameter
if (isset($_GET['payment'])) {
  $payment = json_decode($_GET['payment']);
} else {
  // Handle the case where the payment data is not provided
  $payment = null;
}
?>

<html>

<head>
  <title>INTERLEARN-online payment</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/checkout.css ">

  <link rel="stylesheet" href="stripe.css">
  <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

  <div class="checkout-background">
    <div class="chekout-container">
      <div class="payment-form-body">
        <?php if ($payment) : ?>
          <div class="group">
            <h2 class="label">Course</h2>
            <h3 class="value"><?= $payment->courseID ?></h3>
          </div>
          <div class="group">
            <h2 class="label">Total Amount</h2>
            <h3 class="value"><?= $payment->amount ?></h3>
          </div>
        <?php else : ?>
          <div class="group">
            <h2 class="label">Error</h2>
            <h3 class="value">Payment data not found</h3>
          </div>
        <?php endif; ?>
        <form action="<?= ROOT ?>/student/cardPayment" method="POST">
          <button type="submit" class="submit-button " id="checkout-button">Checkout</button>
        </form>
      </div>
    </div>
  </div>

</body>


<script type="text/javascript">
  var stripe = Stripe("pk_test_51Mh80UBblwXUQTWevPoFDWAN4ihJsnOuyCXbDMnVCgzFHOeAu56RzbOG1nJmfkrkePJkdUZRRVuYHtm26Z3ovDmX00e3XuTENk");
  var checkoutButton = document.getElementById("checkout-button");

  checkoutButton.addEventListener("click", function() {
    fetch("http://localhost:8080/ROYALHOSPITAL/Patient/stripe/", { //define path
        method: "POST",
      })
      .then(function(response) {
        return response.json();
      })
      .then(function(session) {
        return stripe.redirectToCheckout({
          sessionId: session
        })
      })
  })
</script>

</html>