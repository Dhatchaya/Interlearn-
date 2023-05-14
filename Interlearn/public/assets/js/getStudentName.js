
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const CourseID = document.getElementById('couese-ID');
const sbmtBtn1 = document.getElementById('payment-submission');
const nxtBtn1 = document.getElementById('next-payment');


sbmtBtn1.disabled = true;
nxtBtn1.disabled = true;

studentId.addEventListener('keyup', function() {
    studentName.style.color = 'black'  ;
    Amount.value ="";
    CourseID.value ="";
    studentName.value ="";
    Amount.style.color = 'black';
})

courseID.addEventListener('click', function() {
    
    studentName.style.color = 'black'  ;
    CourseID.value = '';
    CourseID.style.color = 'black';
});


CourseID.addEventListener('keyup', function() {
    studentName.style.color = 'black'  ;
    courseID.style.color = 'black';
    Amount.style.color = 'black';


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
    if(data[0]['student_id'] === 'noStudent'){
        studentName.value = ['Student ID is in correct']  ;
        studentName.style.color = 'red'  ;
        sbmtBtn1.disabled = true;
        nxtBtn1.disabled = true;
    }
    else{
        studentName.value = data[0]['first_name'] + " " + data[0]['last_name'];
        sbmtBtn1.disabled = false;
        nxtBtn1.disabled = false;
    }

}

