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
                    document.getElementById("feeEdit").value = response[i].monthlyFee;


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
                            const MainElement = document.getElementById("ins_teach_name");
                            for(var i=0; i<response.length; i++){
                              // console.log(response[i].instructorName);
                              //
                              // document.getElementById("instructorName").value = response[i].emp_id + ' : ' + response[i].instructorName;
                              // // console.log(response[i].instructorName);
                              // document.getElementById("instructorID").value = response[i].emp_id;
                              // document.getElementById("courseID").value = courseID;
                            //   var instructor_id = response[i].emp_id;
                            //   console.log(instructor_id);
                            //   document.getElementById("instructorName").value = response[i].instructorName;
                              const input = document.createElement('input');
                              input.classList.add("edit-class-disable");
                              input.id = "instructorName";
                                input.value =  response[i].instructorName;

                                const containerElement = document.createElement("div");
                            // Create instructorID input element
                            var instructorIDInput = document.createElement("input");
                            instructorIDInput.setAttribute("type", "hidden");
                            instructorIDInput.setAttribute("value", response[i].emp_id);
                            instructorIDInput.setAttribute("id", "instructorID");
                            instructorIDInput.setAttribute("name", "instructorID");

                            // Create courseID input element
                            var courseIDInput = document.createElement("input");
                            courseIDInput.setAttribute("type", "hidden");
                            courseIDInput.setAttribute("value", response[i].course_id);
                            courseIDInput.setAttribute("id", "courseID");
                            courseIDInput.setAttribute("name", "courseID");

                            // Create submit-remove-instructor button
                            var removeInstructorButton = document.createElement("button");
                            removeInstructorButton.setAttribute("type", "button");
                            removeInstructorButton.setAttribute("id", "submit-remove-instructor");
                            removeInstructorButton.setAttribute("class", "remove_instructor");
                            removeInstructorButton.setAttribute("onclick", "removeInstructor(this,"+response[i].emp_id+","+response[i].course_id+")");

                            // Create instructor-remove span
                            var instructorRemoveSpan = document.createElement("span");
                            instructorRemoveSpan.setAttribute("class", "instructor-remove");
                            instructorRemoveSpan.innerHTML = "&times;";

                            // Append instructor-remove span to the removeInstructorButton
                            removeInstructorButton.appendChild(instructorRemoveSpan);

                            containerElement.appendChild(input);
                            containerElement.appendChild(instructorIDInput);
                            containerElement.appendChild(courseIDInput);
                            containerElement.appendChild(removeInstructorButton);
                            MainElement.appendChild(containerElement);
                            //   <input type="text" value="<?= $teach_in->instructorName ?>" id="instructorName" class="edit-class-disable" disabled>
                            
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


    // time check when editing the course
var submitCheck = document.getElementById('edit_class_submit');
submitCheck.addEventListener('click',function(event){
  event.preventDefault();
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('daysEdit').value;
  var timeFrom = document.getElementById('timefromEdit').value;
  var timeTo = document.getElementById('timetoEdit').value;
  var capacity = document.getElementById('capacityEdit').value;
  var fee = document.getElementById('feeEdit').value;


  let formData = new FormData();

console.log(day);
console.log(timeFrom);
console.log(timeTo);
  $.ajax({
    url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableEdit',
    type: 'POST',
    data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo, 'course_id' : courseID},
    success: function(response) {
      var flag = 0;
       response = JSON.parse(response);
      console.log(response);
      var error = document.getElementById('addCourseerror');

      for(i in response){
        console.log(response[i]);
        if(timeFrom > timeTo){
          console.log("inside");
          document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
          document.getElementById('addCourseerror').style.display = "block";
          flag = 1;
          break;

        }
        if(timeFrom<response[i].timeto && timeFrom>=response[i].timefrom){
          console.log("in" + response[i].timefrom);
          document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
          flag = 1;
          break;
        }
        if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
          document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror').style.display = "block";
          flag = 1;
          break;
        }
        if(response[i].timefrom<=timeTo && response[i].timefrom>=timeFrom){
          document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror').style.display = "block";
          flag = 1;
          break;
        }
        if(response[i].timeto<=timeTo && response[i].timeto>=timeFrom){
          document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror').style.display = "block";
          flag = 1;
          break;
        }
      }
      console.log("check 1");

    //   if(teacher_id == ''){
    //     document.getElementById('alert-div5').innerHTML = 'Please select a teacher.';  // set the message in the alert div
    //     document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    //     document.getElementById('teacher_id').value = '';  // clear the selected grade
    //     flag = 1;
    //   }
    //   if(day == ''){
    //     document.getElementById('alert-div6').innerHTML = 'Please select a day.';  // set the message in the alert div
    //     document.getElementById('alert-div6').style.display = 'block';  // show the alert div
    //     document.getElementById('dayAdd').value = '';  // clear the selected grade
    //     flag = 1;
    //   }
    //   if(timeFrom == ''){
    //     document.getElementById('alert-div7').innerHTML = 'Please select a starting time.';  // set the message in the alert div
    //     document.getElementById('alert-div7').style.display = 'block';  // show the alert div
    //     document.getElementById('timefrom').value = '';  // clear the selected grade
    //     flag = 1;
    //   }
    //   if(timeTo == ''){
    //     document.getElementById('alert-div7').innerHTML = 'Please select an ending time.';  // set the message in the alert div
    //     document.getElementById('alert-div7').style.display = 'block';  // show the alert div
    //     document.getElementById('timeto').value = '';  // clear the selected grade
    //     flag = 1;
    //   }
    //   if(capacity == ''){
    //     document.getElementById('alert-div8').innerHTML = 'Please enter a capacity.';  // set the message in the alert div
    //     document.getElementById('alert-div8').style.display = 'block';  // show the alert div
    //     document.getElementById('capacity').value = '';  // clear the selected grade
    //     flag = 1;
    //   }

      if(flag == 0){

        formData.append('course_id', courseID);
        formData.append('day', day);
        formData.append('timefrom', timeFrom);
        formData.append('timeto', timeTo);
        formData.append('capacity', capacity);
        formData.append('monthlyFee', fee);

        console.log(formData);
        $.ajax({


          url : 'http://localhost/Interlearn/public/receptionist/course/editCourse',
          type:"POST",
          data: formData,
          processData: false,
          contentType: false,
          success:function(response){

            console.log("success");
            response = JSON.parse(response);
            console.log(response);

            console.log(response.status === "success");

            if(response == true){
                console.log("hiiiii");
              closeModal3();
            }
          },
          error:function(xhr,status,error){
            console.log("Error: " + error);
          }
      });
      }
    }
  });
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
    console.log(number);

    modal4.style.display = "block";
    console.log(modal4);

    var dltCourse = document.getElementById('delete-course-btn');
    dltCourse.addEventListener('click',function(){
        let formData = new FormData();

        formData.append('course_id', number);

        $.ajax({

            url : 'http://localhost/Interlearn/public/receptionist/course/removeCourse',
            type:"POST",
            data: formData,
            processData: false,
            contentType: false,
            success:function(response){

              console.log("success");
              response = JSON.parse(response);
              console.log(response);

              console.log(response.status === "success");

              if(response == true){
                  console.log("hiiiii");
                closeModal3();
              }
            },
            error:function(xhr,status,error){
              console.log("Error: " + error);
            }
        });
    });



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
