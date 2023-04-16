const reJoinbtn = document.querySelectorAll(".recrew-btn");
const reJoinPopup = document.querySelector(".re-recrument-popup");
const dialogBox = document.querySelector(".rejoin-db");
const successMessage = document.querySelector(".rejoin-success-message");
const yesButton = reJoinPopup.querySelector("#yes2");
const noButton = reJoinPopup.querySelector(".no");
const refreshBtn = reJoinPopup.querySelector(".refresh");



const otherButtons = document.querySelectorAll('button:not(.recrew-btn, #yes2, .no, .refresh)');


reJoinbtn.forEach((button) => {
    button.addEventListener("click", () => {

      otherButtons.forEach(button => {
        button.disabled = true;
      });
      
const staffId = button.getAttribute("data-staff-id");

console.log(staffId);

      reJoinPopup.style.display = "block";

      yesButton.addEventListener("click", async function (event) {

        

        const result = await fetch('/Interlearn/public/manager/rejoin', {
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
    reJoinPopup.style.display = "none";
});


function refreshPage() {
  location.reload();
}
