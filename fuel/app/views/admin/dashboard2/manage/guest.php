<article id="ec-guest"
		 data-url-delete="<?php print $delete; ?>"
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
<section class="uk-width-1-1 uk-panel uk-panel-header">
<div class="uk-panel-title">
<i class="uk-icon-pencil-square"></i>	
Guest Information
</div>
<!-- FROM Title -->
<div class="uk-width-1-1">
<form action="<?php print $action; ?>"
	  method="POST"
	  class="uk-form uk-form-horizontal"
	  id="ec-form-guest">
<fieldset>
	<div class="uk-form-row">
	<label class="uk-form-label">Ticket</label>
	<div class="uk-form-controls">
	<select name="type">
	<?php foreach($type as $row): ?>
		<option value="<?php print $row; ?>">
		<?php print $row; ?>
		</option>
	<?php endforeach; ?>
	</select>
	<input type="text" 
		   name="name"
		   placeholder="Guest Name"
		   />
	</div>
	</div>
	<div class="uk-form-row uk-float-right">
	<button type="submit"
			class="uk-button
				   uk-button-primary
				   uk-margin-right">
	<i class="uk-icon-plus"></i>
	Add
	</button>
	</div>
</fieldset>
</form>
</div>
<!-- FORM Content -->
<div class="uk-width-1-1 uk-margin-top">
<table class="uk-table">
<thead>
<tr>
<th>Guest Name</th>
<th>Type</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ec-guest-result">
<?php foreach($q['guest'] as $row): ?>
<tr>
	<td><?php print $row['name']; ?></td>
	<td><?php print $row['type']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-guest"
		   data-guest-id="<?php print $row['id']; ?>">
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
var urlDeleteGuest  = $('#ec-guest').data('url-delete');
var $resultGuest    = $('#ec-guest-result');
$(document).ready(function()
{
	$('#ec-form-guest').ajaxForm({
		beforeSubmit:function()
		{},
		success:function(d)
		{
           $resultGuest.prepend(d);
		}
	});
	$resultGuest.on('click','.ec-delete-guest',function()
	{
		$container = $(this);
		$container.parent().parent().remove();
		$.post(urlDeleteGuest,
			  {guestid:$(this).data('guest-id')},
			  function(d)
			  {});
	});
});
</script>