<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title></title>

<meta name="description" 
	  content="">
<meta name="author" 
	  content="">
<meta name="keywords" 
	  content="">
<meta name="robots" 
	  content="">

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
</ul>
<div class="uk-navbar-flip">
<ul class="uk-navbar-nav">
	<li><a href="<?php print Fuel\Core\Uri::create('admin/login/logout'); ?>">
		<i class="uk-icon-unlock"></i>
		 <?php print Fuel\Core\Session::get('username'); ?>
		</a>
	</li>
	<li><a href="<?php print Fuel\Core\Uri::create('admin/dashboard/change_password'); ?>">
		<i class="uk-icon-key"></i>
		</a>
	</li>
	<li><a href="#"><i class="uk-icon-reorder"></i></a></li>
</ul>
</div>
</nav>

<?php print $content; ?>

</body>
</html>
