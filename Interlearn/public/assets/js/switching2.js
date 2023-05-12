
// let btn1 = document.querySelectorAll(".bank-btn-");
// let btn2 = document.querySelectorAll(".card-btn");

const btn1 = document.getElementById("addStaff-btn");

const hiddenDiv1 = document.getElementById("hiddenDiv-1");
const hiddenDiv2 = document.getElementById("hiddenDiv-2");
const closeBtn1 = document.getElementById("close-button-1");
const closeBtn2 = document.getElementById("close-button-2");

btn1.addEventListener("click", function() {
  hiddenDiv1.style.display = "flex";
});
closeBtn1.addEventListener("click", function() {
  hiddenDiv1.style.display = "none";
});
closeBtn2.addEventListener("click", function() {
  hiddenDiv2.style.display = "none";
});





