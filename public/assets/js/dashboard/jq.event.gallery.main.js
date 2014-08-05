var $poster = $('#ec-main-poster');
$(document).ready(function()
{
	jQuery.event.props.push('dataTransfer');
	var data = [];
	
	$poster.find('.ec-poster-upload').click(function(e)
	{
		$.UIkit.notify('Uploading Image.',{status:'info'});
		var url = $(this).attr('href');
		
		var id  = $(this).parent().parent().parent().attr('id');
		var $id = $('#'+id);
		
		$.post(url,data[0],function(d)
		{
			$.UIkit.notify('Uploading Complete.',{status:'success'})
			$id.find('section').html(d);
			$id.attr('style','');
		});

		e.stopPropagation();
		e.preventDefault();
	});
	
	$poster.bind('drop',function(e)
	{
		data = [];
		var file = e.dataTransfer.files;
		
		if(file.length === 1 && file[0].type.match('image.*'))
		{
			var fR = new FileReader();
			fR.onload = (function(f)
			{
				$.post(urlMainImage,function(d)
				{
					$poster.find('section').html(d);
				});
				return function(e)
				{
					data.push({name:f.name,value:this.result});
				}
			})(file[0]);
			fR.readAsDataURL(file[0]);
		}
		else
		{
			var msg = "Only 1 file and a valid image file is allowed";
			$.UIkit.notify(msg,{status:"danger"});
			return false;
		}
		e.stopPropagation();
		e.preventDefault();
	});
	
	$poster.on('click','.ec-thumbnail-delete',function(e)
	{
		var url = $(this).parent().parent().data('url');
		
		$.post(url,function(d)
		{
			$poster.find('section').html('');
		});
		
		e.stopPropagation();
		e.preventDefault();
	});
});