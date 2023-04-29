const FileName = document.getElementById('file-name');
const closebtn = document.getElementById("closebtn");
const input = document.getElementById("attach_recp_file");



// Get the modal
const modal3 = document.getElementById("profileModal3");

// Get the button that opens the modal
const btn3 = document.getElementById("button30");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span3 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal3(aid) {
    modal3.style.display = "block";

    document.getElementById("edit-announcement").value = aid;

    
    console.log(modal3);

    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/announcement/editAnnouncement?aid='+aid,
        type: 'GET',
        success: function(response) {
            console.log(response);
            response = JSON.parse(response);

            for(var i=0; i<response.length; i++){
                console.log("hi");
                // console.log(response[i].grade);
                if(response[i].aid == aid){
                    // console.log("hi");
                    // console.log(response[i].grade);
                    document.getElementById("title").value = response[i].title;
                    document.getElementById("content").value = response[i].content;
                    document.getElementById("file_recp_announcement").value = response[i].file_name; //assignement_edit

                    
                }
                else{
                    continue;
                }
                console.log(response);
            }

            if(response[0] && response[0].filename){
                console.log(response[0].filename);
                for(i in response){
                    const item = document.createElement("div");
                    item.classList.add("file_div");

                    const link = document.createElement("a");
                    link.classList.add("attachment-link");
                    link.setAttribute("href", "../../uploads/receptionist/attachments/" + response[i].filename);
                    link.textContent = response[i].filename;

                    const closediv = document.createElement("div");
                    closediv.classList.add("closebtn");
                    const closebtn = document.createElement("button");
                    closebtn.classList.add("delete_file_btn");
                    closebtn.classList.add("closebtn");
                    closebtn.setAttribute("response-file-id", response[i].fileID);
                    const icon = document.createElement("img");
                    icon.classList.add("assignmentIcon");
                    icon.src = "/Interlearn/public/assets/images/assignmentIcon.png";
                    icon.alt = "close btn";
                    closebtn.appendChild(icon);
                    item.append(link);
                    closediv.append(closebtn)
                    item.append(closediv);

                    FileName.append(item);
                }
            }
        }
    });

    // document.getElementById("title").value = 
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
    modal6.style.display = "block";
    document.getElementById("delete-announcement").value = number;
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