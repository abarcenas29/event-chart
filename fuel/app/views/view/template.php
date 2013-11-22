<!DOCtype html>
<html class="uk-height-1-1">
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width,initial-scale=1"/>

<title>Event Charts Deremoe - <?php print $title; ?></title>

<meta name="description" 
	  content="<?php print $desc; ?>">
<meta name="author" 
	  content="<?php print $org;?>">
<meta name="keywords" 
	  content="event, organization, otaku, anime, <?php print $title ?>">
<meta name="robots" 
	  content="index, follow">
<meta name="copyright" 
	  content="<?php print $org;?>">

<link rel="shortcut icon" 
	  type="image/x-icon" 
	  href="">

<?php 
	print Asset::css('uikit.min.css');
	print Asset::css('fonts.css');
	print Asset::css('view.event.css');
	
	print Asset::js('jquery-2.0.3.min.js');
	print Asset::js('uikit.min.js');
?>

</head>
<body class="uk-height-1-1">
<div id="wrap">
<nav class="uk-navbar" id="ec-main-event-bar">
<a href="<?php print Uri::base(); ?>" 
   class="uk-navbar-brand">
Event <span>Chart</span>
</a>
<ul class="uk-navbar-nav">
<li><a href="#">Deremoe</a></li>
<li><a href="#">Techrant</a></li>
</ul>
	
<div class="uk-navbar-flip">
<ul class="uk-navbar-nav">
	<li>
	<a href="#ec-view-offcanvas"
	   data-uk-offcanvas>
		<i class="uk-icon-reorder"></i>
	</a>
	</li>
</ul>
</div>
</nav>
	
<div id="main">
<?php print $content; ?>
</div>
	
<article id="ec-view-offcanvas" class="uk-offcanvas">

<section class="uk-offcanvas-bar">
	<?php print $menu; ?>
</section>

</article>
</div>
	
<footer id="ec-main-footer" class="uk-width-1-1">
<section class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center">
<div class="uk-grid" data-uk-grid-match>
<!-- Footer Title -->
<div class="uk-width-large-4-10
			uk-width-medium-6-10
			uk-vertical-align"
	 style="height:20em;">

<div class="uk-vertical-align-middle ec-footer-title">
	<h1><a href="<?php print Uri::base(); ?>">
		Event <span>Charts</span>
	</a></h1>
	<p>Event Charts is a Deremoe service that aims to collate 
		all the events in the country. 
		We serve to deliver all events, so that You can have more choices.</p>
</div>

</div>
<!-- Footer Details -->
<div class="uk-width-large-6-10
			uk-width-medium-1-1
			uk-vertical-align"
	 style="height:20em;">
<div class="uk-vertical-align-middle 
			ec-footer-detail 
			uk-width-1-1">
<div class="uk-grid">
	
<div class="uk-width-1-2 ec-network">
	<h2 class="uk-margin-remove">
		Beyond Objective Network
	</h2>
	<ul class="uk-list uk-list-line">
	<li><a href="http://deremoe.com">
			Deremoe
		</a>
	</li>
	<li><a href="http://techrant.beyondobjective.com">
			TechRant
		</a>
	</li>
	</ul>
	
	<h2 class="uk-margin-remove">
		Supported Sites
	</h2>
	<ul class="uk-list uk-list-line">
	<li><a href="http://animephproject.wordpress.com">
			AnimePH Project
		</a>
	</li>
	</ul>
</div>
	
<div class="uk-width-1-2 uk-margin-bottom">
	<h2>Social</h2>
	<div class="uk-width-1-1">
	<a href="http://twitter.com/event.deremoe"
	   target="_new"
	   class="uk-button 
			  ec-twitter 
			  ec-social">
		<i class="uk-icon-twitter"></i>
	</a>
	
	<a href="http://facebook.com/event.deremoe"
	   target="_new"
	   class="uk-button 
			  ec-facebook 
			  ec-social">
		<i class="uk-icon-facebook"></i>
	</a>
	<p class="ec-copyright">&COPY; <?php print date('Y') ?> | Created by Aldrich Allen Barcenas. 
		All media contents placed in this site are the property of their 
		respected owners.</p>
</div>
</div>
	
</div>
</div>
	
</div>
</section>
</footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45950930-1', 'deremoe.com');
  ga('send', 'pageview');

</script>
</body>
</html>
