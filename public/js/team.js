import('./index.js')

window.onload = function() {
FindTeams()
};


function CreateTeam(){
  const values = getInputValuesTeam();
  console.log(values);
 axios.post('/team/create',values)
    .then(function (response) {
      
      ModalView('Lixeira Criada com Sucesso',false,true);
    })
    .catch(function (error) {
      ModalView('Ocorreu um erro ao Criar a Lixeira, verifique os dados e tente novamente',false,true);
    });
}


function UpdateTeam(){

    const values = getInputValuesTeam();
     console.log(values);
    axios.put('/team/update',values)
       .then(function (response) {

         ModalView('Lixeira Atualizada com Sucesso',false,true);
       })
       .catch(function (error) {
         ModalView('Ocorreu um erro ao Atualizar a Lixeira, verifique os dados e tente novamente',false,true);
       });
   
   
   
   
}

function ShowEditTeam(id){
  axios.get(`/team/info/${id}`)
  .then(function (response) {
    console.log(response.data[0])
    document.getElementById('btn_form').setAttribute( "onClick", "UpdateTeam()" );
    const team_id = document.getElementById("team_id").value = response.data[0].id;
    const description = document.getElementById("team_description").value = response.data[0].trash_team_description;
    const status = document.getElementById("status").checked = response.data[0].status == 1 ? true : false; ;

    
  });
}


function FindTeams(){
  axios.get('/team')
  .then(function (response) {
    
    CreateTableTrashes(response.data)

  })
}


function getInputValuesTeam(){

  const description = document.getElementById('team_description').value;
  const id = document.getElementById('team_id').value;
  const status = document.getElementById("status").checked;
  return {description, id, status}

}



function CreateTableTrashes(values) {
  var div = document.getElementById("show_teams")
   div.innerHTML = "";
  
   var newTable = "<table class='table table-striped table-bordered' >";
   newTable +="<thead class='thead-dark'";
    
  newTable +="<tr>";
  newTable += "<th scope='col'>Nome do Time</td>";
  newTable += "<th scope='col'>Status</td>";
  newTable += "<th scope='col'>Ação</td>";
  newTable += "</tr>";
  newTable +="</thead>";
    
  
  newTable +="<tbody>";
  
  values.map(value=>{
    newTable +="<tr>";
  
   
    newTable += "<td >" + value.trash_team_description + "</td>";
    newTable += "<td >" + value.status + "</td>";
    newTable += `
    <td onclick='ShowEditTeam(${value.id})'>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" alt="Editar" style="width:20px; height: 20px;">
    </td>
    `;
    newTable += "</tr>";
  })
  newTable +="</tbody>";
  
   
   
   newTable += "</table>";
   
   div.innerHTML = newTable;
   }
  
  