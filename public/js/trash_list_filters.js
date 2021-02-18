var DadosLixeira = null;

ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
  import('./trashes_list.js')




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
                  GeraLixeiraHTML(data)
                  console.log(data)
                })

            })
        })
}

function GeraLixeiraHTML(dado){
    var cor = "";

    var classesHTML = "";

    (dado.trash_capacity_used>(dado.trash_max_support/2)) ? cor = "red" : cor = "green"
    
    var zona = dado.trash_regions_description.replace(/ /g,"_");

    var conteudo = `<div class="col-md-3 filterDiv ${cor} ${zona} all_capct all_zones d-none" id="${dado.id}">
    <div class="card" style="margin-top: 3vh;">
    <div class="card-header">
        <h5 class="card-title" id="nome_lixeira">${dado.trash_name} <i class="fa fa-circle" style="float: right; color: ${cor};"></i></h5>
    </div>
    <div class="card-body">
      <p class="card-subtitle mb-2 text-muted">Região: ${dado.trash_regions_description}</p>
      <p class="card-subtitle mb-2 text-muted">Capacidade: ${dado.trash_capacity_used}/${dado.trash_max_support}L</p>
      <a href="/trash/info/${dado.id}/index" class="card-link">Ver mais informações...</a>
    </div>
  </div>`

    document.querySelector("#cards-lixeira").innerHTML += conteudo;
}




getInfos()







})

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
  x = document.getElementsByClassName("filterDiv");
  var zona = document.getElementById('zona').value
  var status = document.getElementById('capacidade').value
  var LixeiraId = [] 
  
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    if (x[i].className.indexOf(zona) > -1 && x[i].className.indexOf(status) > -1){
      LixeiraId.push(x[i].id)
    };
  }

  GetTrashInfo(LixeiraId)
}


function filterSelection(c = null) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    var zona = document.getElementById('zona').value
    var status = document.getElementById('capacidade').value
      
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(zona) > -1 && x[i].className.indexOf(status) > -1) w3AddClass(x[i], "show");
    }
  
  }
  
  // Show filtered elements
  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
      }
    }
  }
  
  // Hide elements that are not selected
  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
      }
    }
    element.className = arr1.join(" ");
  }


  