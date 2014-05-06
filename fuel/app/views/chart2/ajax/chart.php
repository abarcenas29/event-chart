<div style="padding:1em;">
<section class="uk-grid">
<?php foreach($q as $row): ?>
    <div class="uk-width-large-1-3
                uk-width-medium-1-2
                uk-margin-bottom
                animated bounceIn">
    <a href="#" 
       data-id="<?php print $row['event_id'] ?>" 
       data-url="<?php print Uri::create('ajax/view/event_detail'); ?>"
       class="ec-chart-cycle">
    <div class="uk-grid" data-uk-grid-match>
        <div class="uk-width-1-3">
        <img src="<?php print $row['poster_thumb']; ?>"/>
        </div>
        <div class="uk-width-2-3">
        <div class="uk-panel uk-panel-header">
        <div style="padding:0.5em;">
        <div class="uk-panel-title"
             title="<?php print $row['title']; ?>">
            <p class="uk-text-truncate uk-visible-large"
               style="width:12em;">
                <?php print $row['title']; ?>
            </p>

            <p class="uk-text-truncate uk-hidden-large">
                <?php print $row['title']; ?>
            </p>
        </div>
        <p><?php print $row['main_org']; ?></p>
        <p><?php print $row['start_at']; ?> (00H:00M:00S)</p>
        </div>
        </div>
        </div>
    </div>
    </a>
    </div>
    
<?php endforeach; ?>
</section>
</div>
<script>
var animationDelayWebkit = '-webkit-animation-delay';
var animationDelay	 = 'animation-delay';
$('.ec-chart-cycle').each(function(i)
{
    $(this).css(animationDelayWebkit, i*200 + 'ms');
    $(this).css(animationDelay,i*200 + 'ms');
});
</script>