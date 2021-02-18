
import('./index.js')

GetTeams();

var responsabilities = [];



async function GetTeams(){
  await axios.get('/team').then(function (response) {
  const teams = response.data;
  teams.map(team=>{
   $('#teams').append($('<option>', {
    value: team.id,
    text: team.trash_team_description
}));
});
    
});

}




async function GetRegions(){
    $('#region').empty();


  await axios.get('/region/all')
  .then(function (response) {
    const regions = response.data;
    $('#region').append('<option>', {
      text: "Selecione a Região"
});

    regions.map(region=>{
      $('#region').append($('<option>', {
        value: region.id,
        text: region.trash_regions_description
    }));

  });
  })

}


  async function GetTrashesOfRegions(){
    $("#trashes").empty();


    const region = document.getElementById('region').value;

    await axios.get('/trash')
    .then(function (response) {
      const trashes = response.data;
      
      trashes.map(trash=>{
    if(trash.id_trash_region === region){
        $('#trashes').append($('<option>', {
          value: trash.id,
          text : trash.trash_name
      }))
    }
    
    });
    })
    document.getElementById('trashes').disabled=false;

  }
  

async function ShowResponsabilitiesTime(){
  const id_team =  document.getElementById("teams").value;
  while(responsabilities.length) {
    responsabilities.pop();
  }

 await axios.get(`/responsability/team/${id_team}`).then(function (response) {
  
  responsabilities.push(response.data);
    CreateTableTrashes(response.data);
 // console.log(response.data);  
})


document.getElementById('addResponsability').disabled=false;
document.getElementById('region').disabled=false;

//PROCURA POR TODAS A REGIÕES DO SISTEMA
GetRegions();

}



function CreateTableTrashes(values) {
  var div = document.getElementById("showresponsabilities")
   div.innerHTML = "";
  
   var newTable = "<table class='table table-striped table-bordered' >";
   newTable +="<thead class='thead-dark'";
    
  newTable +="<tr>";
  newTable += "<th scope='col'>Time</td>";
  newTable += "<th scope='col'>Região</td>";
  newTable += "<th scope='col'>Lixeira</td>";
  newTable += "<th scope='col'>Ação</td>";
  newTable += "</tr>";
  newTable +="</thead>";
  newTable +="<tbody>";
  values.map((value, index)=>{
    newTable +="<tr>";
    newTable += "<td >" + value.team_name + "</td>";
    newTable += "<td >" + value.trash_name + "</td>";
    newTable += "<td >" + value.region_name + "</td>";
    newTable += `
    <td onclick='RemoveResponsability(${index})'>
    <img src="../delete.png" alt="Remover" style="width:20px; height: 20px;">
    </td>
    `;
    newTable += "</tr>";
  })
  newTable +="</tbody>";
  
   
   
   newTable += "</table>";
   
   div.innerHTML = newTable;
   }
  
  









   

function AddResponsability(){
  var id_team = $('#teams :selected').val(); // Português;
  var id_region = $('#region :selected').val();
  var id_trash = $('#trashes :selected').val();
  
  var team_name = $('#teams :selected').text();
  var region_name = $('#region :selected').text();
  var trash_name = $('#trashes :selected').text();

const responsability = {id_team, team_name, id_region, region_name, id_trash, trash_name};

//console.log({id_team, team_name, id_region, region_name, id_trash, trash_name})
responsabilities[0].push(responsability)


CreateTableTrashes(responsabilities[0]);

}


async function RegisterResponsability(){
  var id_team = $('#teams :selected').val(); // Português;

  await axios.post(`/responsability/create/team/${id_team}`,responsabilities[0]).then(function (response) {    
      
    $('#trashes').empty()
    $('#region').empty()
    $('#trashes').attr('disabled', 'disabled');
    $('#region').attr('disabled', 'disabled');
    CreateTableTrashes([])

    ModalView('Responsabilidade Atribuida com Sucesso',false,true);
      


  })
  .catch(function (error) {
    ModalView('Ocorreu um erro, verifique os dados e tente novamente',false,true);
  });;  

  



}


function RemoveResponsability(index){
  responsabilities[0].splice(index,1)
CreateTableTrashes(responsabilities[0]);

}
