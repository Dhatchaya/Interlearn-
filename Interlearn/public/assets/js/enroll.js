// function openTheForm() {
//     document.getElementById("popup").style.display = "block";
//   }
  
//   function closeTheForm() {
//     document.getElementById("popup").style.display = "none";
//   }



// Get the modal
const modal = document.getElementById("profileModal");

// Get the button that opens the modal
const btn = document.getElementById("button28");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal() {

    // document.getElementById("delete-course").value = number;

    modal.style.display = "block";
    console.log(modal);
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// Get the modal
const modal2 = document.getElementById("profileModal2");

// Get the button that opens the modal
const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span2 = document.getElementsByClassName("ann_close")[0];

// When the user clicks the button, open the modal
function openModal2(number) {
  document.getElementById("requestID").value = number;
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal2() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}