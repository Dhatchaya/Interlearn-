<!DOCTYPE html>
<html>

<head>
  <title>Buy cool new product</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/checkout.css ">

  <link rel="stylesheet" href="stripe.css">
  <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

  <div class="checkout-background">


    <div class="chekout-container">
      <div class="payment-form-body">
        <div class="group">
        <h2 class="label">Course</h2>
        <h3 class="value">Maths</h5>
        </div>
        
        <div class="group">
        <h2 class="label">Total Amount</h2>
        <h3 class="value">LKR 20.00</h5>
        </div>
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