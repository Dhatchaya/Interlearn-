
const queryParams = new URLSearchParams(window.location.search);
// const submitbtn = document.getElementById("assiSubmit");
// const Title = document.getElementsByName("title")[0];
// const Description = document.getElementsByName("description")[0];
// const Deadline = document.getElementsByName("deadline")[0];
// const Acceptdate = document.getElementsByName("acceptDate")[0];
// const FileName = document.getElementById('file-name');
// const closebtn = document.getElementById("closebtn");
// const input = document.getElementById("teacher_subm_file");
// let formData = new FormData();
const course = window.location.href.toString().split("/")[8];
const week = window.location.href.toString().split("/")[9];
// const cancel = document.getElementById("teacher_cancel_btn");
// const fileList = document.querySelector(".sub-file-list");

if (queryParams.has("id")) {
  const id = queryParams.get("id");
console.log(id);
  $.ajax({ 
    method: "GET", 
    url:`http://localhost/Interlearn/public/student/coursepg/submission/${course}/edit/?id=${id}`,

    success: function(data) { 
      // console.log(data);
      if(data[0] && data[0].filename){
        console.log(data[0].filename);
       console.log(data);
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
          button.appendChild(icon);
          item.appendChild(name);
          item.appendChild(button);
          fileList.appendChild(item);
    
      // const item = document.createElement("div");
      // item.classList.add("file_div");

      // const link = document.createElement("a");
      // link.classList.add("attachment-link");
      // link.setAttribute("href", "../../uploads/assignments/" + data[i].filename);
      // link.textContent = data[i].filename;
      
      // const closediv = document.createElement("div");
      // closediv.classList.add("closebtn");
      // const closebtn = document.createElement("button");
      // closebtn.classList.add("delete_file_btn");
      // closebtn.classList.add("closebtn");
      // closebtn.setAttribute("data-file-id", data[i].fileID);
      // const icon = document.createElement("img");
      // icon.classList.add("assignmentIcon");
      //   icon.src = "..//Interlearn/public/assets/images/assignmentIcon.png";
      //   icon.alt = "close btn";
      //   closebtn.appendChild(icon);
      // item.append(link);
      // closediv.append(closebtn)
      // item.append(closediv);

      //   FileName.append(item);
         }
      }
 

 
      // Title.value = data[0].title;
      // Description.value = data[0].description;
      // Acceptdate.value = data[0].acceptDate;
      // Deadline.value = data[0].deadline;
      
    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });



submitbtn.addEventListener('click',function(e){
    e.preventDefault();

    formData.append('title',Title.value);
    formData.append('description',Description.value);
    formData.append('deadline',Deadline.value);
    formData.append('acceptDate',Acceptdate.value);

console.log(formData);
    $.ajax({
      type:'POST',
      url:`http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/?id=${id}`,
      data:formData,
      processData: false, 
      contentType: false,
      success:function(response){
   
        console.log(response);

      },
      error:function(xhr){console.log(xhr);
          console.log('Error loading threads: ' + xhr.responseText);

      }

  });

  } );


  $(document).on("click",".delete_file_btn", function(){
    const fileid = $(this).data("file-id");
    // const confirmation = confirm("Are you sure you want to delete this file?");

    // if(confirmation){
      const deleteBtn = $(this); 
      deleteBtn.closest('.file_div').remove();
      console.log(`http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`);
      $.ajax({
        method:"POST",
        url : `http://localhost/Interlearn/public/teacher/course/assignment/${course}/${week}/edit/d?id=${id}`,
        data:{file_id : fileid},
        success:function(response){
          console.log(response);
         
        },
        error:function(xhr,status,error){
          console.log("Error: " + error);
        }
      });
    // }
  });

}


input.addEventListener("change", function() {
  FileName.style.display="block";



  // Loop through the selected files and create a new item for each one
  for (const file of input.files) {
    const item = document.createElement("div");
    item.classList.add("file_div");

    const name = document.createElement("a");
    name.classList.add("attachment-link");
    name.href = "../../uploads/assignments/"+file.name;
    name.textContent = file.name;

    const button = document.createElement("div");
    button.classList.add("closebtn");
    const icon = document.createElement("img");
    icon.classList.add("assignmentIcon");
      icon.src = "..//Interlearn/public/assets/images/assignmentIcon.png";
      icon.alt = "close btn";
      button.appendChild(icon);
   
   
    
    button.addEventListener("click", function() {
      const fileIndex = Array.from(formData.getAll("assignment_file[]")).findIndex(f => f.name === file.name);
      if (fileIndex !== -1) {
        const files = formData.getAll("assignment_file[]");
        files.splice(fileIndex, 1);
        formData.delete("assignment_file[]");
        files.forEach(f => formData.append("assignment_file[]", f));
        console.log(formData);
      }
      item.remove();

    });
    
    item.appendChild(name);
    item.appendChild(button);
    FileName.appendChild(item);


    formData.append('assignment_file[]',file);
    console.log(formData);
  }
  
  //select multiple files and send through ajax


});

cancel.addEventListener('click',function(){
  window.location.href = `http://localhost/Interlearn/public/teacher/course/view`;

});