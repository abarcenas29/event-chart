<article class="uk-width-1-1">
<section class="uk-width-large-9-10
				uk-width-medium-1-1
				uk-container-center
				uk-margin-top">

<article class="uk-grid">
<section class="uk-width-1-1 
				uk-margin-bottom 
				uk-visible-small 
				uk-text-center">
	<h1><?php print $q['name']; ?></h1>
</section>

<!-- Image Poster -->
<section class="uk-width-large-3-10
				uk-width-medium-1-1">
	
<img src="<?php print Uri::create('uploads/'.$q['photo']['date'].'/flow-'.$q['photo']['filename']); ?>"
	 class="uk-width-1-1"/>

<div class="uk-width-1-1 uk-margin-top">
<?php foreach($q['category'] as $row): ?>
<a href="#" class="uk-button uk-button-primary uk-margin-bottom">
	<i class="uk-icon-tag"></i>
	<?php print $row['category']; ?>
</a>
<?php endforeach;?>
</div>
</section>

<!-- Event Details -->
<section class="uk-width-large-7-10
				uk-width-medium-1-1">

<article class="uk-panel">
<section class="uk-panel-header uk-hidden-small">
	<h1 class="uk-panel-title">
		<?php print $q['name']; ?>
	</h1>
</section>
</article>
	
<article class="uk-panel uk-margin-top">
<section id="ec-view-map" style="background:pink;height:250px;">
</section>
</article>

<article class="uk-panel ec-view-content">
<header class="uk-panel-header">
	<h2 class="uk-panel-title">Description</h2>
</header>
<section>
	<?php print $q['description']; ?>
</section>
</article>
	
<div class="uk-width-1-1 uk-margin-top">
<section class="uk-grid">
	
<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Ticket Prices</h2>
	</header>
	<section>
	<table class="uk-width-1-1">
<?php foreach($q['ticket'] as $row): ?>
	<tr>
	<td>Php <?php print $row['price']; ?></td>
	<td><?php print $row['note']; ?></td>
	</tr>
<?php endforeach;?>
	</table>

	</section>
	</article>
</div>
	
	<div class="uk-width-1-2">
	<article class="uk-panel ec-view-content">
	<header class="uk-panel-header">
		<h2 class="uk-panel-title">Guests</h2>
	</header>
	<section>
	<table class="uk-width-1-1">
<?php foreach($q['guest'] as $row): ?>
	<tr>
	<td><?php print $row['name']; ?></td>
	<td><?php print $row['type']; ?></td>
	</tr>
<?php endforeach;?>
	</table>
	</section>
	</article>
	</div>
</section>
</div>
	
</section>
</article>
	
</section>
</article>