<!DOCtype html>
<html>
<head>
<title>Deremoe Events Chart</title>
<?php print $head; ?>
<?php print Asset::css('chart2/chart2.css');?>

<?php print Asset::js('uikit/datepicker.js');?>
<?php print Asset::css('datepicker.min.css');?>

<?php print Asset::js('jquery.cookie.js');?>
<?php print Asset::css('animate.css');?>
</head>
<body class="uk-width-1-1">
	
<!-- NAV -->
<article class="uk-width-1-1" id="ec-chart-navbar">
	<nav class="uk-navbar">
	<a href="#" class="uk-navbar-brand uk-margin-left">
		<img src="<?php print Uri::create('assets/img/ec-logo.svg'); ?>"/>
	</a>
	<ul class="uk-navbar-nav uk-hidden-large">
		<li class="uk-parent" data-uk-dropdown>
			<a href="#">Filter <i class="uk-icon-caret-down"></i></a>
			<div class="uk-dropdown uk-dropdown-navbar">
			<ul class="uk-nav uk-nav-navbar">
			
			<li>
			<a href="#ec-filter-menu" data-uk-modal>
				<i class="uk-icon-filter"></i>
				Event Category
			</a>
			</li>
			
			<li>
			<a href="#ec-filter-region" data-uk-modal>
				<i class="uk-icon-filter"></i>
				Region
			</a>
			</li>
			
			<li>
			<a href="#ec-filter-date" data-uk-modal>
				<i class="uk-icon-calendar"></i>
				Date
			</a>
			</li>
			
			<li>
			<a href="#ec-filter-price" data-uk-modal>
				<i class="uk-icon-filter"></i>
				Price
			</a>
			</li>
			
			</ul>
			</div>
		</li>
	</ul>
	<ul class="uk-navbar-nav uk-visible-large">
	<li>
		<a href="#ec-filter-menu" data-uk-modal>
		<i class="uk-icon-filter"></i>
		Event Category
		</a>
	</li>
	
	<li>
		<a href="#ec-filter-region" data-uk-modal>
		<i class="uk-icon-filter"></i>
		Region
		</a>
	</li>
	
	<li>
		<a href="#ec-filter-date" data-uk-modal>
		<i class="uk-icon-calendar"></i>
		Date
		</a>
	</li>
	
	<li>
		<a href="#ec-filter-price" data-uk-modal>
		<i class="uk-icon-filter"></i>
		Price
		</a>
	</li>
	
	</ul>
		
	<div class="uk-navbar-flip">
	<div class="uk-navbar-content">
	<form class="uk-form uk-margin-remove uk-display-inline-block">
		<input type="text" value="" placeholder="Search"/>
		<button class="uk-button uk-button-primary">
			<i class="uk-icon-search"></i>
		</button>
	</form>
	</div>
	<ul class="uk-navbar-nav uk-hidden-large">
		<li class="uk-parent" data-uk-dropdown>
			<a href="#"><i class="uk-icon-bars"></i></a>
			<div class="uk-dropdown uk-dropdown-navbar">
			<ul class="uk-nav uk-nav-navbar">
			
			<li>
			<a href="#">
				Archive
			</a>
			</li>
			
			<li>
			<a href="#">
				About
			</a>
			</li>
			
			<li>
			<a href="#">
				Contact
			</a>
			</li>
			
			</ul>
			</div>
		</li>
	</ul>
	<ul class="uk-navbar-nav uk-visible-large">
		<li><a href="#">Archive</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
	</div>
	</nav>
</article>
<!-- MODAL -->
<?php 
	print $category;
	print $region;
	print $date;
	print $price;
?>

<?php print $content; ?>
</body>
</html>