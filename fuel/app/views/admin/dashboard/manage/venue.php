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