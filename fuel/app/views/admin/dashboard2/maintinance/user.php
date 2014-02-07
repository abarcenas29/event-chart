<article id="ec-user-manager" class="uk-modal">
<div class="uk-modal-dialog">
	<article class="uk-panel uk-panel-header">
	<header class="uk-panel-title">
		<i class="uk-icon-user"></i>
		User Management
	</header>
	<section class="uk-width-1-1">
		<form action="<?php print Uri::create('ajax/admin/maintinance/add_user'); ?>"
			  method="post"
			  id="ec-user-form"
			  class="uk-form uk-form-horizontal">
		
		<div class="uk-form-row">
			<label class="uk-form-label">
				Email
			</label>
			<div class="uk-form-controls">
				<input type="email"
					   class="uk-width-1-1"
					   name="email"/>
			</div>
		</div>
		
		<div class="uk-form-row">
			<label class="uk-form-label">
				Username
			</label>
			<div class="uk-form-controls">
				<input type="text"
					   class="uk-width-1-1"
					   name="username"/>
			</div>
		</div>
			
		<div class="uk-form-row">
			<label class="uk-form-label">
				Password
			</label>
			<div class="uk-form-controls">
				<input type="password"
					   class="uk-width-1-1"
					   name="password"/>
			</div>
		</div>
			
		<div class="uk-form-row">
		<div class="uk-float-right">
			<button class="uk-button uk-button-success"
					type="submit">
				<i class="uk-icon-save"></i>
				Save
			</button>
		</div>
		</div>
		
		</form>
	</section>
	</article>
	
	<article class="uk-panel uk-panel-header uk-margin-top">
	<header class="uk-panel-title">
		Users
	</header>
	<section class="uk-width-1-1">
	<div class="uk-grid" id="ec-user-pit">
	<?php foreach($q as $row): ?>
	<?php if(Session::get('user_id') != $row['id']): ?>
		<div class="uk-width-1-2 ec-user-<?php print $row['id']; ?>">
		<?php print $row['email']; ?>
		</div>
		<div class="uk-width-1-2 ec-user-<?php print $row['id']; ?>">
		<a href="<?php print Uri::create('api/admin/maintinance/del_user.json'); ?>"
		   class="uk-button uk-button-danger ec-delete-user"
		   data-id="<?php print $row['id'] ?>">
			<i class="uk-icon-minus"></i>
		</a>
		</div>
	<?php endif; ?>
	<?php endforeach;?>
	</div>
	</section>
	</article>
</div>
</article>
<script>
var $userPit = $('#ec-user-pit');
$(document).ready(function(e)
{
	$('#ec-user-form').ajaxForm({
		beforeSubmit:function(arr)
		{
			$.UIkit.notify("Crunching Data ... ", {status:'info'})
		},
		success:function(d)
		{
			$.UIkit.notify("User added ...", {status:'success'})
			$userPit.html(d);
		}
	});
	
	$userPit.on('click','.ec-delete-user',function(e)
	{
		var url		= $(this).attr('href');
		var data	= {user_id:$(this).data('id')};
		
		$.post(url,data,function(d)
		{
			$.UIkit.notify("User deleted ...", {status:'danger'})
			$userPit.find('.ec-user-'+ data.user_id).remove();
		});
		
		e.preventDefault();
		e.stopPropagation();
	});
});
</script>