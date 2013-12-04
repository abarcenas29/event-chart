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
	<li><a href="#">
		<i class="uk-icon-edit-sign"></i>
		Event Detail
		</a>
	</li>
	<li><a href="#">
		<i class="uk-icon-tags"></i>
		Event Category
		</a>
	</li>
	<li><a href="#">
		<i class="uk-icon-sitemap"></i>
		Hashtags
		</a>
	</li>
	<li><a href="#">
		<i class="uk-icon-user"></i>
		Sub Organization
		</a>
	</li>
</ul>
</nav>
</section>

<ul id="ec-evt-manage" class="uk-switcher">
<!-- Set Edit Venue -->
<li>
<?php print $event_edit; ?>
</li>
<!-- Set Event Venue -->
<li>
<?php print $venue_edit; ?>
</li>
<!-- Poster Upload -->
<li>
<?php print $poster_edit; ?>
</li>
<!-- Event Detail -->
<li>
<?php print $detail_edit; ?>
</li>
<!-- Event Category -->
<li>
<?php print $category_edit; ?>
</li>
<!-- Event Hashtags -->
<li>
<?php print $hashtag_edit; ?>
</li>
<!-- Event Organization -->
<li>
<?php print $org_edit; ?>
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
var mainOrg		  = <?php print $q['main_org'] ?>;

var startLocation = (editMap == 0)?[14.564779,120.988328]:[<?php print $q['lat']; ?>,<?php print $q['long']; ?>];
var OpenStreetMap = 'http://{s}.tile.cloudmade.com/06bb239b50aa4ef1bfccec8bbc153c60/997/256/{z}/{x}/{y}.png';

var marker		  = [];
var layer		  = null;
var dataArray	  = {photo_name:'|none|',file:'none'};
var urlDelPoster  = "<?php print $poster_d_action ?>";
var urlDelTicket  = "<?php print $ticket_d_action ?>";
var urlDelGuest	  = "<?php print $guest_d_action?>";
var urlCategory	  = "<?php print $cat_action; ?>";
var urlHashtag	  = "<?php print $hashtag_d_action?>";
var urlOrg		  = "<?php print $org_action?>";

var $response	  = $('.ec-message');
var $ecPriceTable = $('#ec-price-table');
var $ecGuestTable = $('#ec-guest-table');
var $ecHashTable  = $('#ec-hashtag-table');

jQuery.event.props.push('dataTransfer');
$(document).ready(function(){
	$response.hide();
});
</script>
<?php print Asset::js('jq.dashboard.event.manage.venue.js'); ?>
<?php print Asset::js('jq.dashboard.event.manage.edit.js'); ?>
<?php print Asset::js('jq.dashboard.event.manage.poster.js');?>
<?php print Asset::js('jq.dashboard.event.manage.gallery.js');?>
<?php print Asset::js('jq.dashboard.event.manage.ticket.js');?>
<?php print Asset::js('jq.dashboard.event.manage.guest.js');?>
<?php print Asset::js('jq.dashboard.event.manage.category.js');?>
<?php print Asset::js('jq.dashboard.event.manage.hashtag.js');?>
<?php print Asset::js('jq.dashboard.event.manage.org.js');?>