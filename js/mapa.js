var map = L.map('mapid').setView([42.846841, -2.670996], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([42.867209, -2.677539]).addTo(map)
    //.bindPopup('Este es mi instituto.<br> Arriaga.')
//.openPopup()
;

L.marker([42.847986, -2.677383]).addTo(map);
L.marker([42.852048, -2.672202]).addTo(map);