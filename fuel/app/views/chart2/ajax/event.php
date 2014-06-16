<?php 
    print Asset::css('view/event.css'); 
    print Asset::css('animate.css');
?>
<!-- EVENT COVER PHOTO -->
<div class="uk-width-1-1 uk-vertical-align" id="ec-event-cover-container">
    <style>
    #ec-event-cover-container
    {
        background-image:url('<?php print $cover; ?>');
        background-repeat:no-repeat;
        background-position:center center;
        background-size:cover;
    }
    .ec-chart-container
    {
        margin-top:3em !important;
        padding:0em !important;
    }
    </style>
    <div id="ec-event-detail-event-title" class="uk-vertical-align">
        <div class="uk-vertical-align-middle" style="width:inherit;">
        
        <!-- EVENT TITLE PANEL -->
        <article class="uk-container uk-container-center" style="color:#fff;">
            <div class="uk-grid">
            <div class="uk-width-2-10">
                &nbsp;
            </div>
            <div class="uk-width-6-10">
                <div class="uk-grid">
                <div class="uk-width-1-10">
                    <div class="calendar">
                    <div class="uk-width-1-1 uk-text-center">
                        May
                    </div>
                    <div class="uk-width-1-1 uk-text-center">
                        <?php print Session::get('event_id','999'); ?>
                    </div>
                    </div>
                </div>
                <div class="uk-width-9-10"
                     title="<?php print $q['name']; ?>">
                    <h1 class="title uk-text-truncate">
                        <?php print $q['name']; ?>
                    </h1>
                </div>
                </div>
            </div>
            <div class="uk-width-2-10">
                &nbsp;
            </div>
        </div>
        </article>
        </div>
    </div>
    
    <!-- ORGANIZATION PHOTO -->
    <div id="ec-event-detail-org-img-container" class="uk-vertical-align">
        <div class="uk-vertical-align-bottom" style="width:inherit;">
        <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-2-10">
            <div class="uk-thumbnail ec-org-img">
                <img src="<?php print $org_img; ?>"/>
            </div>
            </div>
            
            <div class="uk-width-6-10"></div>
            <div class="uk-width-2-10"></div>
        </div>
        </div>
        </div>
    </div>
</div>

<!-- EVENT NAVIGATION -->
<nav class="ec-event-status uk-vertical-align">
    <div class="uk-vertical-align-middle" style="width:inherit;">
        <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-2-10">&nbsp;</div>
            <div class="uk-width-6-10">
                
                <div class="uk-container-center uk-width-7-10">
                <div class="uk-float-left ec-status uk-margin-left active">
                <dl class="uk-description-list">
                    <dt class="uk-text-center">
                        Region
                    </dt>
                    <dd class="uk-text-center">
                        Alabang City
                    </dd>
                </dl>
                </div>
                
                <div class="uk-float-left ec-status padding">
                <dl class="uk-description-list">
                    <dt class="uk-text-center">
                        Rating
                    </dt>
                    <dd class="uk-text-center">
                        ?/5
                    </dd>
                </dl>
                </div>
                
                <div class="uk-float-left ec-status padding">
                <dl class="uk-description-list">
                    <dt class="uk-text-center">
                        Start Date
                    </dt>
                    <dd class="uk-text-center">
                    <?php print $start_date; ?>
                    </dd>
                </dl>
                </div>
                
                <div class="uk-float-left ec-status padding">
                <dl class="uk-description-list">
                    <dt class="uk-text-center">
                        End Date
                    </dt>
                    <dd class="uk-text-center">
                    <?php print $end_date; ?>
                    </dd>
                </dl>
                </div>
                </div>
                
            </div>
            <div class="uk-width-2-10">&nbsp;</div>
        </div>
        </div>
    </div>
</nav>

<!-- EVENT DETAILS -->
<article id="ec-event-detail">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <aside class="uk-width-2-10">
            <!-- ORGANIZATION ASIDE -->
            <div class="uk-panel uk-panel-header ec-left-aside">
                <div class="uk-width-1-1">
                    <p style="font-family:'Conv_weblysleekuisb';font-size:1.5em;">
                    <?php print $q['organization']['name']; ?>
                    </p>
                </div>
                <div class="uk-width-1-1">
                    <?php print $q['organization']['description']; ?>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                <article class="uk-panel uk-panel-header ">
                    <header class="uk-panel-title">
                    Social
                    </header>
                    <ul class="org-social">
                        
                    <li>
                    <a href="#" target="_new">
                    <i class="uk-icon-facebook-square"></i>
                    </a>
                    </li>
                    
                    <li>
                    <a href="#" target="_new">
                    <i class="uk-icon-twitter-square"></i>
                    </a>
                    </li>
                    
                    <li>
                    <a href="#" target="_new">
                    <i class="uk-icon-globe"></i>
                    </a>
                    </li>
                    
                    <li>
                    <a href="#" target="_new">
                    <i class="uk-icon-envelope-o"></i>
                    </a>
                    </li>
                    
                    </ul>
                </article>
                </div>
                <div class="uk-width-1-1 uk-margin-top">
                <a href="#" 
                   class="uk-button uk-width-1-1"
                   style='background-color:#34495e;color:#fff;'>
                   <i class="uk-icon-info-sign"></i>
                   Organizer's History
                </a>
                </div>
            </div>
            </aside>
            
            <!-- MAIN EVENT DETAIL -->
            <main class="uk-width-6-10 
                         ec-event-detail-container">
                <nav class="uk-width-1-1 ec-sub-event-menu uk-margin-top">
                    <ul>
                    <li><a href="#" class="active">Event Detail</a></li>
                    <li><a href="#">Posters</a></li>
                    <li><a href="#">Social Photos</a></li>
                    <li><a href="#">Tweets</a></li>
                    </ul>
                </nav>
                
                <article class="uk-panel uk-width-1-1" 
                         id="ec-map">
                    <div class="ec-gmap">
                        <a href="#" 
                           class="uk-button" 
                           title="See Google Maps"
                           style="background-color:#e67e22">
                        <i class="uk-icon-map-marker"></i>
                        </a> 
                    </div>
                    &nbsp;
                </article>
                
                <article class="uk-panel uk-width-1-1 uk-margin-top"
                         id="ec-event-description">
                <?php print trim($sq); ?>
                    <div class="ec-description-more">
                        <a href="#more" 
                           class="uk-button uk-button-primary"
                           title="More">
                        <i class="uk-icon-ellipsis-h"></i>
                        </a>
                    </div>
                </article>
                
                <article class="uk-panel uk-width-1-1 uk-margin-top"
                         id="ec-event-ddlist">
                <div class="uk-grid">
                
                <section class="uk-width-1-2">
                <div class="uk-panel uk-panel-header">
                <div class="uk-panel-title">
                    Ticket Price
                </div>
                <dl class="uk-description-list uk-description-list-horizontal">
                    <?php foreach($q['ticket'] as $row): ?>
                    <dt>PHP <?php print $row['price']; ?></dt>
                    <dd><?php print $row['note']; ?></dd>
                    <?php endforeach;?>
                </dl>
                </div>
                </section>
                    
                <section class="uk-width-1-2">
                <div class="uk-panel uk-panel-header">
                <div class="uk-panel-title">
                    Guest List
                </div>
                <dl class="uk-description-list uk-description-list-horizontal">
                    <?php foreach($q['guest'] as $row): ?>
                    <dt><?php print $row['name']; ?></dt>
                    <dd><?php print $row['type']; ?></dd>
                    <?php endforeach;?>
                </dl>
                </div>
                </section>
                </div>
                </article>
                
                <!-- Feed Information -->
                <div id="ec-detail-review" class="uk-margin-top">
                    <div class="uk-text-center">
                        <i class="uk-icon-refresh uk-icon-spin"></i>
                        Loading Editor
                    </div>
                </div>
                <div id="ec-detail-review-rating" class="uk-margin-top">
                    <div class="uk-text-center">
                        <i class="uk-icon-refresh uk-icon-spin"></i>
                        Loading Rating
                    </div>
                </div>
                <div id="ec-detail-review-feed" class="uk-margin-top">
                    <div class="uk-text-center">
                        <i class="uk-icon-refresh uk-icon-spin"></i>
                        Loading Review Feed
                    </div>
                </div>
                
                
            </main>
            
            <!-- HASHTAGS INFORMATION -->
            <aside class="uk-width-2-10 ec-right-aside">
                <div class="uk-grid">
                    
                <?php if(count($q['category']) > 0): ?>    
                <div class="uk-width-1-1">
                <article class="uk-panel uk-panel-header uk-margin-top">
                <header class="uk-panel-title">
                    Event Categories
                </header>
                <ul class="uk-list">
                    <?php foreach($q['category'] as $row): ?>
                    <li class="uk-margin-bottom">
                    <a href="#" class="uk-button uk-button-primary">
                        <?php print $row['category']; ?>
                    </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </article>
                </div>
                <?php endif; ?>
                    
                <?php if(count($q['hashtags']) > 0): ?>
                <div class="uk-width-1-1">
                <article class="uk-panel uk-panel-header uk-margin-top">
                <header class="uk-panel-title">
                    Hashtags
                </header>
                <ul class="uk-list">
                    <?php foreach($q['hashtags'] as $row): ?>
                    <li class="uk-margin-bottom">
                    <?php print '#'.$row['hashtag']; ?>
                    </li>
                    <?php endforeach;?>
                </ul>
                </article>
                </div>
                <?php endif; ?>
                    
                </div>
            </aside>
        </div>
    </div>
</article>
<script>
var geoLocation     = <?php print '['.$q['lat'].','.$q['long'].']'; ?>;
var urlReviewEditor = '<?php print Uri::create('ajax/chart/review_editor'); ?>';
var urlReviewFeed   = '<?php print Uri::create('ajax/chart/review_feed'); ?>';
var urlReviewRating = '<?php print Uri::create('ajax/chart/review_rating');?>';
var eventID     = '<?php print $q['fb_event_id'];?>';
var osmTileMap  = 'https://{s}.tiles.mapbox.com/v3/examples.map-zr0njcqy/{z}/{x}/{y}.png';
var venue       = '<?php print $q['venue']; ?>';
var attr        = 'Event Chart Map Powered by MapBox OSM.';
$(document).ready(function(e)
{
    var map = L.map('ec-map').setView(geoLocation,13);
    
    L.tileLayer(osmTileMap,{attribution:attr}).addTo(map);
    L.marker(geoLocation).addTo(map).bindPopup(venue).openPopup();
    
    $.post(urlReviewEditor,{event_id:eventID},function(d){
        $('#ec-detail-review').html(d);
    });
    $.post(urlReviewFeed,function(d){
        $('#ec-detail-review-feed').html(d);
    });
    $.post(urlReviewRating,function(d){
        $('#ec-detail-review-rating').html(d);
    });
});
</script>
