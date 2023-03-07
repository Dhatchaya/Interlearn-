console.log("here");
$.ajax({ 
    method: "GET", 
    url:`http://localhost/Interlearn/public/receptionist/course/select`,

    success: function(data) { 
      console.log(data);
    }
});