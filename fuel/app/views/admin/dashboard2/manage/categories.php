<article id="ec-sub-categories"
		 data-url-delete="<?php print $delete; ?>"
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
<section class="uk-width-1-1 uk-panel uk-panel-header">
<div class="uk-panel-title">
<i class="uk-icon-tags"></i>	
Event Categories
</div>
<!-- FROM Title -->
<div class="uk-width-1-1">
<form action="<?php print $action; ?>"
	  method="POST"
	  class="uk-form uk-form-horizontal"
	  id="ec-form-category">
<fieldset>
	<div class="uk-form-row">
	<label class="uk-form-label">Category List</label>
	<div class="uk-form-controls">
	<select name="category">
	<?php foreach($cats as $row):  ?>
		<option value="<?php print $row; ?>">
		<?php print $row; ?>
		</option>
	<?php endforeach;?>
	</select>
	<button type="submit"
			class="uk-button
				   uk-button-primary">
	<i class="uk-icon-plus"></i>
	Add
	</button>
	</div>
	</div>
</fieldset>
</form>
</div>
<!-- FORM Content -->
<div class="uk-width-1-1 uk-margin-top">
<table class="uk-table">
<thead>
<tr>
<th>Category Name</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ec-sub-categories-result">
<?php foreach($q['category'] as $row): ?>
<tr>
	<td><?php print $row['category']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-categories"
		   data-cat-id="<?php print $row['id']; ?>">
		<i class="uk-icon-minus-circle"></i>
		</a>
	</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

</section>
</div>
</article>
<script>
var urlDeleteCat        = $('#ec-sub-categories').data('url-delete');
var $resultCategory     = $('#ec-sub-categories-result');
$(document).ready(function()
{
	$('#ec-form-category').ajaxForm({
		beforeSubmit:function()
		{},
		success:function(d)
		{
                    $resultCategory.prepend(d);
		}
	});
	$resultCategory.on('click','.ec-delete-categories',function()
	{
		$container = $(this);
		$container.parent().parent().remove();
		$.post(urlDeleteCat,
			  {catid:$container.data('cat-id')},
			  function(d)
			  {});
	});
});
</script>