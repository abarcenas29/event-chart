<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
	
<div class="uk-width-1-1">
<div class="uk-width-1-2 uk-container-center">
<form action="<?php print $hashtag_action; ?>"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal"
	  id="ec-form-hashtag">
<legend>
	<i class="uk-icon-sitemap"></i>
	Event Hashtags
</legend>
	
<div class="uk-form-row">
	<label class="uk-form-label">
		Hashtags
	</label>
	<div class="uk-form-controls">
		<input name="hashtag"
			   type="text"
			   class="uk-width-1-1"/>
	</div>
</div>
	
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
	<button class="uk-button uk-button-success ec-submit">
	<i class="uk-icon-save"></i>
	Save Hashtag
	</button>
</div>
</div>
	
</form>
</div>
</div>
	
<div class="uk-width-1-1">
<div class="uk-width-1-2 uk-container-center">
	
<!-- HASHTAG TABLE -->
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-6-10 ec-event-table-header">
		<i class="uk-icon-calendar"></i> Hashtag
	</div>
	<div class="uk-width-4-10 ec-event-table-header"></div>
</div>
</div>

<div id="ec-hashtag-table">
<?php foreach($q['hashtags'] as $row): ?>
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-6-10 ec-event-table-header">
		# <?php print $row['hashtag']; ?>
	</div>
	<div class="uk-width-4-10 ec-event-table-header">
		<div class="uk-button-group">
			<a href="#"
			   data-hash-id="<?php print $row['id']; ?>"
			   class="uk-button 
					  uk-button-danger
					  ec-delete-hashtag">
			<i class="uk-icon-minus"></i>
			</a>
		</div>
	</div>
</div>
</div>
<?php endforeach; ?>
</div>

</div>
</div>
	
</section>