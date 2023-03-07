const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const gender = document.getElementById('gender');
const address = document.getElementById('address');
const NIC = document.getElementById('NIC');
const mobileNum = document.getElementById('mobileNum');
const contractEndingDate = document.getElementById('ContractEndingDate');
const jobtype = document.getElementById('jobtype');
const epmImage = document.getElementById('epmImage');
const emailAddress = document.getElementById('emailAddress');
const password = document.getElementById('password');
const submitBtn = document.getElementById('submit-btn');

    const error1 = document.querySelector('#errorSpace1');
    const error2 = document.querySelector('#errorSpace2');
    const error3 = document.querySelector('#errorSpace3');
    const error4 = document.querySelector('#errorSpace4');
    const error5 = document.querySelector('#errorSpace5');
    const error6 = document.querySelector('#errorSpace6');
    const error7 = document.querySelector('#errorSpace7');
    const error8 = document.querySelector('#errorSpace8');
    const error9 = document.querySelector('#errorSpace9');
    const error10 = document.querySelector('#errorSpace10');

    
submitBtn.addEventListener('click', function(event) {
    event.preventDefault();
    console.log("button eka nm wada karanwa kolloooo");


    if(!firstName.value){
        error1.innerHTML = "First Name is required ";
    }
    if(!lastName.value ){
        error2.innerHTML = "Last Name is required";
    }
    if(!gender.value){
        error3.innerHTML = "Select gender please";
    }
    if(!address.value){
        error4.innerHTML = "Address is required";
    }
    if(!NIC.value){
        error5.innerHTML = "NIC is required";
    }
    if(!contractEndingDate.value){
        error6.innerHTML = "Contract Ending Date is required";
    }
    if(!jobtype.value){
        error7.innerHTML = "job type is required";
    }
    if(!epmImage.value){
        error8.innerHTML = "Staff Image is required";
    }
    if(!emailAddress.value){
        error9.innerHTML = "E-mail Address is required";
       
        
    }

   
    if(!password.value){
        error10.innerHTML = "Password is required"; if(password.length < 8){
            error10.innerHTML = "Password must be at least 8 characters";
        }
        if(!/[!@#$%^&*]/.test(password) || !/\d/.test(password)){
            error10.innerHTML = "E-mail is not valid";
        }
    }
    
    else{
    fetch('/Interlearn/public/manager/addStaff', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({NIC_no: NIC.value,first_name: firstName.value, last_name: lastName.value, email: emailAddress.value, mobileNum: mobileNum.value, role: jobtype.value, display_picture: epmImage.value, gender: gender.value, address: address.value, password: password.value, contractEndingDate: contractEndingDate.value}),
    })
    .then(response => response.json())
    .then(response => {
        console.log("All is righr");
    }).catch(error=>console.log(error));
    // console.log(studentId.value);
}


}
)