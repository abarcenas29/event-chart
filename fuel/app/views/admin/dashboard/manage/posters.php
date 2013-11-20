<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
<div id="drop-files"
	 data-upload="<?php print $poster_action; ?>"
	 ondragover="return false">
	Drop Images Here
</div>
<!-- Uploading Holder -->
<div id="uploaded-holder">
<div id="dropped-files">
<div id="upload-button">
	<a href="#" 
	   class="uk-button 
			  uk-button-primary
			  ec-submit
			  ec-poster-upload">
		<i class="uk-icon-upload"></i> 
		Upload!</a>
	<a href="#" 
	   class="uk-button 
			  uk-badge-danger">
		<i class="uk-icon-trash"></i>
		delete</a>
	<span>0 Files</span>
</div>
</div>
<div id="extra-files">
<div class="number">
	0
</div>
<div id="file-list">
	<ul></ul>
</div>
</div>
</div>

<!-- Upload Pit -->
<div id="loading">
<div id="loading-bar">
	<div class="loading-color"> </div>
</div>
<div id="loading-content">Uploading file.jpg</div>
</div>

<div id="file-name-holder">
<ul id="uploaded-files">
	<h1>Uploaded Files</h1>
</ul>
</div>

<div class="uk-width-1-1">
<div class="uk-grid" id="ec-poster-gallery">
<?php foreach($q['poster'] as $pos): ?>
<div class="uk-width-2-10 
			uk-margin-bottom 
			ec-poster">
	<a href="#ec-poster-modal" data-uk-modal
	   data-img-url="<?php print \Fuel\Core\Uri::create('uploads/'.$pos['photo']['date'].'/'.$pos['photo']['filename']); ?>">
	<img src="<?php print \Fuel\Core\Uri::create('uploads/'.$pos['photo']['date'].'/thumb-'.$pos['photo']['filename']); ?>"
		 width="100%"/>
	</a>
	
	<div class="uk-text-center">
	<a href="#" class="uk-button uk-button-danger ec-poster-del uk-margin-top"
	   data-photo-id="<?php print $pos['photo_id']; ?>">
		<i class="uk-icon-trash"></i>
		Delete
	</a>
	</div>
	
</div>
<?php endforeach; ?>
</div>
</div>
</section>