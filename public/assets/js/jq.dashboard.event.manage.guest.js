$(document).ready(function()
{
	$('#ec-form-guest').ajaxForm({
		success:function(data)
		{
			$ecGuestTable.append(data);
		}
	});
	
	$ecGuestTable.on('dblclick','.ec-guest-del',function(e)
	{
		var $elemParent = $(this).parent().parent();
		var ticket_id	= $(this).data('guest-id');
		$.post(urlDelGuest,{id:ticket_id},function(data){$elemParent.remove();})
	});
});