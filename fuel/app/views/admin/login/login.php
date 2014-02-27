<style>
body
{
	background-color:#252525;
	background-position: center center;
	background-repeat:no-repeat;
	background-size:cover;
	background-image:url('<?php print Uri::create("assets/img/login/$image"); ?>');
}
</style>
<?php print Asset::js('jquery.form.min.js');?>
<?php print Asset::js('uikit/notify.min.js');?>
<?php print Asset::css('admin/login.css');?>
<?php print Asset::css('uikit/notify.min.css');?>
<article class="uk-width-1-1 uk-vertical-align" 
		 style="height:inherit;">
	<section class="uk-width-1-1" 
			 id="ec-login-bg">
		
	</section>
	<section class="uk-vertical-align-middle uk-width-1-1"
			 id="ec-login-modal-container">
	<div class="uk-grid uk-width-1-1">
	<div class="uk-width-1-2" id="ec-login-title">
		<h1 class="uk-text-center">
			Event Charts Admin Login
		</h1>
	</div>
	<div class="uk-width-1-2" 
		 id="ec-login-modal-space">
		<div class="uk-panel 
					uk-panel-box 
					uk-container-center">
		<form 
			action="<?php print \Fuel\Core\Uri::create('api/admin/login/validate.json'); ?>"
			method="POST"
			class="uk-form"
			id="ec-form-validation">
		<div class="uk-form-row">
			This is a restricted area - for now. 
			Ask the Admin to add you to the user list
		</div>
		
		<!-- Email -->
		<div class="uk-form-row">
		<div class="uk-form-controls">
			<input type="text"
				   name="email"
				   class="uk-width-1-1"
				   placeholder="example@email.com"/>
		</div>
		</div>
			
		<!-- Password -->
		<div class="uk-form-row">
		<div class="uk-form-controls">
			<input type="password"
				   name="password"
				   class="uk-width-1-1"
				   placeholder="Password"/>
		</div>
		</div>
		
		<div class="uk-form-row uk-text-center">
			<button type="submit" 
					class="uk-button 
						   uk-button-primary
						   uk-button-large">
				<i class="uk-icon-unlock"></i>
				Login
			</button>
		</div>
			
		</form>
	</div>
	</div>
	</section>
</article>
<script>
var urlDb	= "<?php print \Fuel\Core\Uri::create('admin/dashboard2/index'); ?>";
$(document).ready(function(){
	$('#ec-form-validation').ajaxForm({
		beforeSubmit:function()
		{
			$.UIkit.notify('Validating User ...',{status:'info'});
		},
		success:function(d)
		{
			console.log(d);
			if(d.success)
			{
				$.UIkit.notify(d.response,{status:'success'});
				setTimeout(function(){window.location = urlDb;},2000);
			}
			else
			{
				$.UIkit.notify(d.response,{status:'danger'});
			}
		}
	});
});
</script>