
const studentId2 = document.getElementById('student-id');
const courseID = document.getElementById('couese-ID');
const Month = document.getElementById('month');
const Amount = document.getElementById('amount');
const sbmtBtn = document.getElementById('payment-submission');
const nxtBtn = document.getElementById('next-payment');



Month.addEventListener('change', function() {
    
    console.log("event listner works month is", Month.value);
        fetch('/Interlearn/public/receptionist/getMonthlyFee', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({CourseID: courseID.value, StudentID: studentId2.value}),
        })
        .then(response => response.json())
        .then(response => {
            console.log("response open is good");
            getAmount(response);
    
        }).catch(error=>console.log(error));
        // console.log(studentId.value);
    }
    )



function getAmount(data) {
    console.log(data);
    if(data[0]['monthlyFee'] == null){
        Amount.value = 'This student is not registered for this course'  ;
        sbmtBtn.disabled = true;
        nxtBtn.disabled = true;

        }
    Amount.value = data[0]['monthlyFee'] ;
    sbmtBtn.disabled = false;
    nxtBtn.disabled = false;
}



