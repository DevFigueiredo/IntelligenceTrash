


async function find_all_trashes_in_map(cmd = ""){
 
//É realizado uma busca na nossa base de dados para ver quais as lixeiras cadastradas 
axios.get('/trash')
.then(function (response) {


 //Importando a biblioteca do Maps

 var map = L.map('mapid')
 map.setView([-23.7215727, -45.440392], 15);
 
 //Link da APi que retorna a renderização do mapa
 L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
 }).addTo(map);
 
 //Aqui estou definindo algumas regras para o icone que irá aparecer no mapa
 var LeafIcon = L.Icon.extend({
     options: {
         iconSize:     [48, 45],
         shadowSize:   [50, 64],
         iconAnchor:   [22, 94],
         shadowAnchor: [4, 62],
         popupAnchor:  [-3, -76]
     }
 });
 



  //Armazeno as lixeiras na constante
  const trashes = response.data;
if(cmd == ""){
  //Percorro pelas lixeiras e marco no mapa utilizando a latitude e longitude com a função da biblioteca cada vez que o loop passa por uma lixeira
  trashes.map(trash=>{
//Função que marca no mapa      
L.marker([trash.trash_latitude, trash.trash_longitude])
.addTo(map)
.bindPopup(`<b>${trash.trash_name}!</b><br>${trash.trash_address}.`)
.openPopup();
  })
  

 // L.removeLayer();
  
  


}else{
  //map.off();
  //map.remove();
}
})


}







function find_unique_trash_in_map(id){
  axios.get(`/trash/info/${id}`)
  .then(function (response) {
    const trash = response.data[0];
    



 //Importando a biblioteca do Maps
var map = L.map('mapid').setView([trash.trash_latitude, trash.trash_longitude], 15);

//Link da APi que retorna a renderização do mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

//Aqui estou definindo algumas regras para o icone que irá aparecer no mapa
var LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [48, 45],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});


    //Armazena as lixeiras na constante
  
    //Percorro pelas lixeiras e marco no mapa utilizando a latitude e longitude com a função da biblioteca cada vez que o loop passa por uma lixeira
    //trashes.map(trash=>{
  //Função que marca no mapa      
  L.marker([trash.trash_latitude, trash.trash_longitude])
  .addTo(map)
  .bindPopup(`<b>${trash.trash_name}!</b><br>${trash.trash_address}.`)
  .openPopup();
  //  })
    
  })
}