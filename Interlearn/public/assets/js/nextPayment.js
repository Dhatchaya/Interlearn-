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
    .then(response => response.json())
    .then(response => {
        console.log("asdf");
        Last_payment.value = data[0]['PaymentID']
        Last_payment.innerHTML = "Last Payment ID: " + Last_payment.value;
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}
CourseID.value = "";
studentId.value = "";
studentName.value = "";
Month.value = "";
Amount.value = "";

}
)

submit_payment.addEventListener('click', function() {

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
    .then(response => response.json())
    .then(response => {
        console.log("asdf");
        Last_payment.value = data[0]['PaymentID']
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
    
    setTimeout(hiddenDiv2.style.display = "none", 500);
}
CourseID.value = "";
studentId.value = "";
studentName.value = "";
Month.value = "";
Amount.value = "";



}
)

