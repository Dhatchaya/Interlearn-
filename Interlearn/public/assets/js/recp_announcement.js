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
                    if(response[i].attachment != "undefined"){
                        document.getElementById("file_recp_announcement").value = response[i].file_name;
                    }
                    else{
                        document.getElementById("file_recp_announcement").parentElement.innerHTML = "";
                    }
                     //assignement_edit

                     document.getElementById("attachment_file").value = response[i].attachment;
                    document.getElementById("file_name_recp").value = response[i].file_name;
                    var link = document.getElementById("attachment_file").value;
                    var name = document.getElementById("file_name_recp").value;

                    // Click on a close button to hide the current list item
                    var close = document.getElementsByClassName("edit_file_announcement");
                    var i;
                    for (i = 0; i < close.length; i++) {
                      close[i].onclick = function() {
                        console.log("inside");
                        var div = this.parentElement;

                         console.log(div);
                         div.style.display = "none";
                         console.log(link);
                         console.log(name);

                        link = null;
                        name = "";
                        console.log(link);
                        console.log(name);
                        console.log('http://localhost/Interlearn/public/receptionist/announcement/editAnnouncementFile?aid='+aid);
                        $.ajax({
                            method:"POST",
                            url : 'http://localhost/Interlearn/public/receptionist/announcement/editAnnouncementFile?aid='+aid,
                            data:{'aid' : aid},
                            success:function(response){
                              document.getElementById("attachment_file").value="";
                              document.getElementById("file_name_recp").value = "";
                            },
                            error:function(xhr,status,error){
                              console.log("Error: " + error);
                            }
                        });
                      }
                    }

                    var submitAnnouncement = document.getElementById('submit-edit-ann');

                    submitAnnouncement.addEventListener("click", function(event) {
                      event.preventDefault();

                      console.log("submit");
                      let formData = new FormData();

                      var title = document.getElementById("title").value;
                      var content = document.getElementById("content").value;
                      var fileName = document.getElementById("file_name_recp").value;
                      var attachment = document.getElementById("attachment_file").value;
                      var newAttachment = document.getElementById("attach_recp_file").files;
                      console.log(newAttachment);
                      console.log(newAttachment[0] == null);

                      formData.append('aid', aid);
                      formData.append('title', title);
                      formData.append('content', content);
                      formData.append('file_name', fileName);
                      if(newAttachment[0] == null){
                        console.log("hel");
                        formData.append('attachment', attachment);
                      }
                      else{
                        formData.append('attachment', newAttachment[0]);
                      }


                      console.log(formData);

                      console.log(attachment);

                      $.ajax({
                        method:"POST",
                        url : 'http://localhost/Interlearn/public/receptionist/announcement/submitEditAnnouncement',
                        data:formData,
                        processData: false,
                        contentType: false,
                        success:function(response){
                          console.log(response);
                        },
                        error:function(xhr,status,error){
                          console.log("Error: " + error);
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