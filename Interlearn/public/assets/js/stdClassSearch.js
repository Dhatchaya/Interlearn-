function search_classes() {
    console.log("hello s");
    let input = document.getElementById('class-search').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('recp_crs_rectangle');
      
    for (i = 0; i < x.length; i++) { 
        let subjectName = x[i].getElementsByClassName('std-subject-name')[0];
        if (!subjectName.innerHTML.toLowerCase().includes(input)) {
            console.log("inside");
            document.getElementById("empty-class-message").innerHTML = "Sorry! You haven't enrolled to a class by this subject name..";
            x[i].style.display="none";
        }
        else {
            document.getElementById("empty-class-message").style.display = "none";
            x[i].style.display="block";                 
        }
    }
}
