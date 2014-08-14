<?php 
    print Asset::css('ec-admin/admin.maintinance.css');
    print Asset::js('jquery.form.min.js');

    print Asset::css('uikit/uikit.addons.min.css');
    print Asset::js('uikit/add-ons/notify.min.js');
?>
<article class="uk-width-1-1"
         id="ec-main-settings">
<div class="uk-grid">
    <article class="uk-width-1-1 
                    uk-text-center
                    ec-menu">
        <button
           class="uk-button"
           data-uk-modal="{target:'#ec-user-manager'}"
           title="User Menu">
            <i class="uk-icon-user"></i>
        </button>
		
        <button
           class="uk-button"
           data-uk-modal="{target:'#ec-user-manager'}"
           title="Categories">
            <i class="uk-icon-tags"></i>
        </button>
		
        <button
           class="uk-button"
           data-uk-modal="{target:'#ec-user-manager'}"
           title="Guest Types">
            <i class="uk-icon-bookmark-o"></i>
        </button>
		
        <button
           class="uk-button"
           data-uk-modal="{target:'#ec-user-manager'}"
           title="API">
            <i class="uk-icon-lemon-o"></i>
        </button>
		
        <a class="uk-button"
           href="#ec-admin-facebook"
           data-uk-modal
           title="facebook">
            <i class="uk-icon-facebook"></i>
        </a>
        
        <a class="uk-button"
           href="#ec-admin-twitter"
           data-uk-modal
           title="facebook">
            <i class="fa fa-twitter"></i>
        </a>
		
	</article>
</div>
</article>

<?php 
	print $modal_user;
        print $modal_fb;
        print $modal_tw;
?>