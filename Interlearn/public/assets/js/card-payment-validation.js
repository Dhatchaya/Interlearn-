const courseID = document.querySelector(".courseID");
const month = document.querySelector(".month");
const amount = document.querySelector(".amount");

const payment = document.querySelectorAll(".card-btn");


payment.eventListener("click", function() {
    console.log("clicked");
  var paymentDetails = JSON.stringify($haveToPaySet);
  // Display payment details in the popup
  document.getElementById("checkout-details").innerHTML = paymentDetails;
  // Show the popup
  document.getElementById("checkout-popup").style.display = "block";
});


// Show checkout popup
function showCheckoutPopup() {
  // Get payment details
}

// Hide checkout popup
function hideCheckoutPopup() {
  // Hide the popup
  document.getElementById("checkout-popup").style.display = "none";
}
