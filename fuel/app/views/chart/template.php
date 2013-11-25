<!DOCtype html>
<html class="uk-height-1-1">
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title>Event Charts -A Deremoe service: All Events Belong To Everyone!</title>

<meta name="description" 
	  content="A Chart of Events Happending or has Happened around the Philippines.">
<meta name="author" 
	  content="Aldrich Allen Barcenas">
<meta name="keywords" 
	  content="Events,Organizations,Anime,Cosplay,Otaku">
<meta name="robots" 
	  content="index, follow">
<meta name="copyright" 
	  content="Aldrich Allen Barcenas">


<link rel="shortcut icon" 
	  type="image/x-icon" 
	  href="">

<?php 
	print Asset::css('uikit.min.css');
	print Asset::css('fonts.css');
	print Asset::css('chart.index.css');
	
	print Asset::js('jquery-2.0.3.min.js');
	print Asset::js('uikit.min.js');
?>
</head>
<body class="uk-height-1-1">
<div id="wrap">
<header class="uk-width-1-1" style="background-color:#252525;" id="ec-main-header">
<section class="uk-grid" data-uk-grid-match>
<div class="uk-width-large-4-10
			uk-width-medium-1-1 
			uk-margin-bottom" 
			id="ec-header-title">
	<a href="<?php print Uri::base(); ?>">
	<h1 class="uk-margin-left"><span>Event</span> Charts</h1>
	</a>
	<p class="uk-margin-left">A Deremoe Events Service</p>
</div>
<div class="uk-width-large-6-10 
			uk-hidden-small
			uk-vertical-align" style="padding-top:2px;">
	<div class="uk-vertical-align-middle">
	<!-- Google Ad Sense title -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- title ad bar -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:468px;height:60px"
		 data-ad-client="ca-pub-9145483045815058"
		 data-ad-slot="3434567127"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div>
</div>
</section>
	
<nav class="uk-navbar" id="ec-chart-nav">
<div class="uk-navbar-flip">
	<ul class="uk-navbar-nav">
	<li><a href="<?php print Uri::create('chart/archive') ?>">
		<i class="uk-icon-archive"></i>
			Archive</a></li>
	<li><a href="#">
		<i class="uk-icon-info-sign"></i>
			About</a></li>
	<li><a href="#">
		<i class="uk-icon-phone"></i>
			Contact</a></li>
	</ul>
</div>
</nav>
</header>
<div id="main">
<?php print $content; ?>
</div>
</div>

<footer id="ec-main-footer" 
		class="uk-width-1-1 uk-text-center">
	<section class="uk-width-7-10 uk-container-center">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- chart bottom title -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:728px;height:90px"
			 data-ad-client="ca-pub-9145483045815058"
			 data-ad-slot="7445964323"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</section> 
	<section class="uk-width-7-10 uk-container-center">
		&copy; Events Chart <?php print date('Y'); ?> | 
		Deremoe Service Created by Aldrich Allen Barcenas.
		All Rights to content belongs to their respective owners.
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
