function search_classes() {
    console.log("hello s");
    let input = document.getElementById('class-search').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('guest_crs_rectangle');
      
    for (i = 0; i < x.length; i++) { 
        let subjectName = x[i].getElementsByClassName('guest-subject-name')[0];
        if (!subjectName.innerHTML.toLowerCase().includes(input)) {
            document.getElementById("empty-class-message").innerHTML = "Sorry! We don't have a class by this subject name..";
            x[i].style.display="none";
        }
        else {
            document.getElementById("empty-class-message").style.display = "none";
            x[i].style.display="block";                 
        }
    }
}
