<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
<div class="uk-width-6-10">
	<?php print $args['name']; ?>
</div>
<div class="uk-width-3-10">
	<?php print $args['type']; ?>
</div>
<div class="uk-width-1-10">
	<a href="#"
	   class="uk-button 
			  uk-button-danger 
			  ec-guest-del"
	   data-guest-id="<?php print $args['guest_id']; ?>">
	<i class="uk-icon-minus"></i>
	</a>
</div>
</div>
</div>