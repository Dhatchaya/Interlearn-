//enquiry view
const viewForm = document.getElementById("view-form");
const reply = document.getElementById("enq-reply");
reply.addEventListener('click', function(e) {
  viewForm.style.display = "block";
});
viewForm.addEventListener('submit',function(e){
  e.preventDefault();
  var formData = new FormData();
  formData.append("reply",document.getElementById("reply").value);

  console.log(formData);
})