function create_capacity_random(){
    var capacidade = Math.trunc(Math.random() * (1 - 30) + 30);
    var lixeira = Math.trunc(Math.random() * (1 - 30) + 30); 

//console.log(`Capacida utilizada ${capacidade} - Lixeira utilizada ${lixeira}`)

    var url = "/trash/add/capacity";
    let myinit = {
        method : 'POST',
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
            },
        body: JSON.stringify({
            "id_trash":lixeira,
            "trash_capacity_used":capacidade
        })      
    }

    fetch(url,myinit)
        .then(function(response){
            response.json().then(function(dado){
                //console.log(dado)
                //Se chegou aqui provavelmente inseriu certinho._
                //Utilize a variavel dado da function para verificar se inseriu ou não. 
                //Você precisa fazer a verificação aqui.
            })
        })

}

create_capacity_random()

setInterval(create_capacity_random,30000);