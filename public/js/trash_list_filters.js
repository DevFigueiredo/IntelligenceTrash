
import('./trashes_list.js')
var DadosLixeira = null;
var DadosFiltrados = null;

ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
  




function getInfos(){
    var url = "/trash/";
    let myinit = {
        method : 'GET'     
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                DadosLixeira = dado;
                dado.forEach((data)=>{
                //  GeraLixeiraHTML(data)
                })

            })
        })
}





getInfos()







})


function GeraLixeiraHTML(dado){
  var cor = "";

  var classesHTML = "";

  (dado.trash_capacity_used>(dado.trash_max_support/2)) ? cor = "red" : cor = "green"
  
  var zona = dado.trash_regions_description;

  var conteudo = `<div class="col-md-3 ${cor} ${zona} all_capct all_zones" data-name="${dado.trash_name}" id="${dado.id}">
  <div class="card" style="margin-top: 3vh;">
  <div class="card-header">
      <h5 class="card-title" id="nome_lixeira">${dado.trash_name} <i class="fa fa-circle" style="float: right; color: ${cor};"></i><a target="_blank" href="http://maps.google.com/maps?q=${dado.trash_latitude},${dado.trash_longitude}&ll=${dado.trash_latitude},${dado.trash_longitude}&z=20"> <i class="fa fa-map-marker" aria-hidden="true" style="float: right; color: green; margin-right: 15px; cursor: pointer;"></i></h5>
  </div>
  <div class="card-body">
    <p class="card-subtitle mb-2 text-muted">Região: ${dado.trash_regions_description}</p>
    <p class="card-subtitle mb-2 text-muted">Capacidade: ${dado.trash_capacity_used}/${dado.trash_max_support}L</p>
    <a href="/trash/info/${dado.id}/index" class="card-link">Ver mais informações...</a>
  </div>
</div>`

  document.querySelector("#cards-lixeira").innerHTML += conteudo;
}



function GeraExcel(Listagem){
  alasql('SELECT * INTO XLSX("Filtro-Lixeiras.xlsx", {headers: true}) FROM ?', [Listagem]);
}


function GetTrashInfo(lixeiras){

  var VaiProExcel = []


  lixeiras.map(trash=>{
    DadosLixeira.map(dados=>{
      if(trash == dados.id){
        VaiProExcel.push(dados)
      }
    })
  })

  GeraExcel(VaiProExcel)
}

function GetExcelList(){
  GeraExcel(DadosFiltrados)
}

function validaLixeira(lixeira){
  
  var zona = document.getElementById('zona').value
  var capacidade = document.getElementById('capacidade').value

  


//CASO APENAS UM FILTRO TENHA SIDO ESCOLHIDO, APLICAR A SEGUINTE REGRA
  if(zona=="all" || capacidade=="all"){
 
    if(lixeira.id_trash_region == zona){
      return true
    } 
    
    
//SE A O FILTRO capacidade 1 OU 1 = LIXEIRA CHEIA OU LIXEIRA VAZIA ESTIVER HABILITADO, 
//RETORNARÁ VERDADEIRO APENAS AS LIXEIRAS QUE UTILIZARAM MAIS QUE 50% DA CAPACIDADE
    if((capacidade==1 && lixeira.trash_capacity_used>(lixeira.trash_max_support/2))
    || (capacidade==0 && lixeira.trash_capacity_used<=(lixeira.trash_max_support/2))){
      return true
    }  
    
    
  }


  //CASO OS DOIS FILTROS TENHAM SIDO ESCOLHIDOS FAZER A SEGUINTE REGRA
  if(zona!="all" && capacidade!="all"){
    if(lixeira.id_trash_region == zona 
    && 
    (capacidade==1 && lixeira.trash_capacity_used>(lixeira.trash_max_support/2))
    || (capacidade==0 && lixeira.trash_capacity_used<=(lixeira.trash_max_support/2))){
      return true
    }   

    
  }
  

  
return false
}



function filterSelection(c = null) {  
  //LIMPA TODOS OS ELEMENTOS QUE ESTÁ DENTRO DA DIV
  document.getElementById("cards-lixeira").innerHTML= "";
  
  //VARRE TODAS LIXEIRAS E CHAMA A FUNCAO QUE VALIDA A LIXEIRA
  DadosFiltrados = DadosLixeira.filter(validaLixeira)
  DadosFiltrados.map(lixeira=>GeraLixeiraHTML(lixeira))

  find_trashes_in_map(DadosFiltrados)

}

  function FilterByName(valor){
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    var zona = document.getElementById('zona').value
    var status = document.getElementById('capacidade').value
    document.getElementById("cards-lixeira").innerHTML= "";

    DadosFiltrados.map(lixeira=>{
      if(lixeira.trash_name.toLowerCase().includes(valor.toLowerCase())){
        GeraLixeiraHTML(lixeira)
      }
    })
  }

  

  