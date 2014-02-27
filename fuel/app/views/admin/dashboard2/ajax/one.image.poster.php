<div class="ec-gallery uk-width-1-4 uk-margin-bottom">
	<a href="#"
	   data-id="<?php print (isset($q))?$q['id']:''; ?>"
		   class="uk-button 
				  uk-button-danger
				  uk-button-mini
				  ec-delete-poster">
			<i class="uk-icon-minus"></i>
	</a>
	<?php if(isset($q)): ?>
		<img src="<?php print Uri::create('uploads/'.
									$q['photo']['date'].'/thumb-'.
									$q['photo']['filename']); ?>"/>
	<?php else: ?>
		<img src="http://placehold.it/200x200"/>
	<?php endif; ?>
</div>

