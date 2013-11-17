<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title></title>

<meta name="description" 
	  content="">
<meta name="author" 
	  content="">
<meta name="keywords" 
	  content="">
<meta name="robots" 
	  content="">

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
<body>
<header class="uk-width-1-1" style="background-color:#252525;" id="ec-main-header">
<section class="uk-grid">
<div class="uk-width-large-4-10
			uk-width-medium-1-1 
			uk-margin-bottom" 
			id="ec-header-title">
	<a href="<?php print Uri::base(); ?>">
	<h1 class="uk-margin-left"><span>Event</span> Charts</h1>
	</a>
	<p class="uk-margin-left">A Deremoe Events Service</p>
</div>
</section>
	
<nav class="uk-navbar" id="ec-chart-nav">
<div class="uk-navbar-flip">
	<ul class="uk-navbar-nav">
	<li><a href="<?php print Uri::create('chart/archive') ?>">
		<i class="uk-icon-list"></i>
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
<?php print $content; ?>
</body>
</html>
