//enquiry view
let viewForm = document.getElementById("view-form");
const cancel = document.getElementsByName("reply_cancel");
const replies = document.getElementsByClassName("view-reply");
const replyBox = document.getElementById("reply");
const reply = document.getElementById("enq-reply");
const placeholder = viewForm.getAttribute('placeholder');
const form = document.querySelector(".enq-view-form");

if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );
}

for (let i = 0; i < replies.length; i++) {
  replies[i].addEventListener('click', function(e) {
    replies[i].parentNode.insertAdjacentElement("afterend", viewForm);
    viewForm.style.display = "block";
    history.replaceState({}, null, "?rid=" + repId);
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

// form.addEventListener('submit',function(e){
 
//   const enqCard = document.querySelector(".init_enq");
//   const clone = enqCard.cloneNode(true);
//   clone.querySelector(".view_content").innerHTML= form.elements.reply.value;
//   clone.querySelector(".view-date").innerHTML= new Date().toJSON().slice(0, 10);
//   document.querySelector(".enq-body").appendChild(clone);
//   form.style.display="none";
// });

