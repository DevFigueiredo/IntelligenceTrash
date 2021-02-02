//Importando a biblioteca do Maps
var map = L.map('mapid').setView([-23.7215727, -45.440392], 15);


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




//É realizado uma busca na nossa base de dados para ver quais as lixeiras cadastradas 
axios.get('/trash')
.then(function (response) {
  //Armazeno as lixeiras na constante
  const trashes = response.data;

  //Percorro pelas lixeiras e marco no mapa utilizando a latitude e longitude com a função da biblioteca cada vez que o loop passa por uma lixeira
  trashes.map(trash=>{
//Função que marca no mapa      
L.marker([trash.trash_latitude, trash.trash_longitude])
.addTo(map)
.bindPopup(`<b>${trash.trash_name}!</b><br>${trash.trash_address}.`)
.openPopup();
  })
  
})
.catch(function (error) {
  // handle error
  console.log(error);
})
.then(function () {
  // always executed
});
