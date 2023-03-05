// function myFunction1() {
//     var x = document.getElementById("already");
//     if (x.style.display === "none") {
//       x.style.display = "block";
//     } else {
//       x.style.display = "none";
//     }
// }

// function myFunction2() {
//     var x = document.getElementById("new");
//     if (x.style.display === "none") {
//       x.style.display = "block";
//     } else {
//       x.style.display = "none";
//     }
// }


// Get the modal
const modal4 = document.getElementById("profileModal4");

// Get the button that opens the modal
const btn4 = document.getElementById("button35");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span4 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal4(number) {

    document.getElementById("delete-course").value = number;

    modal4.style.display = "block";
    console.log(modal3);
}

// When the user clicks on <span> (x), close the modal
function closeModal4() {
    modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
}