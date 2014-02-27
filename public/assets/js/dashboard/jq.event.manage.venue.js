$(document).ready(function()
{
	var map = L.map('ec-event-manage-map').setView(venueCoords,20);
	L.tileLayer(OpenStreetMap,{attribution:'Map Powered by Open Street Map'}).addTo(map);

	var marker = [L.marker(venueCoords)];
	layer = L.layerGroup(marker).addTo(map);
	
	map.on('dblclick',function(e)
	{
		if(layer !== null)
		{
			layer.clearLayers();
		}
		
		$inputLat.val(e.latlng.lat);
		$inputLong.val(e.latlng.lng);
		
		var marker = [L.marker(e.latlng)];
		layer	   = L.layerGroup(marker).addTo(map);
	});
	
	$('.uk-search').on('click','li > a ',function(e){
		var coordsText = $(this).find('div').html();
		var coords	   = coordsText.split('|');
		map.panTo(coords,{zoom:14});
	});
});