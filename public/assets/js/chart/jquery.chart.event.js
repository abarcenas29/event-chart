$.post(urlReviewEditor,{event_id:eventID},function(d){
    $('#ec-detail-review').html(d);
});
$.post(urlReviewFeed,function(d){
    $('#ec-detail-review-feed').html(d);
});
$.post(urlReviewRating,function(d){
    $('#ec-detail-review-rating').html(d);
});

$('.ec-description-more').click(function(e)
{
    $('#ec-event-description').css('max-height','none');
    $(this).remove();
});

$('.ec-event-nav').click(function(e)
{
    var $map = $('#ec-map');
    var $desc= $('#ec-event-description');
    var $list= $('#ec-event-ddlist');
    var $sub = $('#ec-event-sub-nav');
    var $editor = $('#ec-detail-review');
    var $rating = $('#ec-detail-review-rating');
    var $feed   = $('#ec-detail-review-feed');
    
    var $subevent = $(this);
    var url = $subevent.attr('href');
    $('.ec-event-nav').removeClass('active');
    $subevent.addClass('active');
    $subevent.find('i').removeClass('uk-hidden');
    if(url == '#')
    {
        $map.show();
        $desc.show();
        $list.show();
        $editor.show();
        $rating.show();
        $feed.show();
        
        $sub.empty();
        $sub.hide();
    }
    else
    {
        $.post(url,function(d)
        {
            $sub.show();
            $sub.html(d);
            
            $map.hide();
            $desc.hide();
            $list.hide();
            $editor.hide();
            $rating.hide();
            $feed.hide();
            
            $subevent.find('i').addClass('uk-hidden');
        });
    }
    e.preventDefault();
    return false;
});