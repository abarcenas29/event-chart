<?php print Fuel\Core\Asset::css('jquery.dropfile.css'); ?>
<!-- JQuery Leaflet -->
<?php print \Fuel\Core\Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');?>
<?php print \Fuel\Core\Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');?>

<!-- Jquery UI -->
<?php print \Fuel\Core\Asset::css('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');?>
<?php print \Fuel\Core\Asset::js('http://code.jquery.com/ui/1.10.3/jquery-ui.js'); ?>

<?php print \Fuel\Core\Asset::js('jquery.form.min.js');?>
<section class="uk-margin-top
		 ec-admin-container
		 uk-container-center">
<nav class="uk-navbar">
<ul class="uk-navbar-nav" data-uk-switcher="{connect:'#ec-evt-manage'}">
	<li class="uk-active"><a href="#">
		<i class="uk-icon-pencil"></i> 
		Edit Information
		</a>
	</li>
	<li><a href="#" id="ec-venue">
		<i class="uk-icon-globe"></i>
		Set Venue
		</a>
	</li>
	<li><a href="#">
		<i class="uk-icon-upload-alt"></i>
		Upload Posters
		</a>
	</li>
	<li ><a href="#">
		<i class="uk-icon-edit-sign"></i>
		Event Detail
		</a>
	</li>
</ul>
</nav>
</section>

<ul id="ec-evt-manage" class="uk-switcher">
<li>
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid" data-uk-grid-match>

<!--	
	
	Edit Event Information

-->
<section class="uk-width-1-2">
<form 
	action="<?php print $edit_action; ?>"
	method="POST"
	id="ec-form-organization"
	class="uk-form uk-form-horizontal">
	<legend>
		<i class="uk-icon-calendar"></i> 
		<?php print $title; ?>
	</legend>

	<div class="uk-form-row">
	<label class="uk-form-label">Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="name"
			   disabled
			   value="<?php print $q['name']; ?>"
			   class="uk-width-1-1" />
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Email</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="email"
				   value="<?php print $q['email']; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>

	<div class="uk-form-row">
	<label class="uk-form-label">Description</label>
	<div class="uk-form-controls">
		<textarea name="description" class="uk-width-1-1" rows="5"><?php print (isset($q))?trim($q['description']):''; ?>
	</textarea>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Main Organizer</label>
		<div class="uk-form-controls">
		<select name="main_org">
		<?php foreach($orgs as $org): ?>
			<option value="<?php print $org['id']; ?>">
			<?php print $org['name']; ?>
			</option>
		<?php endforeach;?>
		</select>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Date</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="start_at"
				   value="<?php print $q['start_at']; ?>"
				   class="ec-date uk-width-4-10"/>
			<input type="text" 
				   name="end_at"
				   value="<?php print $q['end_at']; ?>"
				   class="ec-date uk-width-4-10"/>
		</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook Vanity Name</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="facebook"
			   value="<?php print $q['facebook']; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter Username</label>
	<div class="uk-form-controls">
		<input type="text" 
			   name="twitter"
			   value="<?php print $q['twitter']; ?>"
			   class="uk-width-1-1"/>
	</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Hashtag</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="hashtag"
				   value="<?php print $q['hashtag']; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>
	
	<div class="uk-form-row">
		<label class="uk-form-label">Website URL</label>
		<div class="uk-form-controls">
			<input type="text" 
				   name="website"
				   value="<?php print $q['website']; ?>"
				   class="uk-width-1-1"/>
		</div>
	</div>
	
	<div class="uk-form-row ec-message">
	<div class="uk-panel uk-panel-box uk-panel-box-primary">
		Data Uploaded ...
	</div>
	</div>
	
	<div class="uk-form-row">
	<div class="uk-form-controls uk-float-right">
	<button type="submit" 
			class="uk-button 
				   ec-submit
				   uk-button-success">
		<i class="uk-icon-save"></i>
		Save
	</button>
		
	<a href="<?php print Fuel\Core\Uri::create('admin/dashboard/index');?>" 
	   class="uk-button uk-button-primary">
		<i class="uk-icon-backward"></i>
		Back
	</a>
	</div>
	</div>
</form>
</section>

<section class="uk-width-1-2" id="ec-drag-n-drop" ondragover="return false">
<?php if(is_null($q['photo_id'])): ?>
	<p class="uk-text-center">Image Upload</p>
<?php else: ?>
	<img src="<?php print \Fuel\Core\Uri::create('uploads/'.$q['photo']['date'].'/'.$q['photo']['filename']); ?>"/>
<?php endif; ?>
</section>
</div>

</section>
</li>

<!--	
	
	Set Event Venue

-->
<li>
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid">
<section class="uk-width-1-1">
<div id="ec-map-cont">
<div id="ec-map" class="uk-width-1-1" style="height:400px"></div>        

<div id="ec-region">
<div data-uk-dropdown="{mode:'click'}">
        <button class="uk-button">
                Regions <i class="uk-icon-caret-down"></i>
        </button>
        <div class="uk-dropdown">
        <ul class="uk-nav uk-nav-dropdown">
        <?php foreach($regions as $r): ?>
        <li>
                <a href="#"
                   class="ec-coordinate"
                   data-lat="<?php print $r['lat'] ?>"
                   data-long="<?php print $r['long'] ?>">
                        <?php print $r['location']; ?>
                </a>
        </li>
        <?php endforeach; ?>
        </ul>
        </div>
</div>
</div>
</div>
</section>	

<section class="uk-width-1-2">
<form 
	action="<?php print $venue_action; ?>"
	method="POST"
	id="ec-form-venue"
	class="uk-form uk-form-horizontal">
	<legend>Venue Location</legend>
<div class="uk-form-row">
	<label class="uk-form-label">
		Location
	</label>
	<div class="uk-form-controls">
		<input name="lat" 
			   class="uk-width-4-10"
			   value="<?php print (is_null($q['lat']))?'14.564779':$q['lat']; ?>"
			   />
		<input name="long"
			   value="<?php print (is_null($q['long']))?'120.988328':$q['long']; ?>"
			   class="uk-width-4-10"/>
	</div>
</div>
	
<div class="uk-form-row">
	<label class="uk-form-label">
		Venue
	</label>
	<div class="uk-form-controls">
		<textarea name="venue" 
				  rows="5"
				  class="uk-width-1-1"><?php print $q['venue']; ?></textarea>
	</div>
</div>

<div class="uk-form-row ec-message">
<div class="uk-panel uk-panel-box uk-panel-box-primary">
	Data Uploaded ...
</div>
</div>
	
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
<button class="uk-button 
			   uk-button-success
			   ec-submit">
	<i class="uk-icon-save"></i>
	Save Venue
</button>
</div>
</div>
	
</form>
</section>

</div>
</section>
</li>
<!--	
	
	Poster Upload

-->
<li>
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
</li>

<li>
<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
<div class="uk-grid">
<div class="uk-width-1-2">
<form action="<?php print $ticket_action; ?>"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal"
	  id="ec-form-ticket">
<legend>
	<i class="uk-icon-ticket"></i>
	Ticket Information
</legend>
	
<div class="uk-form-row">
<label class="uk-form-label">
	Ticket Price
</label>
<div class="uk-form-controls">
	<input name="price"
		   class="uk-width-1-1"
		   type="text"/>
</div>
</div>
	
<div class="uk-form-row">
	<label class="uk-form-label">
		Ticket Information
	</label>
	<div class="uk-form-controls">
		<input name="note"
			   type="text"
			   class="uk-width-1-1"/>
	</div>
</div>
	
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
	<button class="uk-button uk-button-success ec-submit">
	<i class="uk-icon-save"></i>
	Save Ticket
	</button>
</div>
</div>
	
</form>

<!-- PRICE TABLE -->
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-3-10 ec-event-table-header">
		<i class="uk-icon-calendar"></i> Price
	</div>
	<div class="uk-width-6-10 ec-event-table-header">
		<i class="uk-icon-info-sign"></i> Note
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		
	</div>
</div>
</div>

<div id="ec-price-table">
<?php foreach($q['ticket'] as $row): ?>
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-3-10 ec-event-table-header">
		PHP <?php print $row['price']; ?>
	</div>
	<div class="uk-width-6-10 ec-event-table-header">
		<?php  print $row['note']; ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<div class="uk-button-group">
			<a href="#"
			   data-ticket-id="<?php print $row['id']; ?>"
			   class="uk-button 
					  uk-button-danger
					  ec-delete-ticket">
			<i class="uk-icon-minus"></i>
			</a>
		</div>
	</div>
</div>
</div>
<?php endforeach; ?>
</div>
	
</div>
	
<div class="uk-width-1-2">
<form action="api-site"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal">
<legend>
	<i class="uk-icon-list"></i>
	Event Categories
</legend>
<div class="uk-form-row">

<div id="ec-cat-tags">
<?php foreach($cats as $row): ?>

	
<?php foreach($q['category'] as $cat): ?>
<?php if($cat['category'] == $row): ?>
	 <a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  uk-button-primary
			  ec-cat-tag"
	   data-cat-id="<?php print $cat['id']; ?>"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>	
<?php break;endif;?>
<?php endforeach;?>
<?php if(count($q['category']) > 0):?>
<?php if($cat['category'] != $row): ?>
	<a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  ec-cat-tag"
	   data-cat-id="0"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>
<?php endif; ?>
<?php else: ?>
	<a href="#"
	   class="uk-button 
			  uk-margin-bottom
			  ec-cat-tag"
	   data-cat-id="0"
	   data-value="<?php print $row ?>">
	   <i class="uk-icon-tag"></i>
	   <?php print $row; ?>
	</a>
<?php endif; ?>
<?php endforeach;?>
</div>

</div>
</form>
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">

<div class="uk-width-1-1">
<form action="<?php print $guest_action; ?>"
	  method="post"
	  id="ec-form-guest"
	  class="uk-form 
			 uk-form-horizontal">
<legend>
	<i class="uk-icon-user"></i>
	Event Guests
</legend>
<div class="uk-form-row">
	<label class="uk-form-label">
		Guest
	</label>
	<div class="uk-form-controls">
		<input type="text"
			   class="uk-width-1-1"
			   name="name"
			   />
	</div>
</div>
<div class="uk-form-row">
	<label class="uk-form-label">
		Type
	</label>
	<div class="uk-form-controls">
	<select name="type">
	<?php foreach($g_type as $row): ?>
	<option value="<?php print $row; ?>">
		<?php print $row; ?>
	</option>
	<?php endforeach;?>
	</select>
	</div>
</div>
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
	<button type="submit" 
			class="uk-button uk-button-success ec-submit">
	<i class="uk-icon-save"></i>
	 Save Guest	
	</button>
</div>
</div>
</form>
</div>
	
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
<div class="uk-width-6-10">
	<i class="uk-icon-user"></i>
	Guest Name
</div>
<div class="uk-width-3-10">
	<i class="uk-icon-tags"></i>
	Type
</div>
<div class="uk-width-1-10">
	<i class="uk-icon-trash"></i>
</div>
</div>
</div>



<div class="uk-width-1-1 uk-margin-top">
<div id="ec-guest-table">
<?php foreach($q['guest'] as $row): ?>	
<div class="uk-grid">
<div class="uk-width-6-10">
	<?php print $row['name']; ?>
</div>
<div class="uk-width-3-10">
	<?php print $row['type']; ?>
</div>
<div class="uk-width-1-10">
	<a href="#"
	   class="uk-button 
			  uk-button-danger 
			  ec-guest-del"
	   data-guest-id="<?php print $row['id']; ?>">
	<i class="uk-icon-minus"></i>
	</a>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
	

	
</div>
</div>
</div>
</div>
</section>
</li>

</ul>

<div id="ec-poster-modal" class="uk-modal">
	<div class="uk-modal-dialog uk-modal-dialog-frameless">
	<a href="" class="uk-modal-close uk-close uk-close-alt"></a>
	<img id="ec-modal-poster-img" src=""/>
	</div>
</div>

<script>
var editMap		  = <?php print (is_null($q['lat']))?0:1; ?>;
var startLocation = (editMap == 0)?[14.564779,120.988328]:[<?php print $q['lat']; ?>,<?php print $q['long']; ?>];
var OpenStreetMap = 'http://{s}.tile.cloudmade.com/06bb239b50aa4ef1bfccec8bbc153c60/997/256/{z}/{x}/{y}.png';
var marker		  = [];
var layer		  = null;
var dataArray	  = {photo_name:'|none|',file:'none'};
var urlDelPoster  = "<?php print $poster_d_action ?>";
var urlDelTicket  = "<?php print $ticket_d_action ?>";
var urlDelGuest	  = "<?php print $guest_d_action?>";
var urlCategory	  = "<?php print $cat_action; ?>";

var $response	  = $('.ec-message');
var $ecPriceTable = $('#ec-price-table');
var $ecGuestTable = $('#ec-guest-table');

jQuery.event.props.push('dataTransfer');
$(document).ready(function(){
	$response.hide();
	$('.ec-cat-tag').click(function(){
		var cat = 'cat-id';
		var btn = 'uk-button-primary';
		var data= {id:$(this).data(cat),cat:$(this).data('value')};
		var $tag= $(this);
		//$('.ec-cat-tag').attr('uk-disabled','');
		$.post(urlCategory,data,function(d)
		{
			if(d.id !== 0)
			{
				$tag.addClass(btn);
			}
			else
			{
				$tag.removeClass(btn);
			}	
			$tag.data(cat,d.id)
			//$('.ec-cat-tag').removeAttr('uk-disabled');
		});
	});
});
</script>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.venue.js'); ?>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.edit.js'); ?>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.poster.js');?>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.gallery.js');?>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.ticket.js');?>
<?php print Fuel\Core\Asset::js('jq.dashboard.event.manage.guest.js');?>