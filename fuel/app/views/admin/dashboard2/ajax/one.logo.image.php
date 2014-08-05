<div class="uk-thumbnail">
	<?php if(isset($q) && !is_null($q['photo_id'])): ?>
		<img src="<?php print Uri::create('uploads/'.$q['photo']['date']
										.'/thumb-'.$q['photo']['filename']); ?>"/>
	<?php else:?>
		<img src="http://placehold.it/200x200"/>
	<?php endif;?>
</div>