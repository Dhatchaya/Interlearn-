console.log("ct");

$(document).on("click",".remove_instructor", function(){
  const instructorid = $(this).data("instructorID");
  const confirmation = confirm("Are you sure you want to delete this file?");
console.log(instructorid);
  if(confirmation){
    const deleteBtn = $(this); 
    deleteBtn.closest('.file_div').remove();
    // console.log(`http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`);
    $.ajax({
      method:"POST",
      url : `http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`,
      data:{file_id : fileid},
      success:function(response){
        console.log(response);
       
      },
      error:function(xhr,status,error){
        console.log("Error: " + error);
      }
    });
  }
});

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