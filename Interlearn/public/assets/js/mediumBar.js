//navbar of mediums
if ( window.history.replaceState ) {

  window.history.replaceState( null, null, window.location.href );
}
function setTab(tag,div){
  var children = div.parentNode.children;
  for(let i = 0; i<children.length;i++){
    children[i].classList.remove("active");
   
  }
 
  //loadItem( div.getAttribute("data-status"),div.id);
  div.classList.add("active");
  children= document.querySelector("#"+tag+"_content").parentNode.children; 
  for(let i = 0; i<children.length;i++){
    children[i].classList.add("hide");
  }
  document.querySelector("#"+tag+"_content").classList.remove("hide");
}