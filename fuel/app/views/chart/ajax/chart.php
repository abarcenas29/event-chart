<!-- categories -->
<div class="uk-panel uk-margin-top ec-modal-desc">
	<h3>Categories</h3>
</div>
<div class="uk-panel ec-modal-cont uk-margin-top">
<?php if(count($q['category']) > 0):?>
<?php foreach($q['category'] as $row): ?>
	<a href="<?php print Uri::create('chart/category/'.$row['category']); ?>" class="uk-button uk-button-primary">
		<i class="uk-icon-tag"><?php print $row['category']; ?></i>
	</a>
<?php endforeach;?>
<?php endif;?>
</div>

<!-- ticket information (w/price) -->
<div class="uk-panel uk-margin-top ec-modal-desc">
	<h3>Ticket Information</h3>
</div>
<?php if(count($q['ticket']) > 0): ?>
<div class="uk-panel ec-modal-cont uk-margin-top" id="ec-event-venue">
<table class="uk-width-1-1">
<?php foreach($q['ticket'] as $row):?>
<tr>
<td>PHP <?php print number_format($row['price']) ?></td>
<td><?php print $row['note']; ?></td>
</tr>
<?php endforeach;?>
</table>
</div>
<?php else: ?>

<div class="uk-panel ec-modal-cont uk-margin-top">
<div class="uk-text-center">
	Free!!!
</div>
</div>

<?php endif;?>

<div class="uk-panel ec-modal-cont uk-margin-top">
<?php if(!empty($q['facebook'])): ?>
<a href="<?php print 'https://facebook.com/'.$q['facebook']; ?>" 
   class="uk-button ec-facebook"
   target="_new">
	<i class="uk-icon-facebook"></i>
	 Facebbok
</a>
<?php endif; ?>
<?php if(!empty($q['twitter'])): ?>
<a href="<?php print 'https://twitter.com/'.$q['twitter']?>" 
   class="uk-button ec-twitter"
   target="_new">
	<i class="uk-icon-twitter"></i>
	 Twitter
</a>
<?php endif; ?>
<?php if(!empty($q['website'])): ?>
<a href="<?php print 'http://'.$q['website']; ?>" 
   class="uk-button uk-button-success" 
   target="_new"
   style="color:whitesmoke">
	<i class="uk-icon-globe"></i>
	 Website
</a>
</div>
<?php endif; ?>
