google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
  var data = new google.visualization.arrayToDataTable([
    ['TOTAL', 'Total de Lixeiras'],
    ["LESTE", 44],
    ["NORTE", 31],
    ["CENTRO", 12],
    ["SUL", 10],
  ]);

  var options = {
    title: 'Qtd de Lixeiras Por Região',
    legend: { position: 'none' },
    chart: { title: 'Qtd de Lixeiras Por Região',
 },
    bars: 'vertical', // Required for Material Bar Charts.
    axes: {
      x: {
        0: { side: 'out', label: 'Regiões'} // Top x-axis.
      }
    },
    bar: { groupWidth: "90%" }
  };

  var chart = new google.charts.Bar(document.getElementById('GrapichTrashToRegion'));
  chart.draw(data, options);
};