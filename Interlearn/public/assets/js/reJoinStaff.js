const reJoinbtn = document.querySelectorAll(".recrew-btn");
const reJoinPopup = document.querySelector(".re-recrument-popup");
const rejoinDB = document.querySelector(".rejoin-db");
const rejoinSusMsg = document.querySelector(".rejoin-success-message");
const yesBtn = reJoinPopup.querySelector("#yes2");
const noBtn = reJoinPopup.querySelector(".no");



const otherButtons2 = document.querySelectorAll('button:not( #yes2, .no, .refresh)');


reJoinbtn.forEach((button) => {
    button.addEventListener("click", () => {

      console

      otherButtons2.forEach(button => {
        button.disabled = true;
      });

      const staffId = button.getAttribute("data-staff-id");

      console.log(staffId);

      reJoinPopup.style.display = "block";

      yesBtn.addEventListener("click", async function (event) {



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

      rejoinDB.style.display = "none";
      rejoinSusMsg.style.display = "block";


      });
    });

  });



noBtn.addEventListener("click", () => {
    reJoinPopup.style.display = "none";

    otherButtons2.forEach(button => {
      button.disabled = false;
    });
});
