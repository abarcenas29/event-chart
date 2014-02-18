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
		  method="POST">
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		Region/City
	</label>
	<div class="uk-form-controls">
		<select name="city">
		<?php foreach($city as $row): ?>
		<option value="<?php print $row['major_area'] ?>">
		<?php print $row['major_area']; ?>
		</option>
		<?php endforeach; ?>
		</select>
		<button class="uk-button uk-button-primary">
			<i class="uk-icon-filter"></i>
		</button>
	</div>
	</div>
		
	</form>
	<div class="uk-width-1-1 uk-margin-top">
	<table class="uk-table uk-table-condensed">
	<tbody>
	<?php foreach($currentVal as $row): ?>
	<tr>
	<td><?php print $row; ?></td>
	<td>
		<button class="uk-button uk-button-danger">
			<i class="uk-icon-minus"></i>
		</button>
	</td>
	</tr>
	<?php endforeach;?>
	</tbody>
	</table>
	</div>
	</section>
</div>
</article>