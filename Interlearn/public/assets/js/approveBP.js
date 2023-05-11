

const approveBtn = document.getElementById('approve');
const declineBtn = document.getElementById('decline');

approveBtn.addEventListener('click', function() {
  fetch('/Interlearn/public/receptionist/approveBP', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      NameOnSlip: NameOnSlip.innerHTML,
      StudentID: StudentID.innerHTML,
      Address: Address.innerHTML,
      CourseID: CourseName.innerHTML,
      NIC: NIC.innerHTML,
      BPAmount: BPAmount.innerHTML,
      BPDate: BPDate.innerHTML,
      BankName: BankName.innerHTML,
      BranchName: BranchName.innerHTML,
      ChequeNumber: ChequeNumber.innerHTML
    }),
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
  })
  .catch(error => console.log(error));
});
