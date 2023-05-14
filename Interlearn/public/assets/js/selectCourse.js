// console.log("here");
// $.ajax({
//     method: "GET",
//     url:`http://localhost/Interlearn/public/receptionist/course/select`,

//     success: function(data) {
//       console.log(data);
//     }
// });


if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );
}

//filter grades with all 3 mediums
var sub = document.getElementById('subject');
sub.addEventListener('input',function(event){
  var subject = document.getElementById('subject').value;
  if (subject != '') {  // check if the subject field is not empty
    document.getElementById('alert-div1').style.display = 'none';  // hide the alert div
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
var grd = document.getElementById('grades');
grd.addEventListener('change', function() {
  var subject = document.getElementById('subject').value;
  if(subject == ''){

    document.getElementById('alert-div1').innerHTML = 'Please enter a subject before selecting a grade.';  // set the message in the alert div
    document.getElementById('alert-div1').style.display = 'block';  // show the alert div
    document.getElementById('grades').value = '';  // clear the selected grade
  }
  else{
    var grade = document.getElementById('grades').value;
    console.log(grade);
    if (grade != '') {  // check if the grade field is not empty
      document.getElementById('alert-div2').style.display = 'none';  // hide the alert div
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

var med = document.getElementById('mediums');
med.addEventListener('change',function(){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var medium = document.getElementById('mediums').value;
  console.log("1");
  if (medium != '') {  // check if the grade field is not empty
    document.getElementById('alert-div3').style.display = 'none';  // hide the alert div
  }
  if (subject == '') {  // check if the subject field is empty
    console.log("2");
    // document.getElementById('alert-div1').style.display = 'block';
    document.getElementById('alert-div1').innerHTML = 'Please enter a subject before selecting a grade.';  // set the message in the alert div
    document.getElementById('alert-div1').style.display = 'block';  // show the alert div
    document.getElementById('grades').value = '';  // clear the selected grade

  }
  console.log(grade == '');

  if(grade == ''){
    console.log('hi');


    document.getElementById('alert-div2').innerHTML = 'Please select a grade before selecting a language medium.';  // set the message in the alert div
    document.getElementById('alert-div2').style.display = 'block';  // show the alert div
    document.getElementById('mediums').value = '';  // clear the selected grade
  }
  else{
    document.getElementById('alert-div1').style.display = 'none'; // hide the subject alert div
    document.getElementById('alert-div2').style.display = 'none'; // hide the grade alert div
  }
});


var desc = document.getElementById('description');
desc.addEventListener('input',function(){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var medium = document.getElementById('mediums').value;
  var description = document.getElementById('description').value;
  if (subject == '') {  // check if the subject field is empty
    console.log(3);
    document.getElementById('alert-div1').innerHTML = 'Please enter a subject before selecting a grade.';  // set the message in the alert div
    document.getElementById('alert-div1').style.display = 'block';  // show the alert div
    document.getElementById('grades').value = '';  // clear the selected grade
  }
  if(grade == '' ){
    console.log(4);
    document.getElementById('alert-div2').innerHTML = 'Please select a grade before selecting a language medium.';  // set the message in the alert div
    document.getElementById('alert-div2').style.display = 'block';  // show the alert div
    document.getElementById('mediums').value = '';  // clear the selected grade
  }
  if(medium == '' ){
    console.log('hi');
    document.getElementById('alert-div3').innerHTML = 'Please select a language medium before adding a description.';  // set the message in the alert div
    document.getElementById('alert-div3').style.display = 'block';  // show the alert div
    document.getElementById('description').value = '';  // clear the selected grade
  }
  else{
    console.log('hi');
    document.getElementById('alert-div1').style.display = 'none'; // hide the subject alert div
    document.getElementById('alert-div2').style.display = 'none'; // hide the grade alert div
    document.getElementById('alert-div3').style.display = 'none'; // hide the medium alert div
  }
});


// select teacher
var teacher = document.getElementById('teacher_id');
teacher.addEventListener('change',function(event){
  if(teacher != ''){
    document.getElementById('alert-div5').style.display = 'none';  // show the alert div
  }
});


// filter teachers according to day
var day1 = document.getElementById('day');
day1.addEventListener('change',function(event){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(day != ''){
    document.getElementById('alert-div6').style.display = 'none';  // show the alert div
  }

  if (teacher_id == '') {  // check if the subject field is not empty
    document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a day.';  // set the message in the alert div
    document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    document.getElementById('day').value = '';  // clear the selected grade
  }
  else{
    $.ajax({
      url: 'http://localhost/Interlearn/public/receptionist/course/available',
      type: 'POST',
      data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        var flag = 0;
        response = JSON.parse(response);
        console.log(response);
        var error = document.getElementById('addCourseerror');

        var time6 = document.getElementById('timeto');
        time6.addEventListener('change', function(){
          console.log("here");
          var timeFrom = document.getElementById('timefrom').value;
          var timeTo = document.getElementById('timeto').value;

        for(i in response){
              console.log(response[i]);
              console.log(timeTo);
              console.log(timeFrom);
              console.log(timeTo>=response[i].timefrom);
              console.log(timeFrom > timeTo);
              if(timeFrom > timeTo){
                console.log("inside");
                document.getElementById('addCourseerror').innerHTML = "Ending time should be greater than start time";
                document.getElementById('addCourseerror').style.display = "block";
                flag = 1;
                break;
  
              }
              else{
                flag = 0;
                document.getElementById('addCourseerror').style.display = "none";
              }
            }
          });

          }
        });
  }
});



// time check when adding the course
var submitCheck = document.getElementById('courseSubmitBtn');
submitCheck.addEventListener('click',function(event){
  event.preventDefault();
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var medium = document.getElementById('mediums').value;
  var description = document.getElementById('description').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;
  var capacity = document.getElementById('capacity').value;
  var fee = document.getElementById('fee').value;

  let formData = new FormData();

console.log(subject,grade,medium);
  $.ajax({
    url: 'http://localhost/Interlearn/public/receptionist/course/available',
    type: 'POST',
    data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
    success: function(response) {
      var flag = 0;
       response = JSON.parse(response);
      console.log(response);
      var error = document.getElementById('addCourseerror');

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
          document.getElementById('addCourseerror').style.display = "block";
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

      if(subject == ''){
        document.getElementById('alert-div1').innerHTML = 'Please enter a subject.';  // set the message in the alert div
        document.getElementById('alert-div1').style.display = 'block';  // show the alert div
        document.getElementById('subject').value = '';  // clear the selected grade
        flag = 1;
      }
      if(grade == ''){
        document.getElementById('alert-div2').innerHTML = 'Please select a grade.';  // set the message in the alert div
        document.getElementById('alert-div2').style.display = 'block';  // show the alert div
        document.getElementById('grades').value = '';  // clear the selected grade
        flag = 1;
      }
      if(medium == ''){
        document.getElementById('alert-div3').innerHTML = 'Please select a medium.';  // set the message in the alert div
        document.getElementById('alert-div3').style.display = 'block';  // show the alert div
        document.getElementById('mediums').value = '';  // clear the selected grade
        flag = 1;
      }
      if(description == ''){
        document.getElementById('alert-div4').innerHTML = 'Please enter a description.';  // set the message in the alert div
        document.getElementById('alert-div4').style.display = 'block';  // show the alert div
        document.getElementById('description').value = '';  // clear the selected grade
        flag = 1;
      }
      if(teacher_id == ''){
        document.getElementById('alert-div5').innerHTML = 'Please select a teacher.';  // set the message in the alert div
        document.getElementById('alert-div5').style.display = 'block';  // show the alert div
        document.getElementById('description').value = '';  // clear the selected grade
        flag = 1;
      }
      if(day == ''){
        document.getElementById('alert-div6').innerHTML = 'Please select a day.';  // set the message in the alert div
        document.getElementById('alert-div6').style.display = 'block';  // show the alert div
        document.getElementById('day').value = '';  // clear the selected grade
        flag = 1;
      }
      if(timeFrom == ''){
        document.getElementById('alert-div7').innerHTML = 'Please select a starting time.';  // set the message in the alert div
        document.getElementById('alert-div7').style.display = 'block';  // show the alert div
        document.getElementById('timefrom').value = '';  // clear the selected grade
        flag = 1;
      }
      if(timeTo == ''){
        document.getElementById('alert-div7').innerHTML = 'Please select an ending time.';  // set the message in the alert div
        document.getElementById('alert-div7').style.display = 'block';  // show the alert div
        document.getElementById('timeto').value = '';  // clear the selected grade
        flag = 1;
      }
      if(capacity == ''){
        document.getElementById('alert-div8').innerHTML = 'Please enter a capacity.';  // set the message in the alert div
        document.getElementById('alert-div8').style.display = 'block';  // show the alert div
        document.getElementById('capacity').value = '';  // clear the selected grade
        flag = 1;
      }
      if(fee == ''){
        document.getElementById('alert-div9').innerHTML = 'Please enter a fee.';  // set the message in the alert div
        document.getElementById('alert-div9').style.display = 'block';  // show the alert div
        document.getElementById('fee').value = '';  // clear the selected grade
        flag = 1;
      }

      if(flag == 0){

        formData.append('subject', subject);
        formData.append('grade', grade);
        formData.append('language_medium', medium);
        formData.append('description', description);
        formData.append('teacher_id', teacher_id);
        formData.append('day', day);
        formData.append('timefrom', timeFrom);
        formData.append('timeto', timeTo);
        formData.append('capacity', capacity);
        formData.append('monthlyFee', fee);

        console.log(subject,grade,medium,fee);
        $.ajax({


          url : 'http://localhost/Interlearn/public/receptionist/course/submitAddCourse',
          type:"POST",
          data: formData,
          processData: false,
          contentType: false,
          success:function(response){

            console.log("success");
            response = JSON.parse(response);
            console.log(response);
            console.log(response.status);

            console.log(response.status === "success");

            if(response.status == 'success'){
              window.location.href = "http://localhost/Interlearn/public/receptionist/course";
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


var timef = document.getElementById('timefrom');
timef.addEventListener('change',function(event){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(timef != ''){
    document.getElementById('alert-div7').style.display = 'none';  // show the alert div
  }

  if (teacher_id == '') {  // check if the subject field is not empty
    document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    document.getElementById('teacher_id').value = '';  // clear the selected grade
  }

  if (day == '') {  // check if the subject field is not empty
    document.getElementById('alert-div6').innerHTML = 'Please select a day before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div6').style.display = 'block';  // show the alert div
    document.getElementById('day').value = '';  // clear the selected grade
  }

});


var timet = document.getElementById('timeto');
timet.addEventListener('change',function(event){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(timet != ''){
    document.getElementById('alert-div7').style.display = 'none';  // show the alert div
  }

  if (teacher_id == '') {  // check if the subject field is not empty
    document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    document.getElementById('teacher_id').value = '';  // clear the selected grade
  }

  if (day == '') {  // check if the subject field is not empty
    document.getElementById('alert-div6').innerHTML = 'Please select a day before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div6').style.display = 'block';  // show the alert div
    document.getElementById('day').value = '';  // clear the selected grade
  }

});




var capacity = document.getElementById('capacity');
capacity.addEventListener('input',function(event){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(capacity != ''){
    console.log(typeof capacity.value);
    if(isNaN(capacity.value)){
      console.log("not a number");
      document.getElementById('alert-div8').innerHTML = 'Please enter a numeric value.';  // set the message in the alert div
      document.getElementById('alert-div8').style.display = 'block';  // show the alert div
      document.getElementById('description').value = '';  // clear the selected grade
    }
    else{
      console.log("number");
      document.getElementById('alert-div8').style.display = 'none';
    }
    // document.getElementById('alert-div8').style.display = 'none';
  }

});



var fee = document.getElementById('fee');
fee.addEventListener('input',function(event){
  var subject = document.getElementById('subject').value;
  var grade = document.getElementById('grades').value;
  var teacher_id = document.getElementById('teacher_id').value;
  var day = document.getElementById('day').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(fee != ''){
    console.log(typeof fee.value);
    if(isNaN(fee.value)){
      console.log("not a number");
      document.getElementById('alert-div9').innerHTML = 'Please enter a numeric value.';  // set the message in the alert div
      document.getElementById('alert-div9').style.display = 'block';  // show the alert div
      document.getElementById('description').value = '';  // clear the selected grade
    }
    else{
      console.log("number");
      document.getElementById('alert-div9').style.display = 'none';
    }
    // document.getElementById('alert-div8').style.display = 'none';
  }

});



function teacherHasClassOnTime(teacher, timeFrom, timeTo) {
  var day = document.getElementById('day').value;
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