$(document).ready(function()
{
    $eventFb.ajaxForm({
        beforeSubmit:function(arr)
        {
           $.UIkit.notify('Fetching Facebook Event Data',{status:'info'});
        },
        success:function(d)
        {
            var $form = $eventForm;
            var fbid  = $eventFb.find('input[name="fbid"]').val();
            
            $form.find('input[name="name"]').val(d.name);
            $form.find('input[name="address"]').val(d.location);
            $form.find('input[name="lat"]').val(d.venue.latitude);
            $form.find('input[name="lng"]').val(d.venue.longitude);
            $form.find('input[name="start_at"]').val(d.start_time);
            $form.find('input[name="end_at"]').val(d.end_time);
            $form.find('#description').html(d.description);
            
            $form.find('input[name="fbid"]').val(fbid);
            $form.find('input[name="fb-update"]').val(d.updated_time);
            
            venueCoords = [];
            venueCoords.push(d.venue.latitude);
            venueCoords.push(d.venue.longitude);

            if(layer !== null)
            {
                layer.clearLayers();
            }
            
            marker = [L.marker(venueCoords)];
            layer  = L.layerGroup(marker).addTo(map);
            map.panTo(venueCoords,{zoom:14});
            
            $.UIkit.notify('Fetch Complete',{status:'success'});
            
            console.log(d);
        }
    });
});