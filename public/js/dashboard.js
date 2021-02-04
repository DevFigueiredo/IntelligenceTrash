function BtnLixeira(){
    var LixeiraDiv = document.querySelector('#lixeira-demo')
    
    (LixeiraDiv.classList.contains('d-none')) ? LixeiraDiv.classList.remove('d-none') : LixeiraDiv.classList.add('d-none')
}

function BtnRegiao(){
    var RegiaoDiv = document.querySelector('#regiao-demo')
    
    (RegiaoDiv.classList.contains('d-none')) ? RegiaoDiv.classList.remove('d-none') : RegiaoDiv.classList.add('d-none')
}

ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
    

var lixeirasCheias = 0;
var lixeirasRenderiza = 0;
var regioes1 = null;
var horario = null;
var ArrayLixeiraCheiaGrafico = [['Horario', 'Lixeiras Cheias']]




function GeraLixeiraHTML(dado){
    var cor = "";

    (dado.trash_capacity_used>(dado.trash_max_support/2)) ? cor = "red" : cor = "green" 

    var conteudo = `<div class="col-md-3">
    <div class="card" style="width: 13.5rem; margin-top: 3vh;">
    <div class="card-body">
    <i class="fa fa-circle" style="float: right; color: ${cor};"></i>
      <h5 class="card-title">${dado.trash_name}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Capacidade: ${dado.trash_capacity_used}/${dado.trash_max_support}L</h6>
      <a href="/trash/info/${dado.id}/index" class="card-link">Ver mais informações...</a>
    </div>
  </div>`

    document.querySelector("#cards-lixeira").innerHTML += conteudo;
}

function GetAllRegions(dados1){
    var url = "/region/all";
    var dados = null;
    fetch(url)
    .then(function(response){
        response.json().then(function(dado){
            CalculaLixeirasRegioes(dados1,dado);
        })
    })

   
}

function CalculaLixeirasRegioes(lixeiras,regioes){
    var LixeiraRegiao = [];
    var QuantidadeRegiao = 0;

    document.querySelector("#cards-regiao").innerHTML = "";


    lixeiras.map(lixeira=>{
        const VerificaLixeira = CalculoLixeiraCheia(lixeira);
        (VerificaLixeira) ? LixeiraRegiao.push(lixeira.id_trash_region) : null;
    })

    regioes.map(regiao=>{
        var QuantidadeLixeira = 0;
        LixeiraRegiao.forEach(LixeiraCheia=>{

            if(regiao.id==LixeiraCheia){
                QuantidadeLixeira = QuantidadeLixeira + 1;
            }
        })
        if(regiao.status==1 && QuantidadeRegiao < 6){
            GeraRegiaoHTML(regiao.id,regiao.trash_regions_description,QuantidadeLixeira);
            QuantidadeRegiao++;
        }
    })
}

function CalculoLixeiraCheia(lixeira){
    return lixeira.trash_capacity_used >= (lixeira.trash_max_support/2);
}


function GeraRegiao(dado){
    GetAllRegions(dado);
}

function GeraRegiaoHTML(id,desc,quant){
    var conteudo = `<div class="col-md-3">
    <div class="card" style="width: 13.5rem; margin-top: 3vh;">
    <div class="card-body">
      <h5 class="card-title">${desc}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Lixeiras Cheias: ${quant}</h6>
      <a href="/trash/info/${id}" class="card-link">Ver mais informações...</a>
    </div>
  </div>`

    document.querySelector("#cards-regiao").innerHTML += conteudo;
}

function getInfos(){
    var url = "/trash/";
    let myinit = {
        method : 'GET'     
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){

                //Calcula quantas lixeiras estão cheias e joga no gráfico de horarioChart
                //Foi tentado exportar essa função abaixo para uma função externa porem da erro, não mexer
                lixeirasCheias = 0;
                lixeirasRenderiza = 0;

                //Esvazia as lixeiras
                document.querySelector("#cards-lixeira").innerHTML = "";
                
                //FOreach para passar pelas lixeiras e fazer as validações
                dado.forEach((data)=>{
                    //Condição para verificar as lixeiras cheias
                    if(CalculoLixeiraCheia(data)){
                        lixeirasCheias++;
                        horario = data.last_created_capacity;
                    }

                    //Condição para inserir apenas as 8 lixeiras mais cheias na página principal
                    if(lixeirasRenderiza < 8 && (data.trash_capacity_used >(data.trash_max_support/2))){
                        GeraLixeiraHTML(data);
                        lixeirasRenderiza++;
                    }
                })

                //Gera HTML da região no collapse
                GeraRegiao(dado);

                //Adiciona data no gráfico de lixeiras cheias
                var DadosLixeiraCheia = [horario,lixeirasCheias]
                GraficoLixeiraCheia(DadosLixeiraCheia);
                //Fim do calcula quantas lixeiras estão cheias e joga no gráfico de horarioChart

                //Gera Cards de Lixeira HTML
                //Foi feito tudo junto para economizar nas requisições



                //Se chegou aqui provavelmente inseriu certinho._
                //Utilize a variavel dado da function para verificar se inseriu ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })
}




  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(GraficoLixeiraCheia);
  
  function GraficoLixeiraCheia(dados = []) {
        
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', 'Lixeiras');
  
        if(dados.length != 0){
          ArrayLixeiraCheiaGrafico.push(dados)
        }
        if(ArrayLixeiraCheiaGrafico.length == 7){
          ArrayLixeiraCheiaGrafico.splice(1,1)
        }
  
        var data = google.visualization.arrayToDataTable(ArrayLixeiraCheiaGrafico);
  
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




//Gera grafico das regioes#cards
var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
};


getInfos();
setInterval(getInfos,5000)

});

















