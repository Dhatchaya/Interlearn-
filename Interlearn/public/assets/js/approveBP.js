

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
      NameOnSlip: NameOnSlip.innerHTML,
      StudentID: studentID.innerHTML,
      month: month.innerHTML,
      CourseID: CourseName.innerHTML,
      BPAmount: BPAmount.innerHTML,
      BPDate: BPDate.innerHTML,
      BankName: BankName.innerHTML,
      BranchName: BranchName.innerHTML,
      ChequeNumber: ChequeNumber.innerHTML,
      BankPaymentID: bankpaymentID.value
    }),
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
    let ApprovedDiv = document.getElementById(bankPaymentID);
    ApprovedDiv.style.backgroundColor = '#98D8AA';
    this.disabled = true;
    approveBtn.disabled = true;


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
    }),
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
    let declinedDiv = document.getElementById(bankPaymentID);
    declinedDiv.style.backgroundColor = '#D21312';
    declinedDiv.style.color = 'white';
    this.disabled = true;
    approveBtn.disabled = true;
  })
  .catch(error => console.log(error));
});