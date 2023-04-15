function getInstructorAvail($id) {
    var course_id = $id;
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableInstructors',
        type: 'POST',
        data: {'course_id':course_id},
        success: function(response) {
           // var instruct = document.getElementById("instructor_filter");
            var dropdown = document.getElementById("instructor_dd");
             console.log('response',response);
            response = JSON.parse(response);
            // console.log(response);
   
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
                var instruct = document.createElement("select");
                instruct.setAttribute("name","emp_id");
                instruct.classList.add("recp_ann_clz");
                instruct.classList.add("instruct");
                instruct.id = "instructor_filter";

                console.log('me',modal2.querySelector('#instructor_dd'));
                var option = document.createElement("option");
                option.value = "slct";
                option.textContent = "--Select instructor id--";
                instruct.appendChild(option);
                for(var i=0;i<response.length;i++){
                    console.log(response[i]);
                    option = document.createElement("option");
                    option.value = response[i].emp_id;
                    option.textContent = response[i].instructorName;
                    instruct.appendChild(option);
                  
                    
                }
                if (dropdown.querySelector('.instruct')) {
                    dropdown.replaceChild(instruct, dropdown.querySelector('.instruct'));
                  } else {
                    dropdown.appendChild(instruct);
                  }
               
                console.log(dropdown);

            

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