const DP = document.querySelector('#dp');
const uploadDP = document.querySelector('.empImage');
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



saveBtn.addEventListener('click', () => {
    console.log('save');
    const data = {
        dp: dp.value.trim() !== '' ? dp.value : null,
        first_name: fName.value.trim() !== '' ? fName.value : null,
        last_name: lName.value.trim() !== '' ? lName.value : null, 
        email: email.value.trim() !== '' ? email.value : null, 
        Addressline1: address.value.trim() !== '' ? address.value : null, 
        mobile_no: mobileNo.value.trim() !== '' ? mobileNo.value : null, 
        emp_status: empState.value.trim() !== '' ? empState.value : null
    };
    console.log(JSON.stringify(data));
    const filteredData = Object.keys(data).reduce((acc, key) => {
        if (data[key] !== '') {
            acc[key] = data[key];
        }
        return acc;
    }, {});

    console.log(JSON.stringify(filteredData));
    if (Object.keys(filteredData).length === 0) {
        console.log('No data to save');
        return;
    }
    fetch('/Interlearn/public/receptionist/editUser', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(filteredData),
    })
    // .then(response => response.json())
    // .then(response => {
    //     if (response.status === 'success') {
    //         console.log('Update successful');

    //         dpBtn.style.display = 'flex';
    //         uploadDP.style.display = 'none';
    //         fNameBtn.style.display = 'flex';
    //         fName.setAttribute('readonly','readonly');
    //         console.log(fName.value);
    //         fName.value = '';
    //         lNameBtn.style.display = 'flex';
    //         lName.setAttribute('readonly','readonly');
    //         lName.value = '';
    //         emailBtn.style.display = 'flex';
    //         email.setAttribute('readonly','readonly');
    //         email.value = '';
    //         addressBtn.style.display = 'flex';
    //         address.setAttribute('readonly','readonly');
    //         address.value = '';
    //         mobileNoBtn.style.display = 'flex';
    //         mobileNo.setAttribute('readonly','readonly');
    //         mobileNo.value = '';

    //     } else {
    //         console.error('Update failed');
    //     }
    // })
    // .catch(error => console.log(error));

    .then(response => response.text())
.then(jsonString => {
    console.log('Response data:', jsonString);
    const data = JSON.parse(jsonString);
    if (data.status === 'success') {
        console.log('Update successful');
    } else {
        console.error('Update failed');
    }
})
.catch(error => console.log(error));
    
    
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





