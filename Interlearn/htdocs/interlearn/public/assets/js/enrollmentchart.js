const chartDiv = document.getElementById("enrollchart");
const displayYear = document.getElementById("thisYear");
const displayMonth = document.getElementById("thisMonth");
$.ajax({
    url:"http://localhost/Interlearn/public/home/chart/line",
  
    success: function(response){
        const stat = JSON.parse(response);
        const countsByYear = {};
        const year =new Date().getFullYear() ;
        const month = new Date().getMonth()+1 ;
       
        let ycount=0;
        let mcount=0;
   

        for(let i=0;i<stat.length;i++){
    
            if(countsByYear[stat[i].Year]){
                countsByYear[stat[i].Year]+=stat[i].Count;
            }
            else{
                countsByYear[stat[i].Year]=stat[i].Count;
            }
            
            if(stat[i].Year==year&&stat[i].month==month){
                mcount = stat[i].Count;
            }
            

        }
        for(j in countsByYear){
            if(j== year){
                ycount = countsByYear[j];
                break;
            }
        }
        console.log(Object.keys(countsByYear));
        console.log(Object.values(countsByYear));

        new Chart("myChart", {
        type: "line",
        data: {
            labels: Object.keys(countsByYear),
            datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "#9B59B6",
            borderColor: "rgba(0,0,255,0.1)",
            data: Object.values(countsByYear)
            }]
        },
        options: {
            legend: {display: false},
            scales: {
            yAxes: [{ticks: {min: 0, max:50}}],
            }
        }
        });

        displayYear.innerHTML=ycount;
        thisMonth.innerHTML=mcount;
    },
    error:function(xhr){
      alert('Error loading threads: ' + xhr.responseText);
    }
  });


//   subject chart
var barColors = [  
   
    "#682cc6",
    "#682cc6",
    "#682cc6",
    "#682cc6",   
     "#682cc6",
    "#682cc6",    
    "#9c23ff",
    "#9c23ff",
    "#3d24b3",
    "#9c23ff",
// "#4c2e7f",
// "#5a3c91",
// "#684aa3",
// "#7658b5",
// "#b66d20",
// "#20b67a",
// "#b6208e",
// "#634b89",
];

  $.ajax({
    url:"http://localhost/Interlearn/public/home/chart/bar",
  
    success: function(response){
        const stats = JSON.parse(response);
        const subjectCount =[];
        const subjectGrade =[];

   

        for(let i=0;i<stats.length;i++){
    
            subjectCount.push(stats[i].count);
            const grade = "Grade "+stats[i].grade;
            subjectGrade.push(grade);
            

        }
        console.log(subjectCount);
        console.log(subjectGrade);


        new Chart("subjectChart", {
        type: "bar",
        data: {
            labels: subjectGrade,
            datasets: [{
              backgroundColor: barColors,
              data: subjectCount
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Subjects per grade"
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        stepSize: 1,
                        min: 0 
                    },
                    gridLines: {
                        display: true
                    }
                }]
            }
          }
        });

      
    },
    error:function(xhr){
      alert('Error loading threads: ' + xhr.responseText);
    }
  });


  //   staff count
  var pieColors = [
    "#EF2BFE",
    "#5733ff",
    "#2488b3",
    "#222b7d",
    "#1e7145",
        "#611666",
    "#AF8AEA",
  ];
  $.ajax({
    url:"http://localhost/Interlearn/public/home/chart/pie",
  
    success: function(response){
        const stats = JSON.parse(response);
        const staffCount =[];
        const staffRole =[];

   

        for(let i=0;i<stats.length;i++){
    
            staffCount.push(stats[i].count);
            staffRole.push(stats[i].role);
            

        }

        new Chart("staffChart", {
            type: "pie",
            data: {
              labels: staffRole,
              datasets: [{
                backgroundColor: pieColors,
                data: staffCount
              }]
            },
            options: {
              title: {
                display: true,
                text: "Staffs count"
              },
              aspectRatio: 1, // set the aspect ratio to 1:1 to make the chart a perfect circle
              responsive: true,
              maintainAspectRatio: false,
              layout: {
                padding: {
                  left: 10,
                  right: 10,
                  top: 10,
                  bottom: 10
                }
              },
              legend: {
                position: 'left',
                labels: {
                  usePointStyle: true,
                  fontStyle: 'bold'
                }
              }
            }
          });

      
    },
    error:function(xhr){
      alert('Error loading threads: ' + xhr.responseText);
    }
  });