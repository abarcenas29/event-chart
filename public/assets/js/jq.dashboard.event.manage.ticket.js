$(document).ready(function()
{
	$('#ec-form-ticket').ajaxForm({
		success:function(data)
		{
			$ecPriceTable.append(data);
		}
	});
	
	$ecPriceTable.on('dblclick','.ec-delete-ticket',function(e)
	{
		var $elemParent = $(this).parent().parent().parent().parent();
		var ticket_id	= $(this).data('ticket-id');
		$.post(urlDelTicket,{id:ticket_id},function(data){$elemParent.remove();})
	});
});