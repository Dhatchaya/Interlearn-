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
        $.ajax({
            type:'POST',
            url:`http://localhost/Interlearn/public/instructor/profile/changepw`,
            data:formData,
            processData: false,
            contentType: false,
            success:function(response){
                // var status = JSON.parse(response);
                console.log(response);
                var errors = document.getElementById("errorall");
                errors.innerHTML = "";
                if(response['status'] != 'success'){
                    var errorall = document.createElement("div");
                    for (i in response){

                        var breaktag = document.createElement("br");
                        var error = response[i];
                        errorall.append(error);
                        errorall.append(breaktag);

                    }
                    errors.append(errorall);


                }
                else{
                    window.location.href = `http://localhost/Interlearn/public/teacher/course/view/${course}`;
                }


                //  window.location.href = "http://localhost/Interlearn/public/teacher/course/view/4/";


            },
            error:function(xhr){console.log(xhr);
                console.log('Error loading threads: ' + xhr.responseText);

            }

        });
    }

});