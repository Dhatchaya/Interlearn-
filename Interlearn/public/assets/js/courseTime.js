console.log("ct");

$('#days').on('change', function() {
    var teacher_id = $('#teacher_id').val();
    var day = $('#days').val();
    var timeFrom = $('#timefrom').val();
    var timeTo = $('#timeto').val();
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
        $('#timefrom').on('change', function(){
          // console.log("here");
          var timeFrom = $('#timefrom').val();
          var timeTo = $('#timeto').val();


          for(i in response){
            console.log(response[i]);
            var newDay = new Date(timeFrom);
            console.log(newDay);
            console.log(timeFrom.getMinutes() - 1);

            console.log(timeFrom>=response[i].timefrom);
            console.log(timeFrom<=response[i].timeto);
            if(timeFrom<=response[i].timeto && timeFrom>=response[i].timefrom){
              console.log("in" + response[i].timefrom);
              document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
              break;
            }
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
              document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
              break;
            }
            if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
              document.getElementById('addCourseerror').innerHTML = "Teacher already has a class";
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