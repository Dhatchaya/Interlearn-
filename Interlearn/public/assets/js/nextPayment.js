const Last_payment = document.querySelector('.last-cash-payment');
const next_payment = document.getElementById('next-payment');
const submit_payment = document.getElementById('payment-submission');


const error1 = document.querySelector('.errorSpace1');
const error2 = document.querySelector('.errorSpace2');
const error3 = document.querySelector('.errorSpace4');

next_payment.addEventListener('click', function() {

    if(studentId.value == ''){
        error1.innerHTML = "Please insert a student ID";
        if(CourseID.value == ''){
            error2.innerHTML = "Please insert a course ID";
            if(Month.value == ''){
                error3.innerHTML = "Please insert a month";
            }
        }
    }

    else{
        fetch('/Interlearn/public/receptionist/nextCashPayment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({courseID: CourseID.value,studentName: studentName.value, studentID: studentId.value, month: Month.value, amount: Amount.value}),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            // Last_payment.value = data[0]['PaymentID']
            // Last_payment.innerHTML = "Last Payment ID: " + Last_payment.value;
        })
        .catch(error => console.log(error));
    }
    CourseID.value = "";
    studentId.value = "";
    studentName.value = "";
    Month.value = "";
    Amount.value = "";
});


submit_payment.addEventListener('click', function(e) {
console.log(studentId.value);
e.preventDefault();
    if(studentId.value == ''){
        error1.innerHTML = "Please insert a student ID";
        return;
    }
        if(CourseID.value == ''){
            error2.innerHTML = "Please insert a course ID";
            return;
        }
            if(Month.value == ''){
                error3.innerHTML = "Please select a month";
                return;
            }


    else{
        let hi = "hello";
        console.log(JSON.stringify({courseID: CourseID.value,studentName: studentName.value, studentID: studentId.value, month: Month.value, amount: Amount.value}));
        fetch('/Interlearn/public/receptionist/nextCashPayment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body:JSON.stringify({courseID: CourseID.value,studentName: studentName.value, studentID: studentId.value, month: Month.value, amount: Amount.value}),
        })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            CourseID.value = "";
            studentId.value = "";
            studentName.value = "";
            Month.value = "";
            Amount.value = "";
            // Last_payment.value = data[0]['PaymentID']
        })
        .catch(error => console.log(error));
    }


    setTimeout(() => hiddenDiv2.style.display = "none", 500);
});


