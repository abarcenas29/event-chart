<?php if($rsp !== false): ?>
<?php foreach($rsp as $photos):?>
	<div class="uk-thumbnail">
	<a href="#ec-modal-picture" 
	   data-username="<?php print $photos['username']; ?>"
	   data-user_img="<?php print $photos['user_img'];?>"
	   data-image="<?php print $photos['img_large']; ?>"
	   data-caption="<?php print $photos['caption']; ?>"
	   class="ec-modal-picture"
	   data-uk-modal>
	<img src="<?php print $photos['img_thumb']; ?>"/>
	</a>
	</div>
<?php endforeach;?>
<?php endif;?>