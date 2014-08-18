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
    print cdn::jquery();
    
    print cdn::uikit();
    print cdn::uikit_css_addon();
    print cdn::uikit_js_addon('notify.min.js');
    print Asset::css('ec-admin/admin.login.css');
    
    print cdn::default_fonts('roboto');
    print Asset::js('jquery.form.min.js');
?>
</head>
<body class="uk-height-1-1 uk-width-1-1">
    <?php print $content; ?>
</body>
</html>
