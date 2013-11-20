$(document).ready(function()
{
	$('#ec-form-hashtag').ajaxForm({
		success:function(data)
		{
			$ecHashTable.append(data);
		}
	});
	
	$ecHashTable.on('dblclick','.ec-delete-hashtag',function(e)
	{
		var $elemParent = $(this).parent().parent().parent().parent();
		var hash_id		= $(this).data('hash-id');
		$.post(urlHashtag,{id:hash_id},function(data){$elemParent.remove();})
	});
});