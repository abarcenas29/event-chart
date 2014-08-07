<?php print Asset::css('event.css'); ?>
<main id="ec-event-container" 
      class="uk-width-large-8-10 
             uk-width-small-1-1 
             uk-container-center">
    
    <!-- Header Image -->
    <header id="ec-event-image" 
            style="background-image:url('<?php print $cover; ?>')">
    <section class="uk-grid uk-width-1-1" style="height:inherit;margin:0em;">
        <div class="uk-width-large-2-3 uk-visible-large">
            &nbsp;
        </div>
        <div class="uk-width-large-1-3 uk-width-small-1-1" 
             id="ec-title">
        <div class="uk-margin-top uk-margin-bottom">
        
        <div id="ec-social-bar">
        <div style="display:table" class="uk-width-1-1">
            
            
            <div style="display:table-cell" class="social">
            <a href="<?php print $calendar; ?>"
               class="uk-text-truncate"
               target="_new">
                <i class="fa fa-calendar-o"></i>
                &nbsp;
                <span class="uk-visible-large">Google Calendar</span>
            </a>
            </div>
            
            <?php if(!empty($q['facebook'])): ?>
            <div style="display:table-cell" class="social">
                <a href="<?php print 'http://facebook.com/'.$q['facebook']; ?>"
                   target="_new">
                <i class="fa fa-facebook"></i>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if(!empty($q['twitter'])): ?>
            <div style="display:table-cell" class="social">
                <a href="<?php print 'http://twitter.com/'.$q['twitter']; ?>"
                   target="_new">
                <i class="fa fa-twitter"></i>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if(!empty($q['website'])): ?>
            <div style="display:table-cell" class="social"
                 target="_new">
                <a href="<?php print 'http://'.$q['website']; ?>">
                <i class="fa fa-globe"></i>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if(!empty($q['email'])): ?>
            <div style="display:table-cell" class="social"
                 target="_new">
                <a href="<?php print 'mailto:'.$q['email']; ?>">
                <i class="fa fa-envelope"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
        </div>
        
        <h1 title="<?php print $q['name'] ?>"><?php print $q['name']; ?></h1>
        <h2 title="<?php print $q['organization']['name']; ?>">
            <i><?php print $q['organization']['name']; ?> &nbsp;</i>
            <?php if(count($q['sub_org']) > 0): ?>
            <span> 
                with <?php print count($q['sub_org']); ?> partner(s)
                <a href="#"><i class="fa fa-angle-double-down"></i></a>
            </span>
            <?php endif;?>
        </h2>
        <h3 title="<?php print date('d F y',strtotime($q['start_at'])) .' - '. date('d F y',strtotime($q['end_at']));  ?>">
            <i class="fa fa-calendar"></i>
            &nbsp;
            <?php print date('d M Y',strtotime($q['start_at'])) .' - '.date('d M Y',strtotime($q['end_at'])) ?>
        </h3>
        <h3 title="<?php print $q['venue']; ?>">
            <i class="fa fa-cab"></i>
            <span><?php print $q['venue']; ?></span>
        </h3>
        <h3>
            <i class="fa fa-money"></i>
            <?php foreach($q['ticket'] as $row): ?>
            <span><?php print 'Php '.$row['price']; ?></span>
            <a href="#" target="_new"><i class="fa fa-angle-double-down"></i></a>
            <?php break;endforeach; ?>
        </h3>
        </div>
        </div>
    </section>
    </header>
    
    <section id="ec-main-detail" class="uk-width-1-1">
    <div class="uk-grid uk-width-1-1" style="height:inherit;margin:0em;">
        <div class="uk-width-large-2-3 uk-width-small-1-1"
             id="content">
            
        </div>
        <aside class="uk-width-large-1-3 uk-width-small-1-1"
               id="aside">
            <div class="uk-margin-top uk-margin-bottom" 
                 id="main-info">
                <h1>Information</h1>
                <div><?php print $desc; ?></div>
            </div>
            
            <div class="uk-margin-bottom"
                 id="share-info">
                <h1>Share Event</h1>
                <ul>
                    <li>
                        <a href="<?php print $share_fb; ?>" 
                           class="uk-button"
                           target="_new"
                           style="background-color:#45619D;padding:0.2em 0.4em;">
                        <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="uk-button"
                           style="background-color:#3a92c8;">
                        <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div id="follow">
                <hr>
                <dl class="uk-description-list-horizontal">
                    
                    <?php if(!empty($category)): ?>
                    <dt><i class="fa fa-tags"></i></dt>
                    <dd><?php print $category; ?></dd>
                    <?php endif; ?>
                    
                    <?php if(!empty($hashtag)): ?>
                    <dt><i class="fa fa-slack"></i></dt>
                    <dd><?php print $hashtag; ?></dd>
                    <?php endif; ?>
                    
                </dl>
            </div>
        </aside>
    </div>
    </section>
</main>
