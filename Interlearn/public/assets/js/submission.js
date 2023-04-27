
  const input = document.getElementById("sub_file_input");
  const fileList = document.querySelector(".sub-file-list");
  const submitbtn = document.getElementById("std_subm_btn");
  const error = document.getElementById("error");
  const cancel = document.getElementById("std_subm_cl");
  let formData = new FormData();
  const queryParams = new URLSearchParams(window.location.search);
  const  subjectID = queryParams.get("id");
  const course = window.location.href.toString().split("/")[8];

let assignmentID = "";

  input.addEventListener("change", function() {
    fileList.style.display="block";



    // Loop through the selected files and create a new item for each one
    for (const file of input.files) {
      const item = document.createElement("div");
      item.classList.add("sub-file-item");

      const name = document.createElement("span");
      name.classList.add("sub-file-name");
      name.textContent = file.name;

      const button = document.createElement("button");
      const icon = document.createElement("img");
      icon.src = "/Interlearn/public/assets/images/closebtn.png";
      icon.alt = "close btn";
      button.appendChild(icon);
      
      button.addEventListener("click", function() {
        const fileIndex = Array.from(formData.getAll("submission[]")).findIndex(f => f.name === file.name);
        if (fileIndex !== -1) {
          const files = formData.getAll("submission[]");
          files.splice(fileIndex, 1);
          formData.delete("submission[]");
          files.forEach(f => formData.append("submission[]", f));
          console.log(formData);
        }
        item.remove();
        // formData.delete("submission[]", file);
        // item.remove();
     
      });
      
      item.appendChild(name);
      item.appendChild(button);
      fileList.appendChild(item);


      formData.append('submission[]',file);
      console.log(formData);
    }
    
    //select multiple files and send through ajax


  });


  cancel.addEventListener('click',function(){
    window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${subjectID}`;

  });


  if (queryParams.has("sub_id")) {
    const id = queryParams.get("sub_id");
  console.log(id);
    $.ajax({ 
      method: "GET", 
      url:`http://localhost/Interlearn/public/student/coursepg/submission/${course}/edit/?sub_id=${id}`,
  
      success: function(data) { 
         console.log(data);
        assignmentID = data[0].assignmentId;
        if(data[0] && data[0].filename){
          console.log(data[0].filename);
          
          for(i in data){
            const item = document.createElement("div");
            item.classList.add("sub-file-item");
      
            const name = document.createElement("span");
            name.classList.add("sub-file-name");
            name.textContent = data[i].filename;
  
            const button = document.createElement("button");
            const icon = document.createElement("img");
            icon.src = "/Interlearn/public/assets/images/closebtn.png";
            icon.alt = "close btn";
            button.classList.add("delete_file_btn");
            button.setAttribute("data-file-id", data[i].fileID);
            button.appendChild(icon);
            item.appendChild(name);
            item.appendChild(button);
            fileList.appendChild(item);
      
            console.log(fileList);
           }
        }

        
      },
      error: function(xhr, status, error) {
        console.log("Error: " + error);
      }
    });

    submitbtn.addEventListener('click',function(e){
      e.preventDefault();
  

  
  console.log("here");
      $.ajax({
        type:'POST',
        url:`http://localhost/Interlearn/public/student/coursepg/submission/${course}/edit/?sub_id=${id}`,
        data:formData,
        processData: false, 
        contentType: false,
        success:function(response){
     
          console.log(response);
        var errors = document.getElementById("error");
         errors.innerHTML = "";
        if(response['status'] != 'success'){
          var errorall = document.createElement("div");
          for (i in response){
           
            var breaktag = document.createElement("br");
            var error = response[i];
            errorall.append(error);
            errorall.append(breaktag);
           
          }
           errors.append(errorall);
        
          
        }
        else{
          window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${assignmentID}`;
        }
          // window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${assignmentID}`;

        },
        error:function(xhr){
          console.log(xhr);
          
            console.log('Error loading threads: ' + xhr.responseText);
  
        }
  
    });
  
    } );

    $(document).on("click",".delete_file_btn", function(){
      const fileid = $(this).data("file-id");
      console.log(fileid);
      const confirmation = confirm("Are you sure you want to delete this file?");
  
      if(confirmation){
        const deleteBtn = $(this); 
        deleteBtn.closest('.sub-file-item').remove();
        console.log(`http://localhost/Interlearn/public/student/coursepg/submission/${course}/edit/d?sub_id=${id}`);
        $.ajax({
          method:"POST",
          url : `http://localhost/Interlearn/public/student/coursepg/submission/${course}/edit/d?sub_id=${id}`,
          data:{file_id : fileid},
          success:function(response){
            console.log(response);
           
          },
          error:function(xhr,status,error){
            console.log("Error: " + error);
          }
        });
      }
    });
    cancel.addEventListener('click',function(){
      window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${assignmentID}`;
  
    });
  }
  else{
    submitbtn.addEventListener('click',function(event){
      event.preventDefault();
     
      $.ajax({
          type:'POST',
          url:window.location.href,
          data:formData,
          processData: false, 
          contentType: false,
          success:function(response){
             
              console.log(response);
              if(response !== "success"){
                  var status = JSON.parse(response);
                  error.innerHTML= status.submission;
              }
              else{
                // window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${subjectID}`;
              }
            
          },
          error:function(xhr){
              alert('Error loading threads: ' + xhr.responseText);
  
          }
  
      })
  
      
  
    });
  }