function checkYear(newdate){
    const currentdate = new Date();
    let diff = Math.abs(currentdate- new Date(newdate));
    let diffyear = Math.floor(diff / (1000 * 60 * 60 * 24*365)); 
    return (diffyear);
}



let flag = 0;
const NICValidate = document.getElementsByName("NIC")[0];
const first_nameValidate = document.getElementsByName("first_name")[0];
const last_nameValidate = document.getElementsByName("last_name")[0];
const birthdayValidate = document.getElementsByName("birthday")[0];
const genderValidate = document.getElementsByName("gender")[0];
const emailValidate = document.getElementsByName("email")[0];
const mobile_numberValidate = document.getElementsByName("mobile_number")[0];
const addressValidate = document.getElementsByName("address")[0];
const schoolValidate = document.getElementsByName("school")[0];
const parent_nameValidate = document.getElementsByName("parent_name")[0];
const parent_emailValidate = document.getElementsByName("parent_email")[0];
const parent_mobileValidate = document.getElementsByName("parent_mobile")[0];
const gradeValidate = document.getElementsByName("grade")[0];
const mediumValidate = document.getElementsByName("medium")[0];
const usernameValidate = document.getElementsByName("username")[0];
const passwordValidate = document.getElementsByName("password")[0];
// var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  
var regPhone=/^\d{10}$/;   
var regNic=/^\d{12}$/;                                       
var regName = /\d+$/g;   
birthdayValidate.addEventListener('change',function(event){
    if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
            }
    if(checkYear(birthdayValidate.value)<=0){
       
    document.getElementById('dob_err').innerHTML= "Invalid Date of birth";    
    flag = 1;
   } 
    else if(checkYear(birthdayValidate.value)<=7){
       
    document.getElementById('dob_err').innerHTML= "Age Must be more than 8";    
    flag = 1;
   } 
   else  if(checkYear(birthdayValidate.value)>30){
    document.getElementById('dob_err').innerHTML= "Age must be less than 30";    
    flag = 1;
   }
   else{
    document.getElementById('dob_err').innerHTML= "";  
   }
 

   
});

NICValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
    if(birthdayValidate.value.trim() === ""){
        document.getElementById('nic_err').innerHTML="Please Select Your date of birth first";    
        flag = 1;
    
    }
   
    else if(NICValidate.value.trim() === ""){
   
   
      if(checkYear(birthdayValidate.value)>=16){
            document.getElementById('nic_err').innerHTML="Please Enter your NIC number";    
            flag = 1;
        
        }
        else{
            document.getElementById('nic_err').innerHTML="";    
        }
      
    }
    else if(!(regNic.test(NICValidate.value))){
        document.getElementById('nic_err').innerHTML="NIC should be 12 Numbers";    
        flag = 1;
        
    }
 
    else{
        document.getElementById('nic_err').innerHTML="";    
    }
   
});
first_nameValidate.addEventListener('change',function(event){
    if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
            }
   if(regName.test(first_nameValidate.value)){
        document.getElementById('fname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('fname_err').innerHTML="";  
    }


});
last_nameValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(regName.test(last_nameValidate.value)){
        document.getElementById('lname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('lname_err').innerHTML="";   
    }
});
usernameValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(regName.test(usernameValidate.value)){
        document.getElementById('uname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('uname_err').innerHTML="";    
    }
});
parent_nameValidate.addEventListener('change',function(event){

      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(regName.test(parent_nameValidate.value)){
        document.getElementById('p_name').innerHTML="Only alphabets and whitespace are allowed";    
         flag = 1;
        
    }
    else{
        document.getElementById('p_name').innerHTML="";    
    }
});
schoolValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(regName.test(schoolValidate.value)){
        document.getElementById('school').innerHTML="Only alphabets and whitespace are allowed";    
         flag = 1;
        
    }
    else{
        document.getElementById('school').innerHTML="";    
    }
});
mobile_numberValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(!(regPhone.test(mobile_numberValidate.value))){
        document.getElementById('s_mobile').innerHTML= "Mobile number must be 10 digits";    
         flag = 1;
        
    }
    else{
        document.getElementById('s_mobile').innerHTML= "";    
    }

});
parent_mobileValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
     if(!(regPhone.test(parent_mobileValidate.value))){
        document.getElementById('pmobile_err').innerHTML= "Mobile number must be 10 digits";    
         flag = 1;
        
    }
    else{
        document.getElementById('pmobile_err').innerHTML= "";  
    }
});
emailValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
    //  if(!(regEmail.test(emailValidate.value))){
    //     document.getElementById('s_email').innerHTML="Email is not valid";    
    //      flag = 1;  
    // }
    else{
        document.getElementById('s_email').innerHTML="";    
    }
});
parent_emailValidate.addEventListener('change',function(event){
      if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
    }
    //  if(!(regEmail.test(parent_emailValidate.value))){
    //     document.getElementById('p_email').innerHTML="Email is not valid";    
    //      flag = 1;  
    // }
    else{
        document.getElementById('p_email').innerHTML="";    
    }
});
passwordValidate.addEventListener('change',function(event){

    if (event.target.previousElementSibling.classList.contains("err_show")) {
        event.target.previousElementSibling.innerHTML = " ";      
            }
    if(passwordValidate.value.length < 8){
    document.getElementById('pass').innerHTML="Password must be atleast 8 characters long";    
    flag = 1;
    
}
else{
    document.getElementById('pass').innerHTML="";    
}
});