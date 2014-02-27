<section class="uk-width-1-1 uk-margin-top uk-text-center"
		 id="ec-instagram-canvas">
<?php if($rsp !== false): ?>
<?php foreach($rsp as $photos):?>
	<div class="uk-thumbnail">
	<a href="#ec-modal-picture" 
	   data-username="<?php print $photos['username']; ?>"
	   data-user_img="<?php print $photos['user_img'];?>"
	   data-image="<?php print $photos['img_large']; ?>"
	   data-caption="<?php print $photos['caption']; ?>"
	   class="ec-modal-picture"
	   data-uk-modal>
	<img src="<?php print $photos['img_thumb']; ?>"/>
	</a>
	</div>
<?php endforeach;?>
<?php endif;?>
</section>
<section class="uk-width-1-1 
				uk-margin-top
				uk-text-center
				uk-margin-bottom">
	<a href="#" 
	   class="uk-button uk-button-primary"
	   id="ec-instagram-pagination">
		<i class="uk-icon-arrow-down"></i>
		More Photos
	</a>
</section>

<article id="ec-modal-picture" class="uk-modal">
	<section class="uk-modal-dialog">
		
	<div class="uk-width-1-1">
	<div class="uk-grid" data-uk-grid-match>
	<div class="uk-width-2-10">
	<img id="ec-modal-user-img" src="" width="75"/>
	</div>
	<div class="uk-width-8-10 uk-vertical-align" style="height:75px;">
		<h2 id="ec-modal-username"
			class="uk-vertical-align-middle">
			Username
		</h2>
	</div>
	</div>
	<div class="uk-width-1-1 uk-margin-top">
		<hr style="padding:0;">
	</div>
	</div>
		
	<div class="uk-width-1-1">
	<div class="uk-thumbnail-caption">
	<img id="ec-modal-image"
		 class="uk-width-1-1"
		 src=""/>
	</div>
	</div>
		
	<div class="uk-width-1-1 uk-margin-top">
	<div id="ec-modal-caption"
		 class="uk-panel uk-text-center">
	
	</div>
	</div>
		
	</section>
</article>

<script>
var $pagination		= $('#ec-instagram-pagination');
var $modalPicture	= $('#ec-modal-picture');
var urlPagination	= "<?php print Uri::create('ajax/view/page_instagram'); ?>";
var page			= 0;
$(document).ready(function(){
	
	$(document).on('click','.ec-modal-picture',function()
	{
		var username = $(this).data('username');
		var user_img = $(this).data('user_img');
		var image	 = $(this).data('image');
		var caption	 = $(this).data('caption');
		
		$('#ec-modal-user-img').removeAttr('src');
		$('#ec-modal-image').removeAttr('src');
		
		$('#ec-modal-username').html(username);
		$('#ec-modal-user-img').attr('src',user_img);
		$('#ec-modal-image').attr('src',image);
		$('#ec-modal-caption').html(caption);
	});
	$pagination.click(function(e)
	{
		page = page + 1;

		var $page = $(this);
		$page.hide();
		$.post(urlPagination,{event_id:eventId,page:page},function(d)
		{
			console.log(d.length);
			if(d.length !== 0)
			{
				$('#ec-instagram-canvas').append(d);
				$page.show();
			}
		});
		e.preventDefault();
	});
});
</script>
