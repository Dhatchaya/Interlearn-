function validation(){
    var id = document.lt.usrname.value;
    var ps = document.lt.pswd.value;
    if(id.length=="" && ps.length==""){
        alert("Please fill username and password!");
        return false;
    }
    else{
        if(id.length==""){
            alert("Username is empty!");
            return false;
        }
        if(ps.length==""){
            alert("Password is empty!");
            return false;
        }
    }
}