$(document).ready(function(e)
{
    $(document).on('click','a[href="#ec-event-info"]',function(e)
    {
        var flowImg         = $(this).data('flow-poster');
        var venue           = $(this).data('venue');
        var coordinate      = $(this).data('coord');
        var tickets         = $(this).data('tickets');
        var categories      = $(this).data('category');
        var eventTitle      = $(this).data('event-title');
        var facebook        = $(this).data('facebook');
        var twitter         = $(this).data('twitter');
        var website         = $(this).data('website');
        var eventId         = $(this).data('event-id');
        var coverUri        = $(this).data('cover-uri');
        
        var $eventModal = $("#ec-event-info");
        var $eventSocial = $('.ec-event-info-social'); 
        
        $eventModal.find("#ec-event-info-poster").attr('src',flowImg);
        $eventModal.find('#ec-event-info-venue').html(venue);
        $eventModal.find('#ec-event-info-map').attr('src','http://staticmap.openstreetmap.de/staticmap.php?center='+coordinate+'&zoom=18&markers='+coordinate+',ltblu-pushpin&size=546x168');
        $('#ec-view-event').attr('href',eventId);
        
        $('#ec-event-info-cover').attr('src',coverUri);
        $('#ec-info-title').html(eventTitle);
        
        if(!facebook)
        {
            $eventSocial.find('#facebook').hide();
        }
        
        if(!twitter)
        {
            $eventSocial.find('#twitter').hide();
        }
        
        if(!website)
        {
            $eventSocial.find('#website').hide();
        }
        
        $eventSocial.find('#facebook').attr('href','http://facebook.com/' + facebook);
        $eventSocial.find('#twitter').attr('href','http://twitter.com/' + twitter);
        $eventSocial.find('#website').attr('href','http://' + website);
        
        $eventModal.find('.ec-ticket-list').html('');
        for(var i = 0; i < tickets.length; i++)
        {
            $eventModal.find(".ec-ticket-list").append('<a href="#" class="uk-button" data-uk-tooltip title="'+ tickets[i].note +'"><i class="uk-icon-rub"></i>'+ tickets[i].price +'</a>');
        }
        
        $eventModal.find('.ec-category-list').html('');
        for(var i = 0; i < categories.length; i++)
        {
            $eventModal.find(".ec-category-list").append('<li><a href="#" class="uk-button uk-button-primary uk-margin-left uk-margin-bottom"><i class="uk-icon-tag"></i>'+ categories[i].category +'</a></li>');
        }
    });
});