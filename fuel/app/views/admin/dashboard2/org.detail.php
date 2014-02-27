<?php
	print Asset::css('font-awesome.css');
	print Asset::css('admin/dashboard.org.detail.css');
	print Asset::css('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');

	print Asset::js('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
	print Asset::js('rangy-core.js');
	print Asset::js('hallo.js');
	
	print Asset::js('jquery.form.min.js');
	
	print Asset::css('uikit/notify.min.css');
	print Asset::js('uikit/notify.min.js');
?>
<article class="uk-width-1-1 uk-height-1-1 uk-margin-top"
		 id="ec-org-detail-manage">
<div class="uk-grid 
			uk-width-1-1 
			uk-height-1-1">
	<div class="uk-width-1-2 uk-height-1-1">
	
	<article class="uk-panel uk-panel-box uk-panel-header"
			 style="height:260px;"
			 id="ec-org-logo"
			 ondragover="return false">
	<header class="uk-panel-title">
		Organization Logo
		
	<?php if(isset($q)): ?>
	<div class="uk-float-right">
		<a href="#ec-url-modal"
		   data-uk-modal
		   class="uk-button">
			<i class="uk-icon-link"></i>   
		</a>
	</div>
	<?php endif; ?>
	
	</header>
	<section class="uk-text-center">
	<?php if(isset($q) && !is_null($q['photo_id'])): ?>
		<div class="uk-thumbnail">
			<img src="<?php print Uri::create('uploads/'.$q['photo']['date']
										.'/thumb-'.$q['photo']['filename']); ?>"/>
		</div>
	<?php endif; ?>
	</section>
	</article>
		
	<article class="uk-panel uk-panel-box uk-panel-header">
	<header class="uk-panel-title">
		Organization Detail
	</header>
	<form class="uk-form uk-form-horizontal"
		  action="<?php print $action; ?>"
		  id="ec-form-organization"
		  method="post">
		
	<div class="uk-form-row">
	<label class="uk-form-label">Name</label>
	<div class="uk-form-controls">
		<input type="text"
			   name="name"
			   value="<?php print (isset($q['name']))?$q['name']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Email</label>
	<div class="uk-form-controls">
		<input type="email"
			   name="email"
			   value="<?php print (isset($q['email']))?$q['email']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook</label>
	<div class="uk-form-controls">
		<input type="text"
			   name="facebook"
			   value="<?php print (isset($q['facebook']))?$q['facebook']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter</label>
	<div class="uk-form-controls">
		<input type="text"
			   name="twitter"
			   value="<?php print (isset($q['twitter']))?$q['twitter']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Website</label>
	<div class="uk-form-controls">
		<input type="text"
			   name="website"
			   value="<?php print (isset($q['website']))?$q['website']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<div class="uk-float-right">
		<button type="submit" 
				class="uk-button uk-button-success">
			<i class="uk-icon-save"></i>
			Save
		</button>
	</div>
	</div>
		
	</form>
	</article>
		
	</div>
	<div class="uk-width-1-2">
	
	<article class="uk-panel uk-panel-box uk-panel-header"
			 style="min-height:40em;">
	<header class="uk-panel-title">
		Organization Description
	</header>
	<section id="description">
		<?php print isset($desc)?$desc:''; ?>
	</section>
	</article>
		
	</div>
</div>
</article>

<?php if(isset($q)): ?>
<!-- Upload via Url -->
<article class="uk-modal" id="ec-url-modal">
<section class="uk-modal-dialog">
	<div class="uk-panel uk-panel-header">
	<div class="uk-panel-title">
		Save Image via URL
	</div>
	<form action="<?php print Uri::create('ajax/admin/org/logo_url'); ?>"
		  method="post"
		  class="uk-form uk-form-horizontal"
		  id="ec-form-url">
		
	<div class="uk-form-row">
	<label class="uk-form-label">
		Image Url
	</label>
	<div class="uk-form-controls">
		<input type="url" name="url" class="uk-width-1-1"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<div class="uk-float-right">
		<button type="submit" 
				class="uk-button uk-button-success">
			<i class="uk-icon-save"></i>
			Save
		</button>
	</div>
	</div>
	</form>
	</div>
</section>	
</article>
<script>
$(document).ready(function(e)
{
	$('#ec-form-url').ajaxForm({
		beforeSubmit:function()
		{
			$.UIkit.notify('Crunching Image ...',{status:'info'});
		},
		success:function(d)
		{
			$.UIkit.notify('Logo Added',{status:'success'});
			$('#ec-org-logo').find('section').html(d);
		}
	});
});
</script>
<?php endif; ?>
<script>
function pushObject(name,value)
{
	return{
		name:		name,
		required:	false,
		type:		'hidden',
		value:		value
	}
}
var $logo	 = $('#ec-org-logo');
var orgLogo  = "<?php print Uri::create('ajax/admin/gallery/org_logo'); ?>";
var urlManage = "<?php print Uri::create('admin/dashboard2/org_manage/'); ?>";
var imgArray = [];

$(document).ready(function(e)
{
	$('#description').hallo(
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
	
	$logo.bind('dragover',function(e)
	{
		$(this).css('box-shadow','1px 1px 30px 0px rgba(171, 31, 43, 0.78)');
		
		e.stopPropagation();
		e.preventDefault();
	});
	
	$logo.bind('dragleave',function(e)
	{
		$(this).css('box-shadow','none');
	});
	
	$('#ec-form-organization').ajaxForm(
	{
		beforeSubmit:function(arr)
		{
			$.UIkit.notify('Crunching Data ...',{status:'info'});
			
			var desc = $('#description').html();
			arr.push(pushObject('description',desc));
			
			if(imgArray.length == 1)
			{
				arr.push(pushObject('filename',imgArray[0].name));
				arr.push(pushObject('value',imgArray[0].value));
			}
		},
		success:function(d)
		{
			if(d.success === true)
			{
				$.UIkit.notify('Organization added',{status:'success'});
				setTimeout(function(){window.location = urlManage;},3000);
			}
			else
			{
				$.UIkit.notify('Something went wrong',{status:'danger'});
			}
		}
	});
});
</script>
<?php 
	print Asset::js('dashboard/jq.organization.add.js');
?>