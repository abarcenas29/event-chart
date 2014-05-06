<!DOCtype html>
<html>
<head>
<title>Deremoe Events Chart</title>
<?php print $head; ?>
<?php print Asset::css('chart2/chart2.css');?>

<?php print Asset::js('uikit/datepicker.js');?>
<?php print Asset::js('jquery.form.min.js');?>

<?php print Asset::css('datepicker.min.css');?>

<?php print Asset::js('jquery.cookie.js');?>
<?php print Asset::css('animate.css');?>

<?php print Asset::js('jquery.modal.js');?>
</head>
<body class="uk-width-1-1">
	
<!-- NAV -->
<article class="uk-width-1-1" id="ec-chart-navbar">
	<nav class="uk-navbar">
	<a href="#ec-menu-main" class="uk-navbar-brand uk-margin-left">
            <img src="<?php print Uri::create('assets/img/ec-logo.svg'); ?>"/>
	</a>
        <!-- Mobile Version -->
	<ul class="uk-navbar-nav uk-hidden-large">
            <li class="uk-parent" data-uk-dropdown>
                <a href="#">Filter <i class="uk-icon-caret-down"></i></a>
                <div class="uk-dropdown uk-dropdown-navbar">
                <ul class="uk-nav uk-nav-navbar">

                <li class="uk-hidden">
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

                <li class="uk-hidden">
                <a href="#ec-filter-date" data-uk-modal>
                        <i class="uk-icon-calendar"></i>
                        Date
                </a>
                </li>

                <li class="uk-hidden">
                <a href="#ec-filter-price" data-uk-modal>
                        <i class="uk-icon-filter"></i>
                        Price
                </a>
                </li>

                </ul>
                </div>
            </li>
	</ul>
        
        <!-- Desktop Version -->
	<ul class="uk-navbar-nav uk-visible-large">
	<li class="uk-hidden">
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
	
	<li class="uk-hidden">
		<a href="#ec-filter-date" data-uk-modal>
		<i class="uk-icon-calendar"></i>
		Date
		</a>
	</li>
	
	<li class="uk-hidden">
		<a href="#ec-filter-price" data-uk-modal>
		<i class="uk-icon-filter"></i>
		Price
		</a>
	</li>
	
	</ul>
		
	<div class="uk-navbar-flip">
	<div class="uk-navbar-content">
	<form class="uk-search"
              data-uk-search="{source:'<?php print Uri::create('api/search/search.json'); ?>'">
		<input type="search"
                       class="uk-search-field"
                       placeholder="Search"/>
		<button class="uk-search-close"
                        type="reset">
		</button>
	</form>
	</div>
	<ul class="uk-navbar-nav uk-hidden-large">
            <li class="uk-parent" data-uk-dropdown>
                <a href="#"><i class="uk-icon-bars"></i></a>
                <div class="uk-dropdown uk-dropdown-navbar">
                <ul class="uk-nav uk-nav-navbar">

                <li>
                <a href="#ec-menu-archive">
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
            <li><a href="#ec-menu-archive">Archive</a></li>
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

<?php 
    print $content; 
    print $modal;
?>
<script>
$(document).ready(function()
{
    $(document).on('click','.ec-event-info-dialog',function()
    {
        var $dialog = $("#ec-event-info");
        var height = $dialog.find('.uk-grid').height();
        
        $dialog.find('.uk-panel').css('height',height - 30 + 'px');
    });
    
    $(document).on('click','.ec-chart-cycle',function()
    {
        var data = {id: $(this).data('id')}
        $.post($(this).data('url'),data,function(d)
        {
            $('.ec-chart-container').html('');
            $('.ec-chart-container').html(d);
        });
        e.preventDefault();
    });
});
</script>

</body>
</html>