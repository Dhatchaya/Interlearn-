// console.log("here");
// $.ajax({
//     method: "GET",
//     url:`http://localhost/Interlearn/public/receptionist/course/select`,

//     success: function(data) {
//       console.log(data);
//     }
// });


//filter grades with all 3 mediums
$('#subject').on('input',function(){
  var subject = $(this).val();
  if (subject != '') {  // check if the subject field is not empty
    $('#alert-div1').hide();  // hide the alert div
  }
  $.ajax({
    url:'http://localhost/Interlearn/public/receptionist/course/findGrade',
    type: 'POST',
    data: {'subject': subject},
    success: function(response){

      response = JSON.parse(response);

      let allGrades = ['6', '7', '8', '9', '10', '11', '12', '13'];


      let gradesNotInJson = [];

      if (Array.isArray(response) && response.length > 0) {
        allGrades.forEach(grade => {
          if (!response.find(element => element.grade === grade)) {
            gradesNotInJson.push(grade);
          }
        });
      } else {
        console.log('Response is not an array or is empty.');
        gradesNotInJson = allGrades;
      }

      if (gradesNotInJson.length === 0) {
        console.log('No grades to remove.');
      } else {
        console.log('Grades to remove:', gradesNotInJson);
      }

      let selectField = document.getElementById("grades");

      selectField.innerHTML = `<option value="" selected>--Select grade--</option>`

      gradesNotInJson.forEach(element => {
          selectField.innerHTML += `<option value="${element}">Grade ${element}</option>`
      });

    }
  });
});


// Filter available mediums
$('#grades').on('change', function() {
  var subject = $('#subject').val();
  if(subject == ''){
    $('#alert-div1').html('Please enter a subject before selecting a grade.');  // set the message in the alert div
    $('#alert-div1').show();  // show the alert div
    $('#grades').val('');  // clear the selected grade
  }
  else{
    var grade = $(this).val();
    if (grade != '') {  // check if the grade field is not empty
      $('#alert-div2').hide();  // hide the alert div
    }
    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/findMedium',
        type: 'POST',
        data: {'subject': subject, 'grade': grade},
        success: function(response) {

          response = JSON.parse(response);

          let allMediums = ['Sinhala', 'English', 'Tamil'];


          let mediumsNotInJson = [];


          if (Array.isArray(response) && response.length > 0) {
            allMediums.forEach(language_medium => {
              if (!response.find(element => element.language_medium === language_medium)) {
                // console.log(language_medium);
                mediumsNotInJson.push(language_medium);
              }
            });
          } else {
            console.log('Response is not an array or is empty.');
            mediumsNotInJson = allMediums;
          }

          if (mediumsNotInJson.length === 0) {
            console.log('No mediums to remove.');
          } else {
            console.log('Mediums to remove:', mediumsNotInJson);
          }

          let selectField = document.getElementById("mediums");

          selectField.innerHTML = `<option value="" selected>--Select language medium--</option>`

          mediumsNotInJson.forEach(element => {
              selectField.innerHTML += `<option value="${element}">${element}</option>`
        });
        }
    });
  }

});


$('#mediums').on('change',function(){
  var subject = $('#subject').val();
  var grade = $('#grades').val();
  var medium = $(this).val();
  console.log("1");
  if (subject == '') {  // check if the subject field is empty
    console.log("2");
    // $('#alert-div1').show();
    $('#alert-div1').html('Please enter a subject before selecting a grade.');  // set the message in the alert div
    $('#alert-div1').show();  // show the alert div
    $('#grades').val('');  // clear the selected grade
  }
  console.log(grade == null);

  if(grade == null || grade == 'grade'){
    console.log('hi');
    $('#alert-div2').html('Please select a grade before selecting a language medium.');  // set the message in the alert div
    $('#alert-div2').show();  // show the alert div
    $('#mediums').val('');  // clear the selected grade
  }
  else{
    $('#alert-div1').hide(); // hide the subject alert div
    $('#alert-div2').hide(); // hide the grade alert div
  }
});



$('#description').on('input',function(){
  var subject = $('#subject').val();
  var grade = $('#grades').val();
  var medium = $('#mediums').val();
  var description = $(this).val();
  if (subject == '') {  // check if the subject field is empty
    $('#alert-div1').html('Please enter a subject before selecting a grade.');  // set the message in the alert div
    $('#alert-div1').show();  // show the alert div
    $('#grades').val('');  // clear the selected grade
  }
  if(grade == null || grade == 'grade'){
    console.log('hi');
    $('#alert-div2').html('Please select a grade before selecting a language medium.');  // set the message in the alert div
    $('#alert-div2').show();  // show the alert div
    $('#mediums').val('');  // clear the selected grade
  }
  if(medium == '' || medium == '--Select language medium--'){
    console.log('hi');
    $('#alert-div3').html('Please select a language medium before adding a description.');  // set the message in the alert div
    $('#alert-div3').show();  // show the alert div
    $('#description').val('');  // clear the selected grade
  }
  else{
    $('#alert-div1').hide(); // hide the subject alert div
    $('#alert-div2').hide(); // hide the grade alert div
    $('#alert-div3').hide(); // hide the grade alert div
  }
});


// Filter available teachers
$('#day').on('change', function() {
  var subject = $('#subject').val();
  var grade = $('#grades').val();
  var teacher_id = $('#teacher_id').val();
  var day = $('#day').val();
  var timeFrom = $('#timefrom').val();
  var timeTo = $('#timeto').val();
  // console.log('hi');
  $.ajax({
      url: 'http://localhost/Interlearn/public/receptionist/course/available',
      type: 'POST',
      data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
         response = JSON.parse(response);
        console.log(response);
        var error = $('#addCourseerror');
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

            // var tmpnewDay = new Date(timeFrom);
            // var newDay = new Date(tmpnewDay.getTime());
            // console.log(tmpnewDay);
            // console.log(timeFrom);
            // // console.log(newDay.getMinutes() - 1);

            // newDay.setMinutes(newDay.getMinutes() - 1);
            // console.log(newDay);

            console.log(timeFrom>=response[i].timefrom);
            console.log(timeFrom<=response[i].timeto);
            if(timeFrom<response[i].timeto && timeFrom>=response[i].timefrom){
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

function teacherHasClassOnTime(teacher, timeFrom, timeTo) {
  var day = $('#day').val();
  var teacherHasClass = false;
  // Check if the teacher has a class scheduled in the selected time range
  $.ajax({
    url: '/check-teacher-schedule',
    type: 'POST',
    data: {'teacher_id': teacher.id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
    async: false,
    success: function(response) {
      teacherHasClass = response.hasClass;
    }
  });
  return teacherHasClass;
}