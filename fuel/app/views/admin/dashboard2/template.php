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
      href="<?php print Uri::create('assets/img/favicon.png'); ?>">
<?php 
        cdn::jquery();
        
        cdn::uikit();
        cdn::uikit_css_addon();
        cdn::uikit_htmleditor();
        cdn::uikit_js_addon('autocomplete.min.js');
        
        cdn::default_fonts('roboto');
        
        print Asset::js('jquery.form.min.js');
        print Asset::css('ec-admin/admin.dashboard.css');
?>
</head>
<body class="uk-width-1-1">
    
<!-- Main Navigation -->
<nav class="uk-navbar" id="ec-dashboard-nav">
<a class="uk-navbar-brand" 
   href="<?php print Uri::create('admin/dashboard2/index'); ?>">
	Deremoe Event Chart
</a>
<ul class="uk-navbar-nav">
	<?php print (isset($menu))?$menu:''; ?>
</ul>
<div class="uk-navbar-flip">
<div class="uk-navbar-content">
    <a href="#ec-search-org"
       data-uk-modal
       class="uk-button uk-button-primary">
        <i class="fa fa-search"></i>
    </a>
</div>
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

<!-- ORG SEARCH -->
<div id="ec-search-org" 
     class="uk-modal">
    <article class="uk-modal-dialog uk-panel uk-panel-header">
        <a class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            Search Organization
        </header>
        <section class="uk-width-1-1">
            <form action="<?php print Uri::create('api/admin/search/event.json'); ?>"
                  class="uk-form uk-form-horizontal"
                  id="ec-search-org-form"
                  method="POST">
                <div class="uk-form-row">
                    <label class="uk-form-label">
                        Search Organization / Event
                    </label>
                    <div class="uk-form-controls">
                        <input type="text"
                               name="search"
                               class="uk-width-1-1" />
                    </div>
                </div>
                <div class="uk-form-row">
                    <button class="uk-button 
                                   uk-button-primary
                                   uk-float-right"
                            type="submit">
                        <i class="fa fa-search"></i>
                        Search
                    </button>
                </div>
            </form>
            <hr class="uk-margin-top">
        </section>
        <section class="uk-width-1-1 uk-overflow-container">
            <table class="uk-table uk-table-hover">
            <tbody id="ec-search-org-result"></tbody>
            </table>
        </section>
    </article>
</div>

<!-- Change Password -->
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
                id="ec-change-password-btn"
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
    $('#ec-search-org-form').ajaxForm({
        success:function(d){
            var $result = $('#ec-search-org-result');
            $result.empty();
            
            for(i = 0;i < d.results.length;i++){
                $result.append('<tr><td><a href="'+d.results[i].url+'">'+ d.results[i].title +'</a></td></tr>');
            }            
        }
    });
    $('#ec-change-password-btn').click(function(e)
    {
        var url	= $(this).data('url');
        var data = {
            password : $('input[name="password"]').val(),
            password2: $('input[name="password2"]').val()
        };

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
