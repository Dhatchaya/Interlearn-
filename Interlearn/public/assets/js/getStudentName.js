
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const CourseID = document.getElementById('couese-ID');
const sbmtBtn1 = document.getElementById('payment-submission');
const nxtBtn1 = document.getElementById('next-payment');


sbmtBtn1.disabled = true;
nxtBtn1.disabled = true;

studentId.addEventListener('keyup', function() {
    Amount.value ="";
    CourseID.value ="";
    studentName.value ="";
})


CourseID.addEventListener('keyup', function() {


    Amount.value ="";
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
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}
);

function getStudentNAme(data) {
    if(studentName.value == 0){
        studentName.value = ['Student ID is in correct']  ;
        sbmtBtn1.disabled = true;
        nxtBtn1.disabled = true;
    }
    studentName.value = data[0]['first_name'] + " " + data[0]['last_name'];
    sbmtBtn1.disabled = false;
    nxtBtn1.disabled = false;
}

