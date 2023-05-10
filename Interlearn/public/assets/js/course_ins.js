// Get the modal
const modal = document.getElementById("profileModal");

// Get the button that opens the modal
const btn = document.getElementById("button28");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal(id) {
    const upload = document.getElementsByName("upload");
    const url = document.getElementsByName("url");
    const note = document.getElementsByName("text");
    // console.log(url);
    console.log(upload);
    console.log(url);
    console.log('hi');
    for(i=0; i<upload.length; i++){
        upload[i].href = upload[i].href + "/" + id;
    }
    for(i=0; i<url.length; i++){
        url[i].href = url[i].href + "/" + id;
    }
    for(i=0; i<note.length; i++){
        note[i].href = note[i].href + "/" + id;
    }
    modal.style.display = "block";
    console.log(id);
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



// Get the modal
const modal2 = document.getElementById("profileModal2");

// Get the button that opens the modal
const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span2 = document.getElementsByClassName("ann_close")[0];

// When the user clicks the button, open the modal
function openModal2() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal2() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}


// Get the modal
const modal3 = document.getElementById("profileModal3");

// Get the button that opens the modal
const btn3 = document.getElementById("button30");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span3 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal3(number,course) {

    document.getElementById("weeknumber").value = number;

    modal3.style.display = "block";
    console.log(modal3);

    console.log(number);
    console.log(`http://localhost/Interlearn/public/instructor/course/view/`+course+`/`+number+`/getWeekName`);

    $.ajax({
        url: `http://localhost/Interlearn/public/instructor/course/view/`+course+`/`+number+`/getWeekName`,
        type: 'GET',
        success: function(response) {
            console.log("hello");
            console.log(response);
            response = JSON.parse(response);
            console.log(response[0].week_name);

            for(var i=0; i<response.length; i++){
                console.log("hi");
                console.log(i);
                console.log(response[i].week_no);
                // document.getElementById("week-title").value = response.week_name;
                // console.log(response[i].grade);
                if(response[i].week_no == number){
                    console.log(response[i].week_name);
                    // var name = document.getElementById("title").value;
                    // console.log(name);
                    document.getElementById("title").value = response[i].week_name;
                }
            }
        }
    });
console.log("outside");

    var update = document.getElementById('edit-week-btn');
    console.log(update);
    // console.log('http://localhost/Interlearn/public/instructor/editWeekName/');
    update.addEventListener('click', function(){
        console.log('hi');
        var week_id = document.getElementById('weeknumber').value;
        var name = document.getElementById('title').value;
        console.log('hi');
        $.ajax({
            url: `http://localhost/Interlearn/public/instructor/course/view/`+course+`/`+number+`/editWeekName`,
            type: 'POST',
            data: {'week_no':week_id, 'week_name': name},
            success:function(response){
                console.log("submit here");
                console.log(response);
            },
            error:function(xhr,status,error){
                console.log("Error: " + error);
            }
        });
    });
}

// When the user clicks on <span> (x), close the modal
function closeModal3() {
    modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}

// Get the modal
const modal4 = document.getElementById("profileModal4");

// Get the button that opens the modal
const btn4 = document.getElementById("button31");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span4 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal4(number) {

    document.getElementById("delete-weeknumber").value = number;

    modal4.style.display = "block";
    console.log(modal3);
}

// When the user clicks on <span> (x), close the modal
function closeModal4() {
    modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
}

// Get the modal
const modal5 = document.getElementById("profileModal5");

// Get the button that opens the modal
const btn5 = document.getElementById("button32");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span5 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal5(number,course,week) {
    document.getElementById("cid").value = number;
    modal5.style.display = "block";
    console.log(modal5);
    console.log(number);

    // console.log(number);

    $.ajax({
        url: `http://localhost/Interlearn/public/instructor/course/view/`+course+`/`+week+`/getUploadName`,
        type: 'GET',
        success: function(response) {
            console.log("hello");
            console.log(response);
            response = JSON.parse(response);

            for(var i=0; i<response.length; i++){
                console.log("hi");
                // console.log(response[i].grade);
                if(response[i].cid == number){
                    document.getElementById("upload-title").value = response[i].upload_name;
                }
            }
        }
    });


    var update = document.getElementById('edit-name-btn');
    update.addEventListener('click', function(){
        var c_id = number;
        var name = document.getElementById('upload-title').value;
        console.log('hi');
        $.ajax({
            url: 'http://localhost/Interlearn/public/instructor/editUploadName/'+course,//replace course id with actual courseid
            type: 'POST',
            data: {'cid':c_id, 'upload_name': name},
            success:function(response){
                console.log("submit here");
                console.log(response);
            },
            error:function(xhr,status,error){
                console.log("Error: " + error);
            }
        });
    });
}

// When the user clicks on <span> (x), close the modal
function closeModal5() {
    modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal5) {
        modal5.style.display = "none";
    }
}


// Get the modal
const modal6 = document.getElementById("profileModal6");

// Get the button that opens the modal
const btn6 = document.getElementById("button33");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span6 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal6(number) {
    document.getElementById("delete-filenumber").value = number;
    modal6.style.display = "block";
    console.log(modal3);
}

// When the user clicks on <span> (x), close the modal
function closeModal6() {
    modal6.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal6) {
        modal6.style.display = "none";
    }
}



// Get the modal
const modal7 = document.getElementById("profileModal7");

// Get the button that opens the modal
const btn7 = document.getElementById("button32");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span7 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal7(number,course,week) {
    document.getElementById("cid").value = number;
    modal7.style.display = "block";
    console.log(modal7);

    console.log(number);
    console.log(course);
    console.log(week);

    $.ajax({
        url: `http://localhost/Interlearn/public/instructor/course/view/`+course+`/`+week+`/getTextName`,
        type: 'GET',
        success: function(response) {
            console.log("hello");
            console.log(response);
            response = JSON.parse(response);
            // document.getElementById("edit-upload").value = response[i].upload_name;

            for(var i=0; i<response.length; i++){
                console.log("hi");
                // console.log(response[i].grade);
                if(response[i].cid == number){
                    document.getElementById("edit-text").value = response[i].upload_name;
                    document.getElementById("uedit-text-content").value = response[i].view_URL;
                }
            }
        }
    });


    var update = document.getElementById('edit-text-btn');
    update.addEventListener('submit', function(){
        var c_id = number;
        var title = document.getElementById('edit-text').value;
        var content = document.getElementById('edit-text-content').value;
        console.log('hi');
        $.ajax({
            url: 'http://localhost/Interlearn/public/instructor/course/editTextName',
            type: 'POST',
            data: {'cid':c_id, 'upload_name': title, 'view_URL' : content},
            success:function(response){
                console.log("submit here");
                console.log(response);
            },
            error:function(xhr,status,error){
                console.log("Error: " + error);
            }
        });
    });
}

// When the user clicks on <span> (x), close the modal
function closeModal7() {
    modal7.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal7) {
        modal7.style.display = "none";
    }
}



// Get the modal
const modal8 = document.getElementById("profileModal8");

// Get the button that opens the modal
const btn8 = document.getElementById("button33");
// const btn2 = document.getElementById("button29");

// Get the <span> element that closes the modal
const span8 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function openModal8(number) {
    document.getElementById("delete-text-filenumber").value = number;
    modal8.style.display = "block";
    console.log(modal8);
}

// When the user clicks on <span> (x), close the modal
function closeModal8() {
    modal8.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal8) {
        modal8.style.display = "none";
    }
}


//increase decrease value
function increaseValue() {
    var value = parseInt(document.getElementById('card-number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('card-number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('card-number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('card-number').value = value;
}


//add cards
const decreaseBtn = document.getElementById("decrease");
const increaseBtn = document.getElementById("increase");
const cardCountInput = document.getElementById("card-number");
const addBtn = document.getElementById("add-btn");
const cancelBtn = document.getElementById("cancel-btn");
const cardsContainer = document.querySelector(".teacher_crs_content2");

let cardCount = 0;
const cardTemplate = document.querySelector(".teacher-grid-item");



decreaseBtn.addEventListener("click", () => {
  if (cardCount >= 1) {
    cardCount--;
    cardCountInput.value = cardCount;
  }
});

increaseBtn.addEventListener("click", () => {
  cardCount++;
  cardCountInput.value = cardCount;

});


cancelBtn.addEventListener("click", () => {
  cardCount = 1;
  cardCountInput.value = cardCount;
});
