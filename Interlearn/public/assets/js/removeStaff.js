const removeButtons = document.querySelectorAll(".remove-btn");
const removePopup = document.querySelector(".remove-staff-popup");
const dialogBox = document.querySelector(".remove-employee-dialog-box");
const successMessage = document.querySelector(".success-message");
const yesButton = removePopup.querySelector(".yes");
const noButton = removePopup.querySelector(".no");
const refreshBtn = removePopup.querySelector(".refresh");



const otherButtons = document.querySelectorAll('button:not( .yes, .no, .refresh)');


removeButtons.forEach((button) => {
    button.addEventListener("click", () => {

      otherButtons.forEach(button => {
        button.disabled = true;
      });
      
const staffId = button.getAttribute("data-staff-id");
console.log(staffId);

      removePopup.style.display = "block";

      yesButton.addEventListener("click", async function (event) {

        

        const result = await fetch('/Interlearn/public/manager/removeStaff', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
              staffId: staffId,
            })
        })
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            // Do something with the response data
          })
          // .catch((error) => {
          //   error.text.then(errorMessage => {
          //     console.error("Error occurred while fetching data:", errorMessage);
          //   });
          // });
          
          .catch((error) => console.log(error));
          
      dialogBox.style.display = "none";
      successMessage.style.display = "block";
      

      });
    });
    
  });



noButton.addEventListener("click", () => {
    removePopup.style.display = "none";
    otherButtons.forEach(button => {
      button.disabled = false;
    });
});


function refreshPage() {
  location.reload();
}
