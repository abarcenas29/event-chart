<?php 
    print Asset::css('view/event.css'); 
    print Asset::css('animate.css');
    
    print Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');
    print Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');
?>
<article class="uk-width-1-1" id="ec-view-container">
<div class="uk-grid">
    <section class="uk-width-large-6-10">
    <!-- Cover Image -->
    <style>
    #ec-cover-image
    {
        background:url(<?php print $cover; ?>);
    }
    </style>
    <article class="uk-width-1-1" id="ec-cover-image">
    <section class="uk-vertical-align">
        <article class="uk-vertical-align-middle
                        uk-width-1-1
                        uk-text-center"
                 id="ec-cover-title">
        <?php print $q['name']; ?>
        </article>
        <article id="ec-org-logo">
            <section class="uk-thumbnail">
            <img src="<?php print $org_img; ?>"/>
            </section>
        </article>
    </section>
    </article>
    
    <!-- SMALL DETAIL -->
    <article class="uk-width-7-10 uk-float-right padding"
             id="ec-cover-small-detail">
        <div class="uk-grid">
            
        <section class="ec-detail uk-width-2-6">
            <div class="ec-title 
                        uk-text-center
                        uk-text-truncate">
                Organization
            </div>
            <div class="ec-value 
                        uk-text-center 
                        uk-text-truncate"
                 title="<?php print $q['organization']['name']; ?>">
                <?php print $q['organization']['name']; ?>
            </div>
        </section>
        
        <section class="ec-detail uk-width-1-6">
            <div class="ec-title 
                        uk-text-center 
                        uk-text-truncate">
                Region
            </div>
            <div class="ec-value 
                        uk-text-center 
                        uk-text-truncate"
                 title="<?php print $q['region']; ?>">
                <?php print $q['region']; ?>
            </div>
        </section>
            
        <section class="ec-detail uk-width-1-6">
            <div class="ec-title 
                        uk-text-center 
                        uk-text-truncate">
                Rating
            </div>
            <div class="ec-value uk-text-center">
                ?/5
            </div>
        </section>
            
        <section class="ec-detail uk-width-2-6">
            <div class="ec-title 
                        uk-text-center 
                        uk-text-truncate">
                Start Date
            </div>
            <div class="ec-value 
                        uk-text-center 
                        uk-text-truncate">
                <?php print $start_date; ?>
            </div>
        </section>
            
        </div>
        
    </article>
    
    
    <!-- POSTER IMAGES -->
    <article id="ec-view-poster-images"
             class="padding">
        
    <section>
        <!-- Event Alerts -->
        <article class="uk-width-1-1">
            <div class="uk-alert uk-alert-warning animated bounceIn"
                 style="background-color:#f39c12;color:#fff;">
                <i class="uk-icon-info-circle"></i>
                Event Has not started yet.
            </div>
            
            <div class="uk-alert uk-alert-success animated bounceIn"
                 style="background-color:#2ecc71;color:#fff;">
                <i class="uk-icon-info-circle"></i>
                Event Has Concluded
            </div>
            
            <div class="uk-alert uk-alert-danger animated bounceIn"
                 style="background-color:#e74c3c;color:#fff;">
                <i class="uk-icon-info-circle"></i>
                Event Is On-Going
            </div>
        </article>
    </section>
        
    <section> 
        <!-- DESCRIPTION -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        bg-white
                        uk-margin-bottom"
                 data-uk-scrollspy="{cls:'animated slideInLeft'}"
                 id="ec-description">
        <header class="uk-panel-title">
            <i class="uk-icon-info"></i>
            Description
        </header>
        <section>
        <?php print $sq['description']; ?>
        </section>
        </article>
        
        <!-- POSTER IMAGES -->
        <article class="uk-panel 
                        uk-panel-box 
                        uk-panel-header
                        bg-white"
                 id="ec-poster-images"
                 data-uk-scrollspy="{cls:'animated slideInLeft'}">
        <header class="uk-panel-title">
            <i class="uk-icon-picture-o"></i>
            Posters
        </header>
        <section class="uk-panel">
        <div class="uk-grid">
            <?php foreach($q['poster'] as $row): ?>
        
            <a href="#" class="uk-width-1-4 uk-margin-bottom">
            <div class="uk-thumbnail">
                <img src="<?php print Uri::create('uploads/'.$row['photo']['date']."/thumb-".$row['photo']['filename']); ?>"/>
            </div>
            </a>

            <?php endforeach; ?>
        </div>
        </section>
        </article>
        
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        bg-white
                        uk-margin-top
                        animated
                        bounceIn"
                 id="ec-instagram"
                 data-uk-scrollspy="{cls:'animated slideInLeft'}">
        <header class="uk-panel-title">
            <i class="uk-icon-instagram"></i>
            Instagram Pictures
        </header>
        <section class="uk-width-1-1">
        <div class="uk-grid">
        <?php foreach($q['instagram'] as $row): ?>
        <?php if($instagram_limit < 10): ?>
            <div class="uk-width-1-4 uk-margin-bottom">
            <div class="uk-thumbnail">
                <img src="<?php print $row['img_thumb']; ?>"/>
            </div>
            </div>
        <?php $instagram_limit++; ?>
        <?php else: break; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
        </section>
        </article>
    </section>
    </article>   
    
    </section>
    
    <!-- ASIDE -->
    <aside class="uk-width-large-4-10 padding"
             id="ec-aside-container">
        
    <!-- FACEBOOK REFERENCE -->
    <article class="uk-width-1-1"
             id="ec-link-reference">
    <div class="uk-grid">
        <div class="uk-hidden-large">
        <br><br><br><br>
        </div>
        
        <article class="uk-width-1-4 ec-link">
        <div class="uk-panel uk-panel-box uk-text-center"
             style="background-color:#45619D;">
            <a href="<?php print Uri::create('http://facebook/'.$q['facebook']); ?>"
               target="_new">
            <i class="uk-icon-facebook"></i>
            </a>
        </div>
        </article>
        
        <article class="uk-width-1-4 ec-link">
        <div class="uk-panel uk-panel-box uk-text-center"
             style="background-color:#3A92C8;">
            <a href="<?php print Uri::create('http://twitter/'.$q['twitter']); ?>"
               target="_new">
            <i class="uk-icon-twitter"></i>
            </a>
        </div>
        </article>
        
        <?php if(!empty($q['email'])): ?>
        <article class="uk-width-1-4 ec-link">
        <div class="uk-panel uk-panel-box uk-text-center"
             style="background-color:#34495e;">
            <a href="#email" data-email="<?php print $q['email']; ?>">
            <i class="uk-icon-envelope"></i>
            </a>
        </div>
        </article>
        <?php endif; ?>
        
        <article class="uk-width-1-4 ec-link">
        <div class="uk-panel uk-panel-box uk-text-center"
             style="background-color:#2ecc71;">
            <a href="<?php print Uri::create('http://'.$q['website']); ?>"
               target="_new">
            <i class="uk-icon-globe"></i>
            </a>
        </div>
        </article>
        
    </div>
    </article>
    
    <!-- PANEL -->
    <article class="uk-width-1-1 uk-margin-top"
             id="ec-view-map-container">
        <div class="uk-panel"
             id="ec-map"></div>
    </article>
    
    <div class="uk-width-1-1 uk-margin-top"
         data-uk-scrollspy="{cls:'animated slideInRight'}"
         id="ec-share-container">
    <div class="uk-grid">
        <article class="uk-width-1-2">
            <a href="#">
            <div class="ec-share
                        uk-float-left
                        padding"
             style="background-color:#45619D">
            <i class="uk-icon-facebook-square"></i>
            &nbsp; Share on Facebook
            
            </div>
            </a>
                
            <a href="#">
            <div class="ec-share
                        uk-float-left
                        padding"
                 style="background-color:#3A92C8;">
            
            <i class="uk-icon-twitter-square"></i>
            &nbsp; Share on Twitter
            </div>
            </a>
        </article>
        
        <article class="uk-width-1-2">
            <a href="<?php print 'waze://?ll='. $q['lat'].','.$q['long'];?>">
            <div class="ec-share
                        uk-float-left
                        padding"
             style="background-color:#3498db;">
            
            <i class="uk-icon-crosshairs"></i>
            &nbsp; Send To Waze
            </div>
            </a>
            
            <a href="<?php print 'http://maps.google.com/?ie=UTF8&q='.urlencode($q['venue']).'@'.$q['lat'].','.$q['long']; ?>"
                   target="_new">
            <div class="ec-share
                        uk-float-left
                        padding"
                 style="background-color:#e74c3c">
                
                <i class="uk-icon-map-marker"></i>
                &nbsp; See on Google Maps
            </div>
            </a>
        </article>
    </div>
    </div>
    
    <!-- LAST TWEET -->
    <article class="uk-width-1-1 uk-margin-top"
             id="ec-social-tweet"
             data-uk-scrollspy="{cls:'animated slideInRight'}">
    <section class="uk-width-1-1">
         <article class="uk-panel
                         uk-panel-box
                         uk-panel-header">
         <header class="uk-panel-title">
             <i class="uk-icon-twitter"></i>
             Latest Tweet
         </header>
         
         <section class="uk-grid" data-uk-grid-match>
         <div class="uk-width-1-4">
         <div class="uk-thumbnail">
             <img src="http://placehold.it/400x400"/>
         </div>
         </div>
         <div class="uk-width-3-4">
         <p>blah blah blah blah blah blah blah blah blah 
         blah blah blah blah blah blah blah blah blah 
         blah blah blah blah blah blah blah blah blah blah</p>
         <p class="uk-text-small">
             Tuesday, April 01, 2014 HH:SS
         </p>
         </div>
         </section>
             
         </article>
    </section>
    </article>
    
    <!-- MINOR DETAILS -->
    <article class="uk-width-1-1 uk-margin-top"
             id="ec-minor-details">
    <section class="uk-width-1-1">
        
        <!-- Hashtags -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        bg-white
                        ec-detail-category
                        uk-margin-bottom"
                 data-uk-scrollspy="{cls:'animated slideInRight'}">
        <header class="uk-panel-title">
            <i class="uk-icon-signal"></i>
            Hashtags
        </header>
        <ul>
            <?php foreach($q['hashtags'] as $row):?>
            <li>
            <a href="#" 
               class="uk-button
                      uk-margin-bottom"
               style="background-color:#1abc9c;color:#fff;">
            # <?php print $row['hashtag']; ?>
            </a>
            </li>
            <?php endforeach;?>
        </ul>
        </article>
        
         <!-- URL LIST -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        uk-margin-top
                        bg-white
                        ec-detail-guest
                        uk-margin-bottom"
                 data-uk-scrollspy="{cls:'animated slideInRight'}">
        <header class="uk-panel-title">
            <i class="uk-icon-users"></i>
            Related Articles
        </header>
        <ul class="uk-list">
        <?php for($x = 0; $x < 10; $x++): ?>
        <li><a href="#">Some Article URL from Website</a></li>
        <?php endfor;?>
        </ul>
        </article>
        
        <!-- CATEGORY -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        bg-white
                        ec-detail-category"
                data-uk-scrollspy="{cls:'animated slideInRight'}">
        <header class="uk-panel-title">
            <i class="uk-icon-tags"></i>
            Category
        </header>
        <ul>
            <?php foreach($q['category'] as $row): ?>
            <li>
            <a href="#" 
               class="uk-button 
                      uk-button-primary
                      uk-margin-bottom">
            <i class="uk-icon-tag"></i>
            <?php print $q['category']; ?>
            </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </article>
        
        <!-- TICKET -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        bg-white
                        uk-margin-top
                        ec-detail-category"
                 data-uk-scrollspy="{cls:'animated slideInRight'}">
        <header class="uk-panel-title">
            <i class="uk-icon-ticket"></i>
            Ticket
        </header>
        <ul>
        <?php foreach($q['ticket'] as $row): ?>
            <li>
            <a href="#" 
               class="uk-button
                      uk-margin-bottom"
               data-uk-tooltip="{pos:'top'}" 
               title="<?php print $row['note']; ?>">
            <i class="uk-icon-rouble"></i>
            <?php print $row['price']; ?>
            </a>
            </li>
        <?php endforeach;?>
        </ul>
        </article>
        
        <?php if(count($q['guest']) > 0): ?>
        <!-- GUEST LIST -->
        <article class="uk-panel
                        uk-panel-box
                        uk-panel-header
                        uk-margin-top
                        bg-white
                        ec-detail-guest"
                 data-uk-scrollspy="{cls:'animated slideInRight'}">
        <header class="uk-panel-title">
            <i class="uk-icon-users"></i>
            Guests List
        </header>
        <table class="uk-table uk-table-hover">
        <thead>
        <tr>
        <th>Guest Name</th>
        <th>Guest Type</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($q['guest'] as $row): ?>
        <tr>
        <td><?php print $q['name']; ?></td>
        <td><?php print $q['guest_type']; ?></td>
        </tr>  
        <?php endforeach; ?>
        </tbody>
        </table>
        </article>
        <?php endif; ?>
    </section>
    </article>
    
    </aside>
</div>
</article>
<script>
var geoLocation = <?php print '['.$q['lat'].','.$q['long'].']'; ?>;
var osmTileMap  = 'http://{s}.tile.cloudmade.com/06bb239b50aa4ef1bfccec8bbc153c60/997/256/{z}/{x}/{y}.png';
var venue       = '<?php print $q['venue']; ?>';
var attr        = 'Event Chart Map Powered by Cloudmade OSM.';
$(document).ready(function(e)
{
    var map = L.map('ec-map').setView(geoLocation,13);
    L.tileLayer(osmTileMap,{attribution:attr}).addTo(map);
    L.marker(geoLocation).addTo(map).bindPopup(venue).openPopup();
    
    $('a[href="#email"]').click(function(e)
    {
        var email = $(this).data('email');
        window.prompt("Copy to clipboard: Ctrl+C, Enter", email);
        e.preventDefault();
    });
    
    $('.ec-link').addClass('animated bounceIn');
    $('.ec-link').each(function(i)
    {
        $(this).css('animation-delay',i * 400 + 'ms');
    });
});
</script>