
const courseID = document.getElementById('couese-ID');
const Month = document.getElementById('month');
const Amount = document.getElementById('amount');


Month.addEventListener('change', function() {
    
    console.log("event listner works month is", Month.value);
        fetch('/Interlearn/public/receptionist/getMonthlyFee', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({CourseID: courseID.value}),
        })
        .then(response => response.json())
        .then(response => {
            console.log("response open is good");
            getAmmount(response);
    
        }).catch(error=>console.log(error));
        // console.log(studentId.value);
    }
    )



function getAmmount(data) {
    console.log(data);
    if(Amount.value == 0){
        Amount.value = ['Chech the course ID']  ;
    }
    Amount.value = data[0]['monthly_fee'] ;
}



