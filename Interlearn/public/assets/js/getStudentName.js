
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const CourseID = document.getElementById('couese-ID');





CourseID.addEventListener('keyup', function() {
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
)




function getStudentNAme(data) {
    studentName.value = data[0]['first_name'] + " " + data[0]['last_name'];
}