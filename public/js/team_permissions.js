import('./responsability.js')

ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {
     axios.get('/team/permissions/views')
    .then(function (response) {
     CreateTablePermissions(response.data)
    });
    
});

var permissionsViewsGlobal = []

async function GetPermissionsView(){
    const id_team =  document.getElementById("teams").value;
//Esvazia a tabela
    CreateTablePermissions([])
//Busca todas as permissões cadastradas no banco de dados
    await axios.get('/team/permissions/views')
    .then(function (response) {
     CreateTablePermissions(response.data)

     var permissions =response.data;
     
     permissions.map(permission=>{
        permissionsViewsGlobal.push(permission.id)
     }) 
    });
    
    
    
    
    
    var permissionsViews;
    await axios.get('/team/permissions/'+id_team)
    .then(function (response) {
     permissionsViews = response.data;
     permissionsViews.map((permissionView, index)=>{
        $('#permission_'+permissionView.id_permission).prop('checked', true);
     })    
    });
    
}


function CreateTablePermissions(values) {
    var div = document.getElementById("permissions")
     div.innerHTML = "";
    
     var newTable = "<table class='table table-striped table-bordered' >";
     newTable +="<thead class='thead-dark'";
      
    newTable +="<tr>";
    newTable += "<th scope='col'>Tela do Sistema</td>";
    newTable += "<th scope='col'>Permissão</td>";
    newTable += "</tr>";
    newTable +="</thead>";
    newTable +="<tbody>";
    values.map((value, index)=>{
      newTable +="<tr>";
      newTable += "<td >" + value.view_permission + "</td>";
      newTable += "<td style='text-align: center;'><input type='checkbox' name="+value.view_permission+" id=permission_"+value.id+"></td>";
      newTable += "</tr>";
    })
    newTable +="</tbody>";
    
     
     
     newTable += "</table>";
     
     div.innerHTML = newTable;
     }
    

async function AddPermissionsView(){
    var permissionsViewsChecked = [];
    var input;
    const id_team =  document.getElementById("teams").value;
    while(permissionsViewsChecked.length) {
        permissionsViewsChecked.pop();
     }

    permissionsViewsGlobal.map(permissionView=>{
    input = document.getElementById("permission_"+permissionView).checked;
    console.log(input);
    if(input===true){
    permissionsViewsChecked.push({id_permission: permissionView,id_team})
    }})
await axios.post(`/team/permissions`,permissionsViewsChecked).then(function (response) {    
    ModalView('Permissões Atribuidas com Sucesso',false,true);
    })
  

}