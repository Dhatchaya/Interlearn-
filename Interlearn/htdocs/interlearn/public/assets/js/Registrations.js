
function setTab(tag,div){
    var children = div.parentNode.children;
    for(let i = 0; i<children.length;i++){
      children[i].classList.remove("active_tab");
     
    }
   
    //loadItem( div.getAttribute("data-status"),div.id);
    div.classList.add("active_tab");
    children= document.querySelector("#"+tag+"_content").parentNode.children; 
    for(let i = 0; i<children.length;i++){
      children[i].classList.add("hide");
    }
    document.querySelector("#"+tag+"_content").classList.remove("hide");
  }

function updatestatus(value,id){
  console.log(value);
  console.log(id);
  $.ajax({
    method:"POST",
    url : `http://localhost/Interlearn/public/receptionist/updatestatus/${id}`,
    data:{status : value},
    success:function(response){
      console.log(response);
     
    },
    error:function(xhr,status,error){
      console.log("Error: " + error);
    }
  });

}

