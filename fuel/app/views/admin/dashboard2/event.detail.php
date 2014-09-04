<?php 
    print Asset::css('ec-admin/admin.dashboard.event.add.css');

    print Asset::css('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css');
    print Asset::js('http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js');

    cdn::uikit_js_addon('datepicker.min.js');
    cdn::uikit_js_addon('sticky.min.js');
    cdn::uikit_js_addon('notify.min.js');
    
    print Asset::js('jquery.form.min.js');
?>
<article class="uk-width-1-1 uk-height-1-1" id="ec-event-detail-manage">
<div class="uk-grid uk-height-1-1">
	
<!-- Event Create/Edit Form Container -->
<div class="uk-width-1-2 
            uk-height-1-1 
            uk-vertical-align"
     id="ec-event-manage-form-container"
     style="overflow-y: scroll;">

	<section class="uk-vertical-align-middle
                        uk-width-1-1">

	<article class="uk-panel 
                        uk-panel-box
                        uk-panel-header
                        uk-width-1-1">
	<h1 class="uk-panel-title">Create Event Detail</h1>
        
        <form class="uk-form uk-form-horizontal"
              method="POST"
              action="<?php print $action ?>"
              id="ec-event-detail-form">
	<fieldset>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Name</label>
	<div class="uk-form-controls">
		<input type="text"
                       name="name"
                       value="<?php print (isset($q['name']))?$q['name']:''; ?>"
                       class="uk-width-9-10"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Email</label>
	<div class="uk-form-controls">
		<input type="email"
                       name="email"
                       value="<?php print (isset($q['email']))?$q['email']:''; ?>"
                       placeholder="example@email.com"
                       class="uk-width-9-10"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Organizers</label>
	<div class="uk-form-controls">
		<select name="main_org" 
                        style="width:59%;"
                        data-uri="<?php print Uri::create('api/admin/event/org_contact_info.json'); ?>">
		<?php foreach($orgs as $row):  ?>
			<option value="<?php print $row['id'] ?>">
			<?php print $row['name']; ?>
			</option>
		<?php endforeach;?>
		</select>
		<?php if(isset($q)): ?>
		<a href="#ec-sub-organization" 
		   class="uk-button uk-button-primary"
		   data-uk-modal>
			<i class="uk-icon-group"></i>
			Sub Organizations
		</a>
		<?php endif;?>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Date</label>
	<div class="uk-form-controls">
		<input class="uk-width-1-3"
			   data-uk-datepicker="{format:'YYYY-MM-DD'}"
			   type="text" 
			   placeholder="Start At"
			   value="<?php print (isset($q['start_at']))?$q['start_at']:''; ?>"
			   name="start_at"/>
		<input class="uk-width-1-3" 
			   data-uk-datepicker="{format:'YYYY-MM-DD'}"
			   type="text" 
			   placeholder="End At"
			   value="<?php print (isset($q['end_at']))?$q['end_at']:''; ?>"
			   name="end_at"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Venue</label>
	<div class="uk-form-controls">
		<input type="text"
			   name="address"
			   placeholder="type the venue address here"
			   value="<?php print (isset($q['venue']))?$q['venue']:''; ?>"
			   class="uk-width-9-10"/>
		
		<input type="hidden"
			   name="lng"
			   value="<?php print (isset($q['long']))?$q['long']:'120.988328'; ?>"
			   />
		<input type="hidden"
			   name="lat"
			   value="<?php print (isset($q['lat']))?$q['lat']:'14.564779'; ?>"
			   />
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">City</label>
	<div class="uk-form-controls">
            <select name="city">
            <?php foreach($cities as $city): ?>
                    <option value="<?php print $city['major_area'] ?>">
                    <?php print $city['major_area']; ?>
                    </option>
            <?php endforeach; ?>
            </select>
            <input class="uk-width-1-2"
                   name="city-input"
                   value="<?php print (isset($q['region']))?$q['region']:''; ?>"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Facebook Vanity Name</label>
	<div class="uk-form-controls">
		<input type="text"
                       name="facebook"
                       value="<?php print (isset($q['facebook']))?$q['facebook']:''; ?>"
                       placeholder="Do not include http://facebook.com/<type only this>"
                       class="uk-width-9-10"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Twitter</label>
	<div class="uk-form-controls">
		<input type="text"
                       name="twitter"
                       value="<?php print (isset($q['twitter']))?$q['twitter']:''; ?>"
                       placeholder="Do not include http://twitter.com/<type only this>"
                       class="uk-width-9-10"/>
	</div>
	</div>
		
	<div class="uk-form-row">
	<label class="uk-form-label">Website</label>
	<div class="uk-form-controls">
		<input type="text"
                       name="website"
                       value="<?php print (isset($q['website']))?$q['website']:''; ?>"
                       placeholder="http://myawesomewebsite.com"
                       class="uk-width-9-10"/>
	</div>
	</div>
            
        <div class="uk-form-row">
        <label class="uk-form-label">Facebook Event Id</label>
        <div class="uk-form-controls">
            <input type="text"
                   name="fbid"
                   placeholder="621129704608422"
                   value="<?php print (isset($q['fb_event_id']))?$q['fb_event_id']:''; ?>"
                   class="uk-width-8-10"
                   />
            <a class="uk-button 
                      uk-button-primary
                      uk-width-1-10"
               id="ec-facebook-event-form"
               data-url="<?php print Uri::create('api/admin/event/event_data.json'); ?>"
               type="submit">
            <i class="uk-icon-refresh"></i>
            </a>
        </div>
        </div>
            
        <div class="uk-form-row">
        <label class="uk-form-label">Official Facebook Event Page</label>
        <div class="uk-form-controls">
            <select name="fb-offical-id">
                <option value="1">Official</option>
                <option value="0">Non-Official (Otaku Event Chart)</option>
            </select>
        </div>
        </div>
	
	<?php if(isset($q)): ?>
	<div class="uk-form-row">
	<label class="uk-form-label">Event Category</label>
	<div class="uk-form-controls">
		<a href="#ec-sub-categories" 
		   class="uk-button uk-button-primary"
		   data-uk-modal>
			<i class="uk-icon-tags"></i>
			Select Event Categories
		</a>
	</div>
	</div>
		
	<!-- Show only on edit -->
	<div class="uk-form-row">
	<label class="uk-form-label">Event Detail</label>
	<div class="uk-form-controls">
		<a href="#ec-ticket" 
		   class="uk-button uk-button-primary"
		   data-uk-modal>
			<i class="uk-icon-ticket"></i>
			Tickets
		</a>
		
		<a href="#ec-guest" 
		   class="uk-button uk-button-primary"
		   data-uk-modal>
			<i class="uk-icon-pencil-square"></i>
			Guests
		</a>
		
		<a href="#ec-hashtag" 
		   class="uk-button uk-button-primary"
		   data-uk-modal>
			<i class="uk-icon-sitemap"></i>
			Hashtags
		</a>
	</div>
	</div>
	<?php endif; ?>
	
	<div class="uk-form-row">
	<label class="uk-form-label">Description</label>
	</div>
	<div class="uk-form-row">
        <textarea name="desc"
                  id="description"
                  data-uk-htmleditor="{markdown:true}"
                  class="uk-width-1-1"><?php print (isset($desc))?$desc:''; ?></textarea>
	</div>
		
	<div class="uk-form-row">
	<div class="uk-float-right">
            <input type="hidden"
                   name="fb-update"
                   value="<?php print (isset($q['fb_last_update']))?$q['fb_last_update']:''; ?>"
                   />
            <button class="uk-button 
                           uk-button-success"
                    type="submit">
                    <i class="uk-icon-save"></i>
                    Save
            </button>
            <a href="#" 
               class="uk-button
                      uk-button-primary">
            <i class="uk-icon-arrow-circle-left"></i>
                Back
            </a>
	</div>
	</div>
		
	</fieldset>
	</form>
	</article>
		
	</section>
	
</div>

<!-- Event Map Check -->
<div class="uk-width-1-2 
            uk-height-1-1"
     id="ec-event-manage-map">
    <article class="uk-panel"
             id="ec-venue-search">
    <a href="#ec-map-search" data-uk-modal class="uk-button">
        <i class="fa fa-map-marker"></i>
    </a>
    </article>
</div>

</div>
</article>

<div id="ec-map-search" class="uk-modal">
    <article class="uk-modal-dialog uk-panel uk-panel-header">
        <a href="" class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <i class="fa fa-map-marker"></i> Search Venue
        </header>
        <section class="uk-width-1-1">
            <form action="<?php print Uri::create('api/admin/event/search_venue.json'); ?>"
                  class="uk-form uk-form-horizontal"
                  id="ec-map-search-form"
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
            <tbody id="ec-map-search-result"></tbody>
            </table>
        </section>
    </article>
</div>
<?php
if(isset($q))
{
    print $modal_org;
    print $modal_cat;
    print $modal_ticket;
    print $modal_hashtag;
    print $modal_guest;
}?>

<script>
var venueCoords     = [];
var $map            = $('#ec-event-manage-map');
var OpenStreetMap   = 'https://{s}.tiles.mapbox.com/v3/examples.map-zr0njcqy/{z}/{x}/{y}.png';

var $inputLong = $('input[name="lng"]');
var $inputLat  = $('input[name="lat"]');
var $eventForm = $('#ec-event-detail-form');
var $eventFb   = $('#ec-facebook-event-form');

var urlManage = "<?php print Uri::create('admin/dashboard2/event_manage/'); ?>";
var layer     = null;

venueCoords.push($inputLat.val());
venueCoords.push($inputLong.val());

var map = L.map('ec-event-manage-map').setView(venueCoords,20);

$(document).ready(function()
{
    $('select[name="city"]').change(function(e){
        var value = $(this).find('option:selected').val();
        $('input[name="city-input"]').val(value);
    });
    $('select[name="main_org"]').change(function(e)
    {
        var value = $(this).find('option:selected').val();
        var uri   = $(this).data('uri');
        $.UIkit.notify('Fetching Organization Data ...',{status:'info'});
        $.post(uri,{org_id:value},function(d)
        {
            var $form = $eventForm;
            $form.find('input[name="email"]').val(d.email);
            $form.find('input[name="facebook"]').val(d.facebook);
            $form.find('input[name="twitter"]').val(d.twitter);
            $form.find('input[name="website"]').val(d.website);
            $.UIkit.notify('Fetching Organization Data Complete',{status:'success'});
            
        });
    });

<?php if(isset($q)): ?>
$('select[name="main_org"]').find('option[value="<?php print $q['main_org']; ?>"]').attr('selected','');
<?php endif; ?>
});
</script>
<?php 
    print Asset::js('dashboard/jq.event.manage.venue.js');
    print Asset::js('dashboard/jq.event.facebook.js');
    if(isset($q)):
        print Asset::js('dashboard/jq.event.manage.edit.js');
    else:
        print Asset::js('dashboard/jq.event.manage.add.js');
    endif;
?>