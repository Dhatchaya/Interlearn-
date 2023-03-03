
  const input = document.getElementById("sub_file_input");
  const fileList = document.querySelector(".sub-file-list");
  const submitbtn = document.getElementById("std_subm_btn");
  const error = document.getElementById("error");
  const cancel = document.getElementById("std_subm_cl");
  let formData = new FormData();
  const queryParams = new URLSearchParams(window.location.search);
  const  subjectID = queryParams.get("id");
  const course = window.location.href.toString().split("/")[8];
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
      icon.src = "../../../assets/images/closebtn.png";
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
              window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${subjectID}`;
            }
          
        },
        error:function(xhr){
            alert('Error loading threads: ' + xhr.responseText);

        }

    })

    

  });
  cancel.addEventListener('click',function(){
    window.location.href = `http://localhost/Interlearn/public/student/coursepg/submissionstatus/${course}/?id=${subjectID}`;

  });