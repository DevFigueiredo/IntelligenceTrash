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

    GetTableInfo()
    AtualizaGraficoLive()
    setInterval(AtualizaGraficoLive,30000)


});
//=============================================================================================================================================================================================================
// Grafico capacidade em tempo real
var ArrayLixeiraGrafico = [['Horario', 'Capacidade']]
var ArrayLixeiraGraficoTempo = [['Horario', 'Capacidade']]

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(LixeiraGrafico);

function LixeiraGrafico(dados = []) {

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
      google.charts.setOnLoadCallback(LixeiraGraficoTempo);

      function GraficoIntervalo(tempo,tipo){
        var TempoRealDiv = document.getElementById("chart_div")
        var NormalDiv = document.getElementById("chart_div2")
        if(tempo == 4){
            
            if(TempoRealDiv.classList.contains("d-none")){
              TempoRealDiv.classList.remove("d-none")
              NormalDiv.classList.add("d-none")
            }


        }else{

            TempoRealDiv.classList.add("d-none")
            NormalDiv.classList.remove("d-none")

            let url = "/trash/history/info";
            let myinit = {
            method : 'POST',
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
                    },
                body: JSON.stringify({'timestamp': parseInt(tempo),
                                    'id': trash_id.value
                }),
            }

            fetch(url,myinit)
            .then(function(response){
                response.json().then(function(dado){

                    if(tipo == 1){
                        ArrayLixeiraGraficoTempo = [['Horario', 'Capacidade']]

                    dado.map((dados)=>{
                        LixeiraGraficoTempo([dados.created_at,parseInt(dados.trash_capacity_used)])
                    })
                }
                if(tipo == 2){
                    alasql('SELECT * INTO XLSX("arquivo.xlsx", {headers: true}) FROM ?', [dado]);
                }
                })
            })

        }
      }
      
      function LixeiraGraficoTempo(dados = [], titulo="Capacidade da Lixeira") {
        
        


        if(dados.length != 0){
            ArrayLixeiraGraficoTempo.push(dados)
            console.log(ArrayLixeiraGraficoTempo)
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


      function GetTableInfo(){
         
        let url = "/trash/history/table";
        let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
                },
            body: JSON.stringify({'id_trash': trash_id.value
            }),
        }

        fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                OrganizaHTMLTabela(dado)
            })
        })

      }

      function OrganizaHTMLTabela(dados){
        var tabela = document.querySelector("#tabela_info")
        
        tabela.innerHTML = "";
        
        dados.map((dado)=>{
            var html = ` <tr>
                            <th>${dado.created_at}</th>
                            <td>${dado.name}</td>
                            <td>${dado.trash_history_status_description}</td>
                            <td>${dado.trash_history_description}</td>
                        </tr>`
            
            tabela.innerHTML += html
        })
      }

      function ShowGraphics(){
          var GraficosDiv = document.getElementById("DivGraficos")
          var TabelaDiv = document.getElementById("tabela")

          if(GraficosDiv.classList.contains("d-none")){
            GraficosDiv.classList.remove("d-none")
            TabelaDiv.classList.add("d-none")
          }else{
            GraficosDiv.classList.add("d-none")
          }
      }

      function ShowHistory(){
        var GraficosDiv = document.getElementById("DivGraficos")
        var TabelaDiv = document.getElementById("tabela")

        if(TabelaDiv.classList.contains("d-none")){
            TabelaDiv.classList.remove("d-none")
            GraficosDiv.classList.add("d-none")
        }else{
            TabelaDiv.classList.add("d-none")
        }
      }

      



      
