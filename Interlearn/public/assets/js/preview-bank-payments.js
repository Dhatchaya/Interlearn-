// Get all the payment divs
const paymentDivs = document.querySelectorAll('.each-payment');

const NameOnSlip = document.querySelector('#preview-name-on-slip');
const Address = document.querySelector('#preview-address');
const CourseName = document.querySelector('#preview-course-name');
const NIC = document.querySelector('#preview-nic');
const BPAmount = document.querySelector('#preview-amount');
const BPDate = document.querySelector('#preview-payment-day');
const BankName = document.querySelector('#preview-bank');
const BranchName = document.querySelector('#preview-branch');
const ChequeNumber = document.querySelector('#preview-cheque-no');

// Add click event listener to each payment div
paymentDivs.forEach(paymentDiv => {
  paymentDiv.addEventListener('click', function() {
    // Get the value of BankPaymentID
    const bankPaymentID = this.id;
    console.log(bankPaymentID);
    
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
    .then(data => {
      console.log(data); // log the response from the server
      
      NameOnSlip.innerHTML = data[0].NameOnSlip; 
      Address.innerHTML = data[0].Address;
      CourseName.innerHTML = data[0].CourseID;
      NIC.innerHTML = data[0].PayerNIC ;
      BPAmount.innerHTML = data[0].monthlyFee;
      BPDate.innerHTML = data[0].PaymentDate;
      BankName.innerHTML = data[0].Bank;
      BranchName.innerHTML = data[0].Branch;
      if(data[0].ChequeNo == 0){
        ChequeNumber.innerHTML = "N/A";
      }else{
        ChequeNumber.innerHTML = data[0].ChequeNumber;
      }

    })
    .catch(error => {
      console.error("Error:", error);
    });
  });
});
