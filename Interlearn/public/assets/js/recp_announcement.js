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
    console.log(aid);

    $.ajax({
        url: 'http://localhost/Interlearn/public/receptionist/announcement/getAnnouncement?aid='+aid,
        type: 'GET',
        success: function(response) {
            console.log(response);
            response = JSON.parse(response);

            for(var i=0; i<response.length; i++){
                console.log("hi");
                // console.log(response[i].grade);
                if(response[i].aid == aid){
                    console.log("hi");
                    // console.log(response[i].grade);
                    document.getElementById("title").value = response[i].title;
                    document.getElementById("content").value = response[i].content;
                    document.getElementById("file_recp_announcement").value = response[i].file_name; //assignement_edit
                    document.getElementById("file_name_recp").value = response[i].file_name;

                    // Click on a close button to hide the current list item
                    var close = document.getElementsByClassName("edit_file_announcement");
                    var i;
                    for (i = 0; i < close.length; i++) {
                      close[i].onclick = function() {
                        console.log("inside");
                        var div = this.parentElement;
                         console.log(div);
                         div.style.display = "none";
                        $.ajax({
                            method:"POST",
                            url : 'http://localhost/Interlearn/public/receptionist/announcement/getAnnouncementFile?aid='+aid,
                            data:{'aid' : aid},
                            success:function(response){
                              console.log(response);
                            },
                            error:function(xhr,status,error){
                              console.log("Error: " + error);
                            }
                        });
                      }
                    }

                    var submit_announcement = document.getElementById('submit-edit-ann');
                    submit_announcement.addEventListener("click",function(){
                        console.log("submit");
                        var title = document.getElementById("title").val();
                        var content = document.getElementById("content").val();
                        var fileName = document.getElementById("file_name_recp").val();
                        var attachment = document.getElementById("attach_recp_file").val();

                        $.ajax({
                          url: 'http://localhost/Interlearn/public/receptionist/announcement/submitEditAnnouncement',
                          type: 'POST',
                          data: {'aid' : aid, 'title':title, 'content': content, 'file_name': fileName, 'attachment': attachment},
                          success: function(response) {
                            console.log(response);
                             response = JSON.parse(response);
                            console.log(response);
                          }
                        });
                      });


                }
                else{
                    continue;
                }
                console.log(response);
            }

        }
    });
console.log("out");

    // $(document).on("click",".delete_file_btn", function(){
    //     // const fileid = $(this).data("aid");
    //     const confirmation = confirm("Are you sure you want to delete this file?");
    // console.log(fileid);
    //     if(confirmation){
    //       const deleteBtn = $(this);
    //       deleteBtn.closest('.file_div').remove();
    //     //   console.log(`http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`);
    //       $.ajax({
    //         method:"POST",
    //         url : `http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`,
    //         data:{file_id : fileid},
    //         success:function(response){
    //           console.log(response);

    //         },
    //         error:function(xhr,status,error){
    //           console.log("Error: " + error);
    //         }
    //       });
    //     }
    //   });



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