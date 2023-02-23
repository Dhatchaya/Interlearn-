//class view

var current_location = window.location.href;
  var nav_links = document.getElementsByTagName("a");
  for (var i = 0; i < nav_links.length; i++) {
    if (nav_links[i].href === current_location) {
      nav_links[i].parentNode.className = "active";
    }
}

function openPopup() {
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}