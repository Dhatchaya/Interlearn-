
// const studentId = document.getElementById('student-id');
// const studentName = document.getElementById('student-name');
// const CourseID = document.getElementById('couese-ID');
// const month = document.getElementById('month');
// const Amount = document.getElementById('couese-ID');





CourseID.addEventListener('onclick', function() {
    fetch('/Interlearn/public/receptionist/nextCashPayment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({CourseID3: CourseID.value, StudentID: studentId.value, month: month.value, Amount: Amount.value}),
    })
    .then(response => response.json())
    .then(response => {
        sendCashPamentData(response);
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}
)


function sendCashPamentData(data) {
    $PamentDetails = data;
}