<?php 
    print Asset::css('view/event.css'); 
    print Asset::css('animate.css');
?>
<!-- EVENT COVER PHOTO -->
<?php print $cover_photo; ?>
<!-- EVENT NAVIGATION -->
<?php print $navigation; ?>
<!-- EVENT DETAILS -->
<?php print $detail; ?>

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
});
</script>
<?php print Asset::js('chart/jquery.chart.event.js'); ?>
