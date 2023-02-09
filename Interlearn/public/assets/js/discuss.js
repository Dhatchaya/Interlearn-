//enquiry view
let viewForm = document.getElementById("view-form");
const cancel = document.getElementsByName("reply_cancel");
const replies = document.getElementsByClassName("send_reply");
const replyBox = document.getElementById("reply");


if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );
}

for (let i = 0; i < replies.length; i++) {
  replies[i].addEventListener('click', function(e) {
    replies[i].parentNode.insertAdjacentElement("afterend", viewForm);
    viewForm.style.display = "block";
  
    viewForm.addEventListener("submit", function(event) {
        
        replies[i].style.display = 'none';
    });
  });
}

replyBox.addEventListener('focus',function(e){

  this.setAttribute('placeholder',' ');
  this.style.borderColor= '#3E206D';

});
for (let i = 0; i < cancel.length; i++) {
  cancel[i].addEventListener('click',function(e){
    viewForm.style.display = 'none';
  });
}