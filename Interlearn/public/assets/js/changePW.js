const oldPW = document.getElementById('old-pw');
const newPW = document.getElementById('new-pw');
const confirmPW = document.getElementById('confirm-pw');

console.log('changePW.js works');

function checkFields(){
    
}

saveBtn.addEventListener('click', () => {

    if(oldPW.value === "" || newPW.value === "" || confirmPW.value === ""){
        return 0;
    }
    else if(oldPW.value !== "" || newPW.value === "" || confirmPW.value === ""){
        newPW.placeholder= 'Please enter a new password';
        confirmPW.placeholder= 'Please confirm your new password';
    }
    else if(oldPW.value === "" || newPW.value !== "" || confirmPW.value === ""){
        oldPW.ariaPlaceholder= 'Please enter your old password';
        confirmPW.ariaPlaceholder= 'Please confirm your new password';
    }
    else if(oldPW.value === "" || newPW.value === "" || confirmPW.value !== ""){
        oldPW.ariaPlaceholder= 'Please enter your old password';
        newPW.ariaPlaceholder= 'Please enter a new password';
    }
    else if(oldPW.value !== "" || newPW.value !== "" || confirmPW.value === ""){
        confirmPW.ariaPlaceholder= 'Please confirm your new password';
    }
    else if(oldPW.value !== "" || newPW.value === "" || confirmPW.value !== ""){
        newPW.ariaPlaceholder= 'Please enter a new password';
    }
    else if(oldPW.value === "" || newPW.value !== "" || confirmPW.value !== ""){
        oldPW.ariaPlaceholder= 'Please enter your old password';
    }
    else{
        return 1;
    }
    console.log('password thing works');
});