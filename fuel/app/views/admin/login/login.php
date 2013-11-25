<?php print Fuel\Core\Asset::js('jquery.form.min.js'); ?>
<section class="uk-vertical-align uk-height-1-1">
	<article class="uk-vertical-align-middle 
					uk-container-center
					uk-width-1-1">
	<div class="uk-width-custom 
				uk-container-center" 
		 style="width:640px;">
		
	<div class="uk-grid">
	<div class="uk-width-1-2"></div>
	<div class="uk-width-1-2">
	<h1 class="uk-margin-bottom-remove">
		<i class="uk-icon-lock"></i> Admin Login
	</h1>
	<hr class="uk-margin-remove">
	</div>
	</div>
		
	<div class="uk-grid">
		<div class="uk-width-1-2"></div>
		<div class="uk-width-1-2">
			
		<form 
			action="<?php print \Fuel\Core\Uri::create('api/admin/login/validate.json'); ?>"
			method="POST"
			class="uk-form"
			id="ec-form-validation">
			
		<div class="uk-form-row">
			This is a restricted area - for now. 
			Ask the Admin to add you to the user list
		</div>
			
		<div class="uk-form-row">
		<div class="uk-form-controls">
			<input type="text"
				   name="email"
				   class="uk-width-1-1"
				   placeholder="example@email.com"/>
		</div>
			
		<div class="uk-form-row">
		<div class="uk-form-controls">
			<input type="password"
				   name="password"
				   class="uk-width-1-1"
				   placeholder="Password"/>
		</div>
		</div>
			
		<div class="uk-form-row" id="ec-form-response">
		<div class="uk-alert">
			
		</div>
		</div>
			
		<div class="uk-form-row">
		<div class="uk-form-controls uk-float-right">
			<button type="submit" class="uk-button uk-button-primary">
				Login
			</button>
		</div>
		</div>
		</div>
		</form>
			
		</div>
	</div>
	</div>
	</article>
</section>
<script>
var $body	= $('#ec-form-response');
var $res	= $('#ec-form-response div');
var urlDb	= "<?php print \Fuel\Core\Uri::create('admin/dashboard/index'); ?>";
$(document).ready(function(){
	$body.hide();
	$('#ec-form-validation').ajaxForm({
		beforeSubmit:function()
		{
			$body.fadeIn(200);
			
			$res.html('Validating User');
		},
		success:function(data)
		{
			if(data.success)
			{
				setTimeout(function(){window.location = urlDb;},2000);
			}
			$res.html(data.response);
		}
	});
});
</script>