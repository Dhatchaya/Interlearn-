const removeButtons = document.querySelectorAll(".remove-btn");
const removePopup = document.querySelector(".remove-staff-popup");
const dialogBox = document.querySelector(".remove-employee-dialog-box");
const successMessage = document.querySelector(".success-message");

const noButton = removePopup.querySelector(".no");
const refreshBtn = removePopup.querySelector(".refresh");





removeButtons.forEach((button) => {
    const buttonHandler = function(event) { 
        
        button.removeEventListener("click", buttonHandler);
        const currentButton = event.target;
        // const yesButton = removePopup.querySelector(".yes");
    
         // Disable all other buttons
    removeButtons.forEach((btn) => {
        if (btn !== currentButton) {
          btn.disabled = true;
        }
      });

      const studentid = currentButton.getAttribute("data-student-id");

      removePopup.style.display = "block";
      const yesButton = removePopup.querySelector(".yes"); // Select the "Yes" button within the removePopup
      console.log(yesButton);
      console.log(yesButton.dataset.deleting);
      if (!yesButton.dataset.deleting) {
        // Set the flag to indicate deletion process has started
        console.log("here");
        yesButton.dataset.deleting = "true";
      const yesButtonClickHandler = async function (event) {
        console.log("triggered");
  
        const result = await fetch('/Interlearn/public/receptionist/registration/delete/'+studentid, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            studentID: studentid,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            // Do something with the response data
          })
          .catch((error) => console.log(error));
  
        dialogBox.style.display = "none";
        successMessage.style.display = "block";
        // Remove the flag to allow further deletion
        delete yesButton.dataset.deleting;
        yesButton.removeEventListener("click", yesButtonClickHandler); // Remove the event listener for the "Yes" button
           // Enable all buttons
      removeButtons.forEach((btn) => {
        btn.disabled = false;
      });
      };
      yesButton.addEventListener("click", yesButtonClickHandler);
    };
  
     
    };
    button.addEventListener("click", buttonHandler);
  });



noButton.addEventListener("click", () => {
    removePopup.style.display = "none";
    // Enable all buttons
    removeButtons.forEach((btn) => {
      btn.disabled = false;
    });
    
});


function refreshPage() {
  location.reload();
}
