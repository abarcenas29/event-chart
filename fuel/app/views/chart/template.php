<!DOCtype html>
<html class="uk-height-1-1">
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title>Deremoe Events Chart</title>

<meta name="description" 
	  content="A chart of Otaku-related events happending or has happened around the Philippines.">
<meta name="author" 
	  content="Team Deremoe">
<meta name="keywords" 
	  content="Events,Organizations,Anime,Cosplay,Otaku">
<meta name="robots" 
	  content="index, follow">
<meta name="copyright" 
	  content="Team Deremoe">


<link rel="shortcut icon" 
	  type="image/x-icon" 
	  href="<?php print Uri::create('assets/img/favicon.ico'); ?>">

<?php 
	print Asset::css('uikit.min.css');
	print Asset::css('fonts.css');
	print Asset::css('kore.css');
	print Asset::css('chart.index.css');
	
	print Asset::js('jquery-2.0.3.min.js');
	print Asset::js('uikit.min.js');
?>
</head>
<body>
<div id="wrap">
<header class="uk-width-1-1" style="background-color:#252525;" id="ec-main-header">
<section class="uk-grid" data-uk-grid-match>
<div class="uk-width-large-4-10
			uk-width-medium-1-1 
			uk-margin-bottom" 
			id="ec-header-title">
	<a href="<?php print Uri::base(); ?>">
	<h1 class="uk-margin-left">
		<img src="<?php print Uri::create('assets/img/logo.png') ?>" width="50px"/>
		<span>Events</span> Chart</h1>
	</a>
</div>
</section>
	
<nav class="uk-navbar" id="ec-chart-nav">
<div class="uk-navbar-flip">
	<ul class="uk-navbar-nav">
	<li class="uk-hidden-small"><a href="<?php print Uri::create('chart/archive') ?>">
		<i class="uk-icon-archive"></i>
			Archive</a></li>
	<li class="uk-hidden-small"><a href="http://deremoe.com/?page_id=17583" target="_new">
		<i class="uk-icon-info-sign"></i>
			About</a></li>
	<li class="uk-hidden-small"><a href="#ec-contact-modal" data-uk-modal>
		<i class="uk-icon-phone"></i>
			Contact</a></li>
	<li class="uk-visible-small">
		<a href="#ec-off-canvas" data-uk-offcanvas>
			<i class="uk-icon-reorder"></i>
		</a>
	</li>
	</ul>
</div>
</nav>
</header>
<div id="main">
<?php print $content; ?>
</div>
</div>
<!-- Off-canvas Menu -->
<article id="ec-off-canvas" class="uk-offcanvas">
<div class="uk-offcanvas-bar">
<ul class="uk-nav uk-nav-offcanvas">
	<li class="uk-nav-header">Main Menu</li>
	
	<li>
	<a href="<?php print Uri::create('chart/archive') ?>">
		<i class="uk-icon-archive"></i>
		Archive
	</a>
	</li>
	
	<li>
	<a href="#">
		<i class="uk-icon-info-sign"></i>
		About
	</a>
	</li>
	
	<li>
	<a href="#ec-contact-modal" data-uk-modal>
		<i class="uk-icon-archive"></i>
		Contact
	</a>
	</li>
</ul>
</div>
</article>

<!-- Contact Modal -->
<article id="ec-contact-modal" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-slide">
	<h2>
		<i class="uk-icon-phone"></i>
		 Contact Information
	</h2>
</div>
<div class="uk-modal-dialog uk-modal-dialog-slide">
<div class="uk-width-1-1">
If you have any inquiries with regards to the 
information indicated in the service. Or would like 
to have your event posted in our site. You can use
the contact information provided.
</div>
<section class="uk-grid">
<div class="uk-width-1-2">
	
<div class="ec-contact-info 
			uk-margin-top">
<p>Aldrich Allen Barcenas</p>
<p>Technical (Beyond Objective)</p>
<p><i class="uk-icon-envelope"></i> aldrich.barcenas@gmail.com</p>
</div>
	
</div>
<div class="uk-width-1-2">

<div class="ec-contact-info 
			uk-margin-top">
<p>Jay Paul Agonoy</p>
<p>Event Relations (Beyond Objective)</p>
<p><i class="uk-icon-envelope"></i> events@deremoe.com</p>
</div>
	
</div>
</section>
</div>
</article>

<footer id="ec-main-footer" 
		class="uk-width-1-1 uk-text-center uk-margin-bottom">
	<section class="uk-width-7-10 uk-container-center">
		&copy; <?php print date('Y'); ?> | 
		A <a href="http://deremoe.com" target="_new">Deremoe</a> Service in partnership of
		<a href="http://animephproject.wordpress.com" target="_new">AnimePH Project</a> and
		<a href="https://www.facebook.com/OtakuEvent/events" target="_new">Otaku Events</a>.
		This service will take every effort to keep this information accurate 
		and up to date but there is no guarantee for correctness. All information is subject to 
		change without notice. All Rights to content belongs to their respective owners.
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
