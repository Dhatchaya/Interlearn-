// const openModalButtons = document.querySelectorAll('[data-modal-target]')
// const closeModalButtons = document.querySelectorAll('[data-close-button]')
// const overlay = document.getElementById('overlay')
// const currentURL = "http://localhost/Interlearn/public/Student/enquiry";
// const newURL = "http://localhost/Interlearn/public/Student/enquiry/add";



// openModalButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const modal = document.querySelector(button.dataset.modalTarget)
//     openModal(modal)
//   })
// })

// overlay.addEventListener('click', () => {
//   const modals = document.querySelectorAll('.modal.active')
//   modals.forEach(modal => {
//     closeModal(modal)
//   })
// })

// closeModalButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const modal = button.closest('.modal')
//     closeModal(modal)
//   })
// })


// function openModal(modal) {
 
//   if (modal == null) return
//   window.history.pushState({}, "", newURL);

//   modal.classList.add('active')
//   overlay.classList.add('active')
  
// }

// function closeModal(modal) {

//   if (modal == null) return
//   window.history.pushState({}, "", currentURL);
  
//   modal.classList.remove('active')
//   overlay.classList.remove('active')
// }

const modal = document.getElementById('modal');
const overlay = document.getElementById('overlay');
const modal1 = document.getElementById('modal1');
const currentURL = "http://localhost/Interlearn/public/Student/enquiry";
const newURL = "http://localhost/Interlearn/public/Student/enquiry/add";
const editURL = "http://localhost/Interlearn/public/Student/enquiry/edit/";

function addEnquiry(){

  modal1.classList. add('active');
  overlay.classList.add('active');
 

  fetch('/Interlearn/public/Student/enquiry/add',{
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
// enq_form= document.getElementById("enq_form");
// enq_form.addEventListener('submit',function(e){
//   e.preventDefault();
//   const data = new URLSearchParams();
//   for(const p of new FormData(enq_form)){
//     data.append(p[0],p[1])
//   }


//   fetch('/Interlearn/public/Student/enquiry/add', {
//     method: 'POST',
//     body: data
//   })
//   .then(response => response.json())
//   .then(response => {
//     console.log(response);
//     if (response.result) {
//       header("Location:http://localhost/Interlearn/public/Student/enquiry");
//     }
//   }).catch(error=>console.log(error));

// });

function closeEnquiry(){
  modal.classList. remove('active');
  overlay.classList.remove('active');
  modal1.classList. remove('active');
   window.history.pushState({}, "", currentURL);

}






function editEnquiry(id){
  // alert("hai");
  modal.classList. add('active');
  overlay.classList.add('active');
  // window.history.pushState({}, "", editURL+'166');
  fetch('/Interlearn/public/Student/enquiry/edit/'+id,{
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


  fetch('/Interlearn/public/Student/enquiry/edit/'+id, {
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

