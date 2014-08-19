$(document).ready(function()
{
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
            layer      = L.layerGroup(marker).addTo(map);
	});
	
        $('#ec-map-search-form').ajaxForm({
            success:function(d){
                var $result = $('#ec-map-search-result');
                $result.empty();
            
                for(i = 0;i < d.results.length;i++){
                    $result.append('<tr><td><a href="#" class="ec-venue-coord" data-coord="'+d.results[i].text+'">'+ d.results[i].title +'</a></td></tr>');
                }
            }
        });
        
        $('#ec-map-search-result').on('click','.ec-venue-coord',function(){
            var coordsText = $(this).data('coord');
            var coords     = coordsText.split('|');
            map.panTo(coords,{zoom:14});
        });
});