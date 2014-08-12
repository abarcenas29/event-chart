<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
      content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
      content="IE=edge"/>
<meta name="viewport" 
      content="width=device-width, initial-scale=1"/>

<title>Deremoe Event Chart</title>

<link rel="shortcut icon" 
      type="image/x-icon" 
      href="<?php print Uri::create('assets/img/favicon.ico'); ?>">

<?php 
    print Asset::css('fonts.css');
    print Asset::css('uikit/uikit.css');
    print Asset::css('uikit/uikit.addons.min.css');
    print Asset::css('header.css');
    print Asset::css('font-awesome/font-awesome.min.css');
    
    print Asset::js('jquery-2.0.3.min.js');
    print Asset::js('uikit/uikit.min.js');
?>

<!-- FOOTER ELEMENT HANDLER -->
<style>
    html,body
    {
        margin:0;
        padding:0;
        height:100%;
    }
    #wrapper
    {
        min-height:100%;
        position:relative;
    }
    #content
    {
        <?php if(isset($footer)): ?>
        padding-bottom:2em;
        <?php endif; ?>
    }
    #footer
    {
        width:100%;
        height:2em;
        position:absolute;
        bottom:0em;
        left:0em;
        background-color:#9e9e9e;
    }
</style>
</head>
<body class="uk-width-1-1">

<!-- CHART NAVIGATION -->
<?php print $header; ?>
    
<div id="wrapper">

<div id="content">
<!-- CHART CORE -->
<?php print $content; ?>
</div>
    
<div id="footer">
<?php print (isset($footer))?$footer:''; ?>
</div>

</div>

</body>
</html>