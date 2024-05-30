google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
                
 function drawChart() {
var data = google.visualization.arrayToDataTable([
 ['MONTH', 'Weight', 'goalweight'],
 ['MARCH',  57, 55],
 ['APRIL',  60,55],
 ['MAY',  53, 55],
 ['JUNE',  58, 55]
],

);
                  
 var options = {
title: 'Weight Chart',
curveType: 'function',
 legend: { position: 'bottom' },
//  hAxis: { maxValue: 10 },
//  vAxis: { maxValue: 18 },
 chartArea: { width: 250},
 chartArea: { height: 150},
 pointShape: 'circle', // Set the point shape
pointSize: 7,// Set the point size
lineWidth: 2,
series:{
  1: { lineDashStyle: [10, 2] },

},
 

 colors: ['FF2650','#F67F96'],
 hAxis: {
  baselineColor: 'none',
  gridlines: { color: 'transparent' },
  textPosition: 'none'
}
};
                  
 var chart = new google.visualization.LineChart(document.getElementById('myFirstchart'));
                  
 chart.draw(data, options);
}

                        