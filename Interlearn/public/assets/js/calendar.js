const allDays = document.querySelector(".days"),
Today = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".calendar_icons span");
const viewDate = document.getElementsByClassName("active");
const assignmentContainer = document.getElementById("assignment_today");

let assignmentDates = [];
let days = [];
let allAssignments = [];
// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive clickdate"  data-today = ${lastDateofLastMonth - i + 1}>${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month

        let isToday ="";
        for (j in days){
            isToday = i === Number(days[j][2]) && currMonth === (days[j][1]-1)
                     && currYear === Number(days[j][0]) ? "active" : "";
            if(isToday === "active"){
                    break;
            }
      
        }

         
        liTag += `<li class="${isToday} clickdate" data-today = ${i}>${i}</li>`;
       

    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive clickdate" data-today = ${i - lastDayofMonth + 1}>${i - lastDayofMonth + 1}</li>`
    }
    Today.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as Today text
    allDays.innerHTML = liTag;
    
     //triggered when you click a date
     for (let i = 0; i < viewDate.length; i++) {

        viewDate[i].addEventListener("click", () => {
           assignmentContainer.innerHTML='';
           //console.log(allAssignments);
            if (!viewDate[i]) {
                return;
              }
             let dateofAssignment =(currMonth+1)+"-"+viewDate[i].dataset.today+"-"+currYear;  
             let assignmentDate = new Date(dateofAssignment);
             assignmentDate.setHours(0, 0, 0, 0); // set hours to 0 to compare dates only

            for (let j in allAssignments){
                let deadline = new Date(allAssignments[j].deadline);
                deadline.setHours(0, 0, 0, 0);
       
                if (deadline.getTime() === assignmentDate.getTime()) {
                    let assignmentcard = ` 
                    <a href ="http://localhost/Interlearn/public/student/coursepg/submissionstatus/${allAssignments[j].courseId}?id=${allAssignments[j].assignmentId}"> 
                        <div  class ="assignment_card">
                        <div class ="assignment_card_title"><p>${allAssignments[j].title}<p></div>
                        <ul>
                        
                            <li> Deadline: ${allAssignments[j].deadline}</li>
                            <li> Subject: ${allAssignments[j].subject}</li>
                    
                        </ul>
                        </div>
                    
                    </a>`;
                    //console.log(allAssignments[j].title);
                    assignmentContainer.innerHTML+=assignmentcard;
                  }
                
            }
       
        
        
        });
      }
}

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});


//const getdates = () =>{
    $.ajax({ 
        method: "GET", 
        url:`http://localhost/Interlearn/public/calendar/student`,
    
        success: function(data) { 
        //   console.log(data);
        allAssignments = data;

          for(i in data){
           
            assignmentDates.push(data[i].deadline);
           
          }
          
      
          for(i in assignmentDates){
          
              let date = assignmentDates[i].split(' ')[0];
               days.push(date.split('-'));
        
              
          }
         
          console.log(days);
          renderCalendar();
       
    
       
        },
        error: function(xhr, status, error) {
          console.log("Error: " + error);
        }
        
      });
    
 

      
//}

