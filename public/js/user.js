

window.onload = function() {
    insertTimeToSelectOptions();
    find_trashes();
  
  
  };
  






function find_trashes(){
    axios.get('/user')
    .then(function (response) {
      
      CreateTableUsers(response.data)
      
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });
  }



function CreateUser(){
    axios.post('/user/create',getValuesInputUser())
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}


function UpdateUser(){
    axios.post('/user/update',getValuesInputUser())
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
}

function ShowUserEdit(id){
    axios.get(`/user/info/${id}`)
    .then(function (response) {
      console.log(response.data);
      document.getElementById('btn_form').setAttribute( "onClick", "UpdateUser()" );
          const status = document.getElementById("status").checked = response.data[0].status == 1 ? true : false;
           const user_id = document.getElementById("user_id").value = response.data[0].id;
           const name = document.getElementById("name").value = response.data[0].name;
           const user = document.getElementById("user").value = response.data[0].user;
           const password = document.getElementById("password").value = response.data[0].password;
           const id_trash_team = document.getElementById("id_trash_team").value = response.data[0].id_trash_team;
          
  
  
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });
}


function CreateTableUsers(values) {
    var div = document.getElementById("showUsers")
     div.innerHTML = "";
    
     var newTable = "<table class='table table-striped table-bordered' >";
     newTable +="<thead class='thead-dark'";
      
    newTable +="<tr>";
    newTable += "<th scope='col'>Status</td>";
    newTable += "<th scope='col'>Nome</td>";
    newTable += "<th scope='col'>Usuário</td>";
    newTable += "<th scope='col'>Time</td>";
    newTable += "<th scope='col'>Ação</td>";
    newTable += "</tr>";
    newTable +="</thead>";
      
    
    newTable +="<tbody>";
    
    values.map(value=>{
      newTable +="<tr>";
    
     
      newTable += "<td >" + value.status + "</td>";
      newTable += "<td >" + value.name + "</td>";
      newTable += "<td >" + value.user + "</td>";
      newTable += "<td >" + value.trash_team_description + "</td>";
      newTable += `
      <td onclick='ShowUserEdit(${value.id})'>
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" alt="Editar" style="width:20px; height: 20px;">
      </td>
      `;
      newTable += "</tr>";
    })
    newTable +="</tbody>";
    
     
     
     newTable += "</table>";
     
     div.innerHTML = newTable;
     }
    
    
     

function insertTimeToSelectOptions(){
    axios.get('/team')
  .then(function (response) {
 const users =  response.data;  
 var Select = document.getElementById("id_trash_team");
 users.map(user=>{
var NewOption = document.createElement('option');
//Insere o Texto do Novo Option
NewOption.appendChild( document.createTextNode(user.trash_team_description) );
//Insere o valor do Option
NewOption.value = user.id; 

//Insere dentro do ID os options
Select.appendChild(NewOption); 
 })
  })
}

function getValuesInputUser(){
const status = document.getElementById("status").checked;
const user_id = document.getElementById("user_id").value;
const name = document.getElementById("name").value;
const user = document.getElementById("user").value;
const password = document.getElementById("password").value;
const id_trash_team = document.getElementById("id_trash_team").value;

return {
    user_id,
name,
user,
password,
id_trash_team,
status

}
}
    