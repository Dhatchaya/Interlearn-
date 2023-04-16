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