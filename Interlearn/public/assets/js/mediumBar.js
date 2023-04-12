//navbar of mediums

function setTab(tag,li){
    var children = li.parentNode.children;
    for(let i = 0; i<children.length;i++){
      children[i].classList.remove("active");
     
    }
   
    //loadItem( div.getAttribute("data-status"),div.id);
    li.classList.add("active");
    // children= document.querySelector("#"+tag+"_content").parentNode.children; 
    // for(let i = 0; i<children.length;i++){
    //   children[i].classList.add("hide");
    // }
    // document.querySelector("#"+tag+"_content").classList.remove("hide");
}