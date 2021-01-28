ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
var regiosChart = null;
var lixeirasChart = null;
var horarioChart = null;
var lixeirasCheias = 0;
var horario = null;

function addData(charti, label, data) {
    charti.data.labels.push(label);

    if(charti.data.datasets.length > 10){
        charti.data.datasets.shift();
    }
    charti.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    charti.update();
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
                dado.forEach((data)=>{
                    if((data.trash_capacity_used >= data.trash_max_support) || (data.trash_capacity_used >= (data.trash_max_support/2))){
                        lixeirasCheias++;
                        horario = data.last_created_capacity;
                    }
                })

                addData(horarioChart,horario,lixeirasCheias);
                //Fim do calcula quantas lixeiras estão cheias e joga no gráfico de horarioChart




                //Se chegou aqui provavelmente inseriu certinho._
                //Utilize a variavel dado da function para verificar se inseriu ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })
}




//Gera grafico das regioes
var ctx = document.getElementById('regioes').getContext('2d');
regioesChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [],
          datasets: [{
              label: 'Regiões mais cheias',
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



  setInterval(getInfos,5000)
















});

















