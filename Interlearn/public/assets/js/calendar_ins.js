const allDays = document.querySelector(".days"),
Today = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".calendar_icons span");
const viewClass = document.getElementsByClassName("active");
const assignmentContainer = document.getElementById("assignment_today");


let classDates = [];
let days = [];
let allClasses = [];
// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];
const Weeks = [ "Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
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
        for (j in classDates){
           
            isToday = Weeks[new Date(currYear, currMonth, i).getDay()] === classDates[j]? "active" : "";
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
     for (let i = 0; i < viewClass.length; i++) {

        viewClass[i].addEventListener("click", () => {
           assignmentContainer.innerHTML='';
           //console.log(allAssignments);
            if (!viewClass[i]) {
                return;
              }
             let dateofClass =Weeks[new Date(currYear, currMonth, viewClass[i].dataset.today).getDay()];  

            for (let j in allClasses){
             
                if (dateofClass === allClasses[j].day) {
                    let classcard = ` 
                   
                    <a href ="http://localhost/Interlearn/public/teacher/course/view/${allClasses[j].course_id}"> 
                        <div  class ="assignment_card">
                        <div class ="assignment_card_title"><p>${allClasses[j].subject}<p></div>
                        <ul>
                             <li> Day: ${allClasses[j].day}</li>
                            <li> Time: ${allClasses[j].timefrom}-${allClasses[j].timeto}</li>
                            
                    
                        </ul>
                        </div>
                    
                    </a>`;
                    //console.log(allAssignments[j].title);
                    assignmentContainer.innerHTML+=classcard;
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
        url:`http://localhost/Interlearn/public/calendar/instructor`,
    
        success: function(data) { 
            console.log(data);
        allClasses = data;
          for(i in data){
           
            classDates.push(data[i].day);
           
          }
          
  
         
          console.log(classDates);
          renderCalendar();
       
    
       
        },
        error: function(xhr, status, error) {
          console.log("Error: " + error);
        }
        
      });
    
 

      
//}

