<?php print Asset::css('font-awesome.css'); ?>
<!-- Jquery UI -->
<?php print Asset::css('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');?>
<?php print Asset::js('http://code.jquery.com/ui/1.10.3/jquery-ui.js'); ?>

<?php print Asset::js('rangy-core.js');?>
<?php print Asset::js('hallo.js');?>

<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid" data-uk-grid-match>

<section class="uk-width-1-2">
<form 
	action="<?php print $edit_action; ?>"
	method="POST"
	id="ec-form-organization"
	class="uk-form uk-form-horizontal">
	<legend>
		<i class="uk-icon-calendar"></i> 
		<?php print $title; ?>
	</legend>

	<div class="uk-form-row">
	<label class="uk-form-label">Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="name"
			   value="<?php print $q['name']; ?>"
			   class="uk-width-1-1" />
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Email</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="email"
				   value="<?php print $q['email']; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>

	<div class="uk-form-row">
	<label class="uk-form-label"
		   style="float:none;">
		Description:
	</label>
	<div class="uk-width-1-1 uk-margin-top"
		 style="border:1px solid #ddd;min-height:10em;padding:0.5em;"
		 id="ec-description">
		<?php print $desc; ?>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Main Organizer</label>
		<div class="uk-form-controls">
		<select name="main_org">
		<?php foreach($orgs as $org): ?>
			<option value="<?php print $org['id']; ?>">
			<?php print $org['name']; ?>
			</option>
		<?php endforeach;?>
		</select>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Date</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="start_at"
				   value="<?php print $q['start_at']; ?>"
				   class="ec-date uk-width-4-10"/>
			<input type="text" 
				   name="end_at"
				   value="<?php print $q['end_at']; ?>"
				   class="ec-date uk-width-4-10"/>
		</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook Vanity Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="facebook"
			   value="<?php print $q['facebook']; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter Username</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="twitter"
			   value="<?php print $q['twitter']; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Website URL</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="website"
				   value="<?php print $q['website']; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>
	
	<div class="uk-form-row ec-message">
	<div class="uk-panel uk-panel-box uk-panel-box-primary">
		Data Uploaded ...
	</div>
	</div>
	
	<div class="uk-form-row">
	<div class="uk-form-controls uk-float-right">
	<button type="submit" 
			class="uk-button 
				   ec-submit
				   uk-button-success">
		<i class="uk-icon-save"></i>
		Save
	</button>
		
	<a href="<?php print Fuel\Core\Uri::create('admin/dashboard/index');?>" 
	   class="uk-button uk-button-primary">
		<i class="uk-icon-backward"></i>
		Back
	</a>
	</div>
	</div>
</form>
</section>

<section class="uk-width-1-2">
	<div class="uk-panel" 
		 id="ec-drag-n-drop"
		 style="border: 0.5em dotted #252525;min-height:496px;"
		 ondragover="return false">
		<?php if(is_null($q['photo_id'])): ?>
	<p class="uk-text-center">Drag your Image Here.</p>
	<?php else: ?>
		<img src="<?php print \Fuel\Core\Uri::create('uploads/'.$q['photo']['date'].'/'.$q['photo']['filename']); ?>"/>
	<?php endif; ?>
	</div>
</section>
</div>
</section>
<script>
$(document).ready(function(){
	$('select[name="main_org"]').children('option[value="'+ mainOrg +'"]').attr('selected','');
	$('#ec-description').hallo(
	{
		plugins: {
            'halloformat': {},
            'halloblock': {},
            'hallojustify': {},
            'hallolists': {},
            'hallolink': {}
          },
          editable: true,
          placeholder: 'Type your description here.'
	});
});
</script>