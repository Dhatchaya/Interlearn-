const modal = document.getElementById('modal');
const overlay = document.getElementById('overlay');
const modal1 = document.getElementById('modal1');
const currentURL = "http://localhost/Interlearn/public/academic/enquiry";
const newURL = "http://localhost/Interlearn/public/academic/enquiry/add";

const enqStatus = document.getElementById('status');


function changeStatus(id,value,role){
  console.log(id,value,role);
  if(value != ""){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
        console.log("success");
        for(let i=0; i<enqStatus.options.length; i++){
          if (enqStatus.options[i].value == value){
            enqStatus.options[i].selected = true;
            break;
          }
        }
      }
    };
    
    xmlhttp.open("GET","http://localhost/Interlearn/public"+role+"enquiry?id="+id+"&&status="+value,true);
    xmlhttp.send();
  }

}

function addEnquiry(){

  const newURL = "http://localhost/Interlearn/public/academic/enquiry/add";

  modal1.classList. add('active');
  overlay.classList.add('active');
 

  fetch('/Interlearn/public/academic/enquiry/add',{
    method: 'GET',
    headers: {
        'Accept': 'application/json',
    }
  })
  .then(response => response.json())
  .then(response => {
  console.log(response);
  const enqTitle = document.getElementById("enq_heading");
  enqTitle.innerHTML=response.enquiry_title;
  });

  window.history.pushState({}, "", newURL);

}

function closeEnquiry(){
  const currentURL = "http://localhost/Interlearn/public/academic/enquiry";

  modal.classList. remove('active');
  overlay.classList.remove('active');
  modal1.classList. remove('active');
   window.history.pushState({}, "", currentURL);

}





function editEnquiry(id){

  modal.classList. add('active');
  overlay.classList.add('active');

  fetch('/Interlearn/public/academic/enquiry/edit/'+id,{
    method: 'GET',
    headers: {
        'Accept': 'application/json',
    }
  })
  .then(response => response.json())
  .then(response => {
  console.log(response);
  const Title = document.getElementsByName("edittitle");
  const Category=document.getElementsByName("edittype");
  const Content = document.getElementsByName("editcontent");
  const submit = document.getElementsByName("editsubmit");
  const enqTitle = document.getElementById("enq_heading2");
  enqTitle.innerHTML=response.enquiry_title;
  Title[0].value=response.title;
  Content[0].value=response.content;
  Category[0].value=response.type;
  submit[0].value="save";
})

const enq_form = document.getElementById("enq_form2");


enq_form.addEventListener('submit',function(e){
  
  
  const formData = new FormData(enq_form);
  let data = {};
  for (const [key, value] of formData.entries()) {
    let newKey = key.replace("edit", "");
    data[newKey] = value;
  }


  fetch('/Interlearn/public/academic/enquiry/edit/'+id, {
    method: 'POST',
    headers: {
      'Content-type': 'application/json'
      },
    body: JSON.stringify(data)
 
  }).then(res => {
    console.log('Data being sent to the server: ', data);
    if (res.ok) { console.log("HTTP request successful")
   
  }
    else { console.log("HTTP request unsuccessful") }

    return res
    })
    .then(res => res.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
    

});
}


overlay.addEventListener('click', () => {

    closeEnquiry();
 
})

// enquiry tabs

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
function setcontent(tag,div){
  
}

// }
// function loadItem(status,content){

//   var xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = function(){
//     if(xhr.readyState === XMLHttpRequest.DONE){
//       if(xhr.status == 200){
//         var items = JSON.parse(xhr.responseText);
//         console.log(items);
//         var html = '<table>';
//         html +=  '  <tr> <th>Enquiry No</th> <th>Subject</th> <th>Category</th> <th>Status</th> <th>Enquiry Date</th> <th>User</th> <th>Actions</th> </tr>';
//         for (var i = 0; i < items.length; i++) {
//           html += '<tr><td>' + items[i].eid + '</td><td>' + items[i].title + '</td><td>' + items[i].type + '</td><td>' + items[i].date + '</td><td>' + items[i].role + '</td>';
//           html +='<td> <div class="enq_actions"><div class="enq_delete">    <a href="<?=ROOT?>/receptionist/enquiry/delete/<?=esc($row->eid)?>">        <img src= "<?=ROOT?>/assets/images/delete.png"/>    </a>    </div><div class="enq_view">    <a href="<?=ROOT?>/receptionist/enquiry/view/<?=esc($row->eid)?>">        <img src= "<?=ROOT?>/assets/images/view.png"/>    </a>    </div></div></td></tr>'
//         }
//           content.innerHTML = html;
//           html += '</table>';
//       }else {
//         console.error(xhr.statusText);
//       }
//     }
//   };
//   xhr.open('GET', 'http://localhost/Interlearn/public/receptionist/enquiry/?state=' + status);
//   xhr.send();
// }