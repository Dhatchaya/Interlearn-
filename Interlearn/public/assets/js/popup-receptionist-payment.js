const btn1 = document.getElementById("val-bank-btn");
const btn2 = document.getElementById("cash-btn");

const hiddenDiv1 = document.getElementById("hiddenDiv-1");
const hiddenDiv2 = document.getElementById("hiddenDiv-2");

const closeBtn1 = document.getElementById("close-button-1");
const closeBtn2 = document.getElementById("close-button-2");

btn1.addEventListener("click", function() {
  hiddenDiv1.style.display = "flex";
  document.body.style.overflow = 'hidden';

  const pendingItems = document.querySelectorAll('.each-payment');

  pendingItems.forEach(item => {
    const status = item.dataset.status; // get the status value from the data-status attribute
    if (status === '2') {
      item.style.backgroundColor = 'red'; // set background color to red
    }
  });
});
closeBtn1.addEventListener("click", function() {
  hiddenDiv1.style.display = "none";
  document.body.style.overflow = '';
});
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    hiddenDiv1.style.display = "none";
    document.body.style.overflow = '';
  }
});





btn2.addEventListener("click", function() {
  hiddenDiv2.style.display = "flex";
  document.body.style.overflow = 'hidden';
});
closeBtn2.addEventListener("click", function() {
  hiddenDiv2.style.display = "none";
  document.body.style.overflow = '';
});
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    hiddenDiv2.style.display = "none";
    document.body.style.overflow = '';
  }
});





