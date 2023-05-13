const queryParams = new URLSearchParams(window.location.search);
const course = window.location.href.toString().split("/")[8];
console.log(course);
const subject = document.getElementById("subject");
const desc = document.getElementById("descrip");
const submit = document.getElementById("mainforumsub");
if (queryParams.has("main")) {
    const id = queryParams.get("main");
submit.addEventListener('click',function(e){
    e.preventDefault();
    $.ajax({
        method:"POST",
        url : `http://localhost/Interlearn/public/forums/forumedit/edit/`+course+"/"+id,
        data:{subject: subject.value , description:desc.value},
        success:function(response){
            console.log(response);
      
        },
        error:function(xhr,status,error){
          console.log("Error: " + error);
        }
      });
});


  $.ajax({
    method: "GET",
    url:`http://localhost/Interlearn/public/forums/forumedit/edit/`+course+"/"+id,

    success: function(data) {
      console.log(data);
      response = JSON.parse(data);
      console.log(subject);

      subject.value = response.subject;
      desc.innerHTML=response.description;

    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });
}