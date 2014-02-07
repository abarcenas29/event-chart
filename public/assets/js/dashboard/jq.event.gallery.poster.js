var $posterPoster = $('#ec-main-gallery');
$(document).ready(function()
{
	jQuery.event.props.push('dataTransfer');
	
	$posterPoster.on('click','.ec-delete-poster',function(e)
	{
		var url = $(this).parent().parent().data('url');
		var id  = $(this).data('id');
		
		$(this).parent().remove();
		$.post(url,{poster_id:id},function(d)
		{
			$.UIkit.notify('Poster Deleted',{status:'danger'});
		});
	});
	
	$posterPoster.find('.ec-gallery-upload').click(function(e)
	{
		var url = $(this).attr('href');
		
		var id  = $(this).parent().parent().parent().attr('id');
		var $id = $('#'+id);
		
		$.each(data,function(index,post)
		{
			$.UIkit.notify('Uploading '+ data[index].name + ' ...',{status:'info'});
			$.post(url,data[index],function(d)
			{
				$.UIkit.notify('Uploading Complete.',{status:'success'})
				$id.find('.ec-gallery').eq(0).remove();
				$id.find('section').append(d);
				$id.attr('style','');
			});
		});
		
		e.stopPropagation();
		e.preventDefault();
	});
	
	$posterPoster.bind('drop',function(e)
	{
		var files = e.dataTransfer.files;
		data = [];
		
		$.each(files, function(index,file)
		{
			if(!files[index].type.match('image.*'))
			{
				var msg = "Invalid Image file";
				$.UIkit.notify(msg,{status:"danger"});
				return false;
			}
			else
			{
				var fR = new FileReader();
				fR.onload = (function(f)
				{
					$.post(urlPosterImage,function(d)
					{
						$posterPoster.find('section').prepend(d);
					});
					return function(e)
					{
						data.push({name:f.name,value:this.result});
					}
				})(files[index]);
				fR.readAsDataURL(file);
			}
		});
		
		e.stopPropagation();
		e.preventDefault();
	});
	
	$posterPoster.on('click','.ec-thumbnail-delete',function(e)
	{
		var url = $(this).parent().parent().data('url');
		$.post(url,function(d)
		{
			$posterPoster.find('section').html('');
		});
		e.stopPropagation();
		e.preventDefault();
	});
});