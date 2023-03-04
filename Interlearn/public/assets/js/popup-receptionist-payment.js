
const btn3 = document.getElementById("cash-btn");
const btn4 = document.getElementById("validate-btn-1");

const hiddenDiv3 = document.getElementById("hiddenDiv-3");
const hiddenDiv4 = document.getElementById("hiddenDiv-4");


const closeBtn3 = document.getElementById("close-button-3");
const closeBtn4 = document.getElementById("close-button-4");

btn3.addEventListener("click", function() {
    hiddenDiv3.style.display = "flex";
  });
  closeBtn3.addEventListener("click", function() {
    hiddenDiv3.style.display = "none";
  });
  
  
  btn4.addEventListener("click", function() {
    hiddenDiv4.style.display = "flex";
  });
  closeBtn4.addEventListener("click", function() {
    hiddenDiv4.style.display = "none";
  });
  