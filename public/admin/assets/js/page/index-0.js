"use strict";

var statistics_chart = document.getElementById("myChart");

if (statistics_chart) {
  var ctx = statistics_chart.getContext('2d');

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'Statistics',
        data: [640, 387, 530, 302, 430, 270, 488],
        borderWidth: 5,
        borderColor: '#6777ef',
        backgroundColor: 'transparent',
        pointBackgroundColor: '#fff',
        pointBorderColor: '#6777ef',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            color: '#fbfbfb',
            lineWidth: 2
          }
        }]
      },
    }
  });
} else {
  console.error("Element with id 'myChart' not found. Ensure it exists in the HTML.");
}
