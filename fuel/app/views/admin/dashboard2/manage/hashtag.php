<article id="ec-hashtag"
		 data-url-delete="<?php print $delete; ?>"
		 class="uk-modal">
<div class="uk-modal-dialog">
	<a class="uk-modal-close uk-close"></a>
<section class="uk-width-1-1 uk-panel uk-panel-header">
<div class="uk-panel-title">
<i class="uk-icon-sitemap"></i>	
Hashtag Information
</div>
<!-- FROM Title -->
<div class="uk-width-1-1">
<form action="<?php print $action; ?>"
	  method="POST"
	  class="uk-form uk-form-horizontal"
	  id="ec-form-hashtag">
<fieldset>
	<div class="uk-form-row">
	<label class="uk-form-label">Hashtag</label>
	<div class="uk-form-controls">
	<input type="text" 
		   name="hashtag"
		   placeholder="Hashtag (no #)"
		   />
	<button type="submit"
			class="uk-button
				   uk-button-primary">
	<i class="uk-icon-plus"></i>
	Add
	</button>
	</div>
	</div>
</fieldset>
</form>
</div>
<!-- FORM Content -->
<div class="uk-width-1-1 uk-margin-top">
<table class="uk-table">
<thead>
<tr>
<th>Hastag Name</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ec-hashtag-result">
<?php foreach($q['hashtags'] as $row): ?>
<tr>
	<td><?php print '#'.$row['hashtag']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-hashtag"
		   data-hashtag-id="<?php print $row['id']; ?>">
		<i class="uk-icon-minus-circle"></i>
		</a>
	</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>

</section>
</div>
</article>
<script>
var urlDeleteHashtag = $('#ec-hashtag').data('url-delete');
var $result			 = $('#ec-hashtag-result');
$(document).ready(function()
{
	$('#ec-form-hashtag').ajaxForm({
		beforeSubmit:function()
		{},
		success:function(d)
		{
			$result.prepend(d);
		}
	});
	$result.on('click','.ec-delete-hashtag',function()
	{
		$container = $(this);
		$container.parent().parent().remove();
		$.post(urlDeleteHashtag,
			  {hashtagid:$(this).data('hashtag-id')},
			  function(d)
			  {});
	});
});
</script>