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

// make an AJAX request to retrieve the quiz data
const xhr = new XMLHttpRequest();

xhr.open('GET', 'http://localhost/Interlearn/public/Student/quiz', true);
// xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = () => {
    if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);
        
        caches.log(data);
        data.forEach(question => {
          
            quiz.push(question);
        });
    } else {
        console.error('Error fetching quiz data');
    }
};

xhr.send();

console.log(quiz);