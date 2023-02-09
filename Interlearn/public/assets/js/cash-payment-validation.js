

const form = document.querySelector('form');
const errorSpace1 = document.querySelector('.errorSpace1');
const errorSpace2 = document.querySelector('.errorSpace2');
const errorSpace3 = document.querySelector('.errorSpace3');
const errorSpace4 = document.querySelector('.errorSpace4');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  errorSpace1.innerHTML = ""; // clear any previous error messages
  errorSpace2.innerHTML = "";
  errorSpace3.innerHTML = "";
  errorSpace4.innerHTML = "";

  const StudentID = document.querySelector('#student-id');
  const StudentName = document.querySelector('#student-name');
  const Month = document.querySelector('#month');
  const classID = document.querySelector('#class-ID');

  let error = false;

  if (!StudentID.value) {
    errorSpace1.innerHTML += "*Student ID is required<br>";
    error = true;
  } 
  

  if (!StudentName.value) {
    errorSpace2.innerHTML += "*Student Name required<br>";
    error = true;
  }



  if (!classID.value) {
    errorSpace4.innerHTML += "*CVV is required<br>";
    error = true;
  } 
  if (!error) {
    form.submit();
  }
});