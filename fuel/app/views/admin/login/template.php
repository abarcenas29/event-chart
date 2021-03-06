<!DOCtype html>
<html class="uk-height-1-1 uk-width-1-1">
<head>
<meta http-equiv="Content-Type" 
	  content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
	  content="IE=edge"/>
<meta name="viewport" 
	  content="width=device-width, initial-scale=1"/>

<title>Admin Login</title>
<meta name="robots" 
	  content="NOINDEX, NOFOLLOW">

<link rel="shortcut icon" 
	  type="image/x-icon" 
	  href="<?php print Uri::create('assets/img/favicon.ico'); ?>">

<?php 
	print Asset::css('uikit.min.css');
	print Asset::css('fonts.css');
	print Asset::css('fonts.css');
	
	print Asset::js('jquery-2.0.3.min.js');
	print Asset::js('uikit.min.js');
?>

</head>
<body class="uk-height-1-1 uk-width-1-1">
	<?php print $content; ?>
</body>
</html>
