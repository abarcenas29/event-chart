<article id="ec-filter-date" 
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
	<section class="uk-panel uk-panel-header">
	<header class="uk-panel-title">
		<i class="uk-icon-filter"></i>
		Event Region
	</header>
	<form class="uk-width-1-1 uk-form uk-form-horizontal"
		  action="#"
		  method="POST">
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		Event Date
	</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="date"
			   data-uk-datepicker="{format:'YYYY-MM-DD'}"/>
		<button class="uk-button uk-button-primary">
			<i class="uk-icon-filter"></i>
		</button>
	</div>
	</div>
		
	</form>
	</section>
</div>
</article>
<script>
var currentCityVal = "<?php print $currentVal; ?>";
$('select[name="city"]').find('option[value="'+ currentCityVal +'"]')
						.attr('selected','selected');
</script>