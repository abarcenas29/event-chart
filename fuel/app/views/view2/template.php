<!DOCtype html>
<html>
<head>
<title></title>
<?php 
    print $head;
    print Asset::css('chart2/chart2.css');
?>
</head>
<body>
<!-- NAV Links -->
<article class="uk-width-1-1" id="ec-chart-navbar">
	<nav class="uk-navbar">
        <a href="<?php print Uri::create('/chart2') ?>" 
           class="uk-navbar-brand uk-margin-left">
	<img src="<?php print Uri::create('assets/img/ec-logo.svg'); ?>"/>
	</a>
		
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

<?php print $content; ?>

</body>
</html>