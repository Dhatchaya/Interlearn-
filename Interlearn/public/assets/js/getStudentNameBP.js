
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const courseID = document.getElementById('couese-ID');
const sbmtBtn1 = document.getElementById('payment-submission');
const error = document.querySelector('#errorSpace3');


studentId.addEventListener('keyup', function() {
    studentName.value ="";
})


courseID.addEventListener('keyup', function() {



    fetch('/Interlearn/public/receptionist/getStudentName', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ StudentID: studentId.value}),
    })
    .then(response => response.json())
    .then(response => {
        getStudentNAme(response);
        console.log(response);
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}
);

function getStudentNAme(data) {

    if(studentName.value == 0){
        studentName.value = ['Student ID is in correct']  ;
    }
    studentName.value = data[0]['first_name'] + " " + data[0]['last_name'];
    error.innerHTML = "";
}

