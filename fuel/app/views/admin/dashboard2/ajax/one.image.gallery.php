<div class="uk-thumbnail ec-thumbnail">
	<a href="#" 
	   class="uk-button 
			  uk-button-danger
			  ec-thumbnail-delete">
		<i class="uk-icon-minus"></i>
	</a>
	<?php if(!isset($q) || is_null($q[$key])): ?>
	<img src="http://placehold.it/200x200"/>
	<?php else: ?>
	<img src="<?php print Uri::create('uploads/'.
									  $q[$relate]['date'].'/thumb-'.
									  $q[$relate]['filename']); ?>"/>
	<?php endif;?>
</div>