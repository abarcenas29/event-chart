<?php print Asset::css('front/home.css'); ?>
<?php print Asset::css('animate.css');?>
<style>
	#ec-bgfacade
	{
		background-image:url("<?php print $bgImage; ?>");
	}
</style>
<div class="uk-width-1-1" 
	 id="ec-bgfacade">
<div class="uk-width-1-1 
			ec-facede-content
			uk-vertical-align">
	<article class="uk-vertical-align-middle uk-width-1-1">
	<section class="uk-width-1-1 uk-text-center">
		<img src="<?php print Uri::create('assets/img/ec-logo.svg'); ?>"
			 class="animated bounceInDown"
			 id="ec-facade-logo"
			 style="position: relative;"/>
		<p class="ec-tagline animated bounceIn ec-delay-500">
			We chart events, you attend.
		</p>
	</section>
	<section class="uk-width-1-1 uk-text-center uk-margin-top">
		<div class="uk-button-group">
		<button class="uk-button 
					   uk-button-large">
			Location
		</button>
		<div data-uk-dropdown="{mode:'click'}">
		<a href="#" class="uk-button uk-button-large">
			<i class="uk-icon-caret-down"></i>
		</a>
		<div class="uk-dropdown">
			<ul class="uk-nav uk-nav-dropdown uk-text-left">
			<li>
				<a href="<?php print Uri::create('front/ncr'); ?>">
					NCR
				</a>
			</li>
			<li class="uk-nav-divider"></li>
			<li>
				<a href="<?php print Uri::create('front/cebu'); ?>">
					Metro Cebu
				</a>
			</li>
			<li>
				<a href="<?php print Uri::create('front/davao'); ?>">
					Metro Davao
				</a>
			</li>
			</ul>
		</div>
		</div>
		</div>
	</section>
	</article>
	
</div>
	<div class="ec-new-event ec-delay-1s animated slideInDown">
		<div class="ec-icon uk-float-left">
			<i class="uk-icon-exclamation-triangle"></i>
		</div>
		<div class="ec-new-text 
					uk-float-right 
					uk-vertical-align">
			<div class="uk-vertical-align-middle">
				<p>Event(s) On-going</p>
			</div>
		</div>
	</div>
	
	<div class="ec-footnote">
	<p class="uk-text-small">
		&copy; <?php print date('Y'); ?>, Events Chart is a 
		<a href="http://dermeoe.com" target="_new">
			Deremoe
		</a>
		service in partnership with
		<a href="http://animephproject.wordpress.com" target="_new">
			AnimePH
		</a>
		and
		<a href="#" target="_new">
			Otaku Events
		</a>
	</p>
	</div>
</div>
<script>
var $resize = $('#ec-bgfacade');
var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
function resizeWindows()
{
	var height = $(window).height();
	$resize.css('height',height+'px');
}

$(document).ready(function(d)
{
	$('.ec-new-text').one(animationEnd,function(){$(this).find('div > p').show();})
	resizeWindows();
	$(window).resize(function()
	{
		resizeWindows();
	});
});
</script>