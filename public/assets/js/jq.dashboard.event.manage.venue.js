$(document).ready(function(){
	var map = L.map('ec-map').setView(startLocation,15);
	L.tileLayer(OpenStreetMap,{attribution:'Map Powered by Open Street Map',maxZoom:14}).addTo(map);
	
	
	if(editMap === 1)
	{
		marker= [L.marker(startLocation)];
		layer = L.layerGroup(marker).addTo(map);
	}
	
	map.on('dblclick',function(e)
	{	
		if(layer !== null)
		{
			layer.clearLayers();
		}
		
		$('input[name="lat"]').val(e.latlng.lat);
		$('input[name="long"]').val(e.latlng.lng);
		marker= [L.marker(e.latlng)];
		layer = L.layerGroup(marker).addTo(map);	
});
	
	$('.ec-coordinate').click(function()
	{
		map.panTo([$(this).data('lat'),$(this).data('long')],{zoom:14});
	});
	
	$('#ec-form-venue').ajaxForm({
		success:function(data)
		{
			$response.show();
			$response.html(data.response);
			setTimeout(function(){$response.hide()},3000);
		}
	});
});