const queryParams = new URLSearchParams(window.location.search);
const course = window.location.href.toString().split("/")[8];
console.log(course);
const subject = document.getElementById("subject");
const desc = document.getElementById("descrip");
const submit = document.getElementById("mainforumsub");
const error1 = document.getElementById("error1");
const error2 = document.getElementById("error2");
if (queryParams.has("main")) {
    const id = queryParams.get("main");
    subject.addEventListener('change',function(e){
      error1.innerHTML="";
    });
    desc.addEventListener('change',function(e){
      error2.innerHTML="";
    });
submit.addEventListener('click',function(e){
    e.preventDefault();
    $.ajax({
        method:"POST",
        url : `http://localhost/Interlearn/public/forums/forumedit/edit/`+course+"/"+id,
        data:{subject: subject.value , description:desc.value},
        success:function(response){
           data = JSON.parse(response);
          console.log(data);
          if(data.status =="success"){
            location.href = data.url;
           }
          else{
              if(data.error.description){
                error2.innerHTML = data.error.description;
              }
              if(data.error.subject){
                error1.innerHTML = data.error.subject;
              }
         
           }
    
            console.log(data);
      
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