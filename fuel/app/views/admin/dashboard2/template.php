<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title>Admin dashboard - Deremoe Events Chart</title>

<meta name="robots" 
	  content="NOINDEX, NOFOLLOW">

<link rel="shortcut icon" 
	  type="image/x-icon" 
	  href="<?php print Uri::create('assets/img/favicon.ico'); ?>">
<?php 
	print Asset::css('uikit.min.css');
	print Asset::css('fonts.css');
	print Asset::css('admin.dashboard.css');
	
	print Fuel\Core\Asset::js('jquery-2.0.3.min.js');
	print Fuel\Core\Asset::js('uikit.min.js');
?>
</head>
<body class="uk-width-1-1">
<!-- Main Navigation -->
<nav class="uk-navbar" id="ec-dashboard-nav">
<a class="uk-navbar-brand" href="<?php print Uri::create('admin/dashboard2/index'); ?>">
	Deremoe Event Chart
</a>
<ul class="uk-navbar-nav">
	<?php print (isset($menu))?$menu:''; ?>
</ul>
<div class="uk-navbar-flip">
<ul class="uk-navbar-nav">
	
	<!-- MANAGEMENT -->
	<li class="uk-parent" data-uk-dropdown>
	<a href="#">
	<i class="uk-icon-gears"></i>
	Management
	</a>
	<div class="uk-dropdown uk-dropdown-navbar">
	<ul class="uk-nav uk-navbar">
	
	<li>
	<a href="<?php print Uri::create('admin/dashboard2/org_index'); ?>">
	<i class="uk-icon-group"></i>
	Organization
	</a>
	</li>
	
	<li>
	<a href="<?php print Uri::create('admin/dashboard2/index'); ?>">
	<i class="uk-icon-calendar"></i>
	Events
	</a>
	</li>
	
	<?php if(Session::get('su')): ?>
	<li>
	<a href="<?php print Uri::create('admin/dashboard2/admin'); ?>">
	<i class="uk-icon-gear"></i>
	Admin Setup
	</a>
	</li>
	<?php endif; ?>
	
	</ul>
	</div>
	</li>
	
	<!-- USER LOGIN -->
	<li class="uk-parent" data-uk-dropdown>
	<a href="#">
	<i class="uk-icon-user"></i>
	<?php print Session::get('username'); ?>
	</a>
	<div class="uk-dropdown uk-dropdown-navbar">
	<ul class="uk-nav uk-navbar">
	
	<li>
	<a href="#ec-change-password"
	   data-uk-modal>
	<i class="uk-icon-key"></i>
	Change Password
	</a>
	</li>
	
	<li>
	<a href="<?php print Uri::create('admin/login/logout'); ?>">
	<i class="uk-icon-lock"></i>
	Logout
	</a>
	</li>
	
	</ul>
	</div>
	</li>
</ul>
</div>
</nav>
<!-- CONTENT -->
<?php print (isset($content))?$content:''; ?>

<article id="ec-change-password" 
		 class="uk-modal">
<div class="uk-modal-dialog">

<article class="uk-panel uk-panel-header">
<header class="uk-panel-title">
	<i class="uk-icon-key"></i>
	Change User Password
</header>
<section>
<form action="#"
	  method="post"
	  id="ec-change-password"
	  class="uk-form uk-form-horizontal">
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		New Password
	</label>
	<div class="uk-form-controls">
		<input type="password"
		   name="password"
		   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">
		Re-type New Password
	</label>
	<div class="uk-form-controls">
		<input type="password"
		   name="password2"
		   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<div class="uk-float-right">
		<button type="submit"
				data-url="<?php print Uri::create('api/admin/maintinance/change_password.json'); ?>"
				class="uk-button
					   uk-button-success">
		<i class="uk-icon-save"></i>
		Save
		</button>
	</div>
	</div>
</form>
</section>
</article>
<script>
$(document).ready(function(e)
{
	$('button[type="submit"]').click(function(e)
	{
		var url	= $(this).data('url');
		var data = {
			password : $('input[name="password"]').val(),
			password2: $('input[name="password2"]').val()
		}
		
		$.post(url,data,function(d)
		{
			alert(d.response);
		});
		
		e.stopPropagation();
		e.preventDefault();
	});
});
</script>

</div>
</article>

</body>
</html>
