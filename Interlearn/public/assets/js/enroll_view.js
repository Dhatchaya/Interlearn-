// console.log('hi');
function getRequests($id) {
    var req = $id;
    console.log(req);
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/enrollment/getRequestDetails',
        type: 'POST',
        data: {'request_id':req},
        success: function(response) {
            console.log(response);
            response = JSON.parse(response);
            // console.log(response);
            var error = $('#addCourseerror');

            // Get the modal
            const modal = document.getElementById("profileModal");

            // Get the button that opens the modal
            const btn = document.getElementById("button28");
            // const btn2 = document.getElementById("button29");

            // Get the <span> element that closes the modal
            const span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            
            
                // document.getElementById("modal2_course_id").value = courseID;
            
            modal.style.display = "block";
            console.log(modal);

            // document.getElementById("student_id").value = response.student_id;
            // document.getElementById("course_id").value = response.course_id;
            // document.getElementById("studentName").value = response.studentName;
            // document.getElementById("requested_date").value = response.requested_date;
            // document.getElementById("subject").value = response.subject;
            // document.getElementById("grade").value = response.grade;
            // document.getElementById("teacherName").value = response.teacherName;
            // document.getElementById("day").value = response.day;
            // document.getElementById("time").value = response.timefrom + " - " + response.timeto;
            // document.getElementById("available").value = response.available;

            for(var i=0; i<response.length; i++){
                console.log(response[i].grade);
                if(response[i].request_id == req){
                    // console.log("hi");
                    console.log(response[i].grade);
                    document.getElementById("student_id").value = response[i].student_id;
                    document.getElementById("course_id").value = response[i].course_id;
                    document.getElementById("studentName").value = response[i].studentName;
                    document.getElementById("requested_date").value = response[i].requested_date;
                    document.getElementById("subject").value = response[i].subject;
                    document.getElementById("grades").value = response[i].grade;
                    document.getElementById("teacherName").value = response[i].teacherName;
                    document.getElementById("day").value = response[i].day;
                    document.getElementById("time").value = response[i].timefrom + " - " + response[i].timeto;
                    document.getElementById("available").value = response[i].available;
                }
                else{
                    continue;
                }
                console.log(response);
            }


            

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    });
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

setTimeout(function(){
    document.getElementById('info-message').style.display = 'none';
    /* or
    var item = document.getElementById('info-message')
    item.parentNode.removeChild(item); 
    */
  }, 3000);

// var enroll = document.getElementById('add-btn-enroll');
// enroll.addEventListener('click',function setT(event){

//     event.preventDefault();

//     console.log(day, selectedTimeSlot);
// });