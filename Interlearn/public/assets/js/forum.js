const discussion = document.getElementById("Add_forum");
const submits = document.getElementById("submits");
const cancel = document.getElementById("forum_cancel");
let compdis = document.getElementById("new_discussion");
const form = document.getElementById('formo'); 
var title = document.getElementsByName('topic')[0];
var content = document.getElementsByName('content')[0];
var attachment = document.getElementsByName('attachment')[0];

const removeButtons = document.querySelectorAll(".remove-btn");
const removePopup = document.querySelector(".remove-staff-popup");
const dialogBox = document.querySelector(".remove-employee-dialog-box");
const successMessage = document.querySelector(".success-message");

const noButton = removePopup.querySelector(".no");
const refreshBtn = removePopup.querySelector(".refresh");
const regex = /^.{0,25}$/;
const regex2 = /^.{0,1000}$/;
title.addEventListener('change',function(){
  let target = document.getElementById("err_topic");
  if (!regex.test(title.value)) {

    target.innerHTML="Maximum number of allowed characters is 25"
  } 
  else if(title.value.trim() === ""){
    target.innerHTML="Topic is required";
  }
  else{
    target.innerHTML="";
  }
});

content.addEventListener('change',function(){
  let target = document.getElementById("err_content");
  if (!regex2.test(content.value)) {

    target.innerHTML="Maximum number of allowed characters is 1000"
  } 
  else if(content.value.trim() === ""){
    target.innerHTML="Description is required";
  }
  else{
    target.innerHTML="";
  }
});
attachment.addEventListener('change',function(){
  let target = document.getElementById("err_attachment");
  const file = this.files[0];
  const fileSize = file.size; 

  if (fileSize > 5242880) {
    target.innerHTML='File size exceeds the limit of 5MB.';
    // reset the file input
    this.value = '';
  }else{
    target.innerHTML="";
  }
});
if ( window.history.replaceState ) {

    window.history.replaceState( null, null, window.location.href );
  }
discussion.addEventListener('click',function(e){
    // container.style.display = "block";
    compdis.style.display = "block";
});
cancel.addEventListener('click',function(){
  compdis.style.display = "none";
});

function deleteForum(id){
  $.ajax({
    method:"POST",
    url : `http://localhost/Interlearn/public/forums/delete/${id}`,
    data:{id: id},
    success:function(response){
      console.log(response);
      dialogBox.style.display = "none";
      successMessage.style.display = "block";
    },
    error:function(xhr,status,error){
      console.log("Error: " + error);
    }
  });

}
function refresh(){
  location.reload();
}
submits.addEventListener('click',function(e){
e.preventDefault();
console.log(form);
const url = new URL(window.location.href);
const main = new URLSearchParams(window.location.search).get('main');
url.searchParams.delete('main');
console.log(main);
formData = new FormData();

console.log(attachment.files);
if(attachment.files.length>0){
  formData.append('attachment',attachment.files[0]);
  console.log(attachment.files[0]);
}
formData.append('topic',title.value);
formData.append('content',content.value);
console.log(url+"view/?main="+main);
for (var key of formData.entries()) {
  console.log(key[0] + ', ' + key[1]);
}
// document.getElementById("formo").submit();
$.ajax({
  method:"POST",
  url:url+"/view/?main="+main,
  data:formData,
  contentType: false,
  processData: false,
  success:function(response){
    console.log(response);
    response= JSON.parse(response);
    console.log(response);
    if(response['status'] != 'success'){
      var errors = Object.keys(response);
      for (i in errors){
        let target_id = "err_"+errors[i];
        let key = errors[i];
        let target = document.getElementById(target_id);
       
        target.innerHTML=response[key];
      }
      
    }
    else{
      location.reload();
      // const inputs = document.querySelectorAll('input[type=text], textarea');
      // inputs.forEach(input => input.value = '');
      // compdis.style.display = "none";
    }
  },
  error: function(xhr, status, error) {
    console.log("Error: " + error);
  }
  });
});

function deletebtnclick(forum){
  removePopup.style.display = "block";
  const yesButton = removePopup.querySelector(".yes");
  const yesButtonClickHandler = async function (event) {
    deleteForum(forum);
    yesButton.removeEventListener("click", yesButtonClickHandler);
  }
  yesButton.addEventListener("click", yesButtonClickHandler);
}