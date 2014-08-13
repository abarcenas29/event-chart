var osmTileMap  = 'https://{s}.tiles.mapbox.com/v3/abarceas.i9k75n59/{z}/{x}/{y}.png';
var attribution = 'Event Chart Map Powered by Cloudmade OSM.';

$(document).ready(function(){
    //map data
    var map = L.map('ec-map').setView(geoLocation,15);
    L.tileLayer(osmTileMap,{attribution:attribution}).addTo(map);
    L.marker(geoLocation).addTo(map).bindPopup(venue).openPopup();
    
    $('.ec-pop-up').click(function(){
        var url = $(this).attr('href');
        window.open(url,
                    '1407898801834',
                    'width=480,height=350,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resisable=0');
        return false;
    });
});
