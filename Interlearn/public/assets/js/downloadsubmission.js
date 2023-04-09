const checkall = document.getElementById("files_checkall");
const checks = document.getElementsByName("files[]");

checkall.addEventListener('click',function(){
    console.log("clicked");
    for(var checkbox of checks){
        console.log("here");
        checkbox.checked = this.checked;
    }
});