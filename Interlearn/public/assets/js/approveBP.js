

const approveBtn = document.getElementById('approve');
const declineBtn = document.getElementById('decline');
let bankPaymentID = null;

paymentDivs.forEach(paymentDiv => {
  paymentDiv.addEventListener('click', function() {
  
     bankPaymentID =bankPaymentID = this.id;
    
  });
approveBtn.addEventListener('click', function() {
  fetch('/Interlearn/public/receptionist/approveBP', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      BankPaymentID: bankPaymentID,
      PaymentID: PaymentID.innerHTML,
    }),
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
    let ApprovedDiv = document.getElementById(bankPaymentID);
    ApprovedDiv.style.backgroundColor = '#98D8AA';
    ApprovedDiv.style.color = 'black';
    // this.disabled = true;


  })
  .catch(error => console.log(error));
});
});


declineBtn.addEventListener('click', function() {
  fetch('/Interlearn/public/receptionist/declineBP', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      BankPaymentID: bankPaymentID,
      PaymentID: PaymentID.innerHTML,
    }),
  })
  .then(response => response.text())
  .then(data => {
    let declinedDiv = document.getElementById(bankPaymentID);
    declinedDiv.style.backgroundColor = '#D21312';
    declinedDiv.style.color = 'white';
    // declinedDiv.approveBtn.disabled = true;
  })
  .catch(error => console.log(error));
});