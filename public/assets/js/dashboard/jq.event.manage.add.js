function pushObject(name,value)
{
	return {
		name:		name,
		required:	false,
		type:		'hidden',
		value:		value
	};
}

$(document).ready(function()
{
	$eventForm.ajaxForm({
		beforeSubmit:function(arr)
		{
			var desc = $('#description').html();
			arr.push(pushObject('desc',desc));
			$.UIkit.notify('Sending Data ... ',{status:'info'});
			$eventForm.find("button[type='submit']").attr('disabled','');
		},
		success:function(d)
		{
			if(d.success == true)
			{
				$.UIkit.notify(d.response,{status:'success'});
				setTimeout(function(){window.location = urlDashboard},3000);
			}
			else
			{
				$.UIkit.notify(d.response,{status:'danger'});
				$eventForm.find("button[type='submit']").removeAttr('disabled');
			}
		}
	});
});