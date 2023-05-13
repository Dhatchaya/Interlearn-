// After modified

// import {quiz} from './question.js';
//  console.log(quiz);


// // Select two random objects
// const randomObjects = [];
// const usedIndexes = [];
// let count = 0;
// while (count < 2 && usedIndexes.length < quiz.length) {
//   const randomIndex = Math.floor(Math.random() * quiz.length);
//   if (!usedIndexes.includes(randomIndex)) {
//     usedIndexes.push(randomIndex);
//     randomObjects.push(quiz[randomIndex]);
//     count++;
//   }
// }

// // Create a new array with the selected objects
// const newArray = [...randomObjects];

// // Log the new array to the console
// const quizObj = JSON.parse(quiz);
// console.log(newArray);
// console.log(typeof(quiz));

const questionNumber = document.querySelector(".question-number");
const questionText = document.querySelector(".question-text");
const optionContainer = document.querySelector(".option-container");
const answersIndicatorContainer = document.querySelector(".answer-indicator");

const homeBox = document.querySelector(".home-box");
const quizBox = document.querySelector(".quiz-box");
const ResultBox = document.querySelector(".result-box");

let questionCounter = 0;
let currentQuestion;
let availableQuestions = [];
let availableOptions = [];

let correctAnswers = 0;
let attempt = 0;
let totalMarks = 0;
let MaxMarks = 0;
//set duration -------------------------------------------------------------------------------//
 // 5 minutes in seconds

// Format the remaining time as MM:SS
function formatTime(time) {
  const minutes = Math.floor(time / 60).toString().padStart(2, '0');
  const seconds = (time % 60).toString().padStart(2, '0');
  return `${minutes}:${seconds}`;
}

//-------------------------------------------------------------------------------------------------//

//push the question into available questions array
function setAvailableQuestions() {
    const totalQuestions = quiz.length;
    for (let i = 0; i < totalQuestions; i++) {
        availableQuestions.push(quiz[i])
    }
    console.log(availableQuestions)
}

//set question number and options
function getNewQuestion() {
    //set question number
    questionNumber.innerHTML = "Question " + (questionCounter + 1) + " of " + quiz.length;
    //set question text and get random question
    const questionIndex = availableQuestions[Math.floor(Math.random() * availableQuestions.length)];
    currentQuestion = questionIndex;
    questionText.innerHTML = currentQuestion.q;
    console.log(currentQuestion.duration);

    console.log(currentQuestion.disable_time);

    var now = new Date();
    var year = now.getFullYear().toString();
    var month = ('0' + (now.getMonth() + 1)).slice(-2);
    var day = ('0' + now.getDate()).slice(-2);
    var hours = ('0' + now.getHours()).slice(-2);
    var minutes = ('0' + now.getMinutes()).slice(-2);
    var seconds = ('0' + now.getSeconds()).slice(-2);

    var currentDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    // console.log(currentDateTime);

    console.log('hello');
    console.log(currentDateTime);

    if(currentQuestion.disable_time <= currentDateTime) {
        clearInterval(timer);
        quizOver();
    }

    //get the position of the questionIndex from the availableQuestions array\
    const index1 = availableQuestions.indexOf(questionIndex);

    //remove the questionIndex from the availableQuestions array
    availableQuestions.splice(index1, 1);

    // console.log(questionIndex);
    console.log(availableQuestions);

    //set option
    //get length of options
    const optionLength = currentQuestion.options.length;

    //push into available array
    for(let i = 0; i < optionLength; i++) {
        availableOptions.push(i);
    }
    // console.log(availableOptions);
    optionContainer.innerHTML = "";

    let animationDelay = 0.15;
    //create options in html
    for(let i = 0; i < optionLength; i++) {
        //random option
        const optionIndex = availableOptions[Math.floor(Math.random() * availableOptions.length)];
        //position of the optionIndex
        const index2 = availableOptions.indexOf(optionIndex);
        //remove the optionIndex from the availableOptions array
        availableOptions.splice(index2,1);
        // console.log(optionIndex);
        const option = document.createElement("div");
        //Changed below to .text
        option.innerHTML = currentQuestion.options[optionIndex].text;
        option.id = optionIndex;
        option.style.animationDelay = animationDelay + 's';
        animationDelay = animationDelay + 0.15;
        option.className = "option";
        optionContainer.appendChild(option);

        option.setAttribute("onclick", "getResult(this)");
    }

    questionCounter++;
}

function getResult(Element) {
    const id = parseInt(Element.id);
    // console.log(currentQuestion.options[id].marks);

    totalMarks = totalMarks + currentQuestion.options[id].marks * currentQuestion.mark;

    // its clicked as answer
    Element.classList.add('answered');
    console.log('hehe');
    console.log(typeof(currentQuestion.mark));
    parseInt(currentQuestion.mark);
    
    console.log(parseInt(currentQuestion.mark));

    MaxMarks = MaxMarks + parseInt(currentQuestion.mark)
    console.log(totalMarks);
    console.log(MaxMarks);
    // Check answer comparing clicked option
    if(id === currentQuestion.answer) {
        //set green color for correct answer
        // Element.classList.add('correct');

        // updateAnswerIndicator("correct");
        // correctAnswers++;
    }
    else {
        Element.classList.add('wrong');
        // updateAnswerIndicator("wrong");
        //show correct answer
        const optionLength = optionContainer.children.length;
        for (let i = 0; i < optionLength; i++) {
            if (parseInt(optionContainer.children[i].id) === currentQuestion.answer) {
                optionContainer.children[i].classList.add('correct');
            }
        }
    }
    // attempt++;
    
    Element.classList.add('already-answered');
    // unclickableOptions();
}
//make all options are unclickable once selected a option is clicked
function unclickableOptions() {
    const optionLength = optionContainer.children.length;
    for (let i = 0; i < optionLength; i++) {
        optionContainer.children[i].classList.add("already-answered");
    } 

}


function answerIndicator() {
    answersIndicatorContainer.innerHTML = '';
    const totalQuestion = quiz.length;
    for (let i = 0; i < totalQuestion; i++) {
        const indicator = document.createElement("div");
        answersIndicatorContainer.appendChild(indicator);
    }
}

function updateAnswerIndicator(markType) {
    //  console.log(markType);
    answersIndicatorContainer.children[questionCounter - 1].classList.add(markType);
}

function quizOver() {
    //hide quiz box
      quizBox.classList.add("hide");

    // show results box
    ResultBox.classList.remove("hide");

    quizResults();
}
function next() {
    if(questionCounter == quiz.length) {
        updateAnswerIndicator("answered");
        console.log("quiz over ");
        quizOver();
    }
    else {
        updateAnswerIndicator("answered");
        getNewQuestion();
    }
}

// getting URL
// Example JS code in your_js_file.js
function getQuizIdFromUrl() {
    // Get the current URL
    const url = window.location.href;

    // Extract the quiz_id from the URL using a regular expression
    const regex = /quiz_id=([\w\d]+)/;
    const match = url.match(regex);

    if (match) {
      // Return the quiz_id if it was found in the URL
      return match[1];
    } else {
      // Return null if the quiz_id was not found in the URL
      return null;
    }
}

// URL

function quizResults() {
    let num = (totalMarks / MaxMarks)*total_points;
    ResultBox.querySelector(".total-question").innerHTML = quiz.length;
    ResultBox.querySelector(".total-score").innerHTML = num.toFixed(2)  + ' / ' + total_points;

    let x = 5;
    let newTot = num*100/total_points;
    const quizId = getQuizIdFromUrl();
    console.log(quizId);
    console.log(totalMarks);
    console.log(newTot);
    // Send totalMarks to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/Interlearn/public/Student/quiz/marks", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText);
        }
    };
    xhr.send("totalMarks=" + newTot + "&quizId=" + quizId);

}

function resetQuiz() {
    questionCounter = 0;
    correctAnswers = 0;
    attempt = 0;
}

function tryAgainQuiz() {
    ResultBox.classList.add("hide");
    quizBox.classList.remove("hide");

    resetQuiz();
    StartQuiz();

}
// window.onload = function () {


// window.onload = function () {
//     // homeBox.querySelector(".total-question").innerHTML = totques;
//     homeBox.querySelector(".description").innerHTML = quiz.description;
// }


// Set the totalMarks variable
// var totalMarks = 80;
