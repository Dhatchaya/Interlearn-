
const CourseID2 = document.getElementById('couese-ID');
const Month = document.getElementById('month');
const Amount = document.getElementById('amount');


Month.addEventListener('change', function() {
    
console.log("event listner works");
    fetch('/Interlearn/public/receptionist/getMonthlyFee', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({CourseID2: CourseID.value}),
    })
    .then(response => response.json())
    .then(response => {
        console.log("response open is goood");
        getAmmount(response);

    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}
)


function getAmmount(data) {
    console.log(data);
    Amount.value = data[0]['monthly_fee'] ;
    console.log(Amount.value);
}