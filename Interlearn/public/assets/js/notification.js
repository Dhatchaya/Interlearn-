$.ajax({ 
    method: "GET", 
    url:`http://localhost/Interlearn/public/notifications`,

    success: function(data) { 

  if(data){
    for(let i=0;i<data.length;i++){
      const NotificationCard = document.createElement("div");
      NotificationCard.classList.add('noticard');

      const NotificationTitle = document.createElement("p");
      NotificationTitle.classList.add('noticardTitle');
      NotificationTitle.innerHTML=`New ${data[i].category}`;
      NotificationCard.append(NotificationTitle);

      if(data[i].category ==="Assignment"){
        const NotificationContent = document.createElement("p");
        NotificationContent.classList.add('noticardContent');
        NotificationContent.innerHTML=`${data[i].subject} -${data[i].fullname}`;
        NotificationCard.append(NotificationContent);
      }


      const NotificationContent2 = document.createElement("p");
      NotificationContent2.classList.add('noticardContent');
      NotificationContent2.innerHTML=`${data[i].title}`;

      const MarkAsRead = document.createElement("p");
      MarkAsRead.classList.add('MAR');
      MarkAsRead.dataset.Nid=`${data[i].Nid}`;
      MarkAsRead.innerHTML="Mark As Read";

     
     
      NotificationCard.append(NotificationContent2);
      NotificationCard.append(MarkAsRead);
      document.getElementById("allnoti").append(NotificationCard);
    }
      
  }
  else{
    // const NotificationCard = document.createElement("div");
    // NotificationCard.classList.add('noticard');

    const NotificationTitle = document.createElement("p");
    NotificationTitle.classList.add('noticardTitle');
    NotificationTitle.innerHTML="No Unread Notifications";
    // NotificationCard.append(NotificationTitle);
    document.getElementById("allnoti").append(NotificationTitle);
  }
 
    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });
  document.getElementById("noti_bell").addEventListener('click',function(){

    if(document.getElementById("notification").style.display === "block"){
 
      document.getElementById("notification").style.display="none";
    }else{
 
      document.getElementById("notification").style.display="block";
    }
    
  });
  document.getElementById("allnoti").addEventListener("click",function(e){
    Noti=e.target.dataset.Nid;
    if (e.target && e.target.matches('.MAR')) {
      $.ajax({
        url:'http://localhost/Interlearn/public/notifications/delete',
        type:'POST',
        data:{Nid:Noti},

        success: function(response){
          console.log(response);
         
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.error(xhr.responseText);
          console.error(status);
          console.error(error);
        }
      });
    }
  });