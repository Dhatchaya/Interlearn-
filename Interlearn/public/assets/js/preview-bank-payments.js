// Get all the payment divs
const paymentDivs = document.querySelectorAll('.each-payment');
const studentID = document.querySelector('#preview-StudentID');
const NameOnSlip = document.querySelector('#preview-name-on-slip');
const month = document.querySelector('#preview-month');
const CourseName = document.querySelector('#preview-course-name');
const BPAmount = document.querySelector('#preview-amount');
const BPDate = document.querySelector('#preview-payment-day');
const BankName = document.querySelector('#preview-bank');
const BranchName = document.querySelector('#preview-branch');
const ChequeNumber = document.querySelector('#preview-cheque-no');
const bankpaymentID = document.querySelector('#bankpaymentID');
const PaymentID = document.querySelector('#PaymentID');
const slipimage = document.querySelector('#slipimage');
slipimage.style.display="none";
// Add click event listener to each payment div
paymentDivs.forEach(paymentDiv => {
  paymentDiv.addEventListener('click', function() {
    // Get the value of BankPaymentID
    const bankPaymentID = this.id;

    fetch('/Interlearn/public/receptionist/callEachBPdata', {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ bankPaymentID: bankPaymentID }) // modify to send data as an object with property "bankPaymentID"
    })
    .then(response => {
      if (!response.ok) {
        throw new Error(response.statusText);
      }
      return response.json(); // modify to parse the response as JSON
    })
    .then(data => { // log the response from the server
      slipimage.style.display="block";
      NameOnSlip.innerHTML = data[0].NameOnSlip;
      month.innerHTML = data[0].month;
      CourseName.innerHTML = data[0].CourseID;
      BPAmount.innerHTML = data[0].monthlyFee;
      BPDate.innerHTML = data[0].PaymentDate;
      BankName.innerHTML = data[0].Bank;
      BranchName.innerHTML = data[0].Branch;
      studentID.innerHTML=data[0].StudentID;
      bankpaymentID.innerHTML = data[0].BankPaymentID;
      PaymentID.innerHTML = data[0].PaymentID;
      slipimage.setAttribute("href","http://localhost/Interlearn/public/uploads/images/"+data[0].SlipImage);
      console.log(data);
      if(data[0].ChequeNo == 0){
        ChequeNumber.innerHTML = "N/A";
      }else{
        ChequeNumber.innerHTML = data[0].ChequeNo;
      }

    })
    .catch(error => {
      console.error("Error:", error);
    });
  });
});
