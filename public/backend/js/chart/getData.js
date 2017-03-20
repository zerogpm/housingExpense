$( document ).ready(function() {

  var title = $('#title').data('title');
  var color = $('#color').data('color');
  var sum = $('#sum').data('sum');

  var donutSum = $('#donutSum').data('donut-sum');
  var donutMonth = $('#donutMonth').data('donut-month');

  var ctx = $('#areaChart');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: donutMonth,
      datasets: [{
        label: '$ Cost For Each Month',
        data: donutSum,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var data = {
    labels: title,
    datasets: [
      {
        data: sum,
        backgroundColor: color,
        hoverBackgroundColor: color
      }]
  };

  var ctx2 = $('#pieChart');
  var myDoughnutChart = new Chart(ctx2, {
    type: 'doughnut',
    data: data,
    options: {
      animation:{
        animateScale:true
      }
    }
  });

});