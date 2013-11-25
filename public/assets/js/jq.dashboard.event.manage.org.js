$(document).ready(function() {
	$('.ec-org-tag').click(function(){
		var btn = 'uk-button-primary';
		var data= {org:$(this).data('org-id'),eorg:$(this).data('eorg-id')};
		var $tag= $(this);
		$.post(urlOrg,data,function(d)
		{
			if(d.id !== 0)
			{
				$tag.addClass(btn);
			}
			else
			{
				$tag.removeClass(btn);
			}	
			$tag.data('eorg-id',d.id)
		});
	});
});