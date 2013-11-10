<?php print Fuel\Core\Asset::js('jquery.form.min.js'); ?>
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid">
<div class="uk-width-4-10">
	<form 
	action="<?php print $action; ?>"
	method="POST"
	class="uk-form uk-form-horizontal"
	id="ec-form-user">
	<legend>
		<i class="uk-icon-user"></i>
		<?php print $title; ?>
	</legend>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Email</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="email"
				   class="uk-width-1-1"
				   <?php print (isset($edit))?'value="'. $q['email'] .'"':'';  ?>/>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Username</label>
		<div class="uk-form-controls">
			<input type="text"
				   name="username"
				   class="uk-width-1-1"
				   <?php print (isset($edit))?'value="'. $q['username'] .'"':'';  ?>/>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Password</label>
		<div class="uk-form-controls">
			<input type="password"
				   name="password"
				   class="uk-width-1-1"
				   <?php print (isset($edit))?'value="'. $q['username'] .'"':'';  ?>/>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Re-type Password</label>
		<div class="uk-form-controls">
			<input type="password"
				   name="password2"
				   class="uk-width-1-1"
				   <?php print (isset($edit))?'value="'. $q['password2'] .'"':'';  ?>/>
		</div>
	</div>
	
	<div class="uk-form-row">
		<div class="uk-form-controls uk-float-right">
		<button class="uk-button 
					   uk-button-success">
			<i class="uk-icon-save"></i>
			 Add User
		</button>
		<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/user_index'); ?>" 
		   class="uk-button
				  uk-button-primary">
			<i class="uk-icon-backward"></i>
			 Back
		</a>
		</div>
	</div>
</form>
</div>
	
<div class="uk-width-6-10">
	<article class="uk-panel uk-panel-box uk-panel-box-primary">
	<header class="uk-panel-header">
		<h1 class="uk-panel-title" id="ec-ftitle">User Blah Blah</h1>
	</header>
	<section id="ec-fbody">
		Testing
	</section>
	</article>
</div>
	
</div>
</section>
<script>
var $title			= $('#ec-ftitle');
var $body			= $('#ec-fbody');
var urlUserIndex	= "<?php print \Fuel\Core\Uri::create('admin/dashboard/user_index');?>";

$(document).ready(function(){
	$('#ec-form-user').ajaxForm({
		beforeSubmit:function()
		{
			$title.html('Submitting Data ...');
			$body.html('We are processing your data. Please wait.');
		},
		success:function(data)
		{
			if(data.success)
			{
				$title.html('Success!!!');
				//setTimeout(function(){window.location = urlUserIndex;},1000);
			}
			$body.html(data.response);
		},
		clearForm:true
	});
});
</script>