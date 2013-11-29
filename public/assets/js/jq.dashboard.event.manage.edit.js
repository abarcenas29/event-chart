function pushObject(name,value)
{
	return {
		name:		name,
		required:	false,
		type:		'hidden',
		value:		value
	};
}

$(document).ready(function() {
	$('.ec-date').datepicker({dateFormat:'yy-mm-dd'});
	$('#ec-drag-n-drop').bind('drop',function(e)
	{
		var files		= e.dataTransfer.files;
		var $previewImg = $(this);	
		
		if(files.length > 1)
		{
			$(this).html('One file only');
			return false;
		}
		
		if(files[0].type == 'image/png'  || 
		   files[0].type == 'image/jpeg' ||
		   files[0].type == 'image/ppeg')
		{
			var fileReader		= new FileReader();
			fileReader.onload	= (function(f)
			{
				//dataArray = {name:'test'};
				return function()
				{
					dataArray = {photo_name:f.name,file:this.result};
					$previewImg.removeAttr('style');
					$previewImg.html('<img src="'+ this.result +'" width="80%"/>');
				}
			})(files[0]);
			fileReader.readAsDataURL(files[0]);
		}
		else
		{
			$(this).html('images only. GIF not allowed.');
			return false;
		}
		e.preventDefault();
	});
	
	$('#ec-form-organization').ajaxForm(
	{
	beforeSubmit:function(arr)
	{
		var desc = $('#ec-description').html();
		if(dataArray.photo_name !== '|none|')
		{
			arr.push(pushObject('photo_name',dataArray.photo_name));
			arr.push(pushObject('file',dataArray.file));
		}
		arr.push(pushObject('description',desc));
		$response.show();
		$response.html('Sending Data ... <i class="uk-icon-spinner uk-icon-spin"></i> ');
	},
	success:function(data)
	{
		console.log(data);
		$response.html(data.response);
	},
	uploadProgress:function(e,pos,total,percent)
	{
		//console.log(percent);
	}
	});
});