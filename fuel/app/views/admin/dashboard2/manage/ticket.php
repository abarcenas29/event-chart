<article id="ec-ticket"
		 data-url-delete="<?php print $delete; ?>"
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
<section class="uk-width-1-1 uk-panel uk-panel-header">
<div class="uk-panel-title">
<i class="uk-icon-ticket"></i>	
Ticket Information
</div>
<!-- FROM Title -->
<div class="uk-width-1-1">
<form action="<?php print $action; ?>"
	  method="POST"
	  class="uk-form uk-form-horizontal"
	  id="ec-form-ticket">
<fieldset>
	<div class="uk-form-row">
	<label class="uk-form-label">Ticket</label>
	<div class="uk-form-controls">
	<input type="number" 
		   name="price"
		   placeholder="Price"
		   />
	<input type="text" 
		   name="note"
		   placeholder="Detail"
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
<th>Ticket Name</th>
<th>Note</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ec-ticket-result">
<?php foreach($q['ticket'] as $row): ?>
<tr>
	<td><?php print 'Php'.$row['price']; ?></td>
	<td><?php print $row['note']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-ticket"
		   data-ticket-id="<?php print $row['id']; ?>">
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
var urlDeleteTicket = $('#ec-ticket').data('url-delete');
var $resultTicket   = $('#ec-ticket-result');
$(document).ready(function()
{
	$('#ec-form-ticket').ajaxForm({
		beforeSubmit:function()
		{
                    $.UIkit.notify('Crunching Ticket Price ...',{status:'info'});
                },
		success:function(d)
		{
                    $.UIkit.notify('Ticket Price Added. Refresh Page to See change ...',{status:'success'});
                    $resultTicket.prepend(d);
		}
	});
	$result.on('click','.ec-delete-ticket',function()
	{
		$container = $(this);
		$container.parent().parent().remove();
		$.post(urlDeleteTicket,
			  {ticketid:$(this).data('ticket-id')},
			  function(d)
			  {});
	});
});
</script>