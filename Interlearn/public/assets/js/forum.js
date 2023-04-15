const discussion = document.getElementById("Add_forum");
const cancel = document.getElementById("forum_cancel");
let compdis = document.getElementById("new_discussion");
if ( window.history.replaceState ) {

    window.history.replaceState( null, null, window.location.href );
  }
discussion.addEventListener('click',function(e){
    // container.style.display = "block";
    compdis.style.display = "block";
});
cancel.addEventListener('click',function(){
  compdis.style.display = "none";
});

function deleteForum(id){
  $.ajax({
    method:"POST",
    url : `http://localhost/Interlearn/public/forums/delete/${id}`,
    data:{id: id},
    success:function(response){
      console.log(response);
     
    },
    error:function(xhr,status,error){
      console.log("Error: " + error);
    }
  });

}