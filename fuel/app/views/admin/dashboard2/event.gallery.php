<?php 
    print Asset::css('ec-admin/admin.dashboard.event.gallery.css');
    print Asset::js('jquery.form.min.js');
?>
<article class="uk-width-1-1 uk-margin-top" id="ec-event-gallery-manage">
<div class="uk-grid">
	<section class="uk-width-1-2">
		
	<!-- Gallery -->
	<article class="uk-panel 
					uk-panel-box 
					uk-panel-header
					ec-one-img"
			 style="height:93%;"
			 id="ec-main-gallery">
	<header class="uk-panel-title">
		Poster Images
		
		<div class="uk-float-right">
		<a href="#ec-url-modal"
		   data-uk-modal
		   data-url="<?php print Uri::create('ajax/admin/event/insert_poster_url'); ?>"
		   class="uk-button">
			<i class="uk-icon-link"></i>   
		</a>
		<a href="<?php print Uri::create('ajax/admin/event/insert_poster'); ?>"
		   class="uk-button
				  ec-gallery-upload">
			<i class="uk-icon-upload"></i>
		</a>
		</div>
	</header>
	<section class="uk-grid uk-panel"
			 data-url="<?php print Uri::create('api/admin/event/del_poster.json'); ?>">
		
	<?php foreach($q['poster'] as $row): ?>
	<div class="ec-gallery uk-width-1-4 uk-margin-bottom">
		<a href="#"
		   data-id="<?php print $row['id']; ?>"
		   class="uk-button 
				  uk-button-danger
				  uk-button-mini
				  ec-delete-poster">
			<i class="uk-icon-minus"></i>
		</a>
		<img src="<?php print Uri::create('uploads/'.
									$row['photo']['date'].'/thumb-'.
									$row['photo']['filename']); ?>"/>
	</div>
	<?php endforeach;?>
	
	</section>
	</article>
		
	</section>
	
	<section class="uk-width-1-2">
		
	<!-- Main Poster Picture -->
	<article class="uk-panel
					uk-panel-box
					uk-panel-header
					ec-one-img"
			 id="ec-main-poster"
			 style="height:33%">
	<header class="uk-panel-title">
		Main Event Poster Image
		
		<div class="uk-float-right">
		<a href="#ec-url-modal"
		   data-uk-modal
		   data-url="<?php print Uri::create('ajax/admin/event/insert_main_img_url'); ?>"
		   class="uk-button">
			<i class="uk-icon-link"></i>   
		</a>
		<a href="<?php print Uri::create('ajax/admin/event/insert_main_poster'); ?>"
		   class="uk-button
				  ec-poster-upload">
			<i class="uk-icon-upload"></i>	  
		</a>
		</div>
	</header>
	<section class="uk-text-center"
			 data-url="<?php print Uri::create('api/admin/event/del_main_img.json'); ?>">
		<?php if(!is_null($q['photo_id'])): ?>
		<div class="uk-thumbnail ec-thumbnail">
		<a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-thumbnail-delete">
			<i class="uk-icon-minus"></i>
		</a>
		<img src="<?php print Uri::create('uploads/'.
										  $q['photo']['date'].'/thumb-'.
										  $q['photo']['filename']); ?>"/>
		</div>
		<?php endif;?>
	</section>
	</article>
	
	<!-- Main Poster Picture -->
	<article class="uk-panel
					uk-panel-box
					uk-panel-header
					ec-one-img"
			 id="ec-main-cover"
			 style="height:32.5%"
			 ondragover="return false">
	<header class="uk-panel-title">
		Cover Image
		
		<div class="uk-float-right">
		<a href="#ec-url-modal"
		   data-uk-modal
		   data-url="<?php print Uri::create('ajax/admin/event/insert_main_cover_url'); ?>"
		   class="uk-button">
			<i class="uk-icon-link"></i>   
		</a>
		<a href="<?php print Uri::create('ajax/admin/event/insert_main_cover'); ?>"
		   class="uk-button
				  ec-poster-upload">
			<i class="uk-icon-upload"></i>	  
		</a>
		</div>
	</header>
	<section class="uk-text-center"
			 data-url="<?php print Uri::create('api/admin/event/del_cover_img.json'); ?>">
		<?php if(!is_null($q['cover_id'])): ?>
		<div class="uk-thumbnail ec-thumbnail">
		<a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-thumbnail-delete">
			<i class="uk-icon-minus"></i>
		</a>
		<img src="<?php print Uri::create('uploads/'.
										  $q['cover']['date'].'/thumb-'.
										  $q['cover']['filename']); ?>"/>
		</div>
		<?php endif;?>
	</section>
	</article>
	
	</section>
</div>
</article>

<!-- Upload via Url -->
<article class="uk-modal" id="ec-url-modal">
<section class="uk-modal-dialog">
	<div class="uk-panel uk-panel-header">
	<div class="uk-panel-title">
		Save Image via URL
	</div>
	<form action="#"
		  method="post"
		  class="uk-form uk-form-horizontal"
		  data-id="#"
		  id="ec-form-url">
		
	<div class="uk-form-row">
	<label class="uk-form-label">
		Image Url
	</label>
	<div class="uk-form-controls">
		<input type="url" name="url" class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<div class="uk-float-right">
		<button type="submit" 
				class="uk-button uk-button-success">
			<i class="uk-icon-save"></i>
			Save
		</button>
	</div>
	</div>
	</form>
	</div>
</section>	
</article>

<script>
var urlMainImage   = "<?php print Uri::create('ajax/admin/gallery/one_gallery'); ?>";
var urlPosterImage = "<?php print Uri::create('ajax/admin/gallery/poster_gallery'); ?>";
var data = [];
$(document).ready(function()
{
	$('a[href="#ec-url-modal"]').click(function(e)
	{
		var url		= $(this).data('url');
		var id		= $(this).parent().parent().parent().attr('id');
		
		$('#ec-url-modal').find('form').attr('action',url);
		$('#ec-url-modal').find('form').attr('data-id',id);
	});
	
	$('.ec-one-img').bind('dragover',function(e)
	{
		var id  = $(this).attr('id');
		var $id = $('#'+id);
		$id.css('box-shadow','1px 1px 30px 0px rgba(171, 31, 43, 0.78)');
		
		e.stopPropagation();
		e.preventDefault();
	});
	
	$('.ec-one-img').bind('dragleave',function(e)
	{
		var id  = $(this).attr('id');
		var $id = $('#'+id);
		$id.css('box-shadow','none');
		
		e.stopPropagation();
		e.preventDefault();
	});
	
	$('#ec-form-url').ajaxForm({
		beforeSubmit:function(arr)
		{
			$.UIkit.notify('Fetching Image ...',{status:'info'});
		},
		success:function(d)
		{
			var id  = $('#ec-form-url').data('id');
			var $id = $('#'+id);
			console.log(id);
			
			if(id === 'ec-main-gallery')
			{
				$id.find('section').append(d);
			}
			else
			{
				$id.find('section').html(d);
			}
			
			$.UIkit.notify('Image Fetching Complete ...',{status:'success'});
		}
	});
});
</script>
<?php 
	print Asset::js('dashboard/jq.event.gallery.main.js');
	print Asset::js('dashboard/jq.event.gallery.cover.js');
	print Asset::js('dashboard/jq.event.gallery.poster.js');
?>