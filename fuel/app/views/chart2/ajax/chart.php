<?php foreach($q as $row): ?>
    <div class="uk-width-large-1-3
                uk-width-medium-1-2
                ec-chart-cycle 
                uk-margin-bottom
                animated bounceIn">
    <div class="uk-grid" data-uk-grid-match>
            <div class="uk-width-1-3">
            <img src="<?php print $row['poster_thumb']; ?>"/>
            </div>
            <div class="uk-width-2-3">
            <div class="uk-panel uk-panel-header">
            <div style="padding:0.5em;">
            <div class="uk-panel-title">
                <p class="uk-text-truncate uk-visible-large"
                   style="width:12em;">
                    <?php print $row['title']; ?>
                </p>
                
                <p class="uk-text-truncate uk-hidden-large">
                    <?php print $row['title']; ?>
                </p>
                
                <div>
                <a href="#ec-event-info"
                   data-event-id="<?php print $row['event_id']; ?>"
                   data-flow-poster="<?php print $row['poster_flow']; ?>"
                   data-venue="<?php print $row['venue']; ?>"
                   data-facebook="<?php print $row['facebook']; ?>"
                   data-twitter="<?php print $row['twitter']; ?>"
                   data-coord="<?php print $row['coordinate']; ?>"
                   data-tickets='<?php print $row['tickets']; ?>'
                   data-category='<?php print $row['category']; ?>'
                   data-event-title="<?php print $row['title']; ?>"
                   class="uk-button ec-event-info-dialog" 
                   data-bo-modal>
                <i class="uk-icon-info-circle"></i>
                </a>
                </div>
            </div>
            <p><?php print $row['main_org']; ?></p>
            <p><?php print $row['start_at']; ?> (00H:00M:00S)</p>
            </div>
            </div>
            </div>
    </div>
    </div>
<?php endforeach; ?>
<script>
var animationDelayWebkit = '-webkit-animation-delay';
var animationDelay	 = 'animation-delay';
$('.ec-chart-cycle').each(function(i)
{
	$(this).css(animationDelayWebkit, i*200 + 'ms');
	$(this).css(animationDelay,i*200 + 'ms');
});
</script>