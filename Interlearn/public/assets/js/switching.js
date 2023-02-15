const btn = document.getElementById("btn");
const hiddenDiv = document.getElementById("hiddenDiv");
const paynow = document.getElementById("payment-submission");
const closeBtn = document.getElementById("close-button");
  

btn.addEventListener("click", function() {
  hiddenDiv.style.display = "flex";
});


closeBtn.addEventListener("click", function() {
  hiddenDiv.style.display = "none";
});
