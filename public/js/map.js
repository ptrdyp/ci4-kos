var coordinates = setting['coordinat'].split(',').map(Number);
var map = L.map('map', {
  center: coordinates,
  zoom: setting['zoom_view']
});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

