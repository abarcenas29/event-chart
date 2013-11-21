<article class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center
				uk-margin-top">
	
<header class="uk-width-medium-1-1 uk-margin-bottom">
<div class="uk-panel">
<section class="uk-panel-header">
<h1 class="uk-panel-title">
	Social Photos (<?php print $title; ?>)
</h1>
</section>
<section>
	This page shows a collection of photos taken from different social media accounts.
	(For this release, only instagram photos are working right now).
</section>
</div>
</header>
<nav class="uk-navbar">
<ul class="uk-navbar-nav">
	<li>
	<a href="#" id="ec-instagram-tab">
	<i class="uk-icon-instagram"></i>
	 Instagram
	</a>
	</li>
	<li>
	<a href="#" id="ec-twitter-tab">
	<i class="uk-icon-twitter"></i>
	 Twitter
	</a>
	</li>
</ul>
</nav>
<section id="ec-social-content">
	
</section>
	
<section id="ec-social-loader" style="display:none;">
	<div class="uk-width-3-10 uk-container-center uk-margin-top">
		Collating Images. This may take a while ... 
		<i class="uk-icon-spinner uk-icon-spin"></i>
	</div>
</section>
	
</article>
<script>
var eventId			= "<?php print $event_id; ?>";
var $socialLoader	= $('#ec-social-loader');
var $socialContent	= $('#ec-social-content');
var urlInstagram	= "<?php print Uri::create('ajax/view/instagram'); ?>";
var urlTwitter		= "<?php print Uri::create('ajax/view/twitter');?>";
$(document).ready(function(){
	$('#ec-instagram-tab').click(function(e)
	{
		$socialLoader.show();
		$socialContent.empty();
		$.post(urlInstagram,{event_id:eventId},function(d)
		{
			$socialLoader.hide();
			$socialContent.html(d);
		});
		e.preventDefault()
	});
	
	$('#ec-twitter-tab').click(function(e)
	{
		$socialLoader.show();
		$socialContent.empty();
		$.post(urlTwitter,{event_id:eventId},function(d)
		{
			$socialLoader.hide();
			$socialContent.html(d);
		});
		e.preventDefault();
	});
});
</script>