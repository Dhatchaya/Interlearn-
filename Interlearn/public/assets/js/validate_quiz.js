function validateForm() {

    // validate add question form
    var question = document.forms["myForm"]["question_title"].value;
    var marks = document.forms["myForm"]["question_mark"].value;
    var choice1 = document.forms["myForm"]["choice1"].value;
    var choice2 = document.forms["myForm"]["choice2"].value;
    var choice3 = document.forms["myForm"]["choice3"].value;
    var choice4 = document.forms["myForm"]["choice4"].value;

    var choice1_mark = parseFloat(document.forms["myForm"]["choice1_mark"].value);
    var choice2_mark = parseFloat(document.forms["myForm"]["choice2_mark"].value);
    var choice3_mark = parseFloat(document.forms["myForm"]["choice3_mark"].value);
    var choice4_mark = parseFloat(document.forms["myForm"]["choice4_mark"].value);
    var sum = choice1_mark + choice2_mark + choice3_mark + choice4_mark;

    if (sum != 1) {
        document.getElementById("sum-error").innerHTML = "The sum of the fields must equal 1";
        return false;
    }

    if (question == "") {
        document.getElementById("question-error").innerHTML = "Please enter question";
        return false;
    }
    if (marks == "") {
        document.getElementById("marks-error").innerHTML = "Please enter marks";
        return false;
    }
    if (choice1 == "") {
        document.getElementById("choice1-error").innerHTML = "Please enter choice for the question";
        return false;
    }
    if (choice2 == "") {
        document.getElementById("choice2-error").innerHTML = "Please enter choice for the question";
        return false;
    }
    if (choice3 == "") {
        document.getElementById("choice3-error").innerHTML = "Please enter choice for the question";
        return false;
    }
    if (choice4 == "") {
        document.getElementById("choice4-error").innerHTML = "Please enter choice for the question";
        return false;
    }


    
}


function validateConfirmForm() {
    //validate confirm form
    var total_question = document.forms["confirmForm"]["display_question"].value;
    if (total_question == "") {
        document.getElementById("total-error").innerHTML = "Please enter total number of questions";
        return false;
    }

    var selectedDate = new Date(document.forms["confirmForm"]["quizz_date"].value);
    var today = new Date();

    if (selectedDate <= today) {
        document.getElementById("date-error").innerHTML = "Please select a date today or after today";
        return false;
    }

    // var enableTimeError = new Time(document.forms["confirmForm"]["quizz_date"].value);
    // if (selectedDate <= today || selectedDate == "") {
    //     document.getElementById("date-error").innerHTML = "Please select a date today or after today";
    //     return false;
    // }


    // Get the values of the "enable time" and "disable time" fields from the user input
    var enableTimeInput = document.getElementById('enable-time').value;
    var disableTimeInput = document.getElementById('disable-time').value;

    // Convert the input values into JavaScript Date objects
    var enableTime = new Date('1970-01-01T' + enableTimeInput + ':00');
    var disableTime = new Date('1970-01-01T' + disableTimeInput + ':00');

    // Validate that the "enable time" is before the "disable time"
    if (enableTime.getTime() < disableTime.getTime()) {
    // "enable time" is before "disable time"
    console.log('Enable time is before disable time');
    } else {
    // "enable time" is after or equal to "disable time"
    console.log('Enable time must be before disable time');
    }


    //check duration
    var duration = document.forms["confirmForm"]["duration"].value;
    if (duration == "") {
        document.getElementById("duration-error").innerHTML = "Please enter a duration";
        return false;
    }

    var points = document.forms["confirmForm"]["total_points"].value;
    if (points == "") {
        document.getElementById("points-error").innerHTML = "Please enter the total marks";
        return false;
    }
}
