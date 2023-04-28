let replyBox = document.getElementById("forum_reply_box");
let allthreads = document.getElementById("all_discussions");
const cancel = document.getElementsByName("reply_cancel");
const parentDiscuss = document.getElementsByClassName("discuss_content");
const replies = document.getElementsByClassName("forum-reply");
const course_id = window.location.href.toString().split("/")[7];
let user_id= document.getElementById("session_alt").value;
const regex = /^.{0,25}$/;
const regex2 = /^.{0,1000}$/;

if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );
}
// console.log(replies.length);
// for (let i = 0; i < replies.length; i++) {
//   replies[i].addEventListener('click', function(e) {
//     replies[i].parentNode.insertAdjacentElement("afterend", replyBox);
//     replyBox .style.display = "block";
  
   
//   });
// }

//if there's a on click event in the page this is triggered
allthreads.addEventListener('click', function(e) {

  if (e.target && e.target.matches('.forum_reply_btn')) {
   const replyBtn = e.target;
   const discussContent = replyBtn.closest('.discuss_content');
   const replyForm = discussContent.nextElementSibling;
   replyForm.style.display = "block";//display the form

   //activate the cancel btn
   //const cancelForm  = replyForm.querySelector('.forum_cancel_btn');
  //not working
    const cancelHandler = function(eve) {

      if(eve.target && eve.target.matches('.forum_cancel_btn')){
        replyForm.style.display = 'none';
        replyForm.removeEventListener('click', cancelHandler);
      }
    
    }
    replyForm.addEventListener('click', cancelHandler);


// send forum reply to php using ajax
  const submitHandler = function(event) {
      event.preventDefault();
      flag = 0;
      var replycontentdiv = event.target.querySelector("#reply");
      var attachmentInputdiv = event.target.querySelector(".file_attachment");
      var replycontent = event.target.querySelector("#reply").value;
      var attachmentInput = event.target.querySelector(".file_attachment").files[0];

          const error =document.createElement("p");
          error.classList.add("warning");
          if (!regex2.test(replycontent)) {

            error.innerHTML="Maximum number of allowed characters is 1000";
            flag = 1;
          }
          else if(replycontent.length===0){
            error.innerHTML="Please type the content";
            flag = 1;
          }
          else{
            error.innerHTML="";
            flag =0;
          }
          console.log(error);

          replycontentdiv.previousElementSibling.replaceWith(error);
      if(attachmentInput){
        console.log(e.target);
        const error2 =document.createElement("p");
        error2.classList.add("warning");

        const file =attachmentInput;
        const fileSize = file.size;

        if (fileSize > 5242880) {
          error2.innerHTML='File size exceeds the limit of 5MB.';
          flag = 1;
          // reset the file input
          attachmentInputdiv.value = '';
        }else{
          error2.innerHTML="";
          flag=0;
        }
        attachmentInputdiv.nextElementSibling.replaceWith(error2);
      }

       console.log('flag',flag);

     if(flag==0){
      replyForm.style.display = 'none';
  
      replyForm.removeEventListener('submit', submitHandler);//removes the event listener 

      //get input values
      var parent = event.target.querySelector("#parent_id").value;

      console.log(attachmentInput instanceof Blob );
       var data = {content:replycontent, parent_id:parent,attachment:attachmentInput};
     
      var formData = new FormData();
      formData.append('content', replycontent);
      formData.append('parent_id', parent);
      if(attachmentInput){
        formData.append('attachment',attachmentInput);
      }
      // else{
      //   formData.append('attachment',null);

      // }
     
      
  // if (attachmentInput && attachmentInput.files && attachmentInput.files[0]) {
  //  data.attachment = attachmentInput.files[0];
  //   //formData.append('attachment',attachmentInput.files[0]);
  // }

    $.ajax({
      type:'POST',
      url:window.location.href,
      data:formData,
      //dataType: 'json',
      processData: false, 
      contentType: false,
      success: function(response){
<<<<<<< HEAD

=======
        var thread = JSON.parse(response);
        if(thread.errors){
          console.log(response);
          for (i in thread.errors){
            console.log(i);
          }
        }
       else{
>>>>>>> a093486f9eae3a971e087dbdcf91afe977c5f10b
        var replyContainer = $(allthreads);
        var thread = JSON.parse(response);
        console.log(thread.PostedDate);
        //replace the datetime from sql with only date in js
        let date = thread.PostedDate.replace( /[-]/g, '/' );
        
        date = Date.parse( date );
        let replyDate = new Date( date).toLocaleString('en-US', {
          month: 'long',
          day: 'numeric',
          year: 'numeric',
          hour: 'numeric',
          minute: 'numeric',
          hour12: true,
         // timeZoneName: 'short'
        });
        var attachmentlink = '';
        var EditButton = '';
        if(thread.attachment){
          var attachmentlink =  `<a href="../../../uploads/${thread.course_id}/forum_files/${thread.attachment}"  class= "attachment-link">View Attachment</a>`;  
            
        }
        if(thread.uid === user_id){
         
           EditButton =  `<button class= "forum_Edit_btn reply-btn" onclick="editDiscussion('${thread.discussion_id}','discuss')">Edit</button>`;  
            
        }
        var threadHTML =  `
        <div class="each_thread each_thread_reply">
        <div class="discuss_card" data-thread-id=${thread.discussion_id}>
          <div class="discuss_content" >
            <div class="discuss_creator">
                <img class="user_img" src="../../../uploads/images/${thread.display_picture}" alt="picture"/> 
                <div class = "user_title">
                    <h3>RE:${thread.topic}</h3>
                    <h2> By: ${thread.username} ${replyDate}</h2>
                </div>
            </div>
            <div class="forum_body_all" id = "forum_body_all">
              <div class="forum_para">
                <p> ${thread.content} </p>
              </div>
            ${attachmentlink}
            <div class="forum-reply">
                  ${EditButton}
                  <button class= "forum_reply_btn reply-btn send_reply">Reply</button>
            </div>
            </div>
          </div>
          <form method="POST" class="forum_reply_form" id="forum_reply_box" enctype="multipart/form-data">
            <input name = "parent_id" id="parent_id"type="hidden"  value='${thread.discussion_id}'/></br>
            <p></p>
            <textarea name = "content" id="reply" type="text" placeholder="write your reply" class="reply-textarea"></textarea>
            <label class="forum_subject" for="fsubject"> Attachments: </label></br>
     
            <input type ="file"  class = "file_attachment" name="attachment" /></br></br>       <p></p>
            <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"  />
            <input class="forum_cancel_btn reply-btn" type="reset" value="Cancel" id = "forum_cancel_btn" name = "reply_cancel"/>
          </form>
        </div>
        </div>
        `;
    
        replyContainer.find(`[data-thread-id='${parent}']`).after(threadHTML);
      
      },
      error:function(xhr){
        alert('Error loading threads: ' + xhr.responseText);
      }
      
    });
    replyForm.reset();
  }
}
  replyForm.addEventListener("submit", submitHandler);

  }

  if (e.target && e.target.matches('.save_update')) {
 
    let updatedfile = e.target.previousElementSibling;
 
    let content = updatedfile.querySelector('.reply-textarea');
    let attachment = updatedfile.querySelector('.file_attachment');
    console.log(content);
    let discussID = content.dataset.id;
    let table = content.dataset.table;
    let formData = new FormData();
    formData.append('content',content.value);
    if(attachment.files.length>0){
      formData.append('attachment',attachment.files[0]);
      console.log(attachment.files[0]);
    }

    for (var key of formData.entries()) {
      console.log(key[0] + ', ' + key[1]);
  }
    $.ajax({
          url:window.location.href+"/update?id="+discussID +"&table="+table,
          type:'POST',
          data:formData,
          contentType: false,
          processData: false,
          success: function(response){
            location.reload();
           
          },
          error:function(xhr){
            alert('Error loading threads: ' + xhr.responseText);
          }
        });

  }
  if (e.target && e.target.matches('.delete_file_btn')) {
    
    console.log(e.target);
    let fileid = e.target.dataset.fileid;
    let discussID = e.target.dataset.id;
    let table= e.target.dataset.table;
    console.log(discussID ,fileid);
    e.target.closest('.file_div').remove();
console.log(window.location.href+"/deleteFile?id="+discussID +"&table="+table);
    $.ajax({
      method:"POST",
      url : window.location.href+"/deleteFile?id="+discussID +"&table="+table,
      data:{attachment: fileid},
      success:function(response){
        console.log(response);
       
      },
      error:function(xhr,status,error){
        console.log("Error: " + error);
      }
    });

  }
});


allthreads.addEventListener('change', function(e) {
 
  if (e.target && e.target.matches('.reply-textarea')) {
    const error =document.createElement("p");
    error.classList.add("warning");
    if (!regex2.test(e.target.value)) {

      error.innerHTML="Maximum number of allowed characters is 1000"
    } 
    else if(e.target.value.trim() === ""){
      error.innerHTML="Topic is required";
    }
    else{
      error.innerHTML="";
    }
    e.target.previousElementSibling.replaceWith(error);
  }
  if (e.target && e.target.matches('.file_attachment')) {
    console.log(e.target);
    const error =document.createElement("p");
    error.classList.add("warning");
   
    const file = e.target.files[0];
    const fileSize = file.size; 
  
    if (fileSize > 5242880) {
      error.innerHTML='File size exceeds the limit of 5MB.';
      // reset the file input
      this.value = '';
    }else{
      error.innerHTML="";
    }
    e.target.nextElementSibling.replaceWith(error);
  };
});

replyBox.addEventListener('focus',function(e){

  this.setAttribute('placeholder',' ');
  this.style.borderColor= '#3E206D';

});



//display all the discussion threads
var content = document.getElementById("content");
$.ajax({
  url:window.location.href+"/all",
  success: function(response){

    var replyContainer = $(allthreads);
    var threads = JSON.parse(response);
    for(var i=0;i<threads.length;i++){
   
      var thread = threads[i];
      //console.log(thread);
      //replace the datetime from sql with only date in js
      var attachmentlink = '';
      var EditButton = '';
      if(thread.attachment){
        var attachmentlink =  `<a href="../../../uploads/${thread.course_id}/forum_files/${thread.attachment}"  class= "attachment-link">View Attachment</a>`;
      }
 
      if(thread.uid === user_id){
       
         EditButton =  `<button class= "forum_Edit_btn reply-btn" onclick="editDiscussion('${thread.discussion_id}','discuss')">Edit</button> `;  
          
      }
      let date = thread.PostedDate.replace( /[-]/g, '/' );
      date = Date.parse( date );
        let replyDate = new Date( date).toLocaleString('en-US', {
          month: 'long',
          day: 'numeric',
          year: 'numeric',
          hour: 'numeric',
          minute: 'numeric',
          hour12: true,
         // timeZoneName: 'short'
        });
      var threadHTML =  `
      <div class="each_thread each_thread_reply">
      <div class="discuss_card" data-thread-id=${thread.discussion_id}>
        <div class="discuss_content" >
          <div class="discuss_creator">
              <img class="user_img" src="../../../uploads/images/${thread.display_picture}" alt="picture"/> 
              <div class = "user_title">
                <h3>RE:${thread.topic}</h3>
                <h2> By: ${thread.username} ${replyDate}</h2>
              </div>
          </div>
          <div class="forum_body_all" id = "forum_body_all">
            <div class="forum_para">
              <p> ${thread.content} </p>
            </div>
            ${attachmentlink}
            
            <div class="forum-reply">
                ${EditButton}
                <button class= "forum_reply_btn reply-btn send_reply">Reply</button>
            </div>
          </div>
        </div>
        <form method="POST" class="forum_reply_form" id="forum_reply_box" enctype="multipart/form-data">
          <input name = "parent_id" id="parent_id"type="hidden"  value='${thread.discussion_id}'/></br>
          <p></p>
          <textarea name = "content" id="reply" type="text" placeholder="write your reply"  class="reply-textarea"></textarea>
          <label class="forum_subject" for="fsubject"> Attachments: </label></br>
    
          <input type ="file" class = "file_attachment" name="attachment" /></br></br>
          <p></p>
          <input class="reply-btn" type="submit" value="Reply" name = "reply_submit"  />
          <input class="forum_cancel_btn reply-btn" type="reset" value="Cancel" id = "forum_cancel_btn" name = "reply_cancel"/>
        </form>
      </div>
      </div>
      `;
    
      replyContainer.find(`[data-thread-id='${thread.parent_id}']`).after(threadHTML);
    
    }
    
  },
  error:function(xhr){
    alert('Error loading threads: ' + xhr.responseText);
  }
});

function editDiscussion(discussID,table){
  let maintarget = allthreads.querySelector(`[data-thread-id='${discussID}'] .forum_para`).parentElement;
console.log('main',maintarget);
  console.log(window.location.href + "/edit?d_id=" + discussID + "&table=" + table);
  $.ajax({
    url:window.location.href + "/edit?d_id=" + discussID + "&table=" + table,
   
    success: function(response){
      console.log(response);
      
      let details = JSON.parse(response);
      console.log(details.attachment);
      var divHtml = `  
      <div class="forum_para onlyEdit">
      <p></p>
      <textarea name = "content" id="reply" type="text" placeholder="write your reply" data-id = '${discussID}'data-table = '${table}' class="reply-textarea">${details.content}</textarea>
    
      <input type ="file"  class = "file_attachment" name="attachment" /></br>
      <p></p>
      </div>
       <input class="reply-btn save_update" type="submit" value="Save" name = "reply_submit"  />
      <input class="reply-btn cancel_update" type="button" value="Cancel" name = "reply_cancel"  />
      `;

      let targetDiv = allthreads.querySelector(`[data-thread-id='${discussID}'] .forum_para`).parentElement;
      console.log('targe',targetDiv);
      targetDiv.innerHTML = divHtml;
      // let fileinput = targetDiv.nextElementSibling;
      // fileinput.nextElementSibling.innerHTML=submit;
   
      //let replybtns = targetDiv.parentElement.querySelector('.forum-reply');
      // console.log('tarnegey',filew);
      //let fileinput = targetDiv.nextElementSibling;
      // fileinput.nextElementSibling.innerHTML=submit;
  
      // replybtns.innerHTML=submit;

      //create file div
if(details.attachment){
      const item = document.createElement("div");
      item.classList.add("file_div");

      const link = document.createElement("a");
      link.classList.add("attachment-link");
      link.setAttribute("href", "../../uploads/"+course_id+"/forum_files" + details.attachment);
      link.textContent = details.attachment;
      
      const closediv = document.createElement("div");
      closediv.classList.add("closebtn");
      const closebtn = document.createElement("button");
      closebtn.classList.add("delete_file_btn");
      closebtn.classList.add("closebtn");
      closebtn.setAttribute("data-fileid", details.attachment);
      closebtn.setAttribute("data-id", discussID);
      closebtn.setAttribute("data-table", table);
      const icon = document.createElement("img");
      icon.classList.add("assignmentIcon");
        icon.src = "/Interlearn/public/assets/images/assignmentIcon.png";
        icon.alt = "close btn";
        closebtn.appendChild(icon);
      item.append(link);
      closediv.append(closebtn)
      item.append(closediv);
      if(targetDiv.querySelector['.file_div']){
        targetDiv.querySelector['.file_div'].replaceWith(item);
      }
      else{
        targetDiv.append(item);
      }
    }
     


    },
    error:function(xhr){
      alert('Error loading threads: ' + xhr.responseText);
    }
  });
  const cancelEdit = function(eve) {

    if(eve.target && eve.target.matches('.cancel_update')){
      location.reload();
      maintarget.removeEventListener('click', cancelEdit);
    }
  
  }
  maintarget.addEventListener('click', cancelEdit);

}


// function updateDiscussion(discussID){
//   $.ajax({
//     url:window.location.href+"/edit?d_id="+discussID,
//     type:'POST',
//     data:
//     success: function(response){
//       console.log(response);
//       let details = JSON.parse(response);
//       var divHtml = `  
//       <div class="forum_para">
//       <input name = "parent_id" id="parent_id"type="hidden"  value='${discussID}'/></br>
//       <textarea name = "content" id="reply" type="text" placeholder="write your reply"  class="reply-textarea">${details.content}</textarea>
//       <input class="reply-btn" type="submit" value="Save" name = "reply_submit"  />
     
//       </div>`
//       let targetDiv = allthreads.querySelector(`[data-thread-id='${discussID}'] .forum_para`);
//       targetDiv.innerHTML = divHtml;
//       console.log(targetDiv);
//     },
//     error:function(xhr){
//       alert('Error loading threads: ' + xhr.responseText);
//     }
//   });

// }

