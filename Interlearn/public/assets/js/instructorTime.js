function getInstructorAvail($id) {
    var course_id = $id;
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableInstructors',
        type: 'POST',
        data: {'course_id':course_id},
        success: function(response) {
            var instruct = document.getElementById("instructor_filter");
            var dropdown = document.getElementById("instructor_dd");
            // console.log(response);
            response = JSON.parse(response);
            // console.log(response);
            for(var i=0;i<response.length;i++){
                console.log(response[i]);
                var options = `<option value="${response[i].emp_id}">${response[i].instructorName}</option>`;
                instruct.append(options);
                console.log(options);
                console.log(instruct);
            }
            dropdown.append(instruct);
            console.log(dropdown);
            var error = $('#addCourseerror');

            // Get the modal
            const modal2 = document.getElementById("profileModal2");

            // Get the button that opens the modal
            const btn2 = document.getElementById("button29");
            // const btn2 = document.getElementById("button29");

            // Get the <span> element that closes the modal
            const span2 = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            
            
                // document.getElementById("modal2_course_id").value = courseID;
            
                modal2.style.display = "block";
                console.log(modal2);


            

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
        }
    });
}

// When the user clicks on <span> (x), close the modal
function closeModal2() {
    modal2.style.display = "none";
}