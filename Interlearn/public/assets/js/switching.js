const btns = document.querySelectorAll(".bank-btn");
const hiddenDiv1 = document.getElementById("hiddenDiv-1");
const closeBtn1 = document.getElementById("close-button-1");



function disablePaidPayments() {
  // Get all table rows
  const rows = document.querySelectorAll('table tbody tr');

  // Loop through rows
  for (let i = 0; i < rows.length; i++) {
    // Get payment status attribute
    const paymentStatus = rows[i].querySelector('.bank-btn').getAttribute('data-payment_status');

    // If payment status is 2, disable row and change background color
    if (paymentStatus == 2) {
      rows[i].classList.add('disabled');
      rows[i].querySelectorAll('td').forEach(td => td.classList.add('disabled'));
    }
    else if (paymentStatus == 3) {
      rows[i].classList.add('declined-tr');
      rows[i].querySelectorAll('td').forEach(td => td.classList.add('declined-td'));

      const tds = rows[i].querySelectorAll('td');
      const lastTd = tds[tds.length - 1];
      lastTd.innerHTML = ' Payment declined contact receptionist';

      // Append warning message to row
      rows[i].appendChild(warningTd);
    }
  }
}

// Call function when page loads
window.onload = disablePaidPayments;





document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    hiddenDiv1.style.display = "none";
    document.body.style.overflow = '';
  }
});

btns.forEach(function(btn) {
  btn.addEventListener("click", function() {
    hiddenDiv1.style.display = "flex";
  });
});
closeBtn1.addEventListener("click", function() {
  hiddenDiv1.style.display = "none";
});








// let btn1 = document.querySelectorAll(".bank-btn-");
// let btn2 = document.querySelectorAll(".card-btn");

// const btn1 = document.querySelector(".bank-btn");
// // const btn2 = document.getElementById("card-btn");

// const hiddenDiv1 = document.getElementById("hiddenDiv-1");
// // const hiddenDiv2 = document.getElementById("hiddenDiv-2");

// const closeBtn1 = document.getElementById("close-button-1");
// // const closeBtn2 = document.getElementById("close-button-2");


// btn1.addEventListener("click", function() {
//   hiddenDiv1.style.display = "flex";
// });
// closeBtn1.addEventListener("click", function() {
//   hiddenDiv1.style.display = "none";
// });



// btn2.addEventListener("click", function() {
//   hiddenDiv2.style.display = "flex";
// });
// closeBtn2.addEventListener("click", function() {
//   hiddenDiv2.style.display = "none";
// });





