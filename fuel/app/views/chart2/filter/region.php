<article id="ec-filter-region" 
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
              method="POST"
              id="ec-filter-region-form">
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		Region/City
	</label>
	<div class="uk-form-controls">
		<select name="city">
		<option value="ncr">NCR</option>
		<option value="cebu">Cebu</option>
		<option value="davao">Davao</option>
		<optgroup label="-----"></optgroup>
		<?php foreach($city as $row): ?>
		<option value="<?php print $row['major_area'] ?>">
		<?php print $row['major_area']; ?>
		</option>
		<?php endforeach; ?>
		</select>
		<button class="uk-button uk-button-primary"
                        type="submit">
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