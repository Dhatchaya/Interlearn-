// Get the modal
const modal3 = document.getElementById("profileModal3");

// Get the button that opens the modal
const btn3 = document.getElementById("button30");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span3 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal3(number) {

    document.getElementById("aid").value = number;

    modal3.style.display = "block";
    console.log(modal3);
}

// When the user clicks on <span> (x), close the modal
function closeModal3() {
    modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}



// Get the modal
const modal6 = document.getElementById("profileModal6");

// Get the button that opens the modal
const btn6 = document.getElementById("button33");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span6 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal6(number) {
    document.getElementById("delete-aid").value = number;
    modal6.style.display = "block";
    console.log(modal3);
}

// When the user clicks on <span> (x), close the modal
function closeModal6() {
    modal6.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal6) {
        modal6.style.display = "none";
    }
}