<?php
    print Asset::css('view/event.css');
    print Asset::css('view/modal.css');
    print Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');
    print Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');
?>
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
                <a href="#ec-sub-partners-modal" data-uk-modal>
                    <i class="fa fa-angle-double-down"></i>
                </a>
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
            <a href="#ec-ticket-modal" 
               target="_new" 
               data-uk-modal>
                <i class="fa fa-angle-double-down"></i>
            </a>
            <?php break;endforeach; ?>
        </h3>
        </div>
        </div>
    </section>
    </header>
    
    <section id="ec-main-detail" class="uk-width-1-1">
    <div class="uk-grid uk-width-1-1"
         data-uk-grid-match
         style="height:inherit;margin:0em;background-color:#f6f6f6;">
        <!-- CONTENT -->
        <div class="uk-width-large-2-3 uk-width-small-1-1"
             id="ec-content">
            
            <!-- MAP -->
            <div id="ec-map"></div>
            
            <!-- FACEBOOK PHOTOS -->
            <div class="uk-margin-top uk-width-1-1" id="ec-fb-photos">
            <?php if(count(isset($q['poster']))): ?>
            <a href="#ec-poster-modal" data-uk-modal>
            <?php foreach($q['poster'] as $row): ?>
            <?php if($poster_counter > $poster_limit)break;?>
                <div class="uk-width-small-1-2 
                            uk-width-large-1-4
                            uk-text-center
                            uk-float-left
                            uk-margin-bottom">
                <img class="uk-thumbnail uk-thumbnail-small" 
                     src="<?php print Uri::create('/uploads/'.$row['photo']['date'].'/'.'thumb-'.$row['photo']['filename']); ?>"/>
                </div>
            <?php $poster_counter++; ?>
            <?php endforeach; ?>
            </a>
            
            <?php endif; ?>
            </div>
            
            
            
            <!-- GUEST LIST -->
            <?php if(count($q['guest']) > 0): ?>
            <article class="uk-margin-top uk-width-1-1"
                     id="ec-guest">
            <header>
            <h1>Guest List</h1>
            <hr>
            </header>
            <section>
                
            <table class="uk-table uk-table-striped">
            <tbody>
            <?php foreach($q['guest'] as $row): ?>
                <tr>
                    <td><?php print $row['name']; ?></td>
                    <td><?php print $row['type']; ?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
            </table>
                
            </section>
            </article>
            <?php endif; ?>
            
        </div>
        
        <!-- ASIDE -->
        <aside class="uk-width-large-1-3 uk-width-small-1-1"
               id="aside">
            
            <?php if(!empty($desc)): ?>
            <div class="uk-margin-top uk-margin-bottom" 
                 id="main-info">
                <h1>Information</h1>
                <div><?php print $desc; ?></div>
            </div>
            <?php endif; ?>
            
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

<?php 
// TICKET MODULE
print $ticket;
// PARTNER MODULE
print $partner;
// POSTERS
print $poster;
?>

<script>
    var geoLocation = <?php print (!is_null($q['lat']))?'['.$q['lat'] .','.$q['long'].']':'[51.505, -0.09]';?>;
    var venue       = '<?php print $q['venue']; ?>';
</script>
<?php print Asset::js('view/event.js'); ?>