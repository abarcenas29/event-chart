<!-- JQuery Leaflet -->
<?php print \Fuel\Core\Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');?>
<?php print \Fuel\Core\Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');?>
<?php print Asset::js('jquery.form.min.js');?>
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

<!-- Image Poster -->
<section class="uk-width-large-3-10
				uk-width-medium-1-1">
<a href="#ec-poster-modal"
   data-uk-modal
   data-image="<?php print Uri::create('uploads/'.$q['photo']['date'].'/'.$q['photo']['filename']); ?>"
   class="ec-poster-link">
<img src="<?php print Uri::create('uploads/'.$q['photo']['date'].'/flow-'.$q['photo']['filename']); ?>"
	 class="uk-width-1-1"/>
</a>

<div class="uk-width-1-1 uk-margin-top">
<?php foreach($q['category'] as $row): ?>
<a href="<?php print Uri::create('chart/category/'.$row['category']); ?>" 
   class="uk-button uk-button-primary uk-margin-bottom">
	<i class="uk-icon-tag"></i>
	<?php print $row['category']; ?>
</a>
<?php endforeach;?>
</div>
	
<div class="uk-width-1-1 uk-margin-top">
	<dl class="uk-description-list uk-description-list-line">
		<dt class="uk-text-center">
		<span class="uk-text-bold">Organization:</span>
		</dt>
		<dd class="uk-text-center">
		<a href="<?php print Uri::create('view/org/'.$q['organization']['id']); ?>">
		<?php print $q['organization']['name']; ?>
		</a>
		</dd>
	</dl>
</div>
	
<?php if(count($q['sub_org']) > 0): ?>
<div class="uk-width-1-1 uk-margin-top">
	<div class="uk-text-center">
	<h4 class="uk-text-bold">With Participating Organizations:</h4>
	</div>
	<div class="uk-margin-top uk-text-center">
	<ul style="padding:0em;">
	<?php foreach($q['sub_org'] as $row):  ?>
	<li style="list-style-type:none;">
	<a href="<?php print Uri::create('view/org/'.$row['org_id']); ?>"
	   class="uk-margin-bottom">
		   <?php print $row['org']['name'] ?>
	</a>
	</li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
<?php endif; ?>
	
<div class="uk-width-1-1 uk-margin-top uk-text-center">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- event view sidebar -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:250px;height:250px"
		 data-ad-client="ca-pub-9145483045815058"
		 data-ad-slot="8922697521"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>
	
<div class="uk-width-1-1 uk-margin-top">
	<div class="uk-panel">
	<div class="uk-panel-header">
	<h4 class="uk-panel-title">
		<i class="uk-icon-heart"></i>
		Share Event 
	</h4>
	</div>
	<div class="uk-width-1-1 uk-text-center uk-visible-large">
	<ul style="display:inline">
	<?php foreach($q['hashtags'] as $row): ?>
		<li style="list-style-type:none;" class="uk-text-bold">
			<?php print '#'.$row['hashtag']; ?>
		</li>
	<?php endforeach;?>
	</ul>
	</div>
	<div class="uk-width-1-1 uk-text-center uk-visible-large">
		<div class="uk-thumbnail">
		<img src="<?php print $qr->image_url ?>"/>
		</div>
	</div>
	<div class="uk-width-1-1 uk-margin-top uk-text-center">
	<a href="#ec-share-twitter"
	   data-uk-modal
	   class="uk-button ec-twitter" 
	   style="width:35px">
	<i class="uk-icon-twitter"></i>
	</a>
	<a href="#ec-share-facebook"
	   data-uk-modal
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

<!-- Event Details -->
<section class="uk-width-large-7-10
				uk-width-medium-1-1">

<article class="uk-panel">
<section class="uk-panel-header uk-visible-large">
	<h1 class="uk-panel-title">
		<?php print $q['name']; ?>
	</h1>
</section>
</article>
	
<article class="uk-panel uk-margin-top">
<section id="ec-view-map" style="height:250px;">
</section>
<section class="uk-width-1-1 uk-text-center uk-margin-top">
	<a class="uk-button"
	   target="_new"
	   href="<?php print Uri::create('http://maps.google.com/?ll='.$q['lat'].','.$q['long']); ?>">
	<i class="uk-icon-map-marker"></i>
		 Redirect to Google Map
	</a>
</section>
</article>

<article class="uk-panel ec-view-content">
<header class="uk-panel-header">
	<h2 class="uk-panel-title">Description</h2>
</header>
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
	
<article class="uk-panel ec-view-content uk-text-center">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- title ad bar -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:468px;height:60px"
		 data-ad-client="ca-pub-9145483045815058"
		 data-ad-slot="3434567127"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</article>
	
<!-- Ticket Prices and Guest List -->
<div class="uk-width-1-1 uk-margin-top">
<section class="uk-grid">
	
<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Ticket Prices</h2>
	</header>
	<section>
	<table class="uk-width-1-1">
<?php foreach($q['ticket'] as $row): ?>
	<tr>
	<td>Php <?php print $row['price']; ?></td>
	<td><?php print $row['note']; ?></td>
	</tr>
<?php endforeach;?>
	</table>

	</section>
	</article>
</div>
	
	<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Guests</h2>
	</header>
	<section>
	<table class="uk-width-1-1">
<?php foreach($q['guest'] as $row): ?>
	<tr>
	<td><?php print $row['name']; ?></td>
	<td><?php print $row['type']; ?></td>
	</tr>
<?php endforeach;?>
	</table>
	</section>
	</article>
	</div>
</section>
</div>
	
<!-- Posters -->
<div class="uk-width-1-1 uk-margin-top">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Posters</h2>
	</header>
	<section class="uk-text-center">
	<?php foreach($q['poster'] as $row): ?>
	<a href="#ec-poster-modal"
	   data-uk-modal
	   data-image="<?php print Uri::create('uploads/'.$row['photo']['date'].'/flow-'.$row['photo']['filename']); ?>"
	   class="ec-poster-link">
	<img class="uk-thumbnail"
		 src="<?php print Uri::create('uploads/'.$row['photo']['date'].'/thumb-'.$row['photo']['filename']); ?>">
	<?php endforeach;?>
	</a>
	</section>
	</article>
</div>

</section>
</article>
	
</section>
</article>

<!-- Modal Frameless Poster -->
<article id="ec-poster-modal" class="uk-modal">
	<section class="uk-modal-dialog 
					uk-modal-dialog-frameless">
	<img src="" id="ec-modal-image"/>
	</section>
</article>

<!-- Modal Twitter Share -->
<article id="ec-share-twitter" class="uk-modal">
<div class="uk-modal-dialog
			uk-modal-dialog-slide">
<div class="uk-panel">
<header class="uk-panel-title">
<h2 class="uk-panel-header">
	Tweet This
	<span class="ec-share-modal-header" style="display:none;">
		(Tweet Sent!)
	</span>
</h2>
</header>
<?php if(!Twitter\Twitter::logged_in()): ?>
<section class="uk-width-1-1
				uk-text-center">
	<a href="<?php print Uri::create('redirect/twitter'); ?>"
	   class="uk-button ec-twitter">
	<i class="uk-icon-twitter"></i>
	Log-in with Twitter
	</a>
</section>
<?php else:?>
<form action="<?php print Uri::create('api/share/twitter.json') ?>"
	  id="ec-form-share-twitter"
	  method="POST"
<section class="uk-width-1-1 uk-grid">
<div class="uk-width-3-10 uk-text-center">
<div class="uk-thumbnail">
	<img src="<?php print Session::get('twitter_avatar'); ?>"/>
	<div class="uk-thumbnail-caption">
	<?php print Session::get('twitter_access_token')['screen_name']; ?>
	</div>
</div>
</div>
<div class="uk-width-7-10">
	<textarea
		name="content"
		rows="3"
		class="uk-width-1-1">Check this out! <?php print $q['name'] . ' '. $url ?></textarea>
<div class="uk-width-1-1 uk-float-right uk-margin-top">
	<button
		type="submit"
		class="uk-button
			   uk-button-primary">
	<i class="uk-icon-twitter"></i>
	Tweet
	</button>
</div>
</div>
</section>
</form>
<?php endif;?>
</div>
</div>
</article>

<!-- Modal Facebook Share -->
<article id="ec-share-facebook" class="uk-modal">
<div class="uk-modal-dialog
			uk-modal-dialog-slide">
<div class="uk-panel">
<header class="uk-panel-title">
<h2 class="uk-panel-header">
	Share on Facebook
	<span class="ec-share-modal-header" style="display:none;">
		(Done!)
	</span>
</h2>
</header>
<?php if(!$fb_user): ?>
<section class="uk-width-1-1
				uk-text-center">
	<a href="<?php print Uri::create('redirect/facebook'); ?>"
	   class="uk-button ec-facebook">
	<i class="uk-icon-facebook-sign"></i>
	Log-in with Facebook
	</a>
</section>
<?php else:?>
<form action="<?php print Uri::create('api/share/facebook.json') ?>"
	  id="ec-form-share-facebook"
	  method="POST"
<section class="uk-width-1-1 uk-grid">
<div class="uk-width-3-10 uk-text-center">
<div class="uk-thumbnail">
	<img 
		width="100px"
		src="<?php print 'http://graph.facebook.com/'.Session::get('fb_id').'/picture?type=large'; ?>"/>
	<div class="uk-thumbnail-caption">
	<?php print Session::get('fb_name'); ?>
	</div>
</div>
</div>
<div class="uk-width-7-10">
	<textarea
		name="fb-message"
		rows="5"
		class="uk-width-1-1">Check this out! <?php print $q['name'] ?></textarea>
	<input name="fb-url" type="hidden" value="<?php print $url; ?>"/>
<div class="uk-width-1-1 uk-float-right uk-margin-top">
	<button
		type="submit"
		class="uk-button
			   ec-facebook">
	<i class="uk-icon-facebook"></i>
	 Post to Facebook
	</button>
</div>
</div>
</section>
</form>
<?php endif;?>
</div>
</div>
</article>

<script>
var geoLocation = <?php print (!is_null($q['lat']))?'['.$q['lat'] .','.$q['long'].']':'[51.505, -0.09]';?>;
var osmTileMap  = 'http://{s}.tile.cloudmade.com/06bb239b50aa4ef1bfccec8bbc153c60/997/256/{z}/{x}/{y}.png';
var venue		= "<?php print $q['venue']?>";
var attribution = 'Event Chart Map Powered by Cloudmade OSM.'

var $tweetHeader = $('.ec-share-modal-header');
$(document).ready(function(){
	$('.ec-poster-link').click(function(){
		var image = $(this).data('image');
		$('#ec-modal-image').attr('src',image);
	});
	
	var map = L.map('ec-view-map').setView(geoLocation,13)
	L.tileLayer(osmTileMap,{attribution:attribution}).addTo(map);
	L.marker(geoLocation).addTo(map).bindPopup(venue).openPopup();

	$('#ec-form-share-twitter').ajaxForm(
	{
		success:function(d)
		{
			$tweetHeader.show();
			setTimeout(function(){$tweetHeader.hide()},2000);
			console.log(d);
		}
	});
	
	$('#ec-form-share-facebook').ajaxForm(
	{
		success:function(d)
		{
			$tweetHeader.show();
			setTimeout(function(){$tweetHeader.hide()},2000);
			console.log(d);
		}
	});
});
</script>