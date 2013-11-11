var $map	= $('#ec-map');

function mapLoad()
{
	var map = L.map('ec-map').setView(startLocation,20);
    L.tileLayer(OpenStreetMap,{attribution:'Map Powered by Open Street Map'}).addTo(map);
	
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
}

$(document).ready(function(){
	$('#ec-venue').click(function(){
		setTimeout(mapLoad,1000);
	});
	 $('#ec-form-venue').ajaxForm({
		beforeSubmit:function()
		{
			$('.ec-submit').attr('disabled','');
		},
		success:function(data)
		{
			$response.show();
			$response.html(data.response);
			$('.ec-submit').removeAttr('disabled');
			setTimeout(function(){$response.hide()},3000);
		}
	});
});
