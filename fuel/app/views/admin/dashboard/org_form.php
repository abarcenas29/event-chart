<?php print \Fuel\Core\Asset::js('jquery.form.min.js'); ?>
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
		<i class="uk-icon-group"></i> 
		<?php print $title; ?>
	</legend>

	<div class="uk-form-row">
	<label class="uk-form-label">Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="name" 
			   value="<?php print (isset($q))?$q['name']:''; ?>"
			   class="uk-width-1-1" />
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Email</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="email" 
				   value="<?php print (isset($q))?$q['email']:''; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>

	<div class="uk-form-row">
	<label class="uk-form-label">Description</label>
	<div class="uk-form-controls">
		<textarea name="description" class="uk-width-1-1" rows="5"><?php print (isset($q))?trim($q['description']):''; ?>
	</textarea>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook Vanity Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="facebook" 
			   value="<?php print (isset($q))?$q['facebook']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter Username</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="twitter"
			   value="<?php print (isset($q))?$q['twitter']:''; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Website URL</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="website" 
				   value="<?php print (isset($q))?$q['website']:''; ?>"
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
		
	<a href="<?php print Fuel\Core\Uri::create('admin/dashboard/org_index');?>" 
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
<?php print \Fuel\Core\Asset::js('jquery.dnd.js'); ?>
<script>
var dataArray		= {photo_name:'|none|',file:'none'};
var $responseCont	= $('#ec-message');
var $responseChild	= $('#ec-message div');
var $submitBtn		= $('button[type="submit"]');

$(document).ready(function(){
	function pushObject(name,value)
	{
		return {
			name:		name,
			required:	false,
			type:		'hidden',
			value:		value
		};
	}
	
	$responseCont.hide();
	jQuery.event.props.push('dataTransfer');
	$('#ec-drag-n-drop').bind('drop',function(e)
	{
		var files		= e.dataTransfer.files;
		var $previewImg = $(this);	
		
		if(files.length > 1)
		{
			$(this).html('One file only');
			return false;
		}
		
		if(files[0].type == 'image/png'  || 
		   files[0].type == 'image/jpeg' ||
		   files[0].type == 'image/ppeg')
		{
			var fileReader		= new FileReader();
			fileReader.onload	= (function(f)
			{
				//dataArray = {name:'test'};
				return function()
				{
					dataArray = {photo_name:f.name,file:this.result};
					$previewImg.removeAttr('style');
					$previewImg.html('<img src="'+ this.result +'" width="80%"/>');
				}
			})(files[0]);
			fileReader.readAsDataURL(files[0]);
		}
		else
		{
			$(this).html('images only. GIF not allowed.');
			return false;
		}
		e.preventDefault();
	});
	
	$('#ec-form-organization').ajaxForm(
	{
	beforeSubmit:function(arr)
	{
		if(dataArray.photo_name !== '|none|')
		{
			arr.push(pushObject('photo_name',dataArray.photo_name));
			arr.push(pushObject('file',dataArray.file));
		}
		$responseCont.show();
		$responseChild.html('Sending Data ... <i class="uk-icon-spinner"></i> ');
		$submitBtn.attr('disabled');
	},
	success:function(data)
	{
		console.log(data);
		$responseChild.html(data.response);
		setTimeout(function(){$responseCont.hide()},5000);
		$submitBtn.removeAttr('disabled');
	},
	uploadProgress:function(e,pos,total,percent)
	{
		//console.log(percent);
	}
	});
});
</script>