// After modified

// import {quiz} from './question.js';
// console.log(quiz);
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


//set duration -------------------------------------------------------------------------------//
const duration = 300; // 5 minutes in seconds
let timeRemaining = duration;

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
}

//set question number and options
function getNewQuestion() {
    //set question number
    questionNumber.innerHTML = "Question " + (questionCounter + 1) + " of " + quiz.length;
    //set question text and get random question
    const questionIndex = availableQuestions[Math.floor(Math.random() * availableQuestions.length)];
    currentQuestion = questionIndex;
    questionText.innerHTML = currentQuestion.q;

    //get the position of the questionIndex from the availableQuestions array\
    const index1 = availableQuestions.indexOf(questionIndex);

    //remove the questionIndex from the availableQuestions array
    availableQuestions.splice(index1, 1);

    // console.log(questionIndex);
    // console.log(availableQuestions);

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

    totalMarks = totalMarks + currentQuestion.options[id].marks;

    // its clicked as answer
    Element.classList.add('answered');

    console.log(totalMarks);
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

function quizResults() {
    ResultBox.querySelector(".total-question").innerHTML = quiz.length;
    ResultBox.querySelector(".total-score").innerHTML = totalMarks;
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
function StartQuiz() {
    //1st we set all questions in availableQuestions array

    homeBox.classList.add("hide");

    quizBox.classList.remove("hide");

// Display the timer -------------------------------------------//
    const timerDisplay = document.querySelector('.timer');
    timerDisplay.innerHTML = formatTime(timeRemaining);
    
    // Create the countdown timer
    const timer = setInterval(() => {
    
    // const remainTime = document.querySelector('.remain-time');
    timeRemaining--;
    timerDisplay.innerHTML = formatTime(timeRemaining);
        // console.log(timeRemaining);
    // Alert participants when time is running out
    if (timeRemaining < 295) {
        timerDisplay.classList.add('warning');
    }

    // Submit answers automatically when time is up
    if (timeRemaining <= 0) {
        clearInterval(timer);
        // submitQuiz();
    }
    }, 1000);
//-----------------------------------------------------------------//
    setAvailableQuestions();
    // 2nd we call getNewQuestion(); function
    getNewQuestion();

    answerIndicator();
}


window.onload = function () {
    homeBox.querySelector(".total-question").innerHTML = quiz.length;
}