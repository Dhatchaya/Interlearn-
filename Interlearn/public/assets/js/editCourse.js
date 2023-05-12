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
            let getMinute = timeFrom.split(':')[1];
            getMinute = parseInt(getMinute) + 1;
            let getHours = timeFrom.split(':')[0];
            getHours = parseInt(getHours);


            if(getMinute < 0 ){
              getMinute = 59;
              getHours = getHours - 1;
            }

            let newDay = getHours + ':' + getMinute;
            console.log(newDay);
            console.log(timeFrom);

            console.log(timeFrom>=response[i].timefrom);
            console.log(timeFrom<=response[i].timeto);
            if(timeFrom<=response[i].timeto && timeFrom>=response[i].timefrom){
              console.log("in" + response[i].timefrom);
              document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
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
            console.log(timeTo>=response[i].timefrom);
            if(timeFrom > timeTo){
              document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
              break;
            }
            if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
              document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
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
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableEdit',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo,'course_id' : courseID},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = $('#addCourseerror');

        for(i in response){
          console.log(response[i]);
          let getMinute = timeFrom.split(':')[1];
          getMinute = parseInt(getMinute) + 1;
          let getHours = timeFrom.split(':')[0];
          getHours = parseInt(getHours);


          if(getMinute < 0 ){
            getMinute = 59;
            getHours = getHours - 1;
          }

          let newDay = getHours + ':' + getMinute;
          console.log(newDay);
          console.log(timeFrom);

          console.log(timeFrom>=response[i].timefrom);
          console.log(timeFrom<=response[i].timeto);
          if(timeFrom<=response[i].timeto && timeFrom>=response[i].timefrom){
            console.log("in" + response[i].timefrom);
            document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
            break;
          }
        }
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
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailableEdit',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo, 'course_id' : courseID},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = document.getElementById('addCourseerror');

        for(i in response){
          console.log(response[i]);
          console.log(timeTo);
          console.log(timeTo>=response[i].timefrom);
          if(timeFrom > timeTo){
            document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
            break;
          }
          if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
            document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
            break;
          }
        }
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

// $.ajax({
        //     method:"POST",
        //     url : 'http://localhost/Interlearn/public/receptionist/course/editCourse',
        //     data:{'course_id':courseID, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
        //     success:function(response){
        //         console.log("submit here");
        //       console.log(response);
        //     },
        //     error:function(xhr,status,error){
        //       console.log("Error: " + error);
        //     }
        //   });