const allDays = document.querySelector(".days"),
Today = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".calendar_icons span");
var viewDate = document.querySelectorAll(".clickdate");
let assignmentDates = [];
let days = [];
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
        liTag += `<li class="inactive clickdate">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        // let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
        //              && currYear === new Date().getFullYear() ? "active" : "";
        let isToday ="";
        for (j in days){
            isToday = i === Number(days[j][2]) && currMonth === (days[j][1]-1)
                     && currYear === Number(days[j][0]) ? "active" : "";
            if(isToday === "active"){
                    break;
            }
      
        }

         
        liTag += `<li class="${isToday} clickdate">${i}</li>`;
       

    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive clickdate">${i - lastDayofMonth + 1}</li>`
    }
    Today.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as Today text
    allDays.innerHTML = liTag;
     //triggered when you click a date
        viewDate.forEach(day=>{
            day.addEventListener("click",()=>{
                console.log("here");
                 console.log(day.value);
        });
    });
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
        url:`http://localhost/Interlearn/public/student/calendar`,
    
        success: function(data) { 
        //   console.log(data);
        

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

