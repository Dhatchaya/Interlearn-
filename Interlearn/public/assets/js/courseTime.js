// console.log("ct");
// console.log($('#days'));
$('#dayAdd').on('change', function() {
    var teacher_id = $('#teacher_id').val();
    var day = $('#dayAdd').val();
    var timeFrom = $('#timefrom').val();
    var timeTo = $('#timeto').val();
    console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable1',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = $('#addCourseerror1');
        $('#timefrom').on('change', function(){
          // console.log("here");
          var timeFrom = $('#timefrom').val();
          var timeTo = $('#timeto').val();


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

            console.log(newDay<=response[i].timeto);
            console.log(newDay>=response[i].timefrom);

            if(timeFrom=response[i].timefrom)
            {
              console.log("equal");
              document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
              break;
            }else if(timeFrom>response[i].timefrom){
              if(timeFrom<=response[i].timeto){
                console.log("in" + response[i].timefrom);
                document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
                break;
              }
            }
              
              
            

            // if(timeFrom<=response[i].timeto && timeFrom>=response[i].timefrom){
            //   console.log("in" + response[i].timefrom);
            //   document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
            //   break;
            // }
          }
        });

        $('#timeto').on('change', function(){
          console.log("here");
          var timeFrom = $('#timefrom').val();
          var timeTo = $('#timeto').val();

          for(i in response){
            console.log(response[i]);
            console.log(timeTo);
            console.log(timeTo>=response[i].timefrom);
            if(timeFrom > timeTo){
              document.getElementById('addCourseerror1').innerHTML = "Ending time should be greater than start time";
              break;
            }
            if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
              document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
              break;
            }
          }
        });


          // Filter out teachers who already have a class scheduled in the selected time range
          // var filteredTeachers = teachers.filter(function(teacher) {
          //     return !teacherHasClassOnTime(teacher, timeFrom, timeTo);
          // });
          // Update the teacher dropdown
          // $('#teacher_id').empty();
          // $.each(filteredTeachers, function(index, teacher) {
          //   $('#teacher_id').append('<option value="' + teacher.id + '">' + teacher.firstname + '</option>');
          // });
          }
    });
});