

ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
var regiosChart = null;
var lixeirasChart = null;
var horarioChart = null;
var lixeirasCheias = 0;
var lixeirasRenderiza = 0;
var regioes1 = null;
var horario = null;

function addData(charti, label, data) {
    charti.data.labels.push(label);

    if(charti.data.datasets.length > 10){   
        charti.data.shift();
    }
    charti.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    charti.update();
}

function GeraLixeiraHTML(dado){
    var conteudo = `<div class="col-md-6">
    <div class="card" style="width: 13.5rem; margin-top: 3vh;">
    <div class="card-body">
      <h5 class="card-title">${dado.trash_name}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Capacidade: ${dado.trash_capacity_used}/${dado.trash_max_support}L</h6>
      <p class="card-text">Endereço: ${dado.trash_address}</p>
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
    console.log(regioes)
    document.querySelector("#cards-regiao").innerHTML = "";


    lixeiras.map(lixeira=>{
        const VerificaLixeira = CalculoLixeiraCheia(lixeira);
        (VerificaLixeira) ? LixeiraRegiao.push(lixeira.id_trash_region) : console.log("");
    })

    regioes.map(regiao=>{
        var QuantidadeLixeira = 0;
        LixeiraRegiao.forEach(LixeiraCheia=>{
            if(regiao.id==LixeiraCheia.id_trash_region){
                QuantidadeLixeira++;
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
    var conteudo = `<div class="col-md-6">
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
                console.log(dado)

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

                    //Condição para inserir apenas 6 lixeiras na página principal
                    if(lixeirasRenderiza < 6){
                        GeraLixeiraHTML(data);
                        lixeirasRenderiza++;
                    }
                })

                //Gera HTML da região no collapse
                GeraRegiao(dado);

                //Adiciona data no gráfico
                addData(horarioChart,horario,lixeirasCheias);
                //Fim do calcula quantas lixeiras estão cheias e joga no gráfico de horarioChart

                //Gera Cards de Lixeira HTML
                //Foi feito tudo junto para economizar nas requisições



                //Se chegou aqui provavelmente inseriu certinho._
                //Utilize a variavel dado da function para verificar se inseriu ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })
}




//Gera grafico das regioes#cards
var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
};
var config = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [],
            backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)'
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Red',
            'Orange',
            'Yellow',
            'Green',
            'Blue'
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
            },
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
};
var ctx = document.getElementById('regioes').getContext('2d');
regioesChart = new Chart(ctx,config);



  //Gera graficos da lixeira
  var ctx = document.getElementById('lixeiras').getContext('2d');
  lixeirasChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [],
          datasets: [{
              label: 'Lixeiras mais cheias',
              data: [],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });

  //Gera grafico dos horarios com a lixeiras mais cheias
  var ctx = document.getElementById('horario').getContext('2d');
  horarioChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [],
          datasets: [{
              label: 'Lixeiras cheias no total por horário',
              data: [],
              borderColor:'rgb(30,108,199)',
              borderWidth: 1
          }]
      },
      options: {
    
            scales: {
                ticks: {
                    max:1,
                    min:0,
                    stepSize:0,
                    precision:0
                }
            }
        }
  });


  getInfos();
  setInterval(getInfos,5000)
















});

















