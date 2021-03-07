var Lixeiras = []


function FindTrashes(){
    var selected = document.querySelector("#region").value

    var lixeiras = RetornaDados(selected)
 

}

function RetornaDados(IdRegion){

    if(IdRegion != NaN){

        var url = "/trash/list/intelligence"
        let obj = {
            method : 'POST',
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
                },
            body: JSON.stringify({
                "IdRegion":IdRegion
            })      
        }

        fetch(url,obj)
        .then(function(response){
            response.json().then(function(dado){
                Lixeiras = dado

                GeraLixeiras()
            })
        })

    }
}


function GeraLixeiras(){
    document.querySelector("#trash").innerHTML = "";
    var LixeiraSelectDiv = document.querySelector("#trash");

    Lixeiras.map(lixeira=>{
        GeraTrashHTML(lixeira.id,lixeira.trash_name)
    })
    GeraTrashHTML("all","Todas as lixeiras...")
    document.getElementById("trash").removeAttribute("disabled")
}


function GeraTrashHTML(id,desc){
    var conteudo = `<option value="${id}">${desc}</option>`

    document.querySelector("#trash").innerHTML += conteudo;
}