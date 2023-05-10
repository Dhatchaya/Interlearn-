
const studentId2 = document.getElementById('student-id');
const courseID = document.getElementById('couese-ID');
const Month = document.getElementById('month');
const Amount = document.getElementById('amount');
const sbmtBtn = document.getElementById('payment-submission');
const nxtBtn = document.getElementById('next-payment');

sbmtBtn.disabled = true;
nxtBtn.disabled = true;


Month.addEventListener('change', function() {
    
    console.log("event listner works month is", Month.value);
        fetch('/Interlearn/public/receptionist/getMonthlyFee', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({CourseID: courseID.value, StudentID: studentId2.value, Month: Month.value}),
        })
        .then(response => response.json())
        .then(response => {
            console.log("response comes");
            getAmount(response);
            // console.log(response);

        }).catch(error=>console.log(error));
        // console.log(studentId.value);
    }
    )


    function getAmount(data) {
        console.log(data);
        if (data[0]['course_id'] == 'noCourse') {
            console.log('noCourse');
            // courseID.value = '';
            courseID.value = 'check the course ID';
            Amount.value = ' ';
            sbmtBtn.disabled = true;
            nxtBtn.disabled = true;
        } else if (data[0]['course_id'] === 'notRegistered') {
            console.log('notRegistered');
            Amount.value = 'Student is not registered for this course';
            sbmtBtn.disabled = true;
            nxtBtn.disabled = true;
        } else if (data[0]['course_id'] === 'alreadyPaid') {
            console.log('notRegistered');
            Amount.value = 'Already paid for this month';
            sbmtBtn.disabled = true;
            nxtBtn.disabled = true;
        }else {
            console.log('default');
            Amount.value = data[0].monthlyFee;
            sbmtBtn.disabled = false;
            nxtBtn.disabled = false;
        }
    }




