<?php print Asset::css('font-awesome.css'); ?>
<?php print Asset::css('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');?>

<?php print Asset::js('http://code.jquery.com/ui/1.10.3/jquery-ui.js'); ?>
<?php print Asset::js('rangy-core.js');?>
<?php print Asset::js('hallo.js');?>

<?php print Asset::js('jquery.form.min.js'); ?>
<section class="uk-margin-top
		 ec-admin-container
		 uk-container-center">
<div class="uk-grid uk-grid-divider" data-uk-grid-match>
<section class="uk-width-1-2">
<form 
	action="<?php print $action; ?>"
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
			   class="uk-width-1-1" />
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Email</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="email"
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
		Type your Description here.
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
				   class="ec-date uk-width-4-10"/>
			<input type="text" 
				   name="end_at"
				   class="ec-date uk-width-4-10"/>
		</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook Vanity Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="facebook"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter Username</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="twitter"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Website URL</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="website" 
				   class="uk-width-1-1"/>
		</div>
	</div>
	
	<div class="uk-form-row" id="ec-message">
	<div class="uk-panel uk-panel-box uk-panel-box-primary">
		Data Uploaded ...
	</div>
	</div>
	
	<div class="uk-form-row">
	<div class="uk-form-controls uk-float-right">
	<button type="submit" class="uk-button uk-button-success">
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
<article class="uk-panel uk-panel-box uk-panel-box-primary">
<header class="uk-panel-title">
	<h2><i class="uk-icon-upload"></i> Upload Picture</h2>
</header>
	<section id="ec-drag-n-drop" 
			 class="uk-text-center" 
			 style="min-height:300px"
			 ondragover="return false">
	<?php if(isset($q)): ?>
		<img src="<?php print Uri::create('uploads/'.$q['photo']['date'].'/'.$q['photo']['filename']); ?>"/>
	<?php else:?>
		drag the logo picture here
	<?php endif;?>
</section>
</article>
</section>
</div>
</section>
<script>
var dataArray		= {photo_name:'|none|',file:'none'};
var $responseCont	= $('#ec-message');
var $responseChild	= $('#ec-message div');
var $submitBtn		= $('button[type="submit"]');
var urlEventIndex	= "<?php print \Fuel\Core\Uri::create('admin/dashboard'); ?>";
$(document).ready(function(){
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
<?php print \Fuel\Core\Asset::js('jq.dashboard.event.add.js'); ?>