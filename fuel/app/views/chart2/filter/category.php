<article id="ec-filter-menu" 
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
	<section class="uk-panel uk-panel-header">
	<header class="uk-panel-title">
		<i class="uk-icon-filter"></i>
		Event Category
	</header>
	<form class="uk-width-1-1 uk-form uk-form-horizontal"
		  action="#"
		  method="POST">
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		Category
	</label>
	<div class="uk-form-controls">
		<select name="category">
		<option value="all">All</option>
		<optgroup label="----"></optgroup>
		<?php foreach($cat as $row): ?>
		<option value="<?php print $row['value'] ?>">
		<?php print $row['value']; ?>
		</option>
		<?php endforeach; ?>
		</select>
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
var currentCategoryVal = "<?php print (is_null($currentVal))?'all':$currentVal; ?>";
$('select[name="category"]').find('option[value="'+ currentCategoryVal +'"]')
							.attr('selected','selected');
</script>