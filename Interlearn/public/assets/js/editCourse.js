console.log("ct");

var close = document.getElementsByClassName("instructor-remove");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    console.log("inside");
    var instructor_id = $('#instructorID').val();
    var course_id = $('#courseID').val();
    var div = this.parentElement;
    // console.log(div);
    // div.style.display = "none";
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

// $(document).on("click",".remove_instructor", function(){
//   const instructorid = $(this).data("instructorID");
//   const confirmation = confirm("Are you sure you want to delete this file?");
// console.log(instructorid);
//   if(confirmation){
//     const deleteBtn = $(this); 
//     deleteBtn.closest('.file_div').remove();
//     // console.log(`http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`);
//     $.ajax({
//       method:"POST",
//       url : `http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`,
//       data:{file_id : fileid},
//       success:function(response){
//         console.log(response);
       
//       },
//       error:function(xhr,status,error){
//         console.log("Error: " + error);
//       }
//     });
//   }
// });



// when day is changed

$('#daysEdit').on('change', function() {
    var teacher_id = $('#teacher_id').val();
    var day = $('#daysEdit').val();
    var timeFrom = $('#timefromEdit').val();
    var timeTo = $('#timetoEdit').val();
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = $('#addCourseerror');
        $('#timefromEdit').on('change', function(){
          console.log("here");
          var timeFrom = $('#timefromEdit').val();
          var timeTo = $('#timetoEdit').val();


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

        $('#timetoEdit').on('change', function(){
          console.log("here");
          var timeFrom = $('#timefrom').val();
          var timeTo = $('#timeto').val();

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

$('#timefromEdit').on('change', function(){
  var teacher_id = $('#teacher_id').val();
    var day = $('#daysEdit').val();
    var timeFrom = $('#timefromEdit').val();
    var timeTo = $('#timetoEdit').val();
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
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

$('#timetoEdit').on('change', function(){
  var teacher_id = $('#teacher_id').val();
    var day = $('#daysEdit').val();
    var timeFrom = $('#timefromEdit').val();
    var timeTo = $('#timetoEdit').val();
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = $('#addCourseerror');

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




$('#edit_class_submit').on('submit', function(){
  var teacher_id = $('#teacher_id').val();
    var day = $('#daysEdit').val();
    var timeFrom = $('#timefromEdit').val();
    var timeTo = $('#timetoEdit').val();
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