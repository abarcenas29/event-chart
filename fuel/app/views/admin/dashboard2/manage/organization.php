<article id="ec-sub-organization"
		 data-url-delete="<?php print $delete; ?>"
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
<section class="uk-width-1-1 uk-panel uk-panel-header">
<div class="uk-panel-title">
<i class="uk-icon-group"></i>	
Participating Organizations
</div>
<!-- FROM Title -->
<div class="uk-width-1-1">
<form action="<?php print $action; ?>"
	  method="POST"
	  class="uk-form uk-form-horizontal"
	  id="ec-form-organization">
<fieldset>
	<div class="uk-form-row">
	<label class="uk-form-label">Organization List</label>
	<div class="uk-form-controls">
	<select name="org">
	<?php foreach($orgs as $row):  ?>
			<option value="<?php print $row['id'] ?>">
			<?php print $row['name']; ?>
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
<th>Organization Name</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ec-sub-org-result">
<?php foreach($q['sub_org'] as $row): ?>
<tr>
	<td><?php print $row['org']['name']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-org"
		   data-org-id="<?php print $row['org_id']; ?>">
		<i class="uk-icon-minus-circle"></i>
		</a>
	</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>

</section>
</div>
</article>
<script>
var urlDelete = $('#ec-sub-organization').data('url-delete');
var $result	  = $('#ec-sub-org-result');
$(document).ready(function()
{
	$('#ec-form-organization').ajaxForm({
		beforeSubmit:function()
		{},
		success:function(d)
		{
			$result.prepend(d);
		}
	});
	$result.on('click','.ec-delete-org',function()
	{
		$container = $(this);
		$container.parent().parent().remove();
		$.post(urlDelete,
			  {orgid:$(this).data('org-id')},
			  function(d)
			  {});
	});
});
</script>