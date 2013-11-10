$(document).ready(function()
{
	$('#ec-poster-gallery').on('dblclick','.ec-poster-del',function(e)
	{
		var photo_id = {photo_id:$(this).data('photo-id')};
		var $ecPoster = $(this).parent().parent();
		$.post(urlDelPoster,photo_id,function(data)
		{
			$ecPoster.remove();
		})
	});
	$('#ec-poster-gallery').on('click','.ec-poster a',function(e)
	{
		var photoUrl = $(this).data('img-url');
		$('#ec-modal-poster-img').attr('src',photoUrl);
	});
});