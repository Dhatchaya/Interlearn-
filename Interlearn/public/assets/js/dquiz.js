const queryParams = new URLSearchParams(window.location.search);
let id="";
if (queryParams.has("quiz_id")) {

    id = queryParams.get("quiz_id");
}
console.log(id);
// const quiz = [
//     {
//       "q": 'What is the capital of France?',
//       "options": [
//         { text: 'Paris', marks: 10 },
//         { text: 'London', marks: 0 },
//         { text: 'Berlin', marks: 0 },
//         { text: 'Madrid', marks: 0 }
//       ]
//     },
//     {
//         "q": 'What is the largest country by area?',
//         "options": [
//         { text: 'Russia', marks: 10 },
//         { text: 'Canada', marks: 5 },
//         { text: 'China', marks: 0 },
//         { text: 'India', marks: 0 }
//       ]
//     },
//     {
//       "q": 'What is the capital of France?',
//       "options": [
//         { text: 'Paris', marks: 10 },
//         { text: 'London', marks: 0 },
//         { text: 'Berlin', marks: 0 },
//         { text: 'Madrid', marks: 0 }
//       ]
//     },
//     {
//         "q": 'What is the largest country by area?',
//         "options": [
//         { text: 'Russia', marks: 10 },
//         { text: 'Canada', marks: 5 },
//         { text: 'China', marks: 0 },
//         { text: 'India', marks: 0 }
//       ]
//     },
//   ]

const quiz = [];

let totques = 0;
// make an AJAX request to retrieve the quiz data
const xhr = new XMLHttpRequest();

xhr.open('GET', 'http://localhost/Interlearn/public/Student/quiz/view?quiz_id='+id, true);
// xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = () => {
    if (xhr.status === 200) {
        console.log(xhr.responseText);
        // console.log(xhr.responseText.length);
        const data = JSON.parse(xhr.responseText);
        
        console.log(data[0].duration);
        console.log(data.length);
        totques = data.length;
        data.forEach(question => {
            quiz.push(question);
        });
      
    } else {
        console.error('Error fetching quiz data');
    } 
};

xhr.send();

console.log(quiz);
console.log(duration);