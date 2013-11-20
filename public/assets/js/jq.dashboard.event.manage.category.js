$(document).ready(function() {
	$('.ec-cat-tag').click(function(){
		var cat = 'cat-id';
		var btn = 'uk-button-primary';
		var data= {id:$(this).data(cat),cat:$(this).data('value')};
		var $tag= $(this);
		$.post(urlCategory,data,function(d)
		{
			if(d.id !== 0)
			{
				$tag.addClass(btn);
			}
			else
			{
				$tag.removeClass(btn);
			}	
			$tag.data(cat,d.id)
		});
	});
});