//class view

// var current_location = window.location.href;
//   var nav_links = document.getElementsByTagName("a");
//   for (var i = 0; i < nav_links.length; i++) {
//     if (nav_links[i].href === current_location) {
//       nav_links[i].parentNode.className = "active";
//     }
// }
document.getElementById('button1').addEventListener("click",function(){
  document.querySelector(".outer-popup").style.display = "flex";
})
// let profile_card = document.querySelector('.cus-profile-card');
// let closeBtn = document.querySelector('.popup-heading img');
document.getElementById('.closeT').addEventListener("click",function(){
  document.querySelector(".outer-popup").style.display = "none";
})




