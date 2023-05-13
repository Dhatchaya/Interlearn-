if ( window.history.replaceState ) {

    window.history.replaceState( null, null, window.location.href );
  }
  const queryParams = new URLSearchParams(window.location.search);
  let id="";
  if (queryParams.has("id")) {
  
      id = queryParams.get("id");
  }

// Get the modal
const modal = document.getElementById("profileModal");

// Get the button that opens the modal
const btn = document.getElementById("button28");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal() {

    // document.getElementById("delete-course").value = number;

    modal.style.display = "block";
    console.log(modal);
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
   
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



//selecting days and time when clicking the teacher

$('#button28').click(function(event) {
    //prevent from submission
    event.preventDefault();
    //get selected teacher
    var selectedTeacher = $('#teacher').val();

    //send an ajax request to server
    $.ajax({
        url: ''
    })
})


function getDateTime(subject) {

    let teacher = document.getElementById('teacher').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            response = JSON.parse(response);

            let selectField = document.getElementById("day");

            selectField.innerHTML = `<option value="" selected>--Select day and time--</option>`

            response.forEach(element => {
                selectField.innerHTML += `<option value="${element.day}-${element.timefrom}-${element.timeto}">${element.day} => <span id="timefrom">${element.timefrom}</span> - <span id="timeto">${element.timeto}</span></option>`
            }); 
            


        }
    };
    xhttp.open("POST", "http://localhost/Interlearn/public/courses/index/select",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("teacherId="+teacher+"&subjectId="+subject);


}

var enroll = document.getElementById('enroll-std');
enroll.addEventListener('click',function(event){
    event.preventDefault();
    const day = document.getElementById("day").value;
    const teacher = document.getElementById("teacher").value;
    const success = document.getElementById("success");
    const errors = document.getElementById("errors");
    const error1 = document.getElementById("error1");
    const error2 = document.getElementById("error2");
    $.ajax({
        method:"POST",
        url : "http://localhost/Interlearn/public/courses/enrollme/"+id,
        data:{teacher:teacher,day: day},
        success:function(response){
          console.log(response);
          data = response;
 
          if(data.status == "success"){
            console.log("success");
            error1.innerHTML="";
            error2.innerHTML="";
            errors.innerHTML="";
            success.innerHTML="Request successfully sent!";
     
                closeModal();
            
           
             
             
          }
          else if(data.enroll){
           errors.innerHTML=data.enroll;
          }
          else if(data.error){
              
            if(data.error.day){
                error2.innerHTML=data.error.day;
            }
            if(data.error.teacher){
                error1.innerHTML=data.error.teacher;
            }
          }
         
        },
        error:function(xhr,status,error){
          console.log("Error: " + error);
        }
      });

});
