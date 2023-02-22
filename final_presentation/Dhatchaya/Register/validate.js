function validate(){
    
    let flag = 0;
    var NIC = document.forms.Reg_form.nic.value;
    var fname = document.forms.Reg_form.fname.value;
    var lname = document.forms.Reg_form.lname.value;
    var uname = document.forms.Reg_form.Uname.value;
    var pname = document.forms.Reg_form.pname.value;
    var iname = document.forms.Reg_form.iname.value;
    var s_mobile = document.forms.Reg_form.smobile.value;
    var p_mobile = document.forms.Reg_form.pmobile.value;
    var st_email = document.forms.Reg_form.semail.value;
    var pass = document.forms.Reg_form.password.value;
    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  
    var regPhone=/^\d{10}$/;   
    var regNic=/^\d{12}$/;                                       
    var regName = /\d+$/g;   

   if(regName.test(fname)){
        document.getElementById('fname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('fname_err').innerHTML="";  
    }
    if(regName.test(lname)){
        document.getElementById('lname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('lname_err').innerHTML="";   
    }
    if(regName.test(uname)){
        document.getElementById('uname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('uname_err').innerHTML="";    
    }
    if(regName.test(iname)){
        document.getElementById('iname_err').innerHTML="Only alphabets and whitespace are allowed";    
        flag = 1;
        
    }
    else{
        document.getElementById('iname_err').innerHTML="";  
    }
    if(regName.test(pname)){
        document.getElementById('p_name').innerHTML="Only alphabets and whitespace are allowed";    
         flag = 1;
        
    }
    else{
        document.getElementById('p_name').innerHTML="";    
    }
    if(!(regPhone.test(s_mobile))){
        document.getElementById('s_mobile').innerHTML= "Mobile number must be 10 digits";    
         flag = 1;
        
    }
    else{
        document.getElementById('s_mobile').innerHTML= "";    
    }
    if(!(regPhone.test(p_mobile))){
        document.getElementById('pmobile_err').innerHTML= "Mobile number must be 10 digits";    
         flag = 1;
        
    }
    else{
        document.getElementById('pmobile_err').innerHTML= "";  
    }
    if(!(regEmail.test(st_email))){
        document.getElementById('s_email').innerHTML="Email is not valid";    
         flag = 1;  
    }
    else{
        document.getElementById('s_email').innerHTML="";    
    }

    if(!(regNic.test(NIC))){
        document.getElementById('nic_err').innerHTML="NIC should be 12 Numbers";    
        flag = 1;
        
    }
    else{
        document.getElementById('nic_err').innerHTML="";    
    }
    if(pass.length < 8){
        document.getElementById('pass').innerHTML="Password must be atleast 8 characters long";    
        flag = 1;
        
    }
    else{
        document.getElementById('pass').innerHTML="";    
    }
    if(flag !== 0){
       document.forms.Reg_form.scrollIntoView();
       return false;
    }
  
}
