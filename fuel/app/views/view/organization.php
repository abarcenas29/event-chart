<article class="uk-width-1-1">
<section class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center
				uk-margin-top">
	
<article class="uk-grid">
<section class="uk-width-1-1
				uk-margin-bottom
				uk-hidden-large
				uk-text-center">
	<h1><?php print $q['name']; ?></h1>
</section>
	
<section class="uk-width-large-3-10
				uk-width-medium-1-1">
	<!-- Image Poster -->
	<div class="uk-width-1-1">
	<img src="<?php print Uri::create('uploads/'.$q['photo']['date'].'/flow-'.$q['photo']['filename']) ?>"
		 class="uk-width-1-1"/>
	</div>

	<div class="uk-width-1-1 
				uk-margin-top">
	<?php foreach($cat as $item): ?>
	<a href="<?php print Uri::create('chart/category/'.$item); ?>" class="uk-button uk-button-primary uk-margin-bottom">
		<i class="uk-icon-tag"></i>
		<?php print $item; ?>
	</a>
	<?php endforeach;?>
	</div>

	<div class="uk-width-1-1 uk-margin-top uk-margin-bottom">
		<div class="uk-panel">
		<div class="uk-panel-header">
		<h4 class="uk-panel-title">
			<i class="uk-icon-heart"></i>
			Share Organization 
		</h4>
		</div>
		<div class="uk-width-1-1 uk-text-center uk-visible-large">
			<div class="uk-thumbnail">
			<img src="<?php print $qr->image_url ?>"/>
			</div>
		</div>
		<div class="uk-width-1-1 uk-margin-top uk-text-center">
		<a href="" 
		   class="uk-button ec-twitter" 
		   style="width:35px">
		<i class="uk-icon-twitter"></i>
		</a>
		<a href="" 
		   class="uk-button ec-facebook uk-text-center" 
		   style="width:35px">
		<i class="uk-icon-facebook"></i>
		</a>
		<button
		   data-uk-tooltip
		   title="<?php print $q['email']; ?>"
		   class="uk-button uk-text-center" 
		   style="width:35px">
		<i class="uk-icon-envelope"></i>
		</button>
		</div>
		</div>
	</div>
</section>
	
<section class="uk-width-large-7-10
				uk-width-medium-1-1">
	
<article class="uk-panel">
<section class="uk-panel-header uk-visible-large">
	<h1 class="uk-panel-title">
		<?php print $q['name']; ?>
	</h1>
</section>
	
<section>
	<?php print $q['description']; ?>
</section>
	
<section class="uk-margin-top">
	<?php if(!empty($q['twitter'])): ?>
	<a href="<?php print Uri::create('http://twitter.com/'.$q['twitter']); ?>"
	   target="_new"
	   class="uk-button ec-twitter">
	<i class="uk-icon-twitter"></i>
	 Twitter
	</a>
	<?php endif;?>
	<?php if(!empty($q['facebook'])): ?>
	<a href="<?php print Uri::create('http://facebook.com/'.$q['facebook']); ?>"
	   target="_new"
	   class="uk-button ec-facebook">
	<i class="uk-icon-facebook"></i>
	 Facebook
	</a>
	<?php endif;?>
	<?php if(!empty($q['website'])): ?>
	<a href="<?php print Uri::create('http://'.$q['website']); ?>"
	   target="_new"
	   class="uk-button uk-button-success">
	<i class="uk-icon-globe"></i>
	 Website
	</a>
	<?php endif;?>
</section>
</article>
	
<div class="uk-width-1-1 
			uk-margin-top">
	<section class="uk-grid">
	
<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Statistics</h2>
	</header>
	<section>
	<dl class="uk-description-list">
		<dd>Average Ticket Price:</dd>
		<dt class="uk-text-right"><?php print $price; ?></dt>
		<dd>Most Common Guest:</dd>
		<dt class="uk-text-right">
		*Not Yet Implemented*
		</dt>
	</dl>
	</section>
	</article>
</div>
	
	<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Guest Lists</h2>
	</header>
	<section>
	<ul class="uk-list uk-list-line">
<?php foreach($guests as $row): ?>
	<li><?php print $row; ?></li>
<?php endforeach;?>
	</ul>
	</section>
	</article>
	</div>
</section>
</div>
	
<div class="uk-width-1-1 uk-margin-top">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Events</h2>
	</header>
	<section class="uk-text-center">
	<?php foreach($q['event_lists'] as $row): ?>
	<a href="<?php print Uri::create('view/event/'.$row['id']); ?>">
	<img class="uk-thumbnail"
		 src="<?php print Uri::create('uploads/'.$row['photo']['date'].'/thumb-'.$row['photo']['filename']); ?>">
	<?php endforeach;?>
	</a>
	</section>
	</article>
</div>
	
</section>
	
</section>
</article>
	
<!-- Modal Frameless Poster -->
<article id="ec-poster-modal" class="uk-modal">
	<section class="uk-modal-dialog 
					uk-modal-dialog-frameless">
	<img src="" id="ec-modal-image"/>
	</section>
</article>

<script>
$(document).ready(function(){
	$('.ec-poster-link').click(function(){
		var image = $(this).data('image');
		$('#ec-modal-image').attr('src',image);
	});
});
</script>