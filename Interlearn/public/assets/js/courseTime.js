$('#day').on('change', function() {
    var teacher_id = $('#teacher_id').val();
    var day = $('#day').val();
    var timeFrom = $('#timefrom').val();
    var timeTo = $('#timeto').val();
    // console.log('hi');
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timeFrom': timeFrom, 'timeTo': timeTo},
        success: function(response) {
            console.log(response);
           response = JSON.parse(response);
          console.log(response);
          var error = $('#addCourseerror');
          $('#timefrom').on('change', function(){
            console.log("here");
            var timeFrom = $('#timefrom').val();
            var timeTo = $('#timeto').val();
            for(i in response){
              console.log(response[i]);
              console.log(timeFrom>response[i].timefrom);
              if(timeFrom<response[i].timeto ||timeFrom>response[i].timefrom){
                document.getElementById('#addCourseerror').innerHTML = "Teacher already has a class";
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
              console.log(timeTo>response[i].timefrom);
              if(timeFrom > timeTo){
                document.getElementById('#addCourseerror').innerHTML = "Ending time should be greater than start time";
                break;
              }
              if(timeTo<response[i].timeto ||timeTo>response[i].timefrom){
                document.getElementById('#addCourseerror').innerHTML = "Teacher already has a class";
                break;
              }
            }
          });
        }
    });
});