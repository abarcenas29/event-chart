$(document).ready(function()
{
	jQuery.event.props.push('dataTransfer');
	
	$logo.bind('drop',function(e)
	{
		imgArray = [];
		var file = e.dataTransfer.files;
		
		if(file.length === 1 && file[0].type.match('image.*'))
		{
			var fR = new FileReader();
			fR.onload = (function(f)
			{
				$.post(orgLogo,function(d)
				{
					$logo.find('section').html(d);
				});
				return function(e)
				{
					imgArray.push({name:f.name,value:this.result});
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
});