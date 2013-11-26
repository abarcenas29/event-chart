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
	  href="">
<?php 
	print Fuel\Core\Asset::css('uikit.min.css');
	print Fuel\Core\Asset::css('fonts.css');
	print Fuel\Core\Asset::css('admin.dashboard.event.css');
	print Fuel\Core\Asset::js('jquery-2.0.3.min.js');
	print Fuel\Core\Asset::js('uikit.min.js');
?>
</head>
<body class="uk-width-1-1">

<!-- Main Navigation -->
<nav class="uk-navbar" id="ec-admin-nav">
<ul class="uk-navbar-nav">
	<?php if(Fuel\Core\Session::get('su')): ?>
	<li>
	<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/user_index'); ?>">
		<i class="uk-icon-user"></i> Users</a>
	</li>
	<?php endif; ?>
	<li>
	<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard'); ?>"/>
		<i class="uk-icon-calendar"></i> Events</a>
	</li>
	<li><a href="<?php print Fuel\Core\Uri::create('admin/dashboard/org_index'); ?>">
		<i class="uk-icon-group"></i> Organization
		</a>
	</li>
	<li><a href="<?php print Fuel\Core\Uri::create('admin/dashboard/social'); ?>">
		<i class="uk-icon-twitter"></i> Social
		</a>
	</li>
	<li><a href="<?php print Fuel\Core\Uri::create('admin/dashboard/facebook'); ?>">
		<i class="uk-icon-facebook"></i> Facebook
		</a>
	</li>
</ul>
<div class="uk-navbar-flip">
<ul class="uk-navbar-nav">
	<li class="uk-parent ec-dropdown" data-uk-dropdown>
		<a href="#">
			<i class="uk-icon-user"></i>
			<?php print Fuel\Core\Session::get('username'); ?>
		</a>
		<div class="uk-dropdown uk-dropdown-navbar">
		<ul class="uk-nav uk-navbar ec-dropdown-navbar">
		<li>
		<a href="<?php print Uri::create('admin/dashboard/change_password')?>">
			Change Password
		</a>
		</li>
		<li>
		<a href="<?php print Uri::create('admin/login/logout'); ?>">
			Logout
		</a>
		</li>
		</ul>
		</div>
	</li>
	<li><a href="#"><i class="uk-icon-reorder"></i></a></li>
</ul>
</div>
</nav>

<?php print $content; ?>

</body>
</html>
