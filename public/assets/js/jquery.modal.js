$(document).ready(function()
{
	var endAnimation = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	var $modal = $('.bo-modal');
	$modal.css('display','none');
	
	$('body').on('click','a[data-bo-modal]',function(e)
	{
		var $modal = $($(this).attr('href'));
		
		$modal.css('display','block');
		$modal.find('.bo-modal-dialog').addClass('animated');
		$modal.find('.bo-modal-dialog').addClass('bounceIn');
		
		e.preventDefault();
	});
	
	$('.bo-modal').click(function(e)
	{
		e.stopPropagation();
		$currentModal = $(this).find('.bo-modal-dialog');
		$currentModal.removeClass('bounceIn');
		$currentModal.addClass('bounceOut');
		$currentModal.one(endAnimation,function()
		{
			$currentModal.parent().css('display','none');
			$currentModal.removeClass('bounceOut');
		});
	});
	
	$('.bo-modal-dialog').click(function(e)
	{
		e.stopPropagation();
	});
});