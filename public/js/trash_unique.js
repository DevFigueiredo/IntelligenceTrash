ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
    const trash_id = document.getElementById('trash_id').value;
    find_unique_trash_in_map(trash_id);

    function AtualizaGraficoLive(){
    
        var url = `/trash/info/${trash_id}`
        var body =  {'id_trash': trash_id}
    
        fetch(url,body)
        .then(function(response){
            response.json().then(function(dado){
                LixeiraGrafico([dado[0].last_created_capacity,parseInt(dado[0].trash_capacity_used)])
            })//
        })
    }
    
    AtualizaGraficoLive()
    setInterval(AtualizaGraficoLive,30000)


});
//=============================================================================================================================================================================================================
// Grafico capacidade em tempo real
var ArrayLixeiraGrafico = [['Horario', 'Capacidade']]
var ArrayLixeiraGraficoTempo = [['Horario', 'Capacidade'],['12',12]]

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(LixeiraGrafico);

function LixeiraGrafico(dados = []) {

    console.log(dados)
    if(dados.length != 0){
        ArrayLixeiraGrafico.push(dados)
    }
    if(ArrayLixeiraGrafico.length == 7){
        ArrayLixeiraGrafico.splice(1,1)
    }

  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable(ArrayLixeiraGrafico);

  var options = {
    title : 'Capacidade da Lixeira em Tempo Real',
    vAxis: {title: 'Capacidade'},
    hAxis: {title: 'Horário'},
    seriesType: 'bars',
    series: {2: {type: 'line'}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}

//=============================================================================================================================================================================================================
// Grafico por tempo
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(dados = [], titulo="Capacidade da Lixeira") {

        if(dados.length != 0){
            ArrayLixeiraGraficoTempo.push(dados)
        }
        
        var data = google.visualization.arrayToDataTable(ArrayLixeiraGraficoTempo);

        var options = {
          title: titulo,
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));

        chart.draw(data, options);
      }



