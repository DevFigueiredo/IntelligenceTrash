function edit_trash_region(id){
    
    //Altera o titulo do card e o botão para salvar
    document.getElementById("card-title").innerHTML = "Editar Lixeira";
    document.getElementById("btn_form").innerHTML = "Salvar";
    
    //Splita o id pelo _ para ter mais controle
    var splited = id.split("_");

    //Envia apenas o ID sem o resto do id do html
    get_trash_region_info(splited[2]);
    
    
}

//Faz post para endpoint que retorna as informações das regions.
function get_trash_region_info(id){
    var infos = []

    var url = "/region/info";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({"id_region": id})      
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                //Popula o campo de input da descrição e id com atributo hidden
                document.getElementById("region_description").setAttribute('value',dado.trash_regions_description);
                document.getElementById("trash_region_id").setAttribute('value',dado.id);

                var status = 0;
                dado.status=="1" ? status=1 : status=0;
                document.querySelector('.status').checked = status;

            })
        })
        
}

//Função para poder diferenciar se é para cadastrar uma nova região ou editar uma existente
function region(){
    var id = document.getElementById("trash_region_id").value

    if((id == "") || id==undefined){
        create_region();
    }else{
        edit_region(id);
    }
}

function create_region(){
    var description = document.getElementById("region_description").value;
    var status = document.querySelector('.status').checked;

    status=="true" ? status=1 : status=0;

    var url = "/region/create";
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

function edit_region(id){
    var description = document.getElementById("region_description").value;
    var status = document.querySelector('.status').checked;

    status=="1" ? status=1 : status=0;

    var url = "/region/update";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({"id_region": id,
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