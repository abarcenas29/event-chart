<ul class="uk-nav uk-nav-offcanvas">
	<li class="uk-nav-header">Social Menu</li>
	<li>
	<a href="<?php print Uri::create('view/event/'.$id); ?>">
		<i class="uk-icon-calendar"></i>
		Event
	</a>
	</li>
	<li class="uk-nav-header">Main Menu</li>
	<li>
	<a href="<?php print Uri::create('chart/index'); ?>">
		<i class="uk-icon-home"></i>
		Index
	</a>
	</li>
	<li>
	<a href="<?php print Uri::create('chart/archive'); ?>">
		<i class="uk-icon-archive"></i>
		Chart Archives
	</a>
	</li>
</ul>