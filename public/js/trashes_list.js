var map = L.map('mapid').setView([-23.7215727, -45.440392], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [48, 45],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});


L.marker([-23.7215727, -45.440392]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();


    var ancor = new LeafIcon({iconUrl: 'ancor.jpg'}),
    redIcon = new LeafIcon({iconUrl: 'leaf-red.png'}),
    orangeIcon = new LeafIcon({iconUrl: 'leaf-orange.png'});
    
    L.icon = function (options) {
        return new L.Icon(options);
    };

    L.marker([-23.7175848, -45.4371733], {icon: ancor}).addTo(map).bindPopup("I am a green leaf.");

    

    