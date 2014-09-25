<!DOCtype html>
<html>
<head>
<meta http-equiv="Content-Type" 
      content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" 
      content="IE=edge"/>
<meta name="viewport" 
      content="width=device-width, initial-scale=1"/>

<title>Deremoe Event Chart <?php print (isset($title))?'- '.$title:''; ?></title>

<link rel="shortcut icon" 
      type="image/x-icon" 
      href="<?php print Uri::create('assets/img/favicon.png'); ?>">
<?php 
    cdn::jquery();
    
    cdn::uikit();
    cdn::uikit_css_addon();
    cdn::uikit_js_addon('notify.min.js');
    
    cdn::default_fonts('roboto');
    print Asset::css('header.css');
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
    
<?php if(isset($footer)): ?>    
<div id="footer">
<?php print $footer; ?>
</div>
<?php endif; ?>
    
</div>

</body>
</html>