

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
      Address: Address.innerHTML,
      CourseID: CourseName.innerHTML,
      NIC: NIC.innerHTML,
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