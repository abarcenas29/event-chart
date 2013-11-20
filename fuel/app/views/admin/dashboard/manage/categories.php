<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
<form action="api-site"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal">
<legend>
	<i class="uk-icon-list"></i>
	Event Categories
</legend>
<div class="uk-form-row">

<div id="ec-cat-tags">
<?php foreach($cats as $row): ?>

	
<?php foreach($q['category'] as $cat): ?>
<?php if($cat['category'] == $row): ?>
	 <a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  uk-button-primary
			  ec-cat-tag"
	   data-cat-id="<?php print $cat['id']; ?>"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>	
<?php break;endif;?>
<?php endforeach;?>
<?php if(count($q['category']) > 0):?>
<?php if($cat['category'] != $row): ?>
	<a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  ec-cat-tag"
	   data-cat-id="0"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>
<?php endif; ?>
<?php else: ?>
	<a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  ec-cat-tag"
	   data-cat-id="0"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>
<?php endif; ?>
<?php endforeach;?>
</div>

</div>
</form>
</section>