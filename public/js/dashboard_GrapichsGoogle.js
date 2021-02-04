/*

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


*/








/*
var arrayy = [
  ['Horario', 'Lixeiras Cheias'],
  ['22/01/2021 12:10:00',  15],
  ['22/01/2021 12:20:00',  5],
  ['22/01/2021 12:30:00',  12],
  ['22/01/2021 12:40:00',  30]
]
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(GraficoLixeiraCheia);

function GraficoLixeiraCheia(dados = []) {
      
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Lixeiras');

      if(dados.length != 0){
        arrayy.push(dados)
      console.log(arrayy)
      }
      if(arrayy.length == 7){
        arrayy.splice(1,1)
      }

      var data = google.visualization.arrayToDataTable(arrayy);

      var options = {
        hAxis: {
          title: 'Horário'
        },
        vAxis: {
          title: 'Quantidade de Lixeiras'
        }
      };

      var chart2 = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart2.draw(data, options);
}

setInterval(()=>{
  var dados = ['22/01/2021 12:10:00',25];
  GraficoLixeiraCheia(dados);
},5000)

*/