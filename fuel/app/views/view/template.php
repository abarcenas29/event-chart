<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width,initial-scale=1"/>

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
	print Asset::css('view.event.css');
	
	print Asset::js('jquery-2.0.3.min.js');
	print Asset::js('uikit.min.js');
?>

</head>
<body>
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
	
<?php print $content; ?>

<article id="ec-view-offcanvas" class="uk-offcanvas">

<section class="uk-offcanvas-bar">
	<?php print $menu; ?>
</section>

</article>
	
</body>
</html>
