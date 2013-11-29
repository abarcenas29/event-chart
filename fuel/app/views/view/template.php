<!DOCtype html>
<html class="uk-height-1-1">
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width,initial-scale=1"/>

<title><?php print $title; ?> - Deremoe Events Chart</title>

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

<meta property="og:title" 
	  content="<?php print $title; ?>"/>
<meta property="og:site_name" 
	  content="Event Charts Deremoe - <?php print $title; ?>"/>
<meta property="og:description" 
	  content="<?php print $desc; ?>"/>


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
<span>Events</span> Chart
</a>
<ul class="uk-navbar-nav">
<li>
	<a href="http://deremoe.com" 
	   target="_new">Deremoe</a>
</li>
<li>
	<a href="http://techrant.beyondobjective.com" 
	   target="_new">Tech Rant</a>
</li>
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
		<span>Events</span> Chart
	</a></h1>
	<p>Events Chart is a Deremoe service that aims to gather all the events in the country. 
		We serve to deliver all events, so that You can have more choices.</p>
	<p>This service will take every effort to keep this information accurate 
		and up to date but there is no guarantee for correctness. All information is subject to 
		change without notice. All Rights to content belongs to their respective owners.</p>
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
		Beyond Objective
	</h2>
	<ul class="uk-list uk-list-line">
	<li><a href="http://deremoe.com"
		   target="_new">
			Deremoe
		</a>
	</li>
	<li><a href="http://techrant.beyondobjective.com"
		   target="_new">
			Tech Rant
		</a>
	</li>
	</ul>
	
	<h2 class="uk-margin-remove">
		Supported Sites
	</h2>
	<ul class="uk-list uk-list-line">
	<li><a href="http://animephproject.wordpress.com"
		   target="_new">
			AnimePH Project
		</a>
	</li>
	<li><a href="https://www.facebook.com/OtakuEvent/events"
		   target="_new">
			Otaku Events
		</a>
	</li>
	</ul>
</div>
	
<div class="uk-width-1-2 uk-margin-bottom">
	<h2>Social</h2>
	<div class="uk-width-1-1">
	<a href="http://twitter.com/team_deremoe"
	   target="_new"
	   class="uk-button 
			  ec-twitter 
			  ec-social">
		<i class="uk-icon-twitter"></i>
	</a>
	
	<a href="http://facebook.com/deremoe"
	   target="_new"
	   class="uk-button 
			  ec-facebook 
			  ec-social">
		<i class="uk-icon-facebook"></i>
	</a>
	<p class="ec-copyright">
		&COPY; <?php print date('Y') ?> | Created by Aldrich Allen Barcenas and Team Deremoe.</p>
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
