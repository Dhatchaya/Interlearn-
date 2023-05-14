// const e = document.getElementById('class');

// const AL = document.getElementById('AL');


// e.addEventListener('change', function handleChange(event){
//     if(event.target.value === 'secondary'){

//         secondary.style.display = 'block';
//         AL.style.display='none';

//     }
//     else{
//         AL.style.display='block';
//         secondary.style.display = 'none';
//     }
// });
let subjectslist = document.getElementsByClassName('reg_sub_select');
const allcourses = document.getElementById("allcourses");
const submitbtn = document.getElementById("reg_button");
const grade = document.getElementById('grade');
const language = document.getElementsByName('medium');
const email = document.getElementById('semail');
const displayPicture = document.getElementById('displaypicture');
// const subject = document.getElementById('subject');
// const teacher = document.getElementById('teacher');
let  selected_grade = "";
let  selected_subject = [];
// let  selected_course = [];
let count = 0;
let details = null;
const cNIC = document.getElementsByName("NIC")[0];
const cfirst_name = document.getElementsByName("first_name")[0];
const clast_name = document.getElementsByName("last_name")[0];
const cbirthday = document.getElementsByName("birthday")[0];
// const cgender = document.getElementsByName("gender")[0].value[0];
const csemail = document.getElementsByName("email")[0];
const cmobile_number = document.getElementsByName("mobile_number")[0];
const caddress = document.getElementsByName("address")[0];
const cschool = document.getElementsByName("school")[0];
const cparent_name = document.getElementsByName("parent_name")[0];
const cparent_email = document.getElementsByName("parent_email")[0];
const cparent_mobile = document.getElementsByName("parent_mobile")[0];
const ccourseid = document.getElementsByName("course")[0];
const cusername = document.getElementsByName("username")[0];
const cpassword = document.getElementsByName("password")[0];

const cgender = document.getElementsByName("gender")[0];

const cmedium = document.getElementsByName("medium")[0];


ccourseid.addEventListener('change',function(e){
    if (e.target.previousElementSibling.classList.contains("err_show")) {
      e.target.previousElementSibling.innerHTML="";
    }
  });


cNIC.addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});

cfirst_name .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
clast_name .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
// cbirthday .addEventListener('change',function(e){
//   if (e.target.previousElementSibling.classList.contains("err_show")) {
//     e.target.previousElementSibling.innerHTML="";
//   }
// });
csemail .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cmobile_number .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
caddress .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cschool .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cparent_name .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cparent_email .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cparent_mobile .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cusername .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
cpassword .addEventListener('input',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});
   

cmedium .addEventListener('click',function(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
});

grade.addEventListener('change',function hideSubject(e){
  if (e.target.previousElementSibling.classList.contains("err_show")) {
    e.target.previousElementSibling.innerHTML="";
  }
  if (ccourseid.previousElementSibling.classList.contains("err_show")) {
    ccourseid.previousElementSibling.innerHTML="";
  }
  if (cmedium.previousElementSibling.classList.contains("err_show")) {
    cmedium.previousElementSibling.innerHTML="";
  }
    if (allcourses.firstChild instanceof Node) {
        console.log("triggered");
        allcourses.innerHTML = "";
        // selected_course = [];
        selected_subject = [];
        selected_grade = "";
    }
    const medium = document.getElementsByName("medium");
   
    for (let i = 0; i < medium.length; i++) {
      if (medium[i].checked) {
        medium[i].checked = false;
        break;
      }
    }

});


for (const lang of language){
    lang.addEventListener('click',function handleRadio(){
     
        // allcourses.classList.remove("hide");


    for(let i=0; i<grade.options.length; i++){
        if(grade.options[i].selected==true){
           selected_grade = grade.options[i].value;
        }
    }


$.ajax({ 
    method: "GET", 
    url:`http://localhost/Interlearn/public/register/getsubjects/${selected_grade}/${lang.value}`,

    success: function(data) { 
         console.log(data);
         if(data){
             //unique subject names
            let subjectNames = data.map(item => item.subject);

            // Use Set to remove duplicates from the array of subject names
            let uniqueSubjectNames = [...new Set(subjectNames)];
                let selectdiv = document.createElement("div");
               
                let labelselect = document.createElement('label');
                labelselect.textContent = "Subject:";
                let labellabel = document.createElement('label');
                labellabel.textContent = "*";
                labellabel.classList.add("warning");
                labelselect.append(labellabel);
                let selectSubject = document.createElement("select");
                selectSubject.classList.add("reg_select");
                selectSubject.classList.add("reg_sub_select");
                 selectSubject.setAttribute('data-count',count);
                 count++;
                selectSubject.id="selectsubject";
                let option = document.createElement("option");
                option.setAttribute('value', "-");
                option.textContent="--";
                selectSubject.appendChild(option);
                // for( let i =0; i < data.length;i++){
                //         let option = document.createElement("option");
                //         option.setAttribute('value', data[i].subject);
                //         option.textContent=data[i].subject;
                //         selectSubject.appendChild(option);
                // }
                //using unique names
                for( let i =0; i < uniqueSubjectNames.length;i++){
                    let option = document.createElement("option");
                    option.setAttribute('value', uniqueSubjectNames[i]);
                    option.textContent=uniqueSubjectNames[i];
                    selectSubject.appendChild(option);
            }
                selectdiv.append(labelselect);
                selectdiv.append(selectSubject);
                // allcourses.appendChild(selectdiv);
                if (allcourses.firstChild instanceof Node) {
                    allcourses.replaceChild(selectdiv, allcourses.firstChild);
                  } else {
                    allcourses.appendChild(selectdiv);
                  }
                //when the subject is selected 
                
           
                // for (let i = 0; i < subjectslist.length; i++) {
               
                // subjectslist[i].addEventListener('change', function handleChange(event){
                    allcourses.addEventListener('change', function handleChange(event) {
                        console.log("atleast me");
                        //not needed since we are using temp_course
                        // const handlecourse= function (event) {
                        //     console.log("handlecourse");
                        //              if (event.target && event.target.classList.contains('select_teacher')) {
                        //                  event.target.removeEventListener('change', handlecourse);
                        //                  selected_course.push(event.target.value);
                        //              }
                        //              console.log(selected_course);
                        //          }
                        // Check if the event target is a select element with class 'reg_sub_select'
                        if (event.target && event.target.classList.contains('reg_sub_select')) {

                            const addCourse = function(event){
                                let btnadd = event.target;
                                btnadd.removeEventListener('click', addCourse);
                                event.target.classList.add("hide");
                                let selectdiv = document.createElement("div");
               
                                let labelselect = document.createElement('label');
                                labelselect.textContent = "Subject:";
                                let labellabel = document.createElement('label');
                                labellabel.textContent = "*";
                                labellabel.classList.add("warning");
                                labelselect.append(labellabel);

                                let selectSubject = document.createElement("select");
                                selectSubject.classList.add("reg_select");
                                selectSubject.classList.add("reg_sub_select");
                                selectSubject.id="selectsubject";
                                selectSubject.setAttribute('data-count',count);
                                count++;
                                let option = document.createElement("option");
                                option.setAttribute('value', "");
                                option.textContent="--";
                                selectSubject.appendChild(option);
                                console.log(data);
                                for( let i =0; i < uniqueSubjectNames.length;i++){
                                    // if( !selected_subject.includes(data[i].subject) ){
                                        let option = document.createElement("option");
                                        option.setAttribute('value', uniqueSubjectNames[i]);
                                        option.textContent=uniqueSubjectNames[i];
                                        selectSubject.appendChild(option);
                                    // }
                                        
                                }
                                //without unique names
                                // for( let i =0; i < data.length;i++){
                                //      if( !selected_subject.includes(data[i].subject) ){
                                //         let option = document.createElement("option");
                                //         option.setAttribute('value', data[i].subject);
                                //         option.textContent=data[i].subject;
                                //         selectSubject.appendChild(option);
                                //      }
                                        
                                // }
                                selectdiv.append(labelselect);
                                selectdiv.append(selectSubject);
                               
                                allcourses.appendChild(selectdiv);
                       
                            }
               
                   let sub = event.target;
                   console.log("me triggered");
                   console.log(sub);
                   let actualCount = sub.getAttribute("data-count");
                    for(let i=0; i<sub.options.length; i++){
                     
                            if(sub.options[i].selected==true){
                              
                              console.log("actual count"+actualCount);
                                selected_subject[actualCount]=sub.options[i].value;
                                console.log( selected_subject);
                            
                            }
                        }
                    if(!selected_subject[actualCount].includes("-")){
                        //container for teacher
                        console.log("new teacher");
                        let teacherdiv = document.createElement("div");
               
                        let labelteacher = document.createElement('label');
                        labelteacher.textContent = "Teacher:";
                        let labellabel = document.createElement('label');
                        labellabel.textContent = "*";
                        labellabel.classList.add("warning");
                        labelteacher.append(labellabel);
                        console.log(teacherdiv);
                        //create select element for teachers
                        let selectTeacher = document.createElement("select");
                        selectTeacher.classList.add("reg_select");
                        selectTeacher.classList.add("select_teacher");
                        selectTeacher.setAttribute('name','course_id');
            
                        selectTeacher.id="selectteacher";
                        // teacherdiv.addEventListener('change', handlecourse);
                        let option = document.createElement("option");
                        option.setAttribute('value', "");
                        option.textContent="--";
                        
                        selectTeacher.appendChild(option);
                        //filter out the teachers for the subject
                        console.log(selected_subject.slice(-1)[0]);
                        const newdata = data.filter(obj => obj.subject === selected_subject.slice(-1)[0]);
                        console.log(newdata);

                        for( let i =0; i < newdata.length;i++){
                            let option = document.createElement("option");
                            option.setAttribute('value', newdata[i].course_id);
                            option.textContent=newdata[i].fullname;
                            
                            selectTeacher.appendChild(option);
                        }
                        teacherdiv.appendChild(labelteacher);
                        teacherdiv.appendChild(selectTeacher);
                        // teacher.replaceChild(selectTeacher,teacher.firstChild);
                        if (event.target.nextElementSibling) {
                            event.target.nextElementSibling.replaceWith(teacherdiv);
                            let addcourse = document.createElement("button");
                            addcourse.classList.add("crs_add_btn");
                            addcourse.setAttribute('type', "button");
                            addcourse.id = "addCoursebtn";
                            addcourse.textContent = "Add Course";
                            teacherdiv.append(addcourse);
                            addcourse.addEventListener('click', addCourse);
                        }
                        else{
                            
                            event.target.after(teacherdiv);
                            // add course button creation
                            let addcourse = document.createElement("button");
                            addcourse.classList.add("crs_add_btn");
                            addcourse.setAttribute('type', "button");
                            addcourse.id = "addCoursebtn";
                            addcourse.textContent = "Add Course";
                            teacherdiv.append(addcourse);
                            addcourse.addEventListener('click', addCourse);
                        }
                        
                        // let course = document.getElementsByClassName("select_teacher");
               
           
                    }
                }
                });
            
            }
        
         
         else{
            let selectdiv = document.createElement("div");
               
                let labelselect = document.createElement('label');
                labelselect.textContent = "Subject:";
                let labellabel = document.createElement('label');
                labellabel.textContent = "*";
                labellabel.classList.add("warning");
                labelselect.append(labellabel);
                let selectSubject = document.createElement("select");
                selectSubject.classList.add("reg_select");
                selectSubject.classList.add("reg_sub_select");
                 selectSubject.setAttribute('data-count',count);
                 count++;
                selectSubject.id="selectsubject";
                let option = document.createElement("option");
                option.setAttribute('value', "");
                option.textContent="No Subjects Available";
                selectSubject.appendChild(option);
                selectdiv.appendChild(selectSubject);
                if (allcourses.firstChild instanceof Node) {
                    allcourses.replaceChild(selectdiv, allcourses.firstChild);
                  } else {
                    allcourses.appendChild(selectdiv);
                  }
            selected_subject.push("-");
         }

  

 

    },
    error: function(xhr, status, error) {
      console.log("Error: " + error);
    }
  });
});
}


submitbtn.addEventListener("click",function(e){
    e.preventDefault();
    // console.log(selected_course);
     let form = $('form')[0];
    let formData = new FormData();
    const NIC = document.getElementsByName("NIC")[0].value;
    const first_name = document.getElementsByName("first_name")[0].value;
    const last_name = document.getElementsByName("last_name")[0].value;
    const birthday = document.getElementsByName("birthday")[0].value;
   // const gender = document.getElementsByName("gender")[0].value;
    const email = document.getElementsByName("email")[0].value;
    const mobile_number = document.getElementsByName("mobile_number")[0].value;
    const address = document.getElementsByName("address")[0].value;
    const school = document.getElementsByName("school")[0].value;
    const parent_name = document.getElementsByName("parent_name")[0].value;
    const parent_email = document.getElementsByName("parent_email")[0].value;
    const parent_mobile = document.getElementsByName("parent_mobile")[0].value;
    const grade = document.getElementsByName("grade")[0].value;
    const username = document.getElementsByName("username")[0].value;
    const password = document.getElementsByName("password")[0].value;

    const gender = document.getElementsByName("gender");

    const medium = document.getElementsByName("medium");
    let selectedGender = "";

    let selectedMedium = "";
    for (let i = 0; i < gender.length; i++) {
      if (gender[i].checked) {
        selectedGender = gender[i].value;
        break;
      }
    }

      for (let i = 0; i < medium.length; i++) {
        if (medium[i].checked) {
            selectedMedium = medium[i].value;
          break;
        }
      }
    
      const courseid = document.getElementsByName("course_id");
  
    
      let temp_course = [];
        if(courseid.length > 0){
      
        
    
            for (let i = 0; i < courseid.length; i++) {
                temp_course.push(courseid[i].value);
            }
        }
      
       console.log("course_id",temp_course[0]);
// console.log('megender',selectedGender);
    formData.append('NIC', NIC);
    formData.append('first_name', first_name);
    formData.append('last_name', last_name);
    formData.append('birthday', birthday);
    formData.append('gender', selectedGender);
    formData.append('email', email);
    formData.append('mobile_number', mobile_number);
    formData.append('address', address);
    formData.append('school', school);
    formData.append('parent_name', parent_name);
    formData.append('parent_email', parent_email);
    formData.append('parent_mobile', parent_mobile);
    formData.append('grade', grade);
    formData.append('medium', selectedMedium);
    formData.append('username', username);
    formData.append('password', password);
    formData.append('course', temp_course[0]);
    formData.append('pic', displayPicture.files[0]);
    // Serialize the form data as a string
    // let formSerialized = $(form).serialize();
    // console.log(formSerialized);
    // Append the serialized form data to the FormData object
    // formData.append('formSerialized', formSerialized);
    // let form = $('form')[0];
    // // let formData = new FormData(form);
    // let formData = $(form).serialize();
    
    for (var key of formData.entries()) {
        console.log(key[0] + ', ' + key[1]);
    }

    // formData.append('pic',displayPicture);
    
      $.ajax({
        method:"POST",
        url : `http://localhost/Interlearn/public/register/index/view`,
        data: formData,
        contentType: false,
        processData: false,
        success:function(response){
          console.log(response);

            response= JSON.parse(response);

           if(response.errors){
                for(i in response.errors){
                   let errorTag= document.getElementsByName(i)[0];
                   console.log(errorTag);
                   const errormsg = document.createElement("p");
                   errormsg.classList.add('warning');
                   errormsg.classList.add('err_show');
                   if(response.errors[i].includes('_')){
                     
                       response.errors[i]= response.errors[i].replace("_", " ");
                   }
                   errormsg.textContent=response.errors[i];
                    if (errorTag.previousElementSibling.classList.contains("err_show")) {
                        errorTag.previousElementSibling.replaceWith(errormsg);
                        
                    }
                    else{
                        errorTag.before(errormsg);
                    }
                }
           }
           else{
           let student_id = response.studentID;
          if(response.status == "success"){
            $.ajax({
                method:"POST",
                url : `http://localhost/Interlearn/public/register/course?stuid=${student_id}`,
                data:{course_id: temp_course},
                success:function(response){
                  console.log(response);
                 
                },
                error:function(xhr,status,error){
                  console.log("Error: " + error);
                }
              });
              var url = response.url;
              console.log(url);
              // window.location.href = url;
           }
        }
   
         
        },
        error:function(xhr,status,error){
          console.log("Error: " + error);
        }
      });


});