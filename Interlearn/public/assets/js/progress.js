var x = 'A';
var y = 'B';
var z = 'C';
var p = 'S';
var q = 'W';
var xValues = [x, y, z, p, q];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#0D3C4F",
  "#2D7A8A",
  "#489BAE",
  "#7AD0D9",
  "#DAF6ED"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Mathematics"
    }
  }
});