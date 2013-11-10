<!DOCtype html>
<html class="uk-height-1-1">
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
<body class="uk-height-1-1">
	<?php print $content; ?>
</body>
</html>
