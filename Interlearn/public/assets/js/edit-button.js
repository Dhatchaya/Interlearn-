const DP = document.querySelector('#dp');
const uploadDP = document.querySelector('.empImage');
const fName = document.querySelector('#fname');
const lName = document.querySelector('#lname');
const email = document.querySelector('#email');
const address = document.querySelector('#mobile-no');
const mobileNo = document.querySelector('#address');

const dpBtn = document.querySelector('#change-dp');
const fNameBtn = document.querySelector('#change-fname');
const lNameBtn = document.querySelector('#change-lname');
const emailBtn = document.querySelector('#change-email');
const addressBtn = document.querySelector('#change-address');
const mobileNoBtn = document.getElementById= 'change-monile-no';
const dp = document.querySelector('#change-dp');
const saveBtn = document.querySelector('#save-btn');
const cancelBtn = document.querySelector('#cancel-btn');



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

emailBtn.addEventListener('click', () => {
    emailBtn.style.display = 'none';
    email.removeAttribute  ('readonly');
    email.focus();
});

addressBtn.addEventListener('click', () => {
    addressBtn.style.display = 'none';
    address.removeAttribute  ('readonly');
    address.focus();
});
console.log('mobileNoBtn');



saveBtn.addEventListener('click', () => {
  fetch('/Interlearn/public/receptionist/editUser', {
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





