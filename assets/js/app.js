function Leaflet() {
    if(document.getElementById("leaflet-map-create-location")) {
        var map = L.map("leaflet-map-create-location").setView([10.847950373787143, 106.62199029894055], 8);
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
    
        osm.addTo(map);
        L.Control.geocoder().addTo(map);
    }
}

Leaflet();