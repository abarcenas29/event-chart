<?php 
	print Asset::css('admin.maintinance.css');
	
	print Asset::js('jquery.form.min.js');
	
	print Asset::css('notify.min.css');
	print Asset::js('notify.min.js');
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
		   href="<?php print Uri::create('admin/dashboard2/facebook'); ?>"
		   title="facebook">
			<i class="uk-icon-facebook"></i>
		</a>
		
	</article>
</div>
</article>

<?php 
	print $modal_user;
?>