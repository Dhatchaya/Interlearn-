console.log("ct");

var close = document.getElementsByClassName("instructor-remove");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    console.log("inside");
    var instructor_id = document.getElementById('instructorID').value;
    var course_id = document.getElementById('courseID').value;
    var div = this.parentElement;
    console.log(div);
    div.style.display = "none";
    $.ajax({
        method:"POST",
        url : 'http://localhost/Interlearn/public/receptionist/course/removeInstructor',
        data:{'emp_id' : instructor_id,'course_id' : course_id},
        success:function(response){
          console.log(response);

        },
        error:function(xhr,status,error){
          console.log("Error: " + error);
        }
    });
  }
}




// when day is changed
var dayedit = document.getElementById('daysEdit');
dayedit.addEventListener('change', function(event) {
    var teacher_id = document.getElementById('teacher_id').value;
    var day = document.getElementById('daysEdit').value;
    var timeFrom = document.getElementById('timefromEdit').value;
    var timeTo = document.getElementById('timetoEdit').value;
    console.log('hi');
    console.log(teacher_id);
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);

        var error = document.getElementById('addCourseerror');


        var timeEdit = document.getElementById('timefromEdit');
        timeEdit.addEventListener('change', function(event){
          console.log("here");
          var timeFrom = document.getElementById('timefromEdit').value;
          var timeTo = document.getElementById('timetoEdit').value;


          for(i in response){
            console.log(response[i]);
            console.log(timeTo);
            // console.log(timeTo>=response[i].timefrom);
            if(timeFrom > timeTo){
              document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
              break;
            }
          }
        });

        var timeEdit2 = document.getElementById('timetoEdit');
        timeEdit2.addEventListener('change', function(event){
          console.log("here");
          var timeFrom = document.getElementById('timefrom').value;
          var timeTo = document.getElementById('timeto').value;

          for(i in response){
            console.log(response[i]);
            console.log(timeTo);
            // console.log(timeTo>=response[i].timefrom);
            if(timeFrom > timeTo){
              document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
              break;
            }
          }
        });



        }
    });
});


// when start time is changed

var timeEdit3 = document.getElementById('timefromEdit');
timeEdit3.addEventListener('change', function(event){
  var teacher_id = document.getElementById('teacher_id').value;
    var day = document.getElementById('daysEdit').value;
    var timeFrom = document.getElementById('timefromEdit').value;
    var timeTo = document.getElementById('timetoEdit').value;
    var courseID = document.getElementById('course_id').value;
    console.log(courseID);
    console.log('hi');

    $.ajax({
      url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
      type: 'POST',
      data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
    success: function(response) {
      console.log(response);
       response = JSON.parse(response);
      console.log(response);

      var error = document.getElementById('addCourseerror');


      var timeEdit = document.getElementById('timefromEdit');
      timeEdit.addEventListener('change', function(event){
        console.log("here");
        var timeFrom = document.getElementById('timefromEdit').value;
        var timeTo = document.getElementById('timetoEdit').value;


        for(i in response){
          console.log(response[i]);
          console.log(timeTo);
          // console.log(timeTo>=response[i].timefrom);
          if(timeFrom > timeTo){
            document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
            break;
          }
        }
      });

      var timeEdit2 = document.getElementById('timetoEdit');
      timeEdit2.addEventListener('change', function(event){
        console.log("here");
        var timeFrom = document.getElementById('timefrom').value;
        var timeTo = document.getElementById('timeto').value;

        for(i in response){
          console.log(response[i]);
          console.log(timeTo);
          // console.log(timeTo>=response[i].timefrom);
          if(timeFrom > timeTo){
            document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
            break;
          }
        }
      });



      }
  });
});


// when ending time is changed
var timeEdit4 = document.getElementById('timetoEdit');
timeEdit4.addEventListener('change', function(event){
  var teacher_id = document.getElementById('teacher_id').value;
    var day = document.getElementById('daysEdit').value;
    var timeFrom = document.getElementById('timefromEdit').value;
    var timeTo = document.getElementById('timetoEdit').value;
    var courseID = document.getElementById('course_id').value;
    console.log('hi');

    $.ajax({
      url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
      type: 'POST',
      data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
    success: function(response) {
      console.log(response);
       response = JSON.parse(response);
      console.log(response);

      var error = document.getElementById('addCourseerror');


      var timeEdit = document.getElementById('timefromEdit');
      timeEdit.addEventListener('change', function(event){
        console.log("here");
        var timeFrom = document.getElementById('timefromEdit').value;
        var timeTo = document.getElementById('timetoEdit').value;


        for(i in response){
          console.log(response[i]);
          console.log(timeTo);
          // console.log(timeTo>=response[i].timefrom);
          if(timeFrom > timeTo){
            document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
            break;
          }
        }
      });

      var timeEdit2 = document.getElementById('timetoEdit');
      timeEdit2.addEventListener('change', function(event){
        console.log("here");
        var timeFrom = document.getElementById('timefrom').value;
        var timeTo = document.getElementById('timeto').value;

        for(i in response){
          console.log(response[i]);
          console.log(timeTo);
          // console.log(timeTo>=response[i].timefrom);
          if(timeFrom > timeTo){
            document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
            break;
          }
        }
      });



      }
  });
});




var editClass = document.getElementById('edit_class_submit');
editClass.addEventListener('submit', function(event){
  var teacher_id = document.getElementById('teacher_id').value;
    var day = document.getElementById('daysEdit').value;
    var timeFrom = document.getElementById('timefromEdit').value;
    var timeTo = document.getElementById('timetoEdit').value;
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/editCourse',
        type: 'POST',
        data: {'teacher_ID':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
        success:function(response){
                  console.log("submit here");
                console.log(response);
              },
              error:function(xhr,status,error){
                console.log("Error: " + error);
              }
    });
});



// // time check when adding the course
// var submitCheck = document.getElementById('edit_class_submit');
// submitCheck.addEventListener('click',function(event){
//   event.preventDefault();
//   var teacher_id = document.getElementById('teacher_id').value;
//   var day = document.getElementById('daysEdit').value;
//   var timeFrom = document.getElementById('timefrom').value;
//   var timeTo = document.getElementById('timeto').value;
//   var capacity = document.getElementById('capacity').value;

//   let formData = new FormData();

// // console.log(subject,grade,medium);
//   $.ajax({
//     url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableEdit',
//     type: 'POST',
//     data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
//     success: function(response) {
//       var flag = 0;
//        response = JSON.parse(response);
//       console.log(response);
//       var error = document.getElementById('addCourseerror');

//       for(i in response){
//         console.log(response[i]);
//         let getMinute = timeFrom.split(':')[1];
//         getMinute = parseInt(getMinute) + 1;
//         let getHours = timeFrom.split(':')[0];
//         getHours = parseInt(getHours);


//         if(getMinute < 0 ){
//           getMinute = 59;
//           getHours = getHours - 1;
//         }

//         let newDay = getHours + ':' + getMinute;
//         console.log(newDay);
//         console.log(timeFrom);
//         if(timeFrom > timeTo){
//           console.log("inside");
//           document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
//           document.getElementById('addCourseerror').style.display = "block";
//           flag = 1;
//           break;

//         }
//         if(timeFrom<response[i].timeto && timeFrom>=response[i].timefrom){
//           console.log("in" + response[i].timefrom);
//           document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
//           flag = 1;
//           break;
//         }
//         if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
//           document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
//           document.getElementById('addCourseerror').style.display = "block";
//           flag = 1;
//           break;
//         }
//         if(response[i].timefrom<=timeTo && response[i].timefrom>=timeFrom){
//           document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
//           document.getElementById('addCourseerror').style.display = "block";
//           flag = 1;
//           break;
//         }
//         if(response[i].timeto<=timeTo && response[i].timeto>=timeFrom){
//           document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
//           document.getElementById('addCourseerror').style.display = "block";
//           flag = 1;
//           break;
//         }
//       }

//       if(teacher_id == ''){
//         document.getElementById('alert-div5').innerHTML = 'Please select a teacher.';  // set the message in the alert div
//         document.getElementById('alert-div5').style.display = 'block';  // show the alert div
//         document.getElementById('teacher_id').value = '';  // clear the selected grade
//         flag = 1;
//       }
//       if(day == ''){
//         document.getElementById('alert-div6').innerHTML = 'Please select a day.';  // set the message in the alert div
//         document.getElementById('alert-div6').style.display = 'block';  // show the alert div
//         document.getElementById('dayAdd').value = '';  // clear the selected grade
//         flag = 1;
//       }
//       if(timeFrom == ''){
//         document.getElementById('alert-div7').innerHTML = 'Please select a starting time.';  // set the message in the alert div
//         document.getElementById('alert-div7').style.display = 'block';  // show the alert div
//         document.getElementById('timefrom').value = '';  // clear the selected grade
//         flag = 1;
//       }
//       if(timeTo == ''){
//         document.getElementById('alert-div7').innerHTML = 'Please select an ending time.';  // set the message in the alert div
//         document.getElementById('alert-div7').style.display = 'block';  // show the alert div
//         document.getElementById('timeto').value = '';  // clear the selected grade
//         flag = 1;
//       }
//       if(capacity == ''){
//         document.getElementById('alert-div8').innerHTML = 'Please enter a capacity.';  // set the message in the alert div
//         document.getElementById('alert-div8').style.display = 'block';  // show the alert div
//         document.getElementById('capacity').value = '';  // clear the selected grade
//         flag = 1;
//       }

//       if(flag == 0){

//         formData.append('teacher_id', teacher_id);
//         formData.append('day', day);
//         formData.append('timefrom', timeFrom);
//         formData.append('timeto', timeTo);
//         formData.append('capacity', capacity);

//         // console.log(subject,grade,medium);
//         $.ajax({


//           url : 'http://localhost/Interlearn/public/receptionist/course/editCourse',
//           type:"POST",
//           data: formData,
//           processData: false,
//           contentType: false,
//           success:function(response){

//             console.log("success");
//             response = JSON.parse(response);
//             console.log(response);

//             console.log(response.status === "success");

//             // if(response.status == 'success'){
//             //   window.location.href = "http://localhost/Interlearn/public/receptionist/course";
//             // }
//           },
//           error:function(xhr,status,error){
//             console.log("Error: " + error);
//           }
//       });
//       }
//     }
//   });
// });