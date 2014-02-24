<article class="uk-width-1-1
				ec-chart-container">
	<section class="uk-grid">
		
		<?php for($x = 0; $x < 20; $x++): ?>
		<div class="uk-width-large-1-3
					uk-width-medium-1-2
					ec-chart-cycle 
					uk-margin-bottom
					animated bounceIn">
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-1-3">
			<img src="http://placehold.it/200x200"/>
			</div>
			<div class="uk-width-2-3">
			<div class="uk-panel uk-panel-header">
			<div style="padding:0.5em;">
			<div class="uk-panel-title uk-text-truncate">
				Event Name
				<div>
				<a href="#ec-event-info" class="uk-button" data-bo-modal>
					<i class="uk-icon-info-circle"></i>
				</a>
				</div>
			</div>
			<p>Anime Alliance Philippines</p>
			<p>Mar 1 2014 (00H:00M:00S)</p>
			</div>
			</div>
			</div>
		</div>
		</div>
		<?php endfor; ?>
		
	</section>
</article>
<script>
var animationDelayWebkit = '-webkit-animation-delay';
var animationDelay		 = 'animation-delay';
$('.ec-chart-cycle').each(function(i)
{
	$(this).css(animationDelayWebkit, i*200 + 'ms');
	$(this).css(animationDelay,i*200 + 'ms');
});
</script>