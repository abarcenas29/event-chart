var $posterCover = $('#ec-main-cover');
$(document).ready(function()
{
	jQuery.event.props.push('dataTransfer');
	
	$posterCover.find('.ec-poster-upload').click(function(e)
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
	
	$posterCover.bind('drop',function(e)
	{
		var file = e.dataTransfer.files;
		data = [];
		
		if(file.length === 1 && file[0].type.match('image.*'))
		{
			var fR = new FileReader();
			fR.onload = (function(f)
			{
				$.post(urlMainImage,function(d)
				{
					$posterCover.find('section').html(d);
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
	
	$posterCover.on('click','.ec-thumbnail-delete',function(e)
	{
		var url = $(this).parent().parent().data('url');
		$.post(url,function(d)
		{
			$posterCover.find('section').html('');
		});
		e.stopPropagation();
		e.preventDefault();
	});
});