<?php foreach($venues as $venue): ?>
<li>
	<a href="#" 
	   class="ec-coordinate"
	   data-lat="<?php print $venue['lat']; ?>"
	   data-long="<?php print $venue['long']; ?>">
	<i class="uk-icon-map-marker"></i>
		<?php print $venue['address']; ?>
	</a>
</li>
<?php endforeach; ?>
