<!-- JQuery Leaflet -->
<?php print \Fuel\Core\Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');?>
<?php print \Fuel\Core\Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');?>
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid">
<section class="uk-width-1-1">
<div id="ec-map-cont">
<div id="ec-map" class="uk-width-1-1" style="height:400px"></div>        

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
		City
	</label>
	<div class="uk-form-controls">
	<select name="city">
	<?php foreach($cities as $city): ?>
		<option value="<?php print $city['major_area'] ?>">
		<?php print $city['major_area']; ?>
		</option>
	<?php endforeach; ?>
	</select>
	</div>
</div>
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
	
<section class="uk-width-1-2">
<form 
	action="<?php print Uri::create('ajax/admin/event/search_venue'); ?>"
	method="POST"
	id="ec-form-search-venue"
	class="uk-form uk-form-horizontal">
	<legend>
	<i class="uk-icon-map-marker"></i>
		Search Venue
	</legend>
	<div class="uk-form-row">
	<input type="text" name="search" class="uk-width-9-10"/>
	<button type="submit" 
			class="uk-button uk-button-primary uk-float-right">
		<i class="uk-icon-search"></i>
	</button>
	</div>
</form>
<ul id="ec-venue-search"
	class="uk-list uk-list-line">
</ul>
<div id="ec-venue-loader" style="display:none;">
	Searching venue ...
	<i class="uk-icon-spin uk-icon-spinner"></i>
</div>
</section>
	
</div>
</section>
<script>
var city = "<?php print $q['region']; ?>";
var $venueLoader = $('#ec-venue-loader');
$(document).ready(function(){
	$('select[name="city"]').children('option[value="'+ city +'"]').attr('selected','');
});
</script>