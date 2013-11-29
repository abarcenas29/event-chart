<?php print Asset::js('jquery.wookmark.min.js');?>
<?php print Asset::js('jquery.imageloaded.js'); ?>
<?php print Asset::js('jquery.countdown.min.js');  ?>

<?php if(isset($now) && count($now) != 0):?>
<!-- Any Event Happening Today -->
<section class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center
				uk-margin-top" style="position:relative;min-height:20em;">
<div class="uk-panel uk-panel-box uk-panel-box-primary" style="min-height:19em;">
<div class="uk-panel-badge uk-badge uk-badge-danger">
	Events Happening Right Now
</div>
<ul id="ec-charts-now">

<?php foreach($now as $row): ?>
<li class="ec-events">
<a href="#ec-chart-modal"
   class="ec-chart-modal-link"
   data-title="<?php print $row['title']; ?>"
   data-cover="<?php print $row['poster_flow'];?>"
   data-range="<?php print $row['start_at']. ' - '. $row['end_at']; ?>"
   data-venue="<?php print $row['venue']?>"
   data-event="<?php print $row['event_id'];?>"
   data-uk-modal>
<div class="uk-panel ec-chart-title">
	<div class="uk-text-center uk-text-truncate">
	<?php print $row['title']; ?>
	</div>
</div>
<div class="uk-panel" style="padding:0.5em;background-color:#E2E3E5;">
<img src="<?php print $row['poster_thumb'] ?>"/>
</div>
</a>
</li>
<?php endforeach; ?>

</ul>
</div>
</section>
<?php endif; ?>

<!-- List of Future Events -->
<section class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center
				uk-margin-top"
		id="ec-chart-canvas"
		style="position:relative;">

<div>
<ul id="ec-charts">

<?php foreach($c as $row): ?>
<li class="ec-events">
<a href="#ec-chart-modal"
   class="ec-chart-modal-link"
   data-title="<?php print $row['title']; ?>"
   data-cover="<?php print $row['poster_flow'];?>"
   data-range="<?php print $row['start_at']. ' - '. $row['end_at']; ?>"
   data-venue="<?php print $row['venue']?>"
   data-event="<?php print $row['event_id'];?>"
   data-uk-modal>
<div class="uk-panel ec-chart-title" style="width:200px;">
	<div class="uk-text-center uk-text-truncate">
	<?php print $row['title']; ?>
	</div>
</div>
<div class="uk-panel" style="padding:0.5em;background-color:#252525;">
<div class="uk-panel-badge uk-badge">
	<?php print $row['start_at']; ?>
	(<span class="ec-countdown"
		   data-date="<?php print $row['raw_date']; ?>"></span>)
</div>
<img src="<?php print $row['poster_thumb'] ?>"/>
</div>
</a>
</li>
<?php endforeach; ?>

</ul>
</div>
	
</section>

<!-- Chart Modal -->
<article id="ec-chart-modal" class="uk-modal">
<div class="uk-modal-dialog ec-modal-chart uk-modal-dialog-slide">
	<div class="uk-panel ec-modal-chart-title">
	<h2 id="ec-event-title"></h2>
	</div>
	
	<div class="uk-panel ec-modal-chart-cover">
	
	<div id="ec-cover-image" style="display:none;">
	<div class="uk-panel-badge uk-badge ec-event-date"></div>
	<img id="ec-event-image" src=""/>
	</div>
	
	<div id="ec-no-fb-cover" style="display:none;">
	<div class="uk-width-1-1 uk-vertical-align" style="height:214px;background-color:#1B58B8;">
	<div class="uk-vertical-align-middle 
				uk-width-1-1 
				uk-text-center
				ec-alt-cover
				ec-event-date">
	</div>
	</div>
	</div>

	</div>
	
	<div class="uk-panel ec-modal-chart-body">
		<!-- Go to detail page -->
		<div class="uk-panel ec-modal-cont uk-margin-bottom">
		<div class="uk-text-center" id="ec-more-event">
			<a href="#" 
			   class="uk-button">
				More Info
			</a>
		</div>
		</div>
		
		<!-- venue -->
		<div class="uk-panel ec-modal-desc">
			<h3>Venue</h3>
		</div>
		<div class="uk-panel ec-modal-cont uk-margin-top" id="ec-event-venue">
		</div>
		<div class="uk-panel ec-modal-cont uk-margin-top"
			 style="display:none;"
			 id="ec-modal-loading">
		<div class="uk-text-center">
			<i class="uk-icon-spinner"></i>
			Loading Data ...
		</div>
		</div>
		
		<div id="ec-event-details"></div>
	</div>
</div>
</article>

<script>
var urlDetail		= "<?php print Uri::create('ajax/chart/load_chart_detail'); ?>";
var $modalLoad		= $('#ec-modal-loading');
var $modalInfo		= $('#ec-event-details');
var $modalCover		= $('#ec-cover-image');
var $modalNoCover	= $('#ec-no-fb-cover');
var urlEventPage	= "<?php print Uri::create('view/event/'); ?>";

$(document).ready(function(){
	$('.ec-countdown').each(function(i)
	{
		var stringDate = $(this).data('date');
		var dateArr	   = stringDate.split('-');
		var year	   = parseInt(dateArr[0]);
		var month	   = parseInt(dateArr[1]);
		var day		   = parseInt(dateArr[2]);
		$(this).countdown({
			until:new Date(year,month-1,day),
			layout:'{dnn}d:{hnn}H:{mnn}M:{snn}S'
		});
	});
	
	$('.ec-chart-modal-link').click(function(e)
	{
		var title = $(this).data('title');
		var cover = $(this).data('cover');
		var date  = $(this).data('range');
		var desc  = $(this).data('venue');
		var event = $(this).data('event');
		var data  = {event_id:event};
		
		$('#ec-event-title').html(title);
		$('.ec-event-date').html(date);
		$('#ec-event-image').attr('src',cover);
		$('#ec-event-venue').html(desc);
		$('#ec-more-event a').attr('href',urlEventPage+event);
		
		if(cover !== 'empty')
		{
			$modalCover.show();
			$modalNoCover.hide();
		}
		else
		{
			$modalCover.hide();
			$modalNoCover.show();
		}
		
		$modalLoad.fadeIn(200);
		$modalInfo.hide();
		$.post(urlDetail,data,function(data){
			$modalLoad.fadeOut(200);
			$modalInfo.fadeIn(200).html(data);
		});
		
		e.preventDefault();
	});
	$('#ec-charts').imagesLoaded(function(){
		var opt = {
			itemWidth: 200,
			autoResize: true,
			offset:30,
			outerOffset:20,
			container:$('#ec-chart-canvas'),
		};
		$('#ec-charts li').wookmark(opt);
		$('body').addClass('uk-height-1-1');
	});
	
<?php if(isset($now) && count($now) != 0):?>
	$('#ec-charts-now').imagesLoaded(function(){
		var opt = {
			itemWidth: 200,
			autoResize: true,
			offset:30,
			outerOffset:20,
			container:$('#ec-chart-canvas'),
		};
		$('#ec-charts-now li').wookmark(opt);
	});
<?php endif; ?>
});
</script>
