function edit_trash_organization(id){
    
    //Altera o titulo do card e o botão para salvar
    document.getElementById("card-title").innerHTML = "Editar Organização";
    document.getElementById("btn_form").innerHTML = "Salvar";
    
    //Splita o id pelo _ para ter mais controle
    var splited = id.split("_");

    //Envia apenas o ID sem o resto do id do html
    get_trash_organization_info(splited[2]);
    
    
}

//Faz post para endpoint que retorna as informações das regions.
function get_trash_organization_info(id){
    var infos = []

    var url = "/organization/info";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({"id_organization": id})      
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                //Popula o campo de input da descrição e id com atributo hidden
                document.getElementById("organization_description").setAttribute('value',dado.trash_organization_description);
                document.getElementById("trash_organization_id").setAttribute('value',dado.id);

                var status = 0;
                dado.status=="1" ? status=1 : status=0;
                document.querySelector('.status').checked = status;

            })
        })
        
}

//Função para poder diferenciar se é para cadastrar uma nova região ou editar uma existente
function organization(){
    var id = document.getElementById("trash_organization_id").value

    if((id == "") || id==undefined){
        create_organization();
    }else{
        edit_organization(id);
    }
}

function create_organization(){
    var description = document.getElementById("organization_description").value;
    var status = document.querySelector('.status').checked;

    status=="true" ? status=1 : status=0;

    var url = "/organization/create";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({"description": description,
                              "status":status
        })      
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                location.reload();
                //Se chegou aqui provavelmente inseriu certinho._
                //Utilize a variavel dado da function para verificar se inseriu ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })

}

function edit_organization(id){
    var description = document.getElementById("organization_description").value;
    var status = document.querySelector('.status').checked;

    status=="1" ? status=1 : status=0;

    var url = "/organization/update";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({"id": id,
                              "description": description,
                              "status":status
        })      
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                //Se chegou aqui provavelmente atualizou certinho._
                //Utilize a variavel dado da function para verificar se atualizou ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })
}