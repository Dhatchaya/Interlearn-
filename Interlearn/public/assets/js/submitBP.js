const studentId = document.getElementById('student-id');
const StudentName = document.getElementById('student-name');
const CourseID = document.getElementById('couese-ID');
const amount = document.getElementById('amount');
const paidDate = document.getElementById('paidDate');
const Bank = document.getElementById('bank');
const Branch = document.getElementById('branch');
const chequeNo = document.getElementById('Cheque-No');
const slipPDF = document.getElementById('file-upload');

const submitBtn = document.getElementById('payment-submission');

const error1 = document.querySelector('#errorSpace1');
const error2 = document.querySelector('#errorSpace2');
const error3 = document.querySelector('#errorSpace3');
const error6 = document.querySelector('#errorSpace6');
const error7 = document.querySelector('#errorSpace7');
const error8 = document.querySelector('#errorSpace8');
const error9 = document.querySelector('#errorSpace9');
const error10 = document.querySelector('#errorSpace10');
const error11 = document.querySelector('#errorSpace11');

const bankBtns = document.querySelectorAll('.bank-btn');

let selectedCourseID, selectedMonth, selectedAmount, selectedPaymentID;

bankBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    selectedCourseID = btn.getAttribute('data-course-id');
    selectedMonth = btn.getAttribute('data-month');
    selectedAmount = btn.getAttribute('data-amount');
    selectedPaymentID = btn.getAttribute('data-PaymentID');

    // You can use these values in your JavaScript code here
    CourseID.setAttribute('value', selectedCourseID);
    amount.setAttribute('value', selectedAmount);
  });
});





StudentName.addEventListener('keyup', function() {
    error3.innerHTML = "";
});

CourseID.addEventListener('keyup', function() {
    error2.innerHTML = "";
});

amount.addEventListener('keyup', function() {
    error7.innerHTML = "";
console.log(month.value);
});

Bank.addEventListener('keyup', function() {
    error8.innerHTML = "";
});

slipPDF.addEventListener('change', function() {
    error10.innerHTML = "";
});

chequeNo.addEventListener('keyup', function() {
    error11.innerHTML = "";
});

paidDate.addEventListener('change', function() {
    error6.innerHTML = "";
      
});





console.log(studentId.value);

submitBtn.addEventListener('click', async (e)=> {
    
    e.preventDefault();

    console.log("button clicked");

const formData = new FormData();
let isAllFilled = true;
    
    if(!studentId.value){
        error1.innerHTML = "Student-ID required";
        isAllFilled = false;
    } else {
        formData.append('studentId', studentId.value);
        error1.innerHTML = "";
    }
    if(!CourseID.value){
        error2.innerHTML = "Course ID required";
        isAllFilled = false;
    } else {
        error3.innerHTML = "";
    }

    if(!StudentName.value){
        error3.innerHTML = "Name required";
        isAllFilled = false;
    } else {
        error2.innerHTML = "";
    }

    

    if(!amount.value){
        error7.innerHTML = "Paid amount is required";
        isAllFilled = false;
    } else {
        error7.innerHTML = "";
    }

    if(!Bank.value){
        error8.innerHTML = "Bank is required";
        isAllFilled = false;
    } else {
        error8.innerHTML = "";
    }

    if(!Branch.value){
        error9.innerHTML = "Branch is required";
        isAllFilled = false;
    } else {
        error9.innerHTML = "";
    }

    if(!slipPDF.value){
        error10.innerHTML = "Payment slip is required";
        isAllFilled = false;
    } else {
        error10.innerHTML = "";
    }

    if(chequeNo.value && chequeNo.value.length !== 24){
        error11.innerHTML = "Cheque number is not valid";
        isAllFilled = false;
    } else {
        error11.innerHTML = "";
    }

    if (!paidDate.value) {
        error6.innerHTML = "Paid Date is required";
        isAllFilled = false;
    } else {
      
    const currentDate = new Date();
    const paymentDate = new Date(paidDate.value);
        if (paymentDate > currentDate) {
            error6.innerHTML = "Paid Date cannot be in the future.";
            isAllFilled = false;
        } else if (currentDate.getMonth() - paymentDate.getMonth() > 3 || currentDate.getFullYear() > paymentDate.getFullYear()) {
            error6.innerHTML = "Not a valid paid date.";
            isAllFilled = false;
        } else {
            error6.innerHTML = "";
        }
    }
      
    formData.append('StudentId', studentId.value);
    formData.append('NameOnSlip', StudentName.value);
    formData.append('CourseID', CourseID.value);
    formData.append('monthlyFee', amount.value);
    formData.append('Bank', Bank.value);
    formData.append('slipPDF', slipPDF.files[0]);
    formData.append('ChequeNo', chequeNo.value);
    formData.append('PaymentDate', paidDate.value);
    formData.append('Branch', Branch.value);
    formData.append('month', selectedMonth);
    formData.append('PaymentID', selectedPaymentID );

    console.log("methanata wenakan wada lokka");



    if(isAllFilled){
        console.log("Data tika nm passata yauw sudda.....!");
        const result = await fetch('/Interlearn/public/student/submitBP', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data =>{
            console.log(data);
            console.log(data.constructor.name);
        })
        .catch(error => console.log(error));
        
    
        console.log(result);
        
        hiddenDiv1.style.display = "none";
    }

    // if(isAllFilled){
    //     StudentName.value = "";
    //     studentId.value = "";
    //     CourseID.value = "";
    //     amount.value = "";
    //     Bank.value = "";
    //     Branch.value = "";
    //     chequeNo.value = "";
    //     paidDate.value = "";
    //     slipPDF.value = "";
    // }
});
