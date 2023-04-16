const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const gender = document.getElementById('gender');
const address = document.getElementById('address');
const NIC = document.getElementById('NIC');
const mobileNum = document.getElementById('mobileNum');
const contractEndingDate = document.getElementById('ContractEnding');
const jobtype = document.getElementById('jobtype');
const epmImage = document.getElementById('epmImage');
const emailAddress = document.getElementById('emailAddress');
const password = document.getElementById('password');
const submitBtn = document.getElementById('submit-btn');
const submit = document.querySelector('.submit-button');
const showpw = document.querySelector('.show-pw');

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
    const error11 = document.querySelector('#errorSpace11');


    $isAllFilled = true;

    contractEndingDate.addEventListener("input", () => {

        const enteredDate = contractEndingDate.value;
        const currentDate = new Date().toISOString().slice(0, 10); 
        console.log(currentDate);
        if (enteredDate < currentDate) {
          errorSpace6.innerHTML = "Contract Ending Date cannot be in the past.";
          $isAllFilled = false;
        } else {
          errorSpace6.innerHTML = "";
        }
        console.log(enteredDate);
      });
    
submitBtn.addEventListener('click', async function(event) {
    event.preventDefault();
    console.log("button eka nm wada karanwa kolloooo");



    if(!firstName.value){
        error1.innerHTML = "First Name is required ";
        $isAllFilled = false;
    }
    firstName.addEventListener('input', function(event) {
        error1.innerHTML = "";
    });

    if(!lastName.value ){
        error2.innerHTML = "Last Name is required";
        $isAllFilled = false;
    }
    lastName.addEventListener('input', function(event) {
        error2.innerHTML = "";
    });

    if(!gender.value){
        error3.innerHTML = "Select gender please";
        $isAllFilled = false;
    }
    gender.addEventListener('input', function(event) {
        error3.innerHTML = "";
    });

    if(!address.value){
        error4.innerHTML = "Address is required";
        $isAllFilled = false;
    }
    address.addEventListener('input', function(event) {
        error4.innerHTML = "";
    });

    const numValue = NIC.value.substr(0, 9);
    if(isNaN(numValue)){
        error5.innerHTML = "NIC number is not valid";
        $isAllFilled = false;
    }

    else if(!NIC.value.length == 10 || !NIC.value.length == 12){
        error5.innerHTML = "NIC number is not valid";
        $isAllFilled = false;
    }
    else if(!NIC.value){
        error5.innerHTML = "NIC is required";
        $isAllFilled = false;
    }

    NIC.addEventListener('input', function(event) {
        error5.innerHTML = "";
    });
    if(isNaN(mobileNum.value)){
        error11.innerHTML = "Not a valid contact number";
        $isAllFilled = false;
    }
    else if(mobileNum.value.length < 10){
        error11.innerHTML = "Contact number must be 10 digits";
        if(!mobileNum.value){
            error11.innerHTML = "Contact is required";
        }
        $isAllFilled = false;
    }

    mobileNum.addEventListener('input', function(event) {
        error11.innerHTML = "";
    });

    
    if(contractEndingDate.value===""){
        errorSpace6.innerHTML = "Contract Ending Date is required";
        $isAllFilled = false;
        }



    if(!jobtype.value){
        error7.innerHTML = "job type is required";
        $isAllFilled = false;
    }
    jobtype.addEventListener('input', function(event) {
        error7.innerHTML = "";
    });
    if(!emailAddress.value){
        error9.innerHTML = "E-mail Address is required";
        $isAllFilled = false;
    }
    emailAddress.addEventListener('input', function(event) {
        error9.innerHTML = "";
    });

    
    password.addEventListener('input', function(event) {
        error10.innerHTML = "";
    });

    if(password.value.length < 8){
        error10.innerHTML = "Password must be at least 8 characters";

        if(!password.value){
            error10.innerHTML = "Password is required";
        }
        $isAllFilled = false;
     }


    //  if(!/[!@#+_)(""}{[<>,./?|-$%^&*]/.test(password.value) || !/\d/.test(password.value)){ 
    //     error10.innerHTML = "Password is not valid";
    //     $isAllFilled = false;
    //  }
  
    else{
        if($isAllFilled){
        console.log("Data tika nm passata yauw sudda.....!");
        const result = await fetch('/Interlearn/public/manager/addStaff', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                first_name: firstName.value, 
                last_name: lastName.value, 
                email: emailAddress.value, 
                mobile_no: mobileNum.value, 
                NIC_no: NIC.value,
                contractEndingDate: contractEndingDate.value,
                role: jobtype.value, 
                gender: gender.value, 
                Addressline1: address.value, 
                password: password.value,
            })
        })
        .then(response => response.text())
        .then(data =>{
            console.log(data);
            console.log(data.constructor.name);
        })
        .catch(error => console.log(error));
        
    
        console.log(result);
        
    hiddenDiv1.style.display = "none";
    }
}
    if($isAllFilled){
            firstName.value = "";
            lastName.value = "";
            gender.value = "";
            address.value = "";
            NIC.value = "";
            mobileNum.value = "";
            // contractEndingDate.value = "";
            jobtype.value = "";
            emailAddress.value = "";
            password.value = "";
        }




}
)



