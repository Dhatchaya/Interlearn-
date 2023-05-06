const DP = document.querySelector('#dp');
const uploadDP = document.querySelector('.empImage');
const displayPicture = document.querySelector('#display-picture');
const fName = document.querySelector('#fname');
const lName = document.querySelector('#lname');
const email = document.querySelector('#email');
const address = document.querySelector('#address');
const mobileNo = document.querySelector('#mobile-no');
const position = document.querySelector('#role');
const empID = document.querySelector('#emp-no');
const joinedDate = document.querySelector('#joined-date');
const empState = document.querySelector('#emp-status');

const dpBtn = document.querySelector('#change-dp');
const fNameBtn = document.querySelector('#change-fname');
const lNameBtn = document.querySelector('#change-lname');
const emailBtn = document.querySelector('#change-email');
const addressBtn = document.querySelector('#change-address');
const mobileNoBtn = document.querySelector ('#change-mobile-no');
const dp = document.querySelector('#change-dp');
const saveBtn = document.querySelector('#save-btn');
const cancelBtn = document.querySelector('#cancel-btn');
const oldPW = document.getElementById('old-pw');
const newPW = document.getElementById('new-pw');
const confirmPW = document.getElementById('confirm-pw');
// const error1 = document.querySelector('#errorSpace1');
// const error2 = document.querySelector('#errorSpace2');
// const error3 = document.querySelector('#errorSpace3');
// const error4 = document.querySelector('#errorSpace4');
// const error5 = document.querySelector('#errorSpace5');
// const error6 = document.querySelector('#errorSpace6');
// const error7 = document.querySelector('#errorSpace7');
const error8 = document.querySelector('#errorSpace8');
const error9 = document.querySelector('#errorSpace9');
const error10 = document.querySelector('#errorSpace10');
const error11 = document.querySelector('#errorSpace11');

dpBtn.addEventListener('click', () => {
    dpBtn.style.display = 'none';
    uploadDP.style.display = 'flex';
    dp.focus();
});

fNameBtn.addEventListener('click', () => {
    fNameBtn.style.display = 'none';
    fName.removeAttribute  ('readonly');
    fName.focus();
});

lNameBtn.addEventListener('click', () => {
    lNameBtn.style.display = 'none';
    lName.removeAttribute  ('readonly');
    lName.focus();
});

// emailBtn.addEventListener('click', () => {
//     emailBtn.style.display = 'none';
//     email.removeAttribute  ('readonly');
//     email.focus();
// });
mobileNoBtn.addEventListener('click', () => {
    mobileNoBtn.style.display = 'none';
    mobileNo.removeAttribute  ('readonly');
    mobileNo.focus();
});

addressBtn.addEventListener('click', () => {
    addressBtn.style.display = 'none';
    address.removeAttribute  ('readonly');
    address.focus();
});



// const formData = new FormData();

// dpBtn.addEventListener('change', handleFileSelect, false); 

// function handleFileSelect(event) {
//     const file = uploadDP.files[0];
//     const formData = new FormData();
//     formData.append('uploadDP', file);
//     // add other form data
//     console.log('key value pare added to the from data');
// }



 saveBtn.addEventListener('click', (e) => {
    e.preventDefault();
    console.log(uploadDP.files);
     $isAllFilled = true;
    const data = {
        first_name: fName.value.trim() !== '' ? fName.value : null,
        last_name: lName.value.trim() !== '' ? lName.value : null,
        email: email.value.trim() !== '' ? email.value : null,
        Addressline1: address.value.trim() !== '' ? address.value : null,
        mobile_no: mobileNo.value.trim() !== '' ? mobileNo.value : null,
        emp_status: empState.value.trim() !== '' ? empState.value : null,
        curr_pass: oldPW.value.trim() !== '' ? oldPW.value : null,
        new_pass: newPW.value.trim() !== '' ? newPW.value : null,
        password: confirmPW.value.trim() !== '' ? confirmPW.value : null,

    };


     if(mobileNo.value!==""&&isNaN(mobileNo.value)){
         error11.innerHTML = "Not a valid contact number";
         $isAllFilled = false;
     }
     else if(mobileNo.value!==""&&mobileNo.value.length < 10){
         error11.innerHTML = "Contact number must be 10 digits";

         $isAllFilled = false;
     }

     mobileNo.addEventListener('input', function(event) {
         error11.innerHTML = "";
     });




     newPW.addEventListener('input', function(event) {
         error9.innerHTML = "";
     });

     if(newPW.value!==""&&newPW.value.length < 8){
         error9.innerHTML = "Password must be at least 8 characters";

         $isAllFilled = false;
     }
    if(confirmPW.value!==""){
        if(confirmPW.value.length < 8){
            error8.innerHTML = "Password must be at least 8 characters";

            $isAllFilled = false;
        }
    }
     confirmPW.addEventListener('input', function(event) {
         error8.innerHTML = "";
     });





     if(oldPW.value === "" && newPW.value === "" && confirmPW.value === ""){

         return 0;
     }

     else if(oldPW.value !== "" && newPW.value === "" && confirmPW.value === ""){
         console.log("here4");
         newPW.placeholder= 'Please enter a new password';
         confirmPW.placeholder= 'Please confirm your new password';
         $isAllFilled = false;
     }
     else if(oldPW.value === "" && newPW.value !== "" && confirmPW.value === ""){
         oldPW.placeholder= 'Please enter your old password';
         confirmPW.placeholder= 'Please confirm your new password';
         $isAllFilled = false;
     }
     else if(oldPW.value === "" && newPW.value === "" && confirmPW.value !== ""){
         oldPW.placeholder= 'Please enter your old password';
         newPW.placeholder= 'Please enter a new password';
         $isAllFilled = false;
     }
     else if(oldPW.value !== "" && newPW.value !== "" && confirmPW.value === ""){
         confirmPW.placeholder= 'Please confirm your new password';
         $isAllFilled = false;
     }
     else if(oldPW.value !== "" && newPW.value === "" && confirmPW.value !== ""){
         console.log("here1");
         newPW.placeholder= 'Please enter a new password';
         $isAllFilled = false;
     }
     else if(oldPW.value === "" && newPW.value !== "" && confirmPW.value !== ""){
         console.log("here");
         oldPW.placeholder= 'Please enter your old password';
         $isAllFilled = false;
     }

     else if(oldPW.value !== "" && newPW.value !== "" && confirmPW.value !== ""){
       if(newPW.value !== confirmPW.value){
           error9.innerHTML = "Passwords do not match";
           error8.innerHTML = "Passwords do not match";
           $isAllFilled = false;
       }
     }
     else {
         if ($isAllFilled) {
             console.log(JSON.stringify(data));
             const filteredData = Object.keys(data).reduce((acc, key) => {
                 if (data[key] !== '') {
                     acc[key] = data[key];
                 }
                 return acc;
             }, {});


             const formData = new FormData();
             if (uploadDP.files.length > 0) {
                 formData.append('display_picture', uploadDP.files[0]);
                 console.log('uploading level 2');
             }

             for (let key in filteredData) {
                 console.log(filteredData[key])
                 formData.append(key, filteredData[key]);
             }

             console.log(JSON.stringify(filteredData));
             if (Object.keys(filteredData).length === 0) {
                 console.log('No data to save');
                 return;
             }
             fetch('/Interlearn/public/receptionist/editUser', {
                 method: 'POST',

                 body: formData
             })
                 .then(response => response.json())
                 .then(data => {
                     console.log('Response data:', data);
                     if (data.status === 'success') {
                         console.log('Update successful');

                         dpBtn.style.display = 'flex';
                         uploadDP.style.display = 'none';
                         fNameBtn.style.display = 'flex';
                         fName.setAttribute('readonly', 'readonly');
                         console.log(fName.value);
                         fName.value = '';
                         lNameBtn.style.display = 'flex';
                         lName.setAttribute('readonly', 'readonly');
                         lName.value = '';
                         emailBtn.style.display = 'flex';
                         email.setAttribute('readonly', 'readonly');
                         email.value = '';
                         addressBtn.style.display = 'flex';
                         address.setAttribute('readonly', 'readonly');
                         address.value = '';
                         mobileNoBtn.style.display = 'flex';
                         mobileNo.setAttribute('readonly', 'readonly');
                         mobileNo.value = '';
                     } else {
                         console.error('Update failed');
                     }
                 })
                 .catch(error => console.log(error));

         }
     }

});



cancelBtn.addEventListener('click', () => {
    // location.reload();
    console.log('cancel');
    dpBtn.style.display = 'flex';
    uploadDP.style.display = 'none';
    fNameBtn.style.display = 'flex';
    fName.setAttribute('readonly','readonly');
    console.log(fName.value);
    fName.value = '';
    lNameBtn.style.display = 'flex';
    lName.setAttribute('readonly','readonly');
    lName.value = '';
    emailBtn.style.display = 'flex';
    email.setAttribute('readonly','readonly');
    email.value = '';
    addressBtn.style.display = 'flex';
    address.setAttribute('readonly','readonly');
    address.value = '';
    mobileNoBtn.style.display = 'flex';
    mobileNo.setAttribute('readonly','readonly');
    mobileNo.value = '';
});





