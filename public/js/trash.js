
window.onload = function() {
  find_trashes();
  insertRegionsToSelectOptions();
  insertOrganizationsToSelectOptions();



};





function find_trashes(){
  axios.get('/trash')
  .then(function (response) {
    
    CreateTableTrashes(response.data)
    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });
}




function show_trash_edit(id){
  axios.get(`/trash/info/${id}`)
  .then(function (response) {
    console.log(response.data[0]);
        const trash_id = document.getElementById("trash_id").value = response.data[0].id;
        const trash_name = document.getElementById("trash_name").value = response.data[0].trash_name;
        const trash_latitude = document.getElementById("trash_latitude").value = response.data[0].trash_latitude; 
        const trash_longitude = document.getElementById("trash_longitude").value = response.data[0].trash_longitude;
        const trash_status = document.getElementById("trash_status").checked = response.data[0].trash_status;
        const trash_max_support = document.getElementById("trash_max_support").value = response.data[0].trash_max_support;
        const id_trash_region = document.getElementById("id_trash_region").value = response.data[0].id_trash_region;
        const id_trash_organization = document.getElementById("id_trash_organization").value = response.data[0].id_trash_organization;
        
        const address = AddressTreatment(response.data[0].trash_address)

        const trash_cep = document.getElementById("cep").value = address.address_cep;
        const trash_address = document.getElementById("address").value = address.address_city; 
        const trash_address_number = document.getElementById("address_number").value = address.address_number; 
        const trash_address_neighborhood = document.getElementById("address_neighborhood").value = address.address_neighborhood; 
        const trash_city = document.getElementById("city").value = address.address_city; 
        const trash_state = document.getElementById("state").value = address.address_uf; 
        
        
        document.getElementById('btn_form').setAttribute( "onClick", "update_trash()" );


  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });
}


  function getInputValuesTrash(){
    
    const id = document.getElementById("trash_id").value;
    const trash_name = document.getElementById("trash_name").value;
    const trash_latitude = document.getElementById("trash_latitude").value; 
    const trash_longitude = document.getElementById("trash_longitude").value;
    const trash_max_support = document.getElementById("trash_max_support").value;
    const id_trash_region = document.getElementById("id_trash_region").value;
    const id_trash_organization = document.getElementById("id_trash_organization").value;
    const cep = document.getElementById("cep").value;
    const address = document.getElementById("address").value; 
    const address_number = document.getElementById("address_number").value; 
    const address_neighborhood = document.getElementById("address_neighborhood").value; 
    const trash_address = address+', '+address_number+' - '+address_neighborhood+', Caraguatatuba - SP'+', '+cep;
    const status = document.getElementById('trash_status').checked;
  
    return{
      trash_name,
      trash_latitude,
      trash_longitude,
      trash_status,
      trash_max_support,
      id_trash_region,
      id_trash_organization,
      trash_address,
      status,
      trash_status: status,
      id
      
    }
  
  
  
  }




function create_trash(){
 
  const trash_name = document.getElementById("trash_name").value;
  const trash_latitude = document.getElementById("trash_latitude").value; 
  const trash_longitude = document.getElementById("trash_longitude").value;
  const trash_status = document.getElementById("trash_status").checked;
  const trash_max_support = document.getElementById("trash_max_support").value;
  const id_trash_region = document.getElementById("id_trash_region").value;
  const id_trash_organization = document.getElementById("id_trash_organization").value;
  const cep = document.getElementById("cep").value;
  const address = document.getElementById("address").value; 
  const address_number = document.getElementById("address_number").value; 
  const address_neighborhood = document.getElementById("address_neighborhood").value; 
  const trash_address = address+', '+address_number+' - '+address_neighborhood+', Caraguatatuba - SP'+', '+cep;
  
const values =  getInputValuesTrash();
 axios.post('/trash/create',values)
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });

}


function update_trash(){
 const values = getInputValuesTrash();
  console.log(values);
 axios.put('/trash/update',values)
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });

}






function insertOrganizationsToSelectOptions(){
  axios.get('/organization')
  .then(function (response) {
 const organizations =  response.data;  
 var Select = document.getElementById("id_trash_organization");
 organizations.map(organization=>{
var NewOption = document.createElement('option');
//Insere o Texto do Novo Option
NewOption.appendChild( document.createTextNode(organization.trash_organization_description) );
//Insere o valor do Option
NewOption.value = organization.id; 

//Insere dentro do ID os options
Select.appendChild(NewOption); 
 })
  })
}



function insertRegionsToSelectOptions(){
  axios.get('/region/all')
  .then(function (response) {
 const regions =  response.data;  
 var Select = document.getElementById("id_trash_region");
 regions.map(region=>{
var NewOption = document.createElement('option');
//Insere o Texto do Novo Option
NewOption.appendChild( document.createTextNode(region.trash_regions_description) );
//Insere o valor do Option
NewOption.value = region.id; 

//Insere dentro do ID os options
Select.appendChild(NewOption); 
 })
  })
}





/*-------------------------------------------*/

function CreateTableTrashes(values) {
var div = document.getElementById("showTrashes")
 div.innerHTML = "";

 var newTable = "<table class='table table-striped table-bordered' >";
 newTable +="<thead class='thead-dark'";
  
newTable +="<tr>";
newTable += "<th scope='col'>Nome</td>";
newTable += "<th scope='col'>Capacidade Maxima</td>";
newTable += "<th scope='col'>Endereço</td>";
newTable += "<th scope='col'>Status</td>";
newTable += "<th scope='col'>Ação</td>";
newTable += "</tr>";
newTable +="</thead>";
  

newTable +="<tbody>";

values.map(value=>{
  newTable +="<tr>";

 
  newTable += "<td >" + value.trash_name + "</td>";
  newTable += "<td >" + value.trash_max_support + "</td>";
  newTable += "<td >" + value.trash_address + "</td>";
  newTable += "<td >" + value.status + "</td>";
  newTable += `
  <td onclick='show_trash_edit(${value.id})'>
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png" alt="Editar" style="width:20px; height: 20px;">
  </td>
  `;
  newTable += "</tr>";
})
newTable +="</tbody>";

 
 
 newTable += "</table>";
 
 div.innerHTML = newTable;
 }


 


function busca_cep(){
    const cep = document.getElementById("cep").value
    axios.get('https://brasilapi.com.br/api/cep/v1/'+cep)
    .then(function (response) {
      document.getElementById("address").value = response.data.street;
      document.getElementById("address_neighborhood").value = response.data.neighborhood;
      document.getElementById("city").value = response.data.city;
      document.getElementById("state").value = response.data.state;
      
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });
}






function AddressTreatment(address){
  const street = address.substring(0,address.match(',').index); 
  const address_number = address.substring(address.match(',').index+2,address.match('-').index); 
  
  const address_array = address.split(',');
  
  
  const address_neighborhood = address_array[1].substring(address_array[1].match('-').index+2, address_array[1].lenght);
 
  const address_city = address_array[2].substring(0,address_array[2].match('-').index);
 
  const address_uf = address_array[2].substring(address_array[2].match('-').index+2,address_array[2].lenght);
 
  const address_cep = address_array[3];



  return {street, address_number, address_neighborhood, address_city, address_uf ,address_cep}

}

