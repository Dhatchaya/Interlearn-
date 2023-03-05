let replyBox = document.getElementById("forum_reply_box");
let allthreads = document.getElementById("all_discussions");
const cancel = document.getElementsByName("reply_cancel");
const parentDiscuss = document.getElementsByClassName("discuss_content");
const replies = document.getElementsByClassName("forum-reply");

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
     
      replyForm.style.display = 'none';
  
      replyForm.removeEventListener('submit', submitHandler);//removes the event listener 

      //get input values
      var parent = event.target.querySelector("#parent_id").value;
      var replycontent = event.target.querySelector("#reply").value;
      var attachmentInput = event.target.querySelector(".file_attachment").files[0];
      console.log(attachmentInput instanceof Blob );
       var data = {content:replycontent, parent_id:parent,attachment:attachmentInput};
     
      var formData = new FormData();
      formData.append('content', replycontent);
      formData.append('parent_id', parent);
      if(attachmentInput){
        formData.append('attachment',attachmentInput);
      }
      else{
        formData.append('attachment',null);

      }
     
      
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
        console.log(response);
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
        
        if(thread.attachment != 'null'){
          var attachmentlink =  `<a href="../../../uploads/${thread.course_id}/forum_files/${thread.attachment}"  class= "attachment-link">View Attachment</a>`;    
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
            <div class="forum_para">
              <p> ${thread.content} </p>
            </div>
           ${attachmentlink}
            <div class="forum-reply">
                <button class= "forum_reply_btn reply-btn send_reply">Reply</button>
            </div>
          </div>
          <form method="POST" class="forum_reply_form" id="forum_reply_box" enctype="multipart/form-data">
            <input name = "parent_id" id="parent_id"type="hidden"  value='${thread.discussion_id}'/></br>
            <textarea name = "content" id="reply" type="text" placeholder="write your reply" class="reply-textarea"></textarea>
            <label class="forum_subject" for="fsubject"> Attachments: </label></br>
            <input type ="file"  class = "file_attachment" name="attachment" /></br></br>
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
  replyForm.addEventListener("submit", submitHandler);
  }
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
        
      if(thread.attachment != 'null'){
        var attachmentlink =  `<a href="../../../uploads/${thread.course_id}/forum_files/${thread.attachment}"  class= "attachment-link">View Attachment</a>`;
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
          <div class="forum_para">
            <p> ${thread.content} </p>
          </div>
          ${attachmentlink}
          <div class="forum-reply">
              <button class= "forum_reply_btn reply-btn send_reply">Reply</button>
          </div>
        </div>
        <form method="POST" class="forum_reply_form" id="forum_reply_box" enctype="multipart/form-data">
          <input name = "parent_id" id="parent_id"type="hidden"  value='${thread.discussion_id}'/></br>
          <textarea name = "content" id="reply" type="text" placeholder="write your reply"  class="reply-textarea"></textarea>
          <label class="forum_subject" for="fsubject"> Attachments: </label></br>
          <input type ="file" class = "file_attachment" name="attachment" /></br></br>
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
})