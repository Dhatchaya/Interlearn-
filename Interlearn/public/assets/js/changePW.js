const oldPW = document.getElementById('old-pw');
const newPW = document.getElementById('new-pw');
const confirmPW = document.getElementById('confirm-pw');

const changePWbtn = document.querySelector('#change-pw');


changePWbtn.addEventListener('click', () => {
    changePWbtn.style.display = 'none';
    oldPW.removeAttribute  ('readonly');
    oldPW.focus();
});

// console.log('changePW.js works');

oldPW.addEventListener('keyup', () => {
    newPW.removeAttribute  ('readonly');
    // newPW.focus();
});

newPW.addEventListener('keyup', () => {
    confirmPW.removeAttribute  ('readonly');
    // confirmPW.focus();
});

function checkFields(){
    
}

saveBtn.addEventListener('click', () => {

    if(oldPW.value === "" && newPW.value === "" && confirmPW.value === ""){
        console.log('pw change all empty');
    }
    else if(oldPW.value !== "" && newPW.value === "" && confirmPW.value === ""){
        newPW.placeholder= 'Please enter a new password';
        confirmPW.placeholder= 'Please confirm your new password';
    }
    else if(oldPW.value === "" && newPW.value !== "" && confirmPW.value === ""){
        oldPW.placeholder= 'Please enter your old password';
        confirmPW.placeholder= 'Please confirm your new password';
    }
    else if(oldPW.value === "" && newPW.value === "" && confirmPW.value !== ""){
        oldPW.placeholder= 'Please enter your old password';
        newPW.placeholder= 'Please enter a new password';
    }
    else if(oldPW.value !== "" && newPW.value !== "" && confirmPW.value === ""){
        confirmPW.placeholder= 'Please confirm your new password';
    }
    else if(oldPW.value !== "" && newPW.value === "" && confirmPW.value !== ""){
        newPW.placeholder= 'Please enter a new password';
    }
    else if(oldPW.value === "" && newPW.value !== "" && confirmPW.value !== ""){
        oldPW.placeholder= 'Please enter your old password';
    }
    else if(oldPW.value == newPW.value ){
        oldPW.placeholder= 'Please enter your old password';
    }
    else if(newPW.value !== confirmPW.value){
        confirmPW.value = '';
        confirmPW.placeholder= 'Confirm password does not match';
    }
    else if(strongPasswordRegex.test(newPW.value)){


    

        fetch  ('/Interlearn/public/receptionist/changePW', {
            method: 'POST',
            body: JSON.stringify({
                oldPW: oldPW.value,
                newPW: newPW.value,
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if(data.status === 'success'){
                console.log('old pw correct');

            }
            else if(data.status === 'error'){
                console.log('old pw incorrect');
                oldPW.value = '';
                oldPW.placeholder= 'Current password is not matching';
                newPW.value = '';
                newPW.placeholder= 'Please enter a new password';
                confirmPW.value = '';
                confirmPW.placeholder= 'Please confirm your new password';
            }
        
        })
        console.log('password thing works');
        }

        else{
            newPW.value = '';
            newPW.placeholder= 'Password is not strong enough ';
            confirmPW.value = '';
            confirmPW.placeholder= 'Please confirm your new password';
        }
});
    