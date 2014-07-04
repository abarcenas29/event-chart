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
                    <li><a href="#"
                           class="active ec-event-nav">Event Detail</a>
                    </li>
                    <li><a href="<?php print Uri::create('ajax/view/event_posters'); ?>"
                           class="ec-event-nav">Posters
                        <i class="uk-icon-spin uk-icon-spinner uk-hidden"></i>
                        </a>
                    </li>
                    <li><a href="<?php print Uri::create('ajax/view/event_instagram'); ?>"
                           class="ec-event-nav">Social Photos 
                        <i class="uk-icon-spin uk-icon-spinner uk-hidden"></i>
                        </a>
                    </li>
                    <li><a data-url="<?php print Uri::create('ajax/view/event_twitter'); ?>"
                           class="ec-event-nav">Tweets
                        <i class="uk-icon-spin uk-icon-spinner uk-hidden"></i>
                        </a>
                        </li>
                    </ul>
                </nav>
                
                <div id="ec-event-sub-nav">
                    
                </div>
                
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