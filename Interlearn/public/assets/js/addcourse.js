// console.log("hi");


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
    location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// Get the modal
const modal2 = document.getElementById("profileModal2");

// Get the button that opens the modal
const btn2 = document.getElementById("button29");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span2 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal2(courseID) {
    console.log("hello");
    console.log(courseID);

    document.getElementById("modal2_course_id").value = courseID;

    modal2.style.display = "block";
    console.log(modal2);
}

// When the user clicks on <span> (x), close the modal
function closeModal2() {
    modal2.style.display = "none";
    location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

// Get the modal
// const modal3 = document.getElementById("profileModal3");

// Get the button that opens the modal
const btn3 = document.getElementById("button30");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span3 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal3(courseID) {

    // document.getElementById("delete-course").value = number;
    const modal3 = document.getElementById("profileModal3");
    modal3.style.display = "block";
    console.log(modal3);

    // var teacher_id = $('#teacher_id').val();
    // var day = $('#daysEdit').val();
    // var timeFrom = $('#timefromEdit').val();
    // var timeTo = $('#timetoEdit').val();

    console.log(courseID);

    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/getCourseDetails?course_id='+courseID,
        type: 'GET',
        // data: {'course_id':courseID, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
        success: function(response) {
            console.log("hello");
            console.log(response);
            response = JSON.parse(response);

            for(var i=0; i<response.length; i++){
                console.log("hi");
                // console.log(response[i].grade);
                if(response[i].course_id == courseID){
                    // console.log("hi");
                    // console.log(response[i].grade);
                    document.getElementById("course_id").value = response[i].course_id;
                    document.getElementById("teacher_id").value = response[i].teacher_ID;
                    document.getElementById("teacher_id_edit").value = response[i].teacher_ID + ' : ' + response[i].teacherName;
                    document.getElementById("daysEdit").value = response[i].day;
                    document.getElementById("timefromEdit").value = response[i].timefrom;
                    document.getElementById("timetoEdit").value = response[i].timeto;
                    document.getElementById("capacityEdit").value = response[i].capacity;


                    // var teacher_id = $('#teacher_id').val();
                    // var day = $('#daysEdit').val();
                    // var timeFrom = $('#timefromEdit').val();
                    // var timeTo = $('#timetoEdit').val();

                    $.ajax({
                        method:"GET",
                        url : 'http://localhost/Interlearn/public/receptionist/course/getInstructors?course_id='+courseID,
                        // data:{'course_id':courseID, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
                        success:function(response){

                            console.log("submit here");
                            console.log(response == 'false');
                            if(response == 'false'){
                              console.log("hello");
                              // document.getElementById("instructorName").style.display = 'none';
                              // document.getElementById("submit-remove-instructor").style.display = 'none';
                              document.getElementById("noInstructors").innerHTML = "No instructors to show!";
                            }
                            response = JSON.parse(response);
                            console.log(response);

                            for(var i=0; i<response.length; i++){
                              // console.log(response[i].instructorName);
                              //
                              // document.getElementById("instructorName").value = response[i].emp_id + ' : ' + response[i].instructorName;
                              // // console.log(response[i].instructorName);
                              // document.getElementById("instructorID").value = response[i].emp_id;
                              // document.getElementById("courseID").value = courseID;
                              var instructor_id = response[i].emp_id;
                              console.log(instructor_id);
                              document.getElementById("instructorName").value = response[i].instructorName;

                            // function removeInstructor(instructor_id, courseID){
                            //     event.preventDefault();
                            //     console.log("inside remove");
                            //     console.log(instructor_id);
                            //     var div = this.parentElement;
                            //     console.log(div);
                            //     div.style.display = "none";
                            //     $.ajax({
                            //         method:"GET",
                            //         url : 'http://localhost/Interlearn/public/receptionist/course/removeInstructors?instructor_id='+instructor_id+'&course_id='+courseID,
                            //         success:function(response){
                            //           console.log(response);
                            //         },
                            //         error:function(xhr,status,error){
                            //           console.log("Error: " + error);
                            //         }
                            //     });
                            // }

                            }

                        },
                        error:function(xhr,status,error){
                          console.log("Error: " + error);
                        }
                    });



                    // Click on a close button to hide the current list item
                    var close = document.getElementsByClassName("instructor-remove");
                    var i;
                    for (i = 0; i < close.length; i++) {
                      close[i].onclick = function() {
                        console.log("inside");
                        var div = this.parentElement;
                        console.log(div);
                        div.style.display = "none";
                        $.ajax({
                            method:"POST",
                            url : 'http://localhost/Interlearn/public/receptionist/course/editCourse',
                            data:{'course_id':courseID},
                            success:function(response){
                              console.log(response);
                            },
                            error:function(xhr,status,error){
                              console.log("Error: " + error);
                            }
                        });
                      }
                    }
                }
                else{
                    continue;
                }
                console.log(response);
            }

        }
    });

}

// When the user clicks on <span> (x), close the modal
function closeModal3() {
    const modal3 = document.getElementById("profileModal3");
    modal3.style.display = "none";
    location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    const modal3 = document.getElementById("profileModal3");
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}


// Get the modal
const modal4 = document.getElementById("profileModal4");

// Get the button that opens the modal
const btn4 = document.getElementById("button35");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span4 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal4(number) {

    document.getElementById("delete-course").value = number;

    modal4.style.display = "block";
    console.log(modal4);
}

// When the user clicks on <span> (x), close the modal
function closeModal4() {
    modal4.style.display = "none";
    location.reload();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
}


function removeInstructor(target,instructor_id, courseID){
    // event.preventDefault();
    console.log("inside remove");
    console.log(instructor_id);
    var div = target.parentElement;
    console.log(target.parentElement);
    div.style.display = "none";
    // para = document.getElementById("noInstructors");
    // para.innerHTML="No instructors to show!";

    $.ajax({
        method:"POST",
        url : 'http://localhost/Interlearn/public/receptionist/course/removeInstructor',
        data:{'courseID':courseID, 'instructorID':instructor_id},
        success:function(response){
            console.log(response);
        },
        error:function(xhr,status,error){
            console.log("Error: " + error);
        }
    });
}
