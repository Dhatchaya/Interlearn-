const queryParams = new URLSearchParams(window.location.search);
console.log(queryParams);
const sub_id = window.location.href.toString().split("=")[1];
console.log(window.location.href.toString());
console.log(sub_id);
// const week = window.location.href.toString().split("/")[9];


// select teacher
var teacher = document.getElementById('ateacher_id');
teacher.addEventListener('change',function(event){
  if(teacher != ''){
    document.getElementById('alert-div5').style.display = 'none';  // show the alert div
  }
});


var timefa = document.getElementById('timefrom');
timefa.addEventListener('change',function(event){
  // event.target.reset();
  var teacher_id = document.getElementById('ateacher_id').value;
  var day = document.getElementById('dayAdd').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(timefa != ''){
    document.getElementById('alert-div7').style.display = 'none';  // show the alert div
  }

  if (teacher_id == '') {  // check if the subject field is not empty
    document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    document.getElementById('ateacher_id').value = '';  // clear the selected grade
    document.getElementById('timefrom').value = '';  // clear the selected grade
  }

  if (day == '') {  // check if the subject field is not empty
    document.getElementById('alert-div6').innerHTML = 'Please select a day before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div6').style.display = 'block';  // show the alert div
    document.getElementById('dayAdd').value = '';  // clear the selected grade
    document.getElementById('timefrom').value = '';
  }

});


var timeta = document.getElementById('timeto');
timeta.addEventListener('change',function(event){
  var teacher_id = document.getElementById('ateacher_id').value;
  var day = document.getElementById('dayAdd').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;

  if(timeta != ''){
    document.getElementById('alert-div7').style.display = 'none';  // show the alert div
  }

  if (teacher_id == '') {  // check if the subject field is not empty
    document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div5').style.display = 'block';  // show the alert div
    document.getElementById('ateacher_id').value = '';  // clear the selected grade
    document.getElementById('timeto').value = '';
  }

  if (day == '') {  // check if the subject field is not empty
    document.getElementById('alert-div6').innerHTML = 'Please select a day before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div6').style.display = 'block';  // show the alert div
    document.getElementById('dayAdd').value = '';  // clear the selected grade
    document.getElementById('timeto').value = '';
  }

  if (timeFrom == '') {  // check if the subject field is not empty
    document.getElementById('alert-div7').innerHTML = 'Please select a starting time before selecting a time.';  // set the message in the alert div
    document.getElementById('alert-div7').style.display = 'block';  // show the alert div
    document.getElementById('timefrom').value = '';  // clear the selected grade
    document.getElementById('timeto').value = '';
  }

});


var capacity = document.getElementById('capacity');
capacity.addEventListener('change',function(event){
  if(capacity != ''){
    document.getElementById('alert-div8').style.display = 'none';  // show the alert div
  }
});



var dayAdd = document.getElementById("dayAdd");
dayAdd.addEventListener('change', function(event) {
    var teacher_id = document.getElementById('ateacher_id').value;
    var day = document.getElementById('dayAdd').value;
    var timeFrom = document.getElementById('timefrom').value;
    var timeTo = document.getElementById('timeto').value;
    console.log('hi');
    console.log(teacher_id);


    if(day != ''){
      document.getElementById('alert-div6').style.display = 'none';  // show the alert div
    }

    if (teacher_id == '') {  // check if the subject field is not empty
      document.getElementById('alert-div5').innerHTML = 'Please select a teacher before selecting a day.';  // set the message in the alert div
      document.getElementById('alert-div5').style.display = 'block';  // show the alert div
      document.getElementById('dayAdd').value = '';  // clear the selected grade
    }
    else{
      $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable1',
        type: 'POST',
        data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
      success: function(response) {
        console.log(response);
         response = JSON.parse(response);
        console.log(response);
        var error = document.getElementById('addCourseerror1');


        var time2 = document.getElementById('timeto');
        time2.addEventListener('change', function(event){
          console.log("here");
          var timeFrom = document.getElementById('timefrom').value;
          var timeTo = document.getElementById('timeto').value;

          for(i in response){
            console.log(response[i]);
            console.log(timeTo);
            // console.log(timeTo>=response[i].timefrom);
            if(timeFrom > timeTo){
              document.getElementById('addCourseerror1').innerHTML = "Ending time should be greater than start time";
              break;
            }
            // if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
            //   document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
            //   break;
            // }
          }
        });


          }
        });

    }


});





// time check when adding the course
var submitCheck = document.getElementById('add-teacher');
submitCheck.addEventListener('click',function(event){
  event.preventDefault();
  var teacher_id = document.getElementById('ateacher_id').value;
  var day = document.getElementById('dayAdd').value;
  var timeFrom = document.getElementById('timefrom').value;
  var timeTo = document.getElementById('timeto').value;
  var capacity = document.getElementById('capacity').value;

  let formData = new FormData();

// console.log(teacher_id,grade,medium);
  $.ajax({
    url: 'http://localhost/Interlearn/public/receptionist/course/checkAvailable1',
    type: 'POST',
    data: {'teacher_id':teacher_id, 'day': day, 'timefrom': timeFrom, 'timeto': timeTo},
    success: function(response) {
      console.log("check1");
      var flag = 0;
       response = JSON.parse(response);
      console.log(response);
      var error = document.getElementById('addCourseerror1');

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
          document.getElementById('addCourseerror1').innerHTML = "Ending time should be greater than start time";
          document.getElementById('addCourseerror1').style.display = "block";
          flag = 1;
          break;

        }
        if(timeFrom<response[i].timeto && timeFrom>=response[i].timefrom){
          console.log("in" + response[i].timefrom);
          document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
          flag = 1;
          break;
        }
        if(timeTo<=response[i].timeto && timeTo>=response[i].timefrom){
          document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror1').style.display = "block";
          flag = 1;
          break;
        }
        if(response[i].timefrom<=timeTo && response[i].timefrom>=timeFrom){
          document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror1').style.display = "block";
          flag = 1;
          break;
        }
        if(response[i].timeto<=timeTo && response[i].timeto>=timeFrom){
          document.getElementById('addCourseerror1').innerHTML = "Teacher already has a class";
          document.getElementById('addCourseerror1').style.display = "block";
          flag = 1;
          break;
        }
      }

      if(teacher_id == ''){
        document.getElementById('alert-div5').innerHTML = 'Please select a teacher.';  // set the message in the alert div
        document.getElementById('alert-div5').style.display = 'block';  // show the alert div
        document.getElementById('ateacher_id').value = '';  // clear the selected grade
        flag = 1;
      }
      if(day == ''){
        document.getElementById('alert-div6').innerHTML = 'Please select a day.';  // set the message in the alert div
        document.getElementById('alert-div6').style.display = 'block';  // show the alert div
        document.getElementById('dayAdd').value = '';  // clear the selected grade
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

      if(flag == 0){

        console.log("check 2");

        formData.append('subject_Id', sub_id);
        formData.append('teacher_id', teacher_id);
        formData.append('day', day);
        formData.append('timefrom', timeFrom);
        formData.append('timeto', timeTo);
        formData.append('capacity', capacity);

        // console.log(subject,grade,medium);
        $.ajax({


          url : 'http://localhost/Interlearn/public/receptionist/course/addTeacher',
          type:"POST",
          data: formData,
          processData: false,
          contentType: false,
          success:function(response){

            console.log("success");
            closeModal();
            // console.log(response);
            response = JSON.parse(response);
            // console.log(response.status);

            // console.log(formData);
            console.log(response);

            console.log(response.status === "success");

            // if(response.status == true){
            //   console.log("hellooooooo");
              
              // window.location.href = "http://localhost/Interlearn/public/receptionist/course";
            // }
          },
          error:function(xhr,status,error){
            console.log("Error: " + error);
          }
      });
      }
    }
  });
});