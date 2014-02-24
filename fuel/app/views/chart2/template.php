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

<?php print Asset::css('modal.css'); ?>
<?php print Asset::js('jquery.modal.js');?>

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


<div id="ec-event-info" 
	 class="bo-modal bo-modal-open">
	<article class="bo-modal-dialog">
	<div class="uk-grid uk-width-1-1">
		<div class="uk-width-large-1-2
					uk-width-medium-1-1
					ec-event-info-image">
			
		<div>
		<div class="uk-eveint-info-social">
			<ul>
			<li><a href="#"
				   class="uk-button facebook">
				<i class="uk-icon-facebook"></i>
				</a></li>
				
			<li><a href="#"
				   class="uk-button twitter">
				<i class="uk-icon-twitter"></i>
				</a></li>
				
			<li><a href="#"
				   class="uk-button
						  uk-button-success">
				<i class="uk-icon-globe"></i>	  
				</a></li>
			</ul>
		</div>
			<img src="http://placehold.it/640x843"
			 class="uk-visible-large"
			 style="width:100%;"/>
			<img src="http://placehold.it/546x307"
				 class="uk-hidden-large"
				 style="width:100%;"/>
		</div>
		
		</div>
		<div class="uk-width-large-1-2
					uk-width-medium-1-1
					ec-event-info">
		<div class="uk-panel uk-panel-header uk-panel-box"
			 style="min-height:inherit;">
		<div class="uk-panel-title 
					ec-event-info-main-title">
			<p class="uk-text-truncate uk-margin-remove">
			Event Information
			</p>
			<div>
			<a href="#" class="uk-button uk-button-success">
				<i class="uk-icon-info-circle"></i>
			</a>
			</div>
		</div>
		<img src="http://staticmap.openstreetmap.de/staticmap.php?center=14.323332344997763,120.95918297767638&zoom=18&markers=14.323332344997763,120.95918297767638,ltblu-pushpin&size=546x168"
			 class="uk-width-1-1"/>
		
		<div class="uk-panel-title uk-margin-top">
			<i class="uk-icon-map-marker"></i>
			Venue Title
		</div>
		De La Salle University - Dasmarinas
		
		<div class="uk-panel-title uk-margin-top">
			<i class="uk-icon-tags"></i>
			Categories
		</div>
		<ul class="ec-category-list">
		
		<?php for($x = 0; $x < 5; $x++): ?>
		<li>
		<a href="#" 
		   class="uk-button 
				  uk-button-primary 
				  uk-margin-bottom">
		<i class="uk-icon-tag"></i>
			Category
		</a>
		</li>
		<?php endfor; ?>
		
		</ul>
		
		<div class="uk-panel-title 
					uk-margin-top">
			<i class="uk-icon-ticket"></i>
			Ticket Information
		</div>
		
		<ul class="ec-ticket-list">
		<li>
		<a href="#"
		   class="uk-button"
		   data-uk-tooltip
		   title="This is the ticket information">
		<i class="uk-icon-rub"></i>
		100.00
		</a>
		</li>
		</ul>
		
		</div>
		</div>
	</div>
	</article>
</div>


</body>
</html>