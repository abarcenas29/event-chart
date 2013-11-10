(function($)
{
	$.fn.dnd = function(callback)
	{
		jQuery.event.props.push('dataTransfer');
		var result		= [];
		$(this).bind('drop',function(e){
			var files		= e.dataTransfer.files;
			var $preview	= $(this);
			
			
			if(files.length > 1)
			{
				$(this).html('One file only');
				return false;
			}
			
			if(files[0].type === 'image/png'  || 
			   files[0].type === 'image/jpeg' ||
			   files[0].type === 'image/ppeg')
			{
				var fileReader		= new FileReader();
				fileReader.onload	= (function(f)
				{
					return function(e)
					{
						result.push({name:f.name,value:this.result});
						$preview.removeAttr('style');
						$preview.html('<img src="'+ this.result +'" width="80%"/>');
						callback(result);
					};
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
	};
}(jQuery));